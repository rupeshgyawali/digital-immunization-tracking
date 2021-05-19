<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HealthPersonnelController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('admin')->only(['index', 'store', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validating and filtering fields.
        $health_personal = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'phone_no' => 'required'
        ])->validate();

        $health_personal['password'] = Hash::make($health_personal['password']);
        return User::create($health_personal);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (!auth()->user()->is_admin && auth()->user()->id != $user->id) {
            return response()->json([], 401);
        }
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //Validating and filtering fields.
        $health_personal = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users',
            'phone_no' => 'nullable'
        ])->validate();

        $user->fill($health_personal);

        if ($user->isDirty()) {
            $user->save();
        }

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            "message" => "Delete Successfull"
        ], 200);
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
}
