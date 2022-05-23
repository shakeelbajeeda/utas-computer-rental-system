<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use App\Complaint;
class HomeController extends Controller
{
    public function index()
    {

        return view('website.index');
    }
    public function services()
    {
    	$data['services']= [];
    	return view('website.services')->with($data);
    }

    public function checkout()
    {
    	$data['services']= [];
    	return view('website.order')->with($data);
    }

    public function general_complaint()
    {
        $data['services']=Package::all();
        return view('angvo.general_complaint')->with($data);
    }
    public function submit_complaint(Request $request)
    {
        $data=$request->except('_token');
        $data['image']= $this->upload_file($request->image,'complaints');
        $complaint=Complaint::create($data);
        \Session::flash('msg',"Your complaint has been registered. Admin will review your complaint and contact you soon. Thanks!");
        $mail_data['package']=$complaint;
        $mail_data['email']="complaints@angov.com";
        $mail_data['view']='mail.complaint';
        $mail_data['subject']='A new complaint has received!';
        $this->send_general_email($mail_data);
        return redirect()->back();
    }
    public function single($slug)
    {
        $data['test'] = [];
            return view('website.service_detail')->with($data);
        
    }

}
