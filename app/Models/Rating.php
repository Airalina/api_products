<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    public $incrementing = true;
    protected $table = "ratings";

    public function rateable() {

        return $this->morphTo();

    }

    public function qualifier() {

        return $this->morphTo();

    }

}
