<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use App\Complaint;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // dd(database_path('database.sqlite'));
        $data['computers'] = Product::all()->take(7);
        return view('website.index')->with($data);
    }
    public function all_computers()
    {

        if (request()->has('search')) {
            $search = request()->get('search');
            $data['computers'] = Product::where('brand', 'LIKE', "%$search%")->orWhere('title', 'LIKE', "%$search%")->orWhere('os', 'LIKE', "%$search%")->orWhere('per_hour_rate', 'LIKE', "%$search%")->get();
        } else {
            $data['computers'] = Product::all();
        }
        return view('website.all_computers')->with($data);
    }

    public function order($id)
    {
        $data['computer'] = Product::findOrFail($id);
        return view('website.order')->with($data);
    }

    public function general_complaint()
    {
        $data['services'] = Package::all();
        return view('angvo.general_complaint')->with($data);
    }
    public function submit_complaint(Request $request)
    {
        $data = $request->except('_token');
        $data['image'] = $this->upload_file($request->image, 'complaints');
        $complaint = Complaint::create($data);
        \Session::flash('msg', "Your complaint has been registered. Admin will review your complaint and contact you soon. Thanks!");
        $mail_data['package'] = $complaint;
        $mail_data['email'] = "complaints@angov.com";
        $mail_data['view'] = 'mail.complaint';
        $mail_data['subject'] = 'A new complaint has received!';
        $this->send_general_email($mail_data);
        return redirect()->back();
    }
    public function computer_detail($id)
    {
        $data['computer'] = Product::findOrFail($id);
        return view('website.computer_detail')->with($data);
    }
}
