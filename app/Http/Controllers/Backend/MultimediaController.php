<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Multimedia;

class MultimediaController extends Controller
{
    public function index(){
        return view('backend.pages.multimedia.index');
    }

    public function store(Request $request){

        $validetData = $request->validate([
            'video_title' => 'required|string',
            'video_description' => 'nullable|string',
            'video_link' => 'required|string',
            'video_status' => 'required|string',      
        ]);

        $multimedia = new Multimedia();

        $multimedia->id = $request->id;
        $multimedia->video_title =  $validetData['video_title'];
        $multimedia->video_description =  $validetData['video_description'];
        $multimedia->video_link =  $validetData['video_link'];
        $multimedia->video_status =  $validetData['video_status'];
        $multimedia->save();

        return redirect()->back()->with('add_video_success','Video Uploaded Successfulli !');
    }

    public function view(){
        $multimedia = Multimedia::all();
        return view('backend.pages.multimedia.manage', compact('multimedia'));
    }

    public function update(Request $request, $id){

        $validetData = $request->validate([
            'video_title' => 'required|string',
            'video_description' => 'nullable|string',
            'video_link' => 'required|string', 
            'video_status' => 'required|string',      
        ]);

        $multimedia = Multimedia::find($id);

        $multimedia->video_title =  $validetData['video_title'];
        $multimedia->video_description =  $validetData['video_description'];
        $multimedia->video_link =  $validetData['video_link'];
        $multimedia->video_status =  $validetData['video_status'];
        $multimedia->update();

        return redirect()->back()->with('update_milti_success', 'Updated Successfully !');
    }

    public function delete($id){
        $multimedia = Multimedia::find($id);
        if($multimedia){
            $multimedia->delete();
            return redirect()->back()->with('delete_milti_success', 'Deleted Successfully !');
        }
        else{
            return redirect()->back()->with('delete_milti_faild', 'Something is Wrong !');
        }
    }
}
