<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


//laravel knows that since this model is named Users
// its database table is users
class Contacts extends Model{
  protected $table = 'Contacts';

  
}
