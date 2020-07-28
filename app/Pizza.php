<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Pizza extends Model{

//needed when adding json array to database (defines toppings as an array)
  protected $casts = [
    'toppings' => 'array'
  ];
}
