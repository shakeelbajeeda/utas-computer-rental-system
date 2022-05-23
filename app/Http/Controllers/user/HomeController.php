<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recharge_history;
use App\Models\Product;
use App\Models\User;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $data['nav_active'] = 'dashboard';
        return view('user.dashboard')->with($data);
    }

    public function my_recharge_history() {
        $data['nav_active'] = 'account';
        $data['recharges'] = Recharge_history::where('added_to', auth()->user()->id)->get();
        return view('user.accounts.index')->with($data);
    }
}
