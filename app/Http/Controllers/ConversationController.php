<?php

namespace App\Http\Controllers;

use Auth;

use Session;

use App\User;

use App\Response;

// use App\Notification;
// use App\Http\Controllers\Notification;

use App\Conversation;

use App\Medium;

use App\Notifications\NewResponseAdded;

use Illuminate\Http\Request;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

   public function create() {

       $medium = Medium::all();

       return view('converse', compact('medium'));
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $r = request();
        $this->validate($r, [

            'medium_id' => 'required',
            'content' =>'required',
            'title' => 'required'
        ]);

        $conversation = Conversation::create([

            'title' => $r->title,
            'content' => $r->content,
            'medium_id' => $r->medium_id,
            'user_id' => Auth::id(),
            'avatar' => $r->avatar,
            'slug' => str_slug($r->title)

        ]);

        // $medium = Medium::create($this->validateRequestMed());

        // $conversation = Conversation::create($this->validateRequestCon());

        Session::flash('success', 'Conversation created successfully.');

        return redirect()->route('conversation', ['slug' => $conversation->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $conversation = Conversation::where('slug', $slug)->first();

        $best_answer = $conversation->responses()->where('best_answer', 1)->first();

        return view('conversations.show')->with('c', $conversation)->with('best_answer', $best_answer);

    }
    // Conversation::where('slug', $slug)->first());

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function response($id) {

        $c = Conversation::find($id);

        $response = Response::create([

            'user_id' => Auth::id(),
            'conversation_id' => $id,
            'content' => request()->response
        ]);

        $response->user->points += 25;
        $response->user->save();

        $watchers = array();

        foreach($c->watchers as $watcher):

            array_push($watchers, User::find($watcher->user_id));
        endforeach;

        // Notification::send($watchers, new NewResponseAdded($watcher->user_id));

        // Notification::send($watchers, new \App\Notifications\NewResponseAdded($c));

        // $watchers->notify(new  NewResponseAdded($watcher));

        Session::flash('success', 'Responded to the Conversation');

        return redirect()->back();
    }

    // private function validateRequestMed() {

    //     return request()->validate([

    //         'title' => 'required',
    //         'content' => 'required',
    //         'user_id' => 'required',
    //         'medium_id' => 'required'
    //     ]);
    // }

    // private function validateRequestCon() {

    //     return request()->validate([

    //         'title' => 'required',
    //        'content' => 'required',
    //        'medium_id' => 'required',
    //        'user_id' => Auth::id(),
    //        'slug' => str_slug(title)
    //     ]);
    // }
}
