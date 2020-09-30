<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\StorePostRequest;
use App\Tag;
use App\Http\Controllers\Controller;
use App\Post;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class PostsController extends Controller
{

    public function index()
    {

        $posts = Post::allowed()->get();
        return view('admin.posts.index', compact('posts'));

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //por aca pasamos el listados de categorias al formulario de post
        $categories = Category::all();

        //mandar el lstado de etiquetas
        $tags = Tag::all();

        return view('admin.posts.create',compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     * @throws AuthorizationException
     * */
    public function store(Request $request){
        /**
         * 'campo'=>'unique:tabla'
         */
        $this->authorize('create', new Post);
        $this->validate( $request, [
            'title' => 'required|min:3'
        ]);
        //$post = Post::create($request->only('title'));
        $post = Post::create(request()->all());
        return redirect()->route('admin.posts.edit', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
 *
* public function store(Request $request)
    * {
        * //return  $request->all();
        * //validación
 *
* $this->validate( $request, [
            * 'title' => 'required',
            * 'body' => 'required',
            * 'excerpt' => 'required',
            * 'published_at' => 'required',
            * 'category' => 'required',
            * 'tags' => 'required'
        * ]);
 *
* //almacena la publicación
        * $post = new Post;
        * $post->title = $request->get('title');
        * $post->url = Str::slug( $request->get('title'));
        * $post->body = $request->get('body');
        * $post->excerpt = $request->get('excerpt');
        * $post->published_at = Carbon::parse($request->get('published_at'));
        * $post->category_id = $request->get('category');
 *
* $post->save();
 *
* //etiquetas
        * $post->tags()->attach($request->get('tags'));
        * return back()->with('flash', ' Tu publicación ha si creada');
    * }
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Response
     * @throws AuthorizationException
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('admin.posts.edit',[
            'categories' =>Category::all(),
            'tags' => Tag::all(),
            'post' => $post
        ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param Post $post
     * @param StorePostRequest $request
     * @return Response
     * @throws AuthorizationException
     */
    public function update(Post $post,StorePostRequest $request)
    {

        $this->authorize('update', $post);
        //return  $request->all();
        //validación


        //almacena la publicación
//        $post->title = $request->get('title');
//        $post->body = $request->get('body');
//        $post->iframe = $request->get('iframe');
//        $post->excerpt = $request->get('excerpt');
//        $post->published_at = $request->get('published_at');
//        $post->category_id =$request->get('category_id');
//        $post->save();
        $post->update($request->all());


        //etiquetas
        $post->syncTags($request->get('tags'));


        return redirect()->route('admin.posts.edit', compact('post'))->with('flash', ' Tu publicación ha sido Guardada');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return void
     * @throws Exception
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('flash', ' Tu publicación ha sido eliminida');

    }
}
