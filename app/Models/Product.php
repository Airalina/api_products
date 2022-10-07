<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price',
        'category_id',
        'user_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    protected static function booted()
    {
        static::creating(function(Product $product) {
            $faker = \Faker\Factory::create();
    	    $product->image_url = $faker->imageUrl();

       	    $product->user()->associate(auth()->user());
        });
    }
}
