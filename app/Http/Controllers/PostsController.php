<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function show(Post $post)
    {
        //$post = Post::find($id);

        if($post->isPublished()|| auth()->check())
        {
            $post->load('owner','category','tags','photos');


            return view('posts.show', compact('post'));

        }

        abort(404);
    }

}
