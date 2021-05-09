<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Http\Request;

class ChildController extends Controller
{
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
        return Child::create(
            $request->only([
                'name',
                'dob',
                'birth_place',
                'father_name',
                'mother_name',
                'father_phn',
                'mother_phn',
                'temporary_addr',
                'permanent_addr',
            ])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function show(Child $child)
    {
        return $child;
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
        $child->fill(
            $request->only([
                'name',
                'dob',
                'birth_place',
                'father_name',
                'mother_name',
                'father_phn',
                'mother_phn',
                'temporary_addr',
                'permanent_addr',
            ])
        );
        $child->save();

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

        return response()->json(['Delete Successfull'], 200);
    }
}
