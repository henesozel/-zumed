<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;


class MailController extends Controller
{
    public function mail_gonder(){
        $data=['name'=>'Enes'];
        Mail::send(['text' =>'welcome'],$data,function ($message) {
            $message->from('izumed@gmail.com', 'IZUMED');

            $message->to('henesozel@gmail.com','Enes')->subject('Your Reminder!');
        });

        echo 'Basarili';

    }
}
