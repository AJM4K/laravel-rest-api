<?php

namespace App\Livewire;

use App\Models\Todos;
use Livewire\Component;

class Bladeview extends Component
{
    public $message = '';

    public function delete($id){
        $todo = Todos::find($id);
        $todo->delete();
    }

    public function navigateToCreatePage(){
        return redirect('http://localhost:8000/create');

    }

    public function render()
    {
        // $data = Todos::all();
        $data = Todos::where('name' , 'like' , '%' . $this->message . '%')->get();

        return view('livewire.bladeview',[
            'datalist' => $data
            ]);
    }
}
