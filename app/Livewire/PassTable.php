<?php

namespace App\Livewire;

use App\Models\PassportInfo;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
class PassTable extends Component
{
    use WithPagination;
    public $search='';
    public function render()
    {
        $passports=PassportInfo::where('name','LIKE','%'.$this->search.'%')
        ->orWhere('pass_num','LIKE','%'.$this->search.'%')->orderBy('id','desc')->paginate(20);
        return view('livewire.pass-table',compact('passports'));
    }
    public function updatedSearch(){
        $this->resetPage();
    }


    #[On('add-new')]
    function refreshData() {
        $this->search='';
        $this->resetPage();
    }

}
