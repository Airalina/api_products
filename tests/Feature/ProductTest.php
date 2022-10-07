<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;

class ProductTest extends TestCase
{
    private string $endpoint;

    public function __construct()
    {
        parent::__construct();
        $this->endpoint = '/api/products/';
        $this->defaultHeaders = ['Accept' => 'application/json'];
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_index()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $product = Product::factory()->make();
        $this->get($this->endpoint)
            ->assertOk();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_store()
    {

        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $product = Product::factory()->make();

        $this->post($this->endpoint, $product->toArray())
            ->assertCreated()
            ->assertJson([
                "data" => $product->toArray()
            ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_show()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $product = Product::factory()->create();

        $this->get($this->endpoint . $product->id)
            ->assertOk()
            ->assertJson([
                "data" => [
                    "name" => $product->name,
                    "price" => $product->price,
                ]
            ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_update()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $product = Product::factory()->create();
        $productModified = Product::factory()->make();
        $this->withoutExceptionHandling();

        $this->put($this->endpoint . $product->id, $productModified->toArray())
            ->assertOk()
            ->assertJson([
                "data" =>  $productModified->toArray()
            ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_destroy()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );
        
        $product = Product::factory()->create();

        $this->delete($this->endpoint . $product->id)->assertOk()
            ->assertJson([
                "data" => [
                    "name" => $product->name,
                    "price" => $product->price,
                ]
            ]);
    }
}
