<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MyMail;
use Illuminate\Support\Facades\Mail;

class MyMailController extends Controller
{
    public function demandeProForma()
{
    $destinataire = 'falyarivelo0@gmail.com';

    Mail::to($destinataire)->send(new MyMail());

}
}
