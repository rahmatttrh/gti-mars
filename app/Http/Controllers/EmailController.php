<?php

namespace App\Http\Controllers;

use App\Mail\NotificationEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
   public function test()
   {
      Mail::to("rahmattrust@gmail.com")->send(new NotificationEmail);
      return redirect()->back()->with('success', 'Email has sent');
   }
}
