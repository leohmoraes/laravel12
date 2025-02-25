<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Http;

Route::get('/user', function (Request $request) {
    $users = User::all();
    return $users;
}); //->middleware('auth:sanctum');

Route::get('/pokedex/{id}', function (Request $request) {
    $pokemon = $request->id;
    $resource = Http::get('https://pokeapi.co/api/v2/ability/'.$pokemon);
    $output = [$resource['id'], $resource['name']];
    return response()->json($output);
});
