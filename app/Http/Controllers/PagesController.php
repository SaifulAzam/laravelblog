<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;

class PagesController extends Controller
{
    //
    public function about()
    {
    	return view('about');
    }

    public function contact()
    {
    	return view('contact');
    }

    public function contact_send(Request $request)
    {
		Mail::send('emails.contact', array(
			'name' => $request->get('name'),
			'email' => $request->get('email'),
			'user_message' => $request->get('message')), 
		function($message){
			$message->from('fred@fredhong.ca');
			$message->to('fred@fredhong.ca', 'Fred Hong')->subject('Thank you');
		});
		
		return redirect('contact')->with('message', 'Thanks for contacting us!');
    }
}
