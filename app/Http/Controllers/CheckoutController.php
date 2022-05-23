<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Rented_device;
class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function confirm_order(Request $request) {
        $request->validate([
            'product_id' => 'required',
            'hours' => 'required',
        ]);
        $user = auth()->user();
        $product = Product::findOrFail($request->product_id);
        if($product->is_rented == 1) {
            session()->flash('message', "This product is already on rent. Please try another one.");
            return redirect()->back();
        }
        $insurance = 0;
        $discount = 0;
        $sub_total = $product->per_hour_rate * $request->hours;

        if(!empty($request->insurance) and $request->insurance == 1) {
            $insurance = $product->insurance_amount;
        }

        if($user->is_student == 1) {
            $discount = $sub_total * 10 /100;
        }

        $total_amount = $sub_total + $insurance + $product->security_deposit - $discount;

        if($total_amount > $user->total_money) {
            session()->flash('message', "You account don't have enough balance to process this order. Please recharge it first");
            return redirect()->back();
        }
        dd($total_amount);
    }
}
