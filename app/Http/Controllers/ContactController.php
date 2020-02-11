<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
class ContactController extends Controller
{
    public function frontcontact(Request $request){
        $data=new Contact();
        $data->name=$request->name;
        $data->subject=$request->subject;
        $data->email=$request->email;
        $data->message=$request->message;
        $data->save();
        return redirect('/');
        // return $data;
        }
        public function contact(){
            $details=Contact::all();
            return view('admin.contact.index',[
                'details'=>$details,
                ]);
        }
        public function contact_delete($id){
            $data= Contact::find($id);
            $data->delete();
            return redirect()->back();
        }
        public function contact_replay($id){
        
            $details= Contact::find($id);
            return view('admin.contact.edit',[
                'details'=>$details,
                ]);
        }
        public function replay_message(Request $request){
        
           
            Session::put('email',$request->email);   
            Session::put('message',$request->message);   
            Session::put('replay_message',$request->replay_message);  
        
        
          $maildata=$request->toArray();
          Mail::send('admin.contact.send_replay',$maildata,function($massage) use ($maildata)
          {
          $massage->to($maildata['email']); 
          $massage->subject('Replay Email'); 
        
          });
        Contact::find($request->id)->delete();
            // $sms=Contact::count();
            // Session::put('sms',$sms);
          return redirect('/contact')->with('send','Send Successfully');
        }
        
}
