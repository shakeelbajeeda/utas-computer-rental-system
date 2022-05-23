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
    	$data['services']=Package::where('is_active',1)->OrderBy('order_at','asc')->paginate(100);
    	return view('angvo.services')->with($data);
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
        $data['service']=Package::where('slug',$slug)->first();
        if(!empty($data['service']))
        {
            return view('angvo.service_detail')->with($data);
        }
        else
        {
            abort(404, 'Page Not Found');
        }
    }
    private function upload_file($img_file,$folder_name)
    {

       $imgpath = 'public/images/'.$folder_name;
       File::makeDirectory($imgpath, $mode = 0777, true, true);
       $imgDestinationPath = $imgpath.'/';
       $file_name = time()."_".$img_file->getClientOriginalName();
       $success = $img_file->move($imgDestinationPath, $file_name);
       return($file_name);

     }

     public function test_uk_physial_address()
     {
        $this->generate_address_test();
     }
}
