<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ConfirmPasswordController;


Route::get('/', [CategoryController::class, 'showHomeWithCategories']);
// Route::get('/', [ProductController::class, 'showHomeWithProducts']);
// Route::get('/ProductsTechnology', [ProductController::class, 'productsTechnology'])->name('allproducts');
// Route::get('/productsHomeAppliances', [ProductController::class, 'ProductsHomeAppliances'])->name('homeAppliances');
// Route::get('/productsVehicle', [ProductController::class, 'ProductsVehicle'])->name('vehicle');
Route::get('/GetProduct/{product}', [ProductController::class, 'getProduct'])->name('getProduct');


// Users------------------------------------------------------------
Route::group(['prefix' => 'Users', 'middleware' =>['auth', 'role:admin|user'],'controller' => UserController::class], function()
{
    Route::get('/', 'showAllUsers')->name('users');
    Route::get('/CreateUser', 'showCreateUser')->name('user.create');
    Route::get('/EditUser/{user}', 'showEditUser')->name('user.edit');
    Route::post('/CreateUser', 'createUser')->name('user.create.post');
    Route::put('/EditUser/{user}', 'updateUser')->name('user.edit.put');
    Route::delete('/DeleteUser/{user}', 'deleteUser')->name('user.delete');
});

	// PRODUCTS-------------------------------------------------------
	Route::group(['prefix' => 'Products', 'middleware' =>['auth', 'role:admin|user'], 'controller' => ProductController::class], function()
	{
		Route::get('/', 'showProducts')->name('products');
		Route::get('/GetAllProducts', 'getAllProducts');
		Route::get('/GetAllProductsDataTable', 'getAllProductsForDataTable');
		Route::post('/SaveProduct', 'saveProduct');
		Route::get('/GetAProduct/{product}', 'getAProduct');
		Route::post('/UpdateProduct/{product}', 'updateProduct');
		Route::delete('/DeleteProduct/{product}', 'deleteProduct');
	});

	// Carrito de compras-------------------------------------------------------
	Route::group(['prefix' => 'carrito', 'middleware' =>['auth'], 'controller' => CarritoController::class], function()
	{
	    Route::get('/', 'showCarrito')->name('carrito');
		// Route::get('/', 'getUser');
    });


//Categories
Route::group(['prefix' => 'Categories','controller' => CategoryController::class], function()
{
		Route::get('/', 'showCategories')->name('categories');

		Route::get('/GetAllCategories', 'getAllCategories');

		Route::get('/GetACategory/{category}', 'getACategory');

		Route::post('/SaveCategory', 'saveCategory');

		Route::post('/UpdateCategory/{category}', 'updateCategory');

		Route::delete('/DeleteACategory/{category}', 'deleteCategory');

		Route::get('/GetAllCategoriesDataTable', 'getAllCategoriesForDataTable');
});

// Products View
// */
Route::group(['prefix' => 'ProductsView', 'middleware' => ['auth'], 'controller' => ProductController::class], function () {
	Route::get('/', 'homeView')->name('productsview.index');

	Route::get('/GetAProduct/{product}', 'getAProduct')->name('productsview.index');
	// Route::get('/GetAProduct/{product}', 'getAProduct');

	Route::post('/AddToCart', 'addToCart');
});


/*
	Categories View
*/
Route::group(['prefix' => 'CategoriesView', 'controller' => CategoryController::class], function () {
	Route::get('/', 'categoriesView')->name('categoriesview.index');

	Route::get('/GetAllCategoriesWithProducts', 'getAllCategoriesWithProducts');

	Route::get('/GetACategoryWithProduct/{category}', 'getACategoryWithProduct')->name('categoriesview.index');
});

//Registrer route
Route::group(['controller' => RegisterController::class], function () {
	Route::get('register', 'showRegistrationForm')->name('register');
	Route::post('register', 'register');
});

//Auth----------------------------------------------
Route::group(['controller' => LoginController::class], function()
{
    // Login Routes...
        Route::get('login', 'showLoginForm')->name('login');

        Route::post('login', 'login');

    // Logout Routes...
        Route::post('logout', 'logout')->name('logout');
});


Route::group(['controller' =>  ForgotPasswordController::class], function()
{
    // Password Reset Routes...
        Route::get('password/reset', 'showLinkRequestForm')
        ->name('password.request');

        Route::post('password/email', 'sendResetLinkEmail')
        ->name('password.email');
});

Route::group(['controller' => ResetPasswordController::class ], function()
{
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')
    ->name('password.reset');

    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
});

Route::group(['controller' => ConfirmPasswordController::class ], function()
{
    // Password Confirmation Routes...
        Route::get('password/confirm', 'showConfirmForm')->name('password.confirm');

        Route::post('password/confirm', 'confirm');
	});

	Route::group(['controller' => VerificationController::class ], function()
{
    // Email Verification Routes...
        Route::get('email/verify', 'show')->name('verification.notice');

        Route::get('email/verify/{id}/{hash}', 'verify')->name('verification.verify');

        Route::post('email/resend', 'resend')->name('verification.resend');
});

// Route::get('/test', function(){
	//     // return Role::all()->pluck('name');
	//     $users = User::get();
	//     foreach ($users as $user){
		//         if($user->id == 1){
//           $user->assignRole('admin');
//         }else{
//             $user->assignRole('user');
//         }
//     }
//     // Role::create(['name' => 'admin']);
// });
