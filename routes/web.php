<?php

use App\Http\Controllers\Admin\PostsController;
use App\Post;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PagesController@home')->name('pages.home');
Route::get('about', 'PagesController@about')->name('pages.about');
Route::get('archive', 'PagesController@archive')->name('pages.archive');
Route::get('contact', 'PagesController@contact')->name('pages.contact');

Route::post('contact', 'EmailController@contact')->name('contacto');


Route::get('blog/{post}','PostsController@show')->name('posts.show');
Route::get('categorias/{category}','CategoriesController@show')->name('categories.show');
Route::get('tags/{tag}','TagsController@show')->name('tags.show');

//configuración para ruta de administración
Route::group([
    'prefix'=>'admin',
    'namespace'=> 'admin',
    'middleware' => 'auth'],
    function(){
        Route::get('/','AdminController@index')->name('dashboard');

        Route::resource('posts', 'PostsController', ['except' => 'show','as' => 'admin']);

        Route::resource('users', 'UsersController', ['as' => 'admin']);

        Route::resource('roles', 'RolesController', ['except' => 'show','as' => 'admin']);

        Route::resource('permissions', 'PermissionsController', ['except' => 'show','as' => 'admin']);
//actualizar roles
        Route::middleware('role:Admin')->put('users/{user}/roles', 'UsersRolesController@update')->name('admin.users.roles.update');
//actualizar permisos
        Route::middleware('role:Admin')->put('users/{user}/permissions', 'UsersPermissionsController@update')->name('admin.users.permissions.update');

        Route::post('posts/{post}/photos', 'PhotosController@store')->name('admin.posts.photos.store');
        Route::delete('photos/{photo}', 'PhotosController@destroy')->name('admin.photos.destroy');

    });

Auth::routes(['register' => false]);
