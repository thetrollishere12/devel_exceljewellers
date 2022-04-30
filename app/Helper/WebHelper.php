<?php

use Illuminate\Support\Str;

function random_id($prefix){

	return $prefix.Str::random(4).now()->timestamp.Auth::id();

}

function country_json(){

	$path = storage_path() . "/json/country.json"; // ie: /var/www/laravel/app/storage/json/filename.json

    $json = json_decode(file_get_contents($path), true);

    return $json;

}

function store_json(){

	$path = storage_path() . "/json/hours.json"; // ie: /var/www/laravel/app/storage/json/filename.json

    $json = json_decode(file_get_contents($path), true);

    return $json;

}