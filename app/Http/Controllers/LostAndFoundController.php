<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\LostAndFound;

class LostAndFoundController extends Controller
{
    //
    function updateLostAndFound(Request $request, $id) {
        $edit = LostAndFound::find($id);
        if ($edit) {
            $edit->title = $request->title;
            $edit->description = $request->description;
            $edit->save();
            return redirect('/lost-and-found')->with('success', 'Lost and Found update successfully'); ;

        }
    }
    public function editLostAndFound($id){
        $edit = LostAndFound::find($id);
       
        return view('admin.editLostAndFound', [
            'pageName' => 'Update',
            'update'=> false,
            'edit' => false,
            'lost_and_found' => $edit
        ]);
    }
    function deleteLostAndFound($id) {
        $delete = LostAndFound::find($id);
        if ($delete) {
            $delete->delete();
        }
        return redirect()->back()->with('success', 'Lost and Found deleted successfully'); 
    }
    public function createLostAndFound(Request $request)
    {
        $user = Auth::user();
        $id = Auth::id();

        $create = new LostAndFound();
        $create->title = $request->title;
        $create->description = $request->description;
        $create->image = "";
        $create->user_id = $id;
        $create->save();
        return redirect()->back()->with('success', 'Successfully created new lost and found');   

        
    }
}