<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('welcome')->get('/', function () {
    return view('welcome');
});

Route::name('createCustomer')->get('/customers/create','CustomerController@create');
Route::name('storeCustomer')->post('/customers','CustomerController@store');

Route::name('indexProducto')->get('/productos','ProductController@index');
Route::name('createUser')->get('/user/create','UserController@create');


Route::group(['middleware' => 'auth'],function(){ 

	Route::name('ordenes')->get('/ordenes','OrderProductController@getOrdenesPendiente');
	
});

/* Rutas para admin*/
Route::group(['middleware' => 'authAdmin'],function(){
	/*Modulo de clientes*/
	Route::name('indexCustomer')->get('/customers','CustomerController@index');
	Route::name('showCustomer')->get('/customers/{customer}','CustomerController@show');
	Route::name('estadisticasUsuarios')->get('/customers/estadisticas','CustomerController@estadisticasUsuarios');
	
	/*Modulo de usuarios*/
	Route::name('indexUser')->get('/user','UserController@index');
	Route::name('storeUser')->post('/user','UserController@store');
	Route::name('updateUser')->put('/user/{user}','UserController@update');
	Route::name('showUser')->get('/user/{user}','UserController@show');
	Route::name('editUser')->get('/user/{user}/edit','UserController@edit');
	Route::name('deleteUser')->delete('/user/{user}','UserController@delete');

	/*ulrs de peticiones de perfil*/
	Route::name('indexRequest')->get('/request','RequestController@index');
	Route::name('updateRequest')->put('/request/{request}','RequestController@update');
	Route::name('editRequest')->get('/request/{request}/edit','RequestController@edit');

	/*Modulo de productos*/
	Route::name('createProducto')->get('/productos/create','ProductController@create');
	Route::name('storeProducto')->post('/productos','ProductController@store');
	Route::name('updateProducto')->put('/productos/{producto}','ProductController@update');
	Route::name('showProducto')->get('/productos/{producto}','ProductController@show');
	Route::name('editProducto')->get('/productos/{producto}/edit','ProductController@edit');
	Route::name('deleteProducto')->delete('/productos/{producto}','ProductController@delete');
});

/* Rutas para Mesero*/
Route::group(['middleware' => 'authMesero'],function(){
	Route::name('addProducto')->get('/addProducto/{id}','OrderProductController@addProducto');
	
	Route::name('storeOrder')->post('/pedidos','OrderProductController@store'	);
	Route::name('createOrder')->get('/pedidos/create','OrderController@create');
	Route::name('resumenOrder')->get('/pedidos/resumen','OrderProductController@getOrder');
	Route::name('confirmOrder')->get('/pedidos/confirm','OrderProductController@getConfirm');
	Route::name('entregarOrden')->get('/pedidos/{idOrden}/entregada','OrderProductController@ordenEntregada');
});

/* Rutas para cocinero*/
Route::group(['middleware' => 'authCocinero'],function(){
	
	Route::name('atenderOrden')->get('/ordenes/{idOrden}/preparando','OrderProductController@atenderOrden');
	Route::name('ordenLista')->get('/ordenes/{idOrden}/lista','OrderProductController@ordenLista');
	
});


Route::get('/hola/{nombre}','ejemploControlador@holaMundo');
Route::name('home')->get('/home','HomeController@index');


Route::get('/registro','CustomerController@llenarTabla');


Auth::routes();

