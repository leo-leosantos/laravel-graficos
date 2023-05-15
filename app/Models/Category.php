<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title','url','description'];



    // protected $casts = [
    //     'created_at' => 'datetime:Y-m-d',
    // ];


    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
