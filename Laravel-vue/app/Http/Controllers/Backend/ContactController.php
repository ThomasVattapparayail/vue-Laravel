<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();

        return response()->json($contacts);
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);

        $contact->delete();

        return response()->json([
            'message' => 'Contact deleted successfully.'
        ]);
    }
}
