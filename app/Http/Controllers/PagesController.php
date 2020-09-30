<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;

use App\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function spa(){
        return view('pages.spa');

    }

    /**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function home()
    {
        //llamamos un spoce en el model que se llama scopeNombre($query)
        //donde query es una funcion de laravel
        //para generar paginación
        $query= Post::published();

        if(request('month')){
          $query->whereMonth('published_at',request('month'));
        }
        if(request('year')){
            $query->whereYear('published_at',request('year'));
        }

        $posts = $query->orderByDesc('id')->paginate();
        if(request()->wantsJson())
        {
           return $posts;
        }

        return view('pages.home',compact('posts'));
    }



    public function about(){
        return view('pages.about');
    }

    public function archive(){

        $data =[
            'authors' => User::take(4)->get(),
            'categories' => Category::take(7)->get(),
            'posts' => Post::latest('published_at')->take(5)->get(),
            'archive' => Post::published()->byYearAndMonth()

        ];

        if(request()->wantsJson()){
            return $data;
        }

        return view('pages.archive', $data);

    }

    public function contact(){
        return view('pages.contact');

    }
}
