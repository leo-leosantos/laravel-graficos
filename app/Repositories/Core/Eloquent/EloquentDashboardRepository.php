<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\{
    Category,
    Product,
    User
};

use App\Repositories\Contracts\DashboardRepositoryInterface;

class  EloquentDashboardRepository implements DashboardRepositoryInterface
{
    public function getAllCategories()
    {
        return Category::count();
    }
    public function getAllProducts()
    {
        return Product::count();
    }
    public function getAllUsers()
    {
        return User::count();

    }
}
