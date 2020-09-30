<?php

namespace App\Http\Controllers;

use App\Mail\CorreoResivido;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function  contact(Request $request){
        $msg = $request->validate([
            'name' =>'required',
            'email' =>'required|email',
            'subject' =>'required',
            'message' =>'required'
        ]);

        $email = DB::table('users')->where('id', '2')->value('email');

        Mail::to($email)->send(new CorreoResivido($msg));
       return back();
    }
}
