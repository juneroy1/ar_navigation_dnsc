<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DestinationCoordinatesModel;
use App\DestinationModel;
use App\PlaceModel;
use Illuminate\Support\Facades\Auth;
class DestinationCoordinatesController extends Controller
{
    public function __construct()
    {
        $this->middleware('api');
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
        
        $destination_coordinates = DestinationCoordinatesModel::all();
        $destinations = DestinationModel::all();
      
        return view('admin.coordinates', [
            'pageName' => 'places',
            'update'=> false,
            'edit' => false,

            'destination_coordinates' => $destination_coordinates,
            'destinations' => $destinations,
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
        $waypoints = $request->input('waypoints');
        $destination_id = $request->input('destination_id');
        try {
            foreach ($waypoints as $waypoint) {
                // Assuming you have a Waypoint model to save the data
                DestinationCoordinatesModel::create([
                    'x' => $waypoint['x'],
                    'y' => $waypoint['y'],
                    'z' => $waypoint['z'],
                    'destination_id' => $destination_id
                ]);
            }

            return response()->json(['message' => 'Waypoints saved successfully'], 200);
        }catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    
    }

    public function getWaypoints($id){
         // Fetch all waypoints from the database
        $waypoints = DestinationCoordinatesModel::where('destination_id', $id)->get();

        return response()->json([
            'waypoints' => $waypoints
        ]);
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
