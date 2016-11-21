<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PostsController@index');

Route::get('loginx', ['as'=>'']);

/*
Route::post('authx', function(){

    if(Auth::attempt(['email'=>'vicotex@gmail.com', 'password'=>123456])) {

         return view('home');

    // return "Falhou";
}});
*/
/*Route::controllers([

    'Auth' => 'App\Http\Controllers\Auth\LoginController'

]);
*/
Route::post('adminx', ['as'=>'admin.posts.index', 'uses'=>'Auth\LoginController@login']);

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function (){
    Route::get('', ['as'=>'admin.posts.index','uses' => 'PostsAdminController@index']);

    Route::get('create', ['as'=>'admin.posts.create', 'uses' => 'PostsAdminController@create']);

    Route::post('store', ['as'=>'admin.posts.store', 'uses' => 'PostsAdminController@store']);

    Route::get('edit/{id}', ['as'=>'admin.posts.edit', 'uses' => 'PostsAdminController@edit']);

    Route::put('update/{id}', ['as'=>'admin.posts.update', 'uses' => 'PostsAdminController@update']);

    Route::get('destroy/{id}', ['as'=>'admin.posts.destroy', 'uses' => 'PostsAdminController@destroy']);
});

Auth::routes();



//Route::get('/home', 'HomeController@index');

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('ola/{nome}', 'testecontroller@index');
//Route::get('notas', 'testecontroller@notas');
//Route::get('blog', 'PostsController@index');

/* Route::get('/auth', function(){

    if(Auth::attempt(['email'=>'vicotex@gmail.com', 'password'=>123456])) {

        ->Este bloco de código não está na if
        $user = \App\User::find(1);
        Auth::login($user);

        if(Auth::check()){
        return "Ok";
        }
        -> Termina o bloco aqui


        return "Logado";
    };

    return "Falhou";
});
*/

//Route::get('tutu', ['as'=> 'auth.login', 'uses'=>  'LoginController@getLogin']);
//Route::post('painel', ['as'=> 'auth.login', 'uses'=>  'LoginController@postLogin']);

/* Route::get('auth/logout', function(){
  Auth::logout();
});
*/