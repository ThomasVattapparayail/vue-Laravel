<?php

namespace App\Http\Controllers;

use App\Jobs\SendStoredMessageEmail;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request) 
    { 
        $validated = $request->validate([
         'name' => 'required|string|max:255',
         'email' => 'required|email|max:255', 
         'message' => 'required|string', 
         ]);

       $message=Contact::create($validated);

        SendStoredMessageEmail::dispatch($message->id);

      return response()->json([ 'message' => 'Message sent successfully!' ], 201); 
    }
}
