<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function registered()
    {
        $users=User::all();
        return view('admin.admin')->with('users',$users,'status','Data Added Successfully');
    }

    public function registeredit(Request $request,$id)
    {
        $users =User::findOrFail($id);
        return view('admin.admin-edit')->with('users',$users);
    }
    public function registerupdate(Request $request,$id)
    {
        $users=User::find($id);
        $users->name=$request->input('username');
        $users->usertype=$request->input('usertype');
        $users->update();
        return redirect('admin')->with('status','Data Updated Successfully');
    }
    public function registeredelete($id)
    {
        $users=User::findOrFail($id);
        $users->delete();
        return redirect('admin')->with('status','Data Deleted Successfully');
    }
    public function store(Request $request)
    {
        

            $users=User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'password'=>Hash::make($request->password),
            ]);
            $users->usertype="admin";
            $users->save();
            return redirect('admin')->with('status','Data Added Successfully');

    }
}
