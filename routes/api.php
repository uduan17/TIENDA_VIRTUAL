<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



Route::group(['prefix' => 'Users', 'controller' => UserController::class], function() {
	Route::get('/GetAllUsers', 'getAllUsers');
	Route::get('/GetAnUser/{user}', 'getAnUser');
	Route::post('/CreateUser', 'createUser');
	Route::put('/UpdateUser/{user}', 'updateUser');
	Route::delete('/DeleteUser/{user}', 'deleteUser');
 });


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
