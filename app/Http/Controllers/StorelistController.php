<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Storelist;
use App\Currentlist;

use Illuminate\Http\Request;

class StorelistController extends Controller
{
    public function list()
   {
       $items= Storelist::where('active', 1)->get();
       $selection= Storelist::where('active', 0)->get();


       return view('/projects/list/list', [
   			'items' => $items, 'selection' => $selection
   		]);
   }

}
