<?php

namespace App\Livewire;
use App\Models\Todos;
use Livewire\Component;

class Createitem extends Component
{
    public $name = '';
    public function createnewitem()
    {
       $new = new Todos(
           ['name' => $this->name]
       );
       $new->save();
    }

    public function render()
    {
        return view('livewire.createitem');
    }
}
