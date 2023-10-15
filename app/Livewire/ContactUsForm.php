<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\Attributes\Rule;
class ContactUsForm extends Component
{

    public $name='',
    $phone='',
    $email='',
    $message='',
    $subject='';
    public function render()
    {
        return view('livewire.contact-us-form');
    }




public    function save() {


    $this->validate([
        'name'=>'required',
        'phone'=>'required',
        'email'=>'email',
        'message'=>'required',
        'subject'=>'required'
    ]);
    Contact::create($this->all());

    $this->reset();

    return dd('ok');
    //    return dd($this->contact);
    }




}
