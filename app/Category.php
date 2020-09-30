<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected  $guarded = [];
    public function getRouteKeyName()
    {
        return 'url';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    //utilizar un accesor
    //cada ve que lo usamos 'get' seguido con el nombre del atributo  y al final la palabra attribute

//    public function  getNameAttribute($name)
//    {
//        return Str::slug($name);
//    }

    /**
     * un mutador se define muy similar al accesor solo que debes get es set.
     * debes de retornar un valor accedemos al atributo
     */
    public function  setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['url'] = Str::slug($name);
    }
}
