<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SearchUser extends Component
{
    public $search = '';

    public function render(){

        $users = [];
        if(strlen($this->search) > 0){
            if(Auth::user()->role === 'admin'){
                $users = User::where('name', 'LIKE', '%'. $this->search. '%')
                        ->orderBy('name', 'asc')
                        ->get();
            }else{
                $users = User::where('name', 'LIKE', '%'. $this->search. '%')
                    ->where('role', 'member')
                    ->orderBy('name', 'asc')
                    ->get();
            }
        }        
        return view('livewire.search-user', [
            'users' => $users
        ]);
    }
}
