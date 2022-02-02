<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Movie extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function movie(){
    	return $this->hasmany('App\Movie','id');
    }
}
