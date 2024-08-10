<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' =>'required',
            'phone'=>'required',
            'email'=>'required',
            'message'=>'required',

        ]);
        Contact::create($data);
        return redirect(route('home'));
    }
}
