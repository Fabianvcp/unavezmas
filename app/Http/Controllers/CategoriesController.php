<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        //return $category->load('posts');
        $posts=$category->posts()->published()->paginate();
        //$posts = $category->posts()->paginate();
        if(request()->wantsJson()){
            return $posts;
        }
        return view('pages.home', [
            'title' =>"Publicaciones de la categoría {$category->name}",
            'posts' => $posts
        ]);
    }
}
