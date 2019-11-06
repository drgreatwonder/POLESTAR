<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medium extends Model
{
    protected $guarded = [];

    public function conversations() {

        return $this->hasMany('App\Conversation');

    }
}
