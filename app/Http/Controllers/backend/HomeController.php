<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index() {
        $data['nav_active'] = 'dashboard';
        return view('supper_admin.dashboard')->with($data);
    }

    public function change_status (Request $request) {
        try {
            $id = $request->id;
            $table = $request->table;
            $tbl_field = $request->tbl_field;
            $data[$tbl_field] = $request->status;
            \DB::table($table)->where('id', $id)->update($data);
           return $this->send_response(true, 'Status Updated Successfully!');
        } catch (\Exception $e) {
           return $this->send_response(false, 'Status Cannot Update !');
        }

    }

    public function general_delete (Request $request) {
        try {
            $id = $request->id;
            $table = $request->table;
            if($table == 'users' and $id == auth()->user()->id) {
              return $this->send_response(false, 'You cannot delete yourself');
            }
            \DB::table($table)->where('id', $id)->delete();
            return $this->send_response(true, 'Recored Deleted Successfully!');


        } catch (Exception $e) {
            return $this->send_response(false, 'Recored Cannote Delete !');
        }

    }
}
