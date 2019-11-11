<?php

namespace App\Http\Controllers;

use App\Response;

use App\Like;

use Auth;

use Session;

use Illuminate\Http\Request;

class ResponsesController extends Controller
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

    public function like($id) {

        Like::create([

            'reply_id' => $id,
            'user_id' => Auth::id(),
            'response_id' => $id
        ]);

        Session::flash('success', 'You liked the reply');

        return redirect()->back();

    }

    public function unlike($id) {

        $like = Like::where('response_id', $id)->where('user_id', Auth::id())->first();

        $like->delete();

        Session::flash('success', 'You unliked this response');

        return redirect()->back();
    }

    public function best_answer($id) {

        $response = Response::find($id);

        $response->best_answer = 1;

        $response->save();

        $response->user->points += 100;

        $response->user->save();

        Session::flash('success', 'Response has been marked as best answer');

        return redirect()->back();
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
