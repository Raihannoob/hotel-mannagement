<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\MailNotify;

class MailController extends Controller
{
    public function index(){
        $data= [
            'tittle'=> 'Mail from Test',
            'body'=> 'This is for testing email',   
        ];
        $mail = Mail::to('zabirraihan570@gmail.com')->send(new MailNotify($data));
        if($mail){
        dd('Email send successfully');
    }
    else {
        dd('False');
    }
}
}
