<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactForm extends Component
{


    public Contact $contact;


    public function mount()
    {
        $this->contact=new Contact();
    }

    public function render()
    {

        return view('livewire.contact-form');
    }



    function save() {
        return dd($this->contact);
    }







}
