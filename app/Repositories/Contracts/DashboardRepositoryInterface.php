<?php

namespace App\Repositories\Contracts;

interface DashboardRepositoryInterface
{

    public function getAllCategories();
    public function getAllProducts();
    public function getAllUsers();
    
}