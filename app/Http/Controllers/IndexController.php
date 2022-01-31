<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function about()
    {
        return view('client.about');
    }

    public function contactus()
    {
        return view('client.contactus');
    }
}
