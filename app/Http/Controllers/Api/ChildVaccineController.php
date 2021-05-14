<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Child;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class ChildVaccineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function index(Child $child)
    {
        return $child->vaccines;
    }

    /**
     * Store a new relationship between resources in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Child $child, Vaccine $vaccine)
    {
        //Check if the vaccine is already present in the record
        if (!$child->vaccines()->where('vaccines.id', $vaccine->id)->exists()) {
            $child->vaccines()->attach($vaccine->id);
        }
        return response()->json([
            'message' => 'Vaccination Record added successfully' . $vaccine->name
        ], 201);
    }

    /**
     * Display the relationship between the specified resource.
     *
     * @param  \App\Models\Child  $child
     * @param  \App\Models\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function show(Child $child, Vaccine $vaccine)
    {
        //
    }

    /**
     * Update the relationship betweem the specified resources in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Child  $child
     * @param  \App\Models\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Child $child, Vaccine $vaccine)
    {
        //
    }

    /**
     * Remove the relationship between the specified resources from storage.
     *
     * @param  \App\Models\Child  $child
     * @param  \App\Models\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Child $child, Vaccine $vaccine)
    {
        $child->vaccines()->detach($vaccine->id);
        return response()->json([
            'message' => 'Vaccination Record Removed Succesfully'
        ], 200);
    }
}
