<?php

namespace App\Repository\Eloquent;

use App\Product;
use App\Repository\DProductRepoInterface;

class DProductRepository implements DProductRepoInterface
{
  
    // Get all instances of model
    public function all()
    {
            $dProducts = Product::with('category')->whereIn('name', function ( $query ) {
                $query->select('name')->from('products')->groupBy('name')->havingRaw('count(*) > 1');
            })->get();
            
            return $dProducts;
    }

}
