<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index()
    {
        $first = 'Fred';
        $last = 'Hong';
        return view('pages.home', compact('first', 'last'));
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
