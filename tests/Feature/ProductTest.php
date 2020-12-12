<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Product;

class ProductTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCheckProduct()
    {
        $response = $this->get('product');

        $response->assertStatus(200);
    }



    public function testGetProduct()
    {
        $product = factory('App\Product')->create();

        $response = $this->get('product.index'); 

        $response->assertSee($product->name);
    }

    public function testCreateProduct()
    {
        $product = factory('App\Product')->make();

        $this->post('product', $product->toArray()); 

        $this->assertEquals(1, Product::all()->count());
    }
}
