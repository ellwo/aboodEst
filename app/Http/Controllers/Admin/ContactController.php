<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

   public function index()  {

    $contacts=Contact::all();
      return view('backend.pages.contact-us.index',[
        'contacts'=>$contacts
      ]);
    }

   public function edit(Contact $contact)  {

    return view('backend.pages.contact-us.edit',['contact'=>$contact]);


    }
    //
}
