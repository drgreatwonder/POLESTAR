<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [ 'title', 'content', 'user_id', 'medium_id', 'slug'];

    public function medium() {

        return $this->belongsTo('App\Medium');
    }


    public function user() {

        return $this->belongsTo('App\User');
    }

    public function responses() {

        return $this->hasMany('App\Response');
    }
}
