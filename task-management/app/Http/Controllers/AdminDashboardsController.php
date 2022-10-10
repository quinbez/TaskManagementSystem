<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardsController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
}
