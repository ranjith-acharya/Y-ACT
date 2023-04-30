<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class SearchUser extends Component
{
    public $search = '';

    public function render(){

        $users = [];
        if(strlen($this->search) > 0){
            $users = User::where('name', 'LIKE', '%'. $this->search. '%')->get();
        }        
        return view('livewire.search-user', [
            'users' => $users
        ]);
    }
}
