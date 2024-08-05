<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Announcement;
use App\LostAndFound;
use Illuminate\Support\Facades\Storage;

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

    public function announcements()
    {
        // Simulate data fetching, you would normally fetch this from a database or another source
        $announcements = Announcement::orderBy('created_at', 'DESC')->get();

        // Return JSON response
        return response()->json([
            'success' => true,
            'data' => $announcements,
            'message' => 'Data fetched successfully'
        ], 200);
    }

     public function lost_and_found_list()
    {
        // Simulate data fetching, you would normally fetch this from a database or another source
        $lostAndFound = LostAndFound::orderBy('created_at', 'DESC')->get();

        // Return JSON response
        return response()->json([
            'success' => true,
            'data' => $lostAndFound,
            'message' => 'Data fetched successfully'
        ], 200);
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
    public function upload_laf(Request $request) {
        $description = $request->input('description');
         $name = $request->input('name');
         $avatar = $request->input('avatar');
        if($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $filename, 'public');

            // create new announcement

            $lost_and_found = new LostAndFound;
            $lost_and_found->title = $description;
            $lost_and_found->description = $description;
            $lost_and_found->name = $name;
            $lost_and_found->avatar = $avatar;
            $lost_and_found->image = Storage::url($path);
            

            if ($lost_and_found->save()) {
                return response()->json(['url' => Storage::url($path), 'description'=> $description, 'name' =>  $name, 'avatar' => $avatar], 200);
            }

            return response()->json(['url' => Storage::url($path), 'description'=> $description, 'name' =>  $name, 'avatar' => $avatar], 500);


            
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }
   public function upload_announcement(Request $request)
    {
         $description = $request->input('description');
         $name = $request->input('name');
         $avatar = $request->input('avatar');
        if($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $filename, 'public');

            // create new announcement

            $announcement = new Announcement;
            $announcement->title = $description;
            $announcement->description = $description;
            $announcement->name = $name;
            $announcement->avatar = $avatar;
            $announcement->image = Storage::url($path);
            

            if ($announcement->save()) {
                return response()->json(['url' => Storage::url($path), 'description'=> $description, 'name' =>  $name, 'avatar' => $avatar], 200);
            }

            return response()->json(['url' => Storage::url($path), 'description'=> $description, 'name' =>  $name, 'avatar' => $avatar], 500);


            
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }

}
