<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;


interface ProductRepositoryInterface
{
    public function search(Request $request);
    public function urlSlug(Request $request);

}

