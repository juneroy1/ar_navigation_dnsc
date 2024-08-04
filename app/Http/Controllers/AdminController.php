<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Announcement;
use App\LostAndFound;

class AdminController extends Controller
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
        $user = Auth::user();
        $id = Auth::id();
            return view('admin.index', [
                 'pageName' => 'Update',
                'update'=> false,
                'edit' => false,
                // 'idPage' => $department,
            ]);
            
        
    }
    function updateAnnouncement(Request $request, $id) {
        $edit = Announcement::find($id);
        if ($edit) {
            $edit->title = $request->title;
            $edit->description = $request->description;
            $edit->save();
            return redirect('/announcement')->with('success', 'Announcement update successfully'); ;

        }
    }
    public function editAnnouncement($id){
        $edit = Announcement::find($id);
       
        return view('admin.editAnnouncement', [
            'pageName' => 'Update',
            'update'=> false,
            'edit' => false,
            'announcement' => $edit
        ]);
    }
    public function deleteAnnouncement($id){
        $delete = Announcement::find($id);
        if ($delete) {
            $delete->delete();
        }
        return redirect()->back()->with('success', 'Announcement deleted successfully'); 
    }
    public function createAnnouncement(Request $request)
    {
        $user = Auth::user();
        $id = Auth::id();

        $create = new Announcement;
        $create->title = $request->title;
        $create->description = $request->description;
        $create->image = "";
        $create->user_id = $id;
        $create->save();
        $announcements = Announcement::all();
        // return view('admin.announcement', [
        //     'pageName' => 'Update',
        //     'update'=> false,
        //     'edit' => false,

        //     'announcements' => $announcements
        // ]);
        return redirect()->back()->with('success', 'Successfully created new announcement');   

        
    }

    public function lost_and_found()
    {
        $user = Auth::user();
        $id = Auth::id();
        

        $lost_and_found_list = LostAndFound::all();
        
            return view('admin.lost_and_found', [
                'pageName' => 'Update',
                'update'=> false,
                'edit' => false,
                'lost_and_found_list' => $lost_and_found_list
                // 'idPage' => $department,
            ]);
            
        
    }

    public function announcement()
    {
        $user = Auth::user();
        $id = Auth::id();
        
        $announcements = Announcement::all();
      
            return view('admin.announcement', [
                'pageName' => 'Update',
                'update'=> false,
                'edit' => false,

                'announcements' => $announcements
            ]);
            
        
    }

    public function getData()
    {
        // Simulate data fetching, you would normally fetch this from a database or another source
        $data = [
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'john.doe@example.com'
        ];

        // Return JSON response
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => 'Data fetched successfully'
        ], 200);
    }

}
