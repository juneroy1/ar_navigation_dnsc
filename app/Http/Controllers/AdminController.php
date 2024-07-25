<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Update;
use App\Department;
use App\Announcement;
use App\Member;
use App\Archive;
use App\Councilors;
use App\DepartmentAdminModel;
use App\OfficialsAdmin;
use App\DepartmentFunctionality;
use App\LandingImage;
use App\EmergencyHotline;
use App\ArchiveDepartment;
use App\BarangayOfficialModel;
use App\BarangayModel;
use App\ContactNumberOffice;
use App\OrganizationalChart;
use Intervention\Image\ImageManagerStatic as Image;
use App\AgendaModel;
use App\Personnel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        
      
            return view('admin.announcement', [
                'pageName' => 'Update',
                'update'=> false,
                'edit' => false,
            ]);
            
        
    }

}
