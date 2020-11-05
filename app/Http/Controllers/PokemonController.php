<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PokemonController extends Controller{
	/*
	|--------------------------------------------------------------------------
	| PokemonController Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for pokemon api https://pokeapi.co
	|
	|--------------------------------------------------------------------------
	*/

  public function search(){

    $url = request("url");
    $limit = request("limit");
    $url = "?".$url."&".$limit;
    //Curl
    $curlclient = new \GuzzleHttp\Client();
    $curlrequest = $curlclient->get('https://pokeapi.co/api/v2/pokemon/?'.$url);
    $curlresponse = $curlrequest;
    $pokemon = JSON_decode($curlresponse->getBody());

    return view('/projects/pokemon/pokemonSearch', [
			'pokemon' => $pokemon

		]);
	}

  public function phpsearch(){

    $nameOrId = request("nameOrId");

    //Curl
    $curlclient = new \GuzzleHttp\Client();
    $curlrequest = $curlclient->get('https://pokeapi.co/api/v2/pokemon/'.$nameOrId);
    $curlresponse = $curlrequest;
    $pokemon = JSON_decode($curlresponse->getBody());

    return view('/projects/pokemon/pokemonSearch', [
			'pokemon' => $pokemon

		]);
	}

}
