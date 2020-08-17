<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewEnquery;
use Validator;
use App\Enquery;
class EnqueryController extends Controller
{
    public function Enqueries(Request $request){
        $rules=[
            'email'=>'required|email',
            'full_name'=>'required|min:3',
            'phone'=>'required',
            'subject'=>'required',
            'message'=>'required'

        ];

        $data = $request->only(['email','full_name','phone','subject','message']);
        $isvalid = Validator::make($data,$rules);
        if($isvalid->fails()){
            //return 'false';
            return redirect()->back()->withErrors($isvalid);
        }
        $details =[
            'title'=>$data['subject'],
            'msg'=>$data['message'],
            'name'=>$data['full_name'],
            'contact'=>$data['phone']
        ];
        $email = $data['email'];
        $subject = $data['subject'];
        //Enquery::create($data);
        event(new NewEnquery($details,$email,$subject));
       // Mail::to('info@mdainsolutions.com')->send(new Enquerymail($details, $email, $subject) );
        return redirect('/contact')->with('msg','Thanks for contacting us. We will get back to you soon');

    }
}
