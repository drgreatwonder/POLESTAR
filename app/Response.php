<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{

    protected $guarded = [];

    public function conversation() {

        return $this->belongsTo(App\Conversation);
    }

}
