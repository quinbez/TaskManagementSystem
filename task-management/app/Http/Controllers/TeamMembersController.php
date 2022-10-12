<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TeamMembersController extends Controller
{
    public function index(){
        $members = User::all();
        return view('user.team', compact('members'));
    }
}
