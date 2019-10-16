<?php

namespace Tests\Feature;

use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateProduct()
    {      
        $payload = [
            'description' => 'Lorem',
            'price' => 9.50
        ];

        $this->json('POST', '/products', $payload)
            ->assertStatus(200)
            ->assertJson(['id' => 1, 'description' => 'Lorem', 'price' => 9.50]);
    }
    public function testsProductsAreUpdatedCorrectly()
    {
        $product = factory(Product::class)->create([
            'description' => 'First prod',
            'price' => 10
        ]);

        $payload = [
            'description' => 'Lorem',
            'price' => 9.50
        ];

        $response = $this->json('PUT', '/products' . $product->id, $payload)
            ->assertStatus(200)
            ->assertJson([ 
                'id' => 1, 
                'ddescription' => 'Lorem',
                'price' => 9.50
            ]);
    }
    public function testProductsAreListedCorrectly()
    {
        factory(Product::class)->create([
            'description' => 'First product',
            'price' => 19.90
        ]);

        factory(Product::class)->create([
            'description' => 'Second prods',
            'price' => 9.50
        ]);
        $response = $this->json('GET', '/api/articles', [])
            ->assertStatus(200)
            ->assertJson([
                [ 'description' => 'First product', 'price' => 19.90 ],
                [ 'description' => 'Second prods', 'price' => 9.50 ]
            ])
            ->assertJsonStructure([
                '*' => ['id', 'description', 'price', 'created_at', 'updated_at'],
            ]);
    }

}
