<?php

namespace App\Http\Controllers;

use Session;

use App\Watcher;

use Auth;

use App\Watch;

use Illuminate\Http\Request;

class WatchersController extends Controller
{

    public function watch($id) {

        Watcher::create([

            'conversation_id' => $id,
            'user_id' => Auth::id()
        ]);

        Session::flash('success', 'You are watching this conversation.');

        return redirect()->back();
    }

    public function unwatch($id) {

        $watcher = Watcher::where('conversation_id', $id)->where('user_id', Auth::id());

        $watcher->delete();

        Session::flash('success', 'You are no longer watching this conversation.');

        return redirect()->back();
    }
}
