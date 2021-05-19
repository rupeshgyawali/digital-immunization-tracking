<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VaccineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
        $this->middleware('admin')->only(['store', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Vaccine::all();
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
        $vaccineData = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string'
        ])->validate();

        return Vaccine::create($vaccineData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $vaccines=Vaccine::all();
        return view('/admin.vaccine')->with('vaccines',$vaccines);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vaccine $vaccine)
    {
        //Validating and filtering fillable fields.
        $vaccineData = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string'
        ])->validate();

        $vaccine->fill($vaccineData);

        if ($vaccine->isDirty()) {
            $vaccine->save();
        }

        return $vaccine;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vaccine $vaccine)
    {
        $vaccine->delete();

        return response()->json([
            "message" => "Delete Successfull"
        ], 200);
    }
}
