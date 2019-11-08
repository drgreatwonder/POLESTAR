<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{

    protected $fillable = [
        'content', 'user_id', 'conversation_id'];


    public function conversation() {

        return $this->belongsTo('App\Conversation');
    }


    public function user() {

        return $this->belongsTo('App\User');
    }
}
