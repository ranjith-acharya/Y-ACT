<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function dashboard(): View{
        return view('admin.dashboard');
    }
}
