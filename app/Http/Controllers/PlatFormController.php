<?php

namespace App\Http\Controllers;

use Auth;

use App\Conversation;

use App\Medium;

use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;

class PlatFormController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $conversation = Conversation::orderBy('created_at', 'desc')->paginate(5);

        switch (request('filter')) {

            case 'me':

            $results = Conversation::where('user_id', Auth::id())->paginate(5);

            break;

            case 'solved':

                $answered = array();

                foreach(Conversation::all() as $c) {

                    if($c->hasBestAnswer()) {

                        array_push($answered, $c);
                    }
                }

                $results = new Paginator($answered, 3);
            break;

            case 'unsolved':

            $unanswered = array();

                foreach(Conversation::all() as $c) {

                    if(!$c->hasBestAnswer()) {

                        array_push($unanswered, $c);
                    }
                }

                $results = new Paginator($unanswered, 3);
            break;

            default:

                $results = Conversation::orderBy('created_at', 'desc')->paginate(5);
            break;
        }

        return view('platforms', ['conversation' => $results]);

    }

    public function medium($slug) {

        $medium = Medium::where('slug', $slug)->first();

        return view('medium')->with('conversations', $medium->conversations()->paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

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
}
