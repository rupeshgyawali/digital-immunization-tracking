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
        return view('/admin.vaccine')->with('vaccines',$vaccines);
    }
}
