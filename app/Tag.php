<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    protected  $guarded = [];
    public function getRouteKeyName()
    {
        return 'url';
    }
    public function posts()
    {
        //una categoria tiene varios post y un post puede tener varias categorias
        return $this->belongsToMany(Post::class);
    }
    public function  setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['url'] = Str::slug($name);
    }

}
