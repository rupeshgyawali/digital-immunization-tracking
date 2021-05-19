<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChildController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Child::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validating and filtering fillable fields.
        $childData = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'dob' => 'required|date_format:Y/m/d|before:today',
            'birth_place' => 'required',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'father_phn' => 'required',
            'mother_phn' => 'required',
            'temporary_addr' => 'required',
            'permanent_addr' => 'required',
        ])->validate();

        return Child::create($childData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $childs=Child::all();
        return view('admin.child')->with('childs',$childs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Child $child)
    {
        //Validating and filtering fillable fields.
        $childData = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'dob' => 'nullable|date_format:Y/m/d|before:today',
            'birth_place' => 'nullable',
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'father_phn' => 'nullable',
            'mother_phn' => 'nullable',
            'temporary_addr' => 'nullable',
            'permanent_addr' => 'nullable',
        ])->validate();

        $child->fill($childData);

        if ($child->isDirty()) {
            $child->save();
        }

        return $child;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function destroy(Child $child)
    {
        $child->delete();

        return response()->json([
            "message" => "Delete Successfull"
        ], 200);
    }
}
