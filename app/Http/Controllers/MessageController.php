<?php

namespace App\Http\Controllers;

use App\Mail\MessageReceived;
use Illuminate\Http\Request;
use App\Models\Messages;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function submit(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'message' => 'required',
        // ]);

        // $message = Messages::create($validatedData);

        // Mail::raw($request->input('message'), function ($mail) use ($request) {
        //     $mail->from($request->input('email'), $request->input('name'));
        //     $mail->to('developer@ludovickonyo.com')->subject('New Message');
        // });

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $message = new Messages;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->save();

        Mail::to('developer@ludovickonyo.com')->send(new MessageReceived($message));



        return back()->with('successMessage', 'Your message has been sent successfully!');
    }
}
