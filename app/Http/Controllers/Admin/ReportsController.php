<?php

namespace App\Http\Controllers\Admin;

use App\Charts\ReportsChart;
use App\Enum\Enum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ReportsRepositoryInterface;

class ReportsController extends Controller
{

    private $repository;

    public function __construct(ReportsRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function months(ReportsChart $chart)
    {

        $chart->labels(Enum::months());

        $chart->dataset('2018', 'bar', $this->repository->byMonths(2018));
        $chart->dataset('2019', 'bar', $this->repository->byMonths(2019))->options([
            'backgroundColor'=> '#333',
       ]);;

         $chart->dataset('2020', 'bar',$this->repository->byMonths(2020))->options([
             'backgroundColor'=> '#999',
        ]);


        return view('admin.charts.chart', compact('chart'));
    }
}
