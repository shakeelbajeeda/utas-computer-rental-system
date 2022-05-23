<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $data['nav_active'] = 'dashboard';
        return view('supper_admin.dashboard')->with($data);
    }
}
