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
        $department = $user->department_admin_model_id;
        //
        if ($department == 'super_admin') {
            # code...
            $updates = Update::query()
            ->orderByRaw('ISNULL(priority), priority ASC')
            ->get();
            // $listRequest = Department::withCount('updates')->get();
        } else {

            $updates = Update::where('department_id', '=', $department)->withCount('department')->get();
            // $listRequest = Department::where('department_id', '=', $department)->withCount('updates')->get();
        }
        $listRequest = Department::withCount('updates')->get();


      
            return view('admin.index', [
                'updates' => $updates,
                'department' => $department,
                'listRequests' => $listRequest,
                'pageName' => 'Update',
                'update'=> false,
                'edit' => false,
                'updateTotal' => $this->updateTotalNotApprove($department),
                'archiveTotal' => $this->archiveTotalNotApprove($department),
                'announcementTotal' => $this->announcementTotalNotApprove($department),
                'memberTotal' => $this->memberTotalNotApproved($department),
                'personnelTotal' => $this->personnelTotalNotApproved($department),
                'departmentFunctionalityTotal' => $this->departmentFunctionalityTotalNotApproved($department),
                'landingImageTotal' => $this->landingImageTotalNotApproved($department),
                'emergencyHotlineTotal' => $this->emergencyHotlineTotalNotApproved($department),
                'archiveDepartmentTotal' => $this->archiveDepartmentTotalNotApproved($department),
                'barangayOfficialModelTotal' => $this->barangayOfficialModelTotalNotApproved($department),
                'barangayModelTotal' => $this->barangayModelTotalNotApproved($department),
                'contactNumberOfficeTotal' => $this->contactNumberOfficeTotalNotApproved($department),
                'organizationalChartTotal' => $this->organizationalChartTotalNotApproved($department),
                'legislativeBranchCountSuperAdmin' => $this->legislativeBranchCountSuperAdmin(),
                'executiveBranchCountSuperAdmin' => $this->executiveBranchCountSuperAdmin(),
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
