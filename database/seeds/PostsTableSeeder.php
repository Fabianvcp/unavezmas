<?php

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //limpiar storage de imagenes
        Storage::disk('public')->deleteDirectory('post');
        //limpie la tabla y no ingrese los mismo valor dos veces
        Post::truncate();
        Category::truncate();
        Tag::truncate();

        $category = new Category;
        $category->name = "Categoría 1";
        $category->save();

        $category = new Category;
        $category->name = "Categoría 2";
        $category->save();

        $post = new Post();
        $post->title = "Mi primer Post";
        $post->url = Str::slug("Mi primer Post");
        $post->excerpt = "extracto de mi primer post";
        $post->body = "<p>Quisque congue lacus mattis massa luctus, nec hendrerit purus aliquet. Ut ac elementum urna. Pellentesque suscipit metus et egestas congue. Duis eu pellentesque turpis, ut maximus metus. Sed ultrices tellus vitae rutrum congue. Fusce luctus augue id nisl suscipit, vel sollicitudin orci egestas. 
Morbi posuere venenatis ipsum, ac vestibulum quam dignissim efficitur. Ut vitae rutrum augue, in volutpat quam.   Cras a viverra ipsum. Aenean ut consequat ex, vitae vulputate nunc. Vestibulum metus nisi, aliquam sed tincidunt sit amet, pretium et augue.</p>";

        $post->published_at = Carbon::now()->subDay(4);    //decir que dia se creo con subDays
        $post->category_id =  1;
        $post->user_id =  1;

        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta #1']));


        $post = new Post();
        $post->title = "Mi segundo Post";
        $post->url =  Str::slug("Mi segundo Post");
        $post->excerpt = "extracto de mi segundo post";
        $post->body = "<p>Quisque congue lacus mattis massa luctus, nec hendrerit purus aliquet. Ut ac elementum urna. Pellentesque suscipit metus et egestas congue. Duis eu pellentesque turpis, ut maximus metus. Sed ultrices tellus vitae rutrum congue. Fusce luctus augue id nisl suscipit, vel sollicitudin orci egestas. 
Morbi posuere venenatis ipsum, ac vestibulum quam dignissim efficitur. Ut vitae rutrum augue, in volutpat quam.   Cras a viverra ipsum. Aenean ut consequat ex, vitae vulputate nunc. Vestibulum metus nisi, aliquam sed tincidunt sit amet, pretium et augue.</p>";
        $post->published_at = Carbon::now()->subDay(3);
        $post->category_id =  1;
        $post->user_id =  2;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta #2']));

        $post = new Post();
        $post->title = "Mi tercer Post";
        $post->url =  Str::slug("Mi tercer Post");
        $post->excerpt = "extracto de mi tercer post";
        $post->body = "<p>Quisque congue lacus mattis massa luctus, nec hendrerit purus aliquet. Ut ac elementum urna. Pellentesque suscipit metus et egestas congue. Duis eu pellentesque turpis, ut maximus metus. Sed ultrices tellus vitae rutrum congue. Fusce luctus augue id nisl suscipit, vel sollicitudin orci egestas. 
Morbi posuere venenatis ipsum, ac vestibulum quam dignissim efficitur. Ut vitae rutrum augue, in volutpat quam.   Cras a viverra ipsum. Aenean ut consequat ex, vitae vulputate nunc. Vestibulum metus nisi, aliquam sed tincidunt sit amet, pretium et augue.</p>";
        $post->published_at = Carbon::now()->subDay(2);
        $post->category_id =  2;
        $post->user_id =  1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta #3']));

        $post = new Post();
        $post->title = "Mi cuarto Post";
        $post->url =  Str::slug("Mi cuarto Post");
        $post->excerpt = "extracto de mi cuarto post";
        $post->body = "<p>Quisque congue lacus mattis massa luctus, nec hendrerit purus aliquet. Ut ac elementum urna. Pellentesque suscipit metus et egestas congue. Duis eu pellentesque turpis, ut maximus metus. Sed ultrices tellus vitae rutrum congue. Fusce luctus augue id nisl suscipit, vel sollicitudin orci egestas. 
Morbi posuere venenatis ipsum, ac vestibulum quam dignissim efficitur. Ut vitae rutrum augue, in volutpat quam.   Cras a viverra ipsum. Aenean ut consequat ex, vitae vulputate nunc. Vestibulum metus nisi, aliquam sed tincidunt sit amet, pretium et augue.</p>";
        $post->published_at = Carbon::now()->subDay(1);
        $post->category_id =  2;
        $post->user_id =  2;
        $post->save();


        $post->tags()->attach(Tag::create(['name' => 'Etiqueta #4']));

    }
}
