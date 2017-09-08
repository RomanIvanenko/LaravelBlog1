<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','alias','slug','body','video','user_id'];
//    protected $guarded = ['id'];
    public function getRouteKeyName() {
        return 'alias';
    }
}
