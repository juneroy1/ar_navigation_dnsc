<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlaceModel;
use Illuminate\Support\Facades\Auth;
class PlaceController extends Controller
{
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
        
        $places = PlaceModel::all();
      
            return view('admin.places', [
                'pageName' => 'places',
                'update'=> false,
                'edit' => false,

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

        $create = new PlaceModel;
        $create->name = $request->name;
        $create->user_id = $id;
        $create->save();
       
        return redirect()->back()->with('success', 'Successfully created new place');   

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
         $delete = PlaceModel::find($id);
        if ($delete) {
            $delete->delete();
        }
        return redirect()->back()->with('success', 'Place deleted successfully'); 
    }
}
