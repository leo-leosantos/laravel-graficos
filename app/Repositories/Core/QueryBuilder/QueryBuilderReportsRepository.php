<?php

namespace App\Repositories\Core\QueryBuilder;

use App\Charts\ReportsChart;
use App\Enum\Enum;
use App\Repositories\Core\BaseQueryBuilderRepository;
use App\Repositories\Contracts\ReportsRepositoryInterface;
use DB;

class QueryBuilderReportsRepository extends BaseQueryBuilderRepository implements ReportsRepositoryInterface
{

    protected $table = 'orders';

    public function byMonths(int $year):array
    {
        $dataset = $this->db->table($this->tb)
        ->select(DB::raw('sum(total) as sums'))
        ->groupBy(DB::raw('MONTH(date)'))
        ->whereYear('date', $year)
        ->pluck('sums')
        ->toArray();


            return $dataset;



        // $dataset = [];

        // foreach ($reports as $key => $value) {
        //    $dataset[] = $value->sums;
        // }
        // return $dataset;



    }

    public function getReports(int $yearStart = null, int $yearEnd = null, $type = 'bar')
    {

       $chart =  app(ReportsChart::class);

       $yearStart = $yearStart ?? date('Y')- 3;
       $yearEnd = $yearEnd ?? date('Y');

       $chart->labels(Enum::months());

       for ($year=$yearStart; $year <= $yearEnd ; $year++) {
            $color = '#' . dechex(rand(0x000000, 0xFFFFFF));
            $chart->dataset($year, $type, $this->byMonths($year))->options([
                'color' => $color,
                'backgroundColor' => $color
            ]);
       }

       return $chart;

    }

    public function getDataYears():array
    {

        $data = $this->db->table($this->tb)
        ->select(DB::raw('sum(total) as total'), DB::raw('EXTRACT(YEAR from date) as year'))
        ->groupBy(DB::raw('YEAR(date)'))
       // ->whereYear('date', $year)
        ->get();


        $backgrounds = $data->map( function ($value, $key){
            return '#' . dechex(rand(0x000000, 0xFFFFFF));

        });

        return [
            'labels'=>$data->pluck('year'),
            'values'=>$data->pluck('total'),
            'backgrounds' => $backgrounds
        ];
    }



}
