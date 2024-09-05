<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DestinationModel;
use App\PlaceModel;
use Illuminate\Support\Facades\Auth;

class DestinationController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        $id = Auth::id();
        
        $destinations = DestinationModel::all();
        $places = PlaceModel::all();
      
        return view('admin.destinations', [
            'pageName' => 'places',
            'update'=> false,
            'edit' => false,

            'destinations' => $destinations,
            'places' => $places
        ]);
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
        $user = Auth::user();
        $id = Auth::id();

        $create = new DestinationModel;
        $create->place_id_from = $request->place_id_from;
        $create->place_id_to = $request->place_id_to;
        $create->user_id = $id;
        $create->save();
       
        return redirect()->back()->with('success', 'Successfully created new destination');   

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
        $destination = DestinationModel::find($id);

        if ($destination) {
            # do delete here
            $destination->delete()
        }
        //
    }
}
