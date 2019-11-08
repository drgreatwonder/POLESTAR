<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    protected $fillable = ['response_id', 'user_id'];

    public function response() {

        return $this->belongsTo('App\Response');
    }

    public function user() {

        return $this->belongsTo('App\User');
    }
}
