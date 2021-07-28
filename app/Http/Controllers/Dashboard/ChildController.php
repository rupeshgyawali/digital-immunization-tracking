<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Child;

class ChildController extends Controller
{
    public function show()
    {
        $childs=Child::all();
        return view('admin.child')->with('childs',$childs);
    }
}
