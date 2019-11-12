<?php

namespace App\Http\Controllers;

use Auth;

use Session;

use App\Like;

use App\Response;

use Illuminate\Http\Request;

class ResponseController extends Controller
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
    public function create()
    {
        $r = request();
        $this->validate($r, [

            'content' => 'required',
            'user_id' =>'required',
            'conversation_id' => 'required'
        ]);

        $conversation = Response::create([

            'content' => $r->content,
            'user_id' => $r->user_id,
            'conversation_id' => $r->conversation_id,

        ]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $medium = Medium::create($this->validateRequest());
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
        return view('responses.edit', ['response' => Response::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $this->validate(request(), [

            'content' => 'required'
        ]);

        $response = Response::find($id);

        $response->content = request()->content;

        $response->save();

        Session::flash('success', 'Response Updated.');

        return redirect()->route('conversation', ['slug' => $response->conversation->slug]);
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

    // private function validateRequest() {

    //     return request()->validate([

    //         'content' => 'required',
    //         'user_id' => 'required',
    //         'conversation_id' => 'required'

    //     ]);
    // }
}


