<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/users', function (Request $request) {
    $users = User::all();
    return $users;
}); //->middleware('auth:sanctum');

Route::get('/users/{id}', function (Request $request, $id) {
    $users = User::find($id);
    return $users;
}); //->middleware('auth:sanctum');
