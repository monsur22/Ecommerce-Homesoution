<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Volunteer;
class VolunteerController extends Controller
{
    public function volunteer_add(Request $request){
        $data=new Volunteer();

        if($request->hasFile('image')){
        $files = $request->file('image');
        $extension = $files->getClientOriginalExtension();
        $fileName = str_random(5) . "-" . date('his') . "-" . str_random(3) . "." . $extension;
        $folderpath = 'public/'.'volunter-image/' . date('Y') . '/';
        $image_url = $folderpath . $fileName;
        $files->move($folderpath, $fileName);
        $data->image = $image_url;
    }

 
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->address=$request->address;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->message=$request->message;
        $data->save();
        return redirect()->back();
    }
}
