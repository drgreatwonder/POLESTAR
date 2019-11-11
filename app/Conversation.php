<?php

namespace App;

use Auth;

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

    public function watchers() {

        return $this->hasMany('App\Watcher');
    }

    public function is_being_watched_by_auth_user() {

        $id = Auth::id();

        $watchers_ids = array();

        foreach($this->watchers as $w):

            array_push($watchers_ids, $w->user_id);

        endforeach;

        if(in_array($id, $watchers_ids)) {

            return true;
        }

        else {

            return false;
        }
    }

    public function hasBestAnswer() {

        $result = false;

        foreach($this->responses as $response) {

            if($response->best_answer) {

                $result = true;

                break;
            }
        }

        return $result;
    }
}
