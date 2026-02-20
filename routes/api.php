<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/users', function (Request $request) {
    $users = User::all();

    return $users;
}); // ->middleware('auth:sanctum');

Route::get('/users/{id}', function (Request $request, $id) {
    $user = User::find($id);

    return $user;
}); // ->middleware('auth:sanctum');
