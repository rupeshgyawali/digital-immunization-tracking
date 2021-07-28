<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class HealthPersonnelController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function registered()
    {
        $users=User::all();
        return view('admin.registerHP')->with('users',$users);
    }

    public function registeredit(Request $request,$id)
    {
        $users =User::findOrFail($id);
        return view('admin.edit-role')->with('users',$users);
    }
    public function registerupdate(Request $request,$id)
    {
        $users=User::find($id);
        $users->name=$request->input('username');
        $users->usertype=$request->input('usertype');
        $users->update();
        return redirect('registerHP')->with('status','Data Updated Successfully');
    }
    public function registeredelete($id)
    {
        $users=User::findOrFail($id);
        $users->delete();
        return redirect('registerHP')->with('status','Data Deleted Successfully');
    }
    public function store(Request $request)
    {
            // $users = new User;
            // $users->name = $request->input('name');
            // $users->phone = $request->input('phone');
            // $users->email = $request->input('email');
            // $users->password=$request->input('password');
            // $users->save();
            // return redirect('registerHP')->with('status','Data Added Successfully');

            $users=User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'password'=>Hash::make($request->password)
            ]);
            return redirect('registerHP')->with('status','Data Added Successfully');

    }

}
