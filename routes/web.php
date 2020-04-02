<?php

/* Modelo não simplifacado que não usa as melhores práticas do laravel

Route::delete('products/{id}', 'ProductController@destroy')->name('products.destroy');

Route::put('products/{id}', 'ProductController@update')->name('products.update');

Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');

Route::get('products/create', 'ProductController@create')->name('products.create');

Route::get('products/{id}', 'ProductController@show')->name('products.show');

Route::get('products', 'ProductController@index')->name('products.index');

Route::post('products', 'ProductController@store')->name('products.store');
*/

Route::get('/login', function () {
    return 'Login';
})->name('login');

/* Exemplo 1 de Grupos, middlaware, prefixos, namespace e apelidos para rotas de forma mais complexa e menos re-utilizavél
Route::middleware([])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::namespace('Admin')->group(function () {
           
            Route::as('admin.')->group(function (){
                Route::get('/dashboard', 'TesteController@teste1')->name('dashboard');

                Route::get('/financeiro', 'TesteController@teste2')->name('financeiro');

                Route::get('/produtos', 'TesteController@teste')->name('produtos');

                Route::get('/', function() {
                    return redirect()->route('admin.dashboard');
                })->name('home');            
           });
        });  
    });            
});
*/

/* Exemplo 2 de Grupos, middlaware, prefixos, namespace e apelidos para rotas de forma mais simplelicada
Route::group([
    'middleware' => [],
    'prefix'     => 'admin',
    'namespace'  => 'Admin',
    'as'         => 'admin.'
], function(){
    Route::get('/dashboard', 'TesteController@teste1')->name('dashboard');
    
    Route::get('/financeiro', 'TesteController@teste1')->name('financeiro');
    
    Route::get('/produtos', 'TesteController@teste1')->name('produtos');
    
    Route::get('/', function() {
        return redirect()->route('admin.dashboard');
    })->name('home');   
});
*/

Route::get('redirect3', function() {
    return redirect()->route('url.name');
});

Route::get('/nome-url', function() {
    return 'Hello Word';
})->name('url.name');

Route::view('/view', '/welcome');

Route::redirect('/redirect1', '/redirect2');

Route::get('redirect2', function() {
    return 'Redirect 02';
});

Route::get('produtos/{idProduct?}', function($idProduct = null) {
    return "Produtos(s) {$idProduct}";
});

Route::get('/categoria/{flag}/posts', function ($flag) {
    return "Posts da categoria: {$flag}";
});

Route::get('/categorias/{flag}', function($flag) {
    return "Produtos da categoria: {$flag}";
});

Route::match(['post'], 'match', function () {
    return 'match';
});

Route::any('/any', function () {
    return 'Any';
});

Route::get('/contato', function () {
    return view('site.contact');
});

Route::get('/', function () {
    return view('welcome');
});
