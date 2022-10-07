<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    private string $endpoint;

    public function __construct()
    {
        parent::__construct();
        $this->endpoint = '/api/categories/';
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

        $category = Category::factory()->make();
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

        $category = Category::factory()->make();

        $this->post($this->endpoint, $category->toArray())
            ->assertCreated()
            ->assertJson([
                "data" => $category->toArray()
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

        $category = Category::factory()->create();

        $this->get($this->endpoint . $category->id)
            ->assertOk()
            ->assertJson([
                "data" => [
                    "name" => $category->name
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

        $category = Category::factory()->create();
        $categoryModified = Category::factory()->make();
        $this->withoutExceptionHandling();

        $this->put($this->endpoint . $category->id, $categoryModified->toArray())
            ->assertOk()
            ->assertJson([
                "data" =>  $categoryModified->toArray()
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
        
        $category = Category::factory()->create();

        $this->delete($this->endpoint . $category->id)->assertOk()
            ->assertJson([
                "data" => [
                    "name" => $category->name
                ]
            ]);
    }
}
