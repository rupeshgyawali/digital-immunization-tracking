<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Error;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
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
        return Vaccine::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function show(Vaccine $vaccine)
    {
        return $vaccine;
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
        if ($request->has('name')) {
            $vaccine->name = $request->input('name');
        }
        if ($request->has('description')) {
            $vaccine->description = $request->input('description');
        }
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

        return response()->json(['Delete Successfull'], 200);
    }
}
