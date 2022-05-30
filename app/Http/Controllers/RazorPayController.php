<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class RazorPayController extends Controller
{
    public function index()
    {
      return view('razorpay.index');
    }
    public function process(Request $request)
    {
        $payInfo = [
                  'user_id' => '1',
                  'product_id' => $request->product_id,
                  'r_payment_id' => $request->payment_id,
                  'amount' => $request->amount,
               ];
       Payment::insertGetId($payInfo);  
       return redirect('payment-success');
    }
    public function success()
    {
      return view('razorpay.success');
    }
}
