<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $message = Messages::create($validatedData);

        Mail::raw($request->input('message'), function ($mail) use ($request) {
            $mail->from($request->input('email'), $request->input('name'));
            $mail->to('developer@ludovickonyo.com')->subject('New Message');
        });

        return back()->with('successMessage', 'Your message has been sent successfully!');
    }
}
