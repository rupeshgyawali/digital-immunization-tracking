<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function registered()
    {
        $users=User::all();
        return view('admin.user')->with('users',$users,'status','Data Added Successfully');
    }
}
