<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function pieChart(){
        return view('pie');
    }
    public function barChart(){
        return view('bar');
    }

}
