<?php

namespace Tests\Feature;

use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Factories\ProductFactory;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateProduct()
    {      
		#authenticatiokn
        $payload = [
            'description' => 'Lorem',
            'price' => 9.50
        ];

        return $this->json('POST', '/api/products', $payload)
            ->assertStatus(201)
            ->assertJson(['id' => 1, 'description' => 'Lorem', 'price' => 9.50]);
    }
	
	public function delete_product() {
        $product = factory(Product::class)->create();
        $this->delete(route('products.destroy', $product->id))
            ->assertStatus(204);
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

        $this->json('PUT', '/api/products/'. $product->id, $payload)
            ->assertStatus(200)
            ->assertJson([  
                'description' => 'Lorem',
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
        $response = $this->json('GET', '/api/products', [])
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
