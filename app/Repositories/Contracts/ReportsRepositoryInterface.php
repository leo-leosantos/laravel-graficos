<?php

namespace App\Repositories\Contracts;


interface ReportsRepositoryInterface
{
    //criar metodos que precisam ser implementados  adicionalmemte
    //quem implementar essa interface precisar ter esses metodos

     public function byMonths(int $year ):array;
}
