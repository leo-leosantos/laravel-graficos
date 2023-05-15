<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\DashboardRepositoryInterface;

class DashboardController extends Controller
{
    protected $repository;

    public function index(DashboardRepositoryInterface $repository)
    {

        $categories =     $repository->getAllCategories();
        $products =   $repository->getAllProducts();
        $users =  $repository->getAllUsers();

        return  view('admin.dashboard.index'  ,[
            'categories' => $categories,
            'products' => $products,
            'users' => $users,
        ]);
    }
}
