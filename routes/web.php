<?php

Route::get('/', function(){
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|




});
Route::get('/contato', function(){
    return view('contact');
})->name('contact'); // Utilizando nome da URL e redirecionando na rota /teste com o nome da rota
Route::any('/any', function(){
    return 'Any';
}); // Todos os métodos liberados para acessar;
Route::match(['get', 'post'], '/match', function(){
    return 'match';
}); // Rota Match - Escolher o método html;
Route::get('/produto/{flag?}', function($flag = '') {
    // if ($flag = null) {
    //     return "<h1>Conheça Todos os Nossos Produtos</h1>";
    // }
    // else {
        return "Visualizando Produto {$flag}";
    // };
});
Route::get('/produto/{flag}/sobre', function($produc){
    return "Produto {$produc}, Informações: ";
});
Route::get('/teste', function(){
    return redirect()->route('contact');
});

Route::get('/admin', function(){
    return 'HOME ADMIN';
})->middleware('auth');
Route::get('/login', function(){
    return 'HOME LOGIN';
})->name('login');
*/
/*
Route::get('products', 'ProductController@index')->name('products.index');
Route::get('products/create', 'ProductController@create')->name('products.create');
Route::delete('products/{id}', 'ProductController@destroy')->name('products.destroy');
Route::get('products/{id}', 'ProductController@show')->name('products.show');
Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');
Route::post('products', 'ProductController@store')->name('products.store');
Route::put('products/{id}/', 'ProductController@update')->name('products.update');
*/
Route::any('products/search', 'ProductController@search')->name('products.search');
Route::resource('products', 'ProductController')->middleware(['auth', 'check.is.admin']);//->middleware('auth'); // Apenas essa linha substitui as rotas acima
// Route::get('/login', function() {
//     return 'Login';
// })->name('login');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
