<?php

namespace App\Repositories\Core\Eloquent;

use App\Repositories\Contracts\ChartRepositoryInterface;
use App\Repositories\Core\BaseEloquentRepository;

class EloquentChartRepository extends BaseEloquentRepository implements ChartRepositoryInterface
{
    public function entity()
    {
        //retorna o model da implementação;
        // return Chart::class;
    }
}
