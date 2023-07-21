<?php

namespace App\Http\Controllers\Auth;

use App\Mail\SignupEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public static function sendSignupEmail($name, $email, $verification_code){
        $data = [
            'name' => $name,
            'verification_code' => $verification_code
        ];
        Mail::to($email)->send(new SignupEmail($data));
    }
}