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
