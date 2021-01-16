<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Message;
use Mail;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::first();
        return view('contact.index',['contact' => $contact]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject'=>'required',
            'message' => 'required'
         ]);

        Message::create($request->all());

        Mail::send('contact.mail', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'user_query' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('klemczak.daniel@gmail.com', 'Admin')->subject($request->get('subject'));
        });

        return back()->with('sukces', 'Wysyłanie wiadomości przebiegło pomyślnie.');
    }
}
