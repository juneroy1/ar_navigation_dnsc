<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Announcement;


class AdminController extends Controller
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
        $user = Auth::user();
        $id = Auth::id();
            return view('admin.index', [
                 'pageName' => 'Update',
                'update'=> false,
                'edit' => false,
                // 'idPage' => $department,
            ]);
            
        
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
        return view('admin.announcement', [
            'pageName' => 'Update',
            'update'=> false,
            'edit' => false,

            'announcements' => $announcements
        ]);
        
    }

    public function lost_and_found()
    {
        $user = Auth::user();
        $id = Auth::id();
        

      
            return view('admin.lost_and_found', [
                'pageName' => 'Update',
                'update'=> false,
                'edit' => false,
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

}
