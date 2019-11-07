<?php

namespace App\Http\Controllers;

use Session;

use App\Medium;

use Illuminate\Http\Request;

class MediumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medium = Medium::all();
        return view('medium.index', compact('medium'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
   {
           return view('medium.create');
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $medium = Medium::create($this->validateRequestMed());

        // Medium::create([

        //     'title' => $request->medium
        // ]);

        $this->validate($request, [

            'medium' => 'required'
        ]);

        Medium::create([

            'title' => $request->medium
        ]);

        Session::flash('success', 'PlatForm created.');

        return redirect()->route('medium.index');

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
        $medium = Medium::find($id);
        return view('medium.edit',compact('medium') );
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
        $medium = Medium::find($id);
        $medium->title = $request->medium;
        $medium->save();

        Session::flash('success', 'Platform edited successfully');
        return redirect()->route('medium.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Medium::destroy($id);

        Session::flash('success', 'Platform deleted successfully');

        return redirect()->route('medium.index');
    }

    //  private function validateRequest() {

    //      return request()->validate([

    //          'medium' => 'required'

    //      ]);
    //  }
}
