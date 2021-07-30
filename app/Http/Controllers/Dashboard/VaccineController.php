<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vaccine;

class VaccineController extends Controller
{
    public function show()
    {
        $vaccines=Vaccine::all();
        return view('admin.vaccine')->with('vaccines',$vaccines,'status','Data Added Successfully');
    }

    public function registeredit(Request $request,$id)
    {
        $vaccines =Vaccine::findOrFail($id);
        return view('admin.vaccine-edit')->with('vaccines',$vaccines);
    }
    public function registerupdate(Request $request,$id)
    {
        $vaccines=Vaccine::find($id);
        $vaccines->name=$request->input('name');
        $vaccines->description=$request->input('description');
        $vaccines->update();
        return redirect('vaccine')->with('status','Data Updated Successfully');
    }
    public function registeredelete($id)
    {
        $vaccines=Vaccine::findOrFail($id);
        $vaccines->delete();
        return redirect('vaccine')->with('status','Data Deleted Successfully');
    }
    public function store(Request $request)
    {

            $vaccines=Vaccine::create([
                'name'=>$request->name,
                'description'=>$request->description,
                
            ]);
            $vaccines->save();
            return redirect('vaccine')->with('status','Data Added Successfully');

    }
}
