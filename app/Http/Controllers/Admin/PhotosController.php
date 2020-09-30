<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Photo;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Psy\Util\Str;

class PhotosController extends Controller
{
   public function store(Post $post)
   {
       $this->validate(request(),[
           'photo' => 'required|image|max:5000' // 'image' 'mimes:jpeg,png' multiples files de imagen
       ]);
        //$photo = request()->file('photo');
        //$photo = request()->file('photo')->store('posts','public');
       //$photoUrl = Storage::url($photo);

        $post->photos()->create([
                'url' => request()->file('photo')->store('posts','public')
            ]);


    }
    /*
            * Remove the specified resource from storage.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
    public function destroy(Photo $photo){

        $photo->delete();

        return  back()->with('flash', 'Foto eliminada');
    }
}
