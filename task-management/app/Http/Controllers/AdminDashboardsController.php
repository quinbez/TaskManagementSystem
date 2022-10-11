<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardsController extends Controller
{

   
    public function index()
    {
        // dd(Auth::user());
        if(Auth::user()->role == 'admin'){
            return view('dashboard.index');
        }elseif (Auth::user()->role == 'member') {
            return redirect('/user');
        }


}
}
