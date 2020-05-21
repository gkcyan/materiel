<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MultipleFields extends Component
{

    public $fields =[1];

    public function addfields()
    {
        $this->fields[] = count($this->fields) +1;
    }

    public function removefields($key)
    {
        unset($this->fields[$key]);
    }

    public function render()
    {
        return view('livewire.multiple-fields');
    }
}
