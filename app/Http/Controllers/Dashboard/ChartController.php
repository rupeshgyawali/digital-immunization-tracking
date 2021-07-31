<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Child;
use App\Models\User;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function pieChart()
    {
        return view('pie');
    }
    public function barChart()
    {
        return view('bar');
    }
    public function dashboard()
    {
        // $vaccines = V
        $vaccines = Vaccine::all();
        $totalChild = Child::all()->count();
        $content = ['total' => $totalChild];
        $content['totalHP'] = User::all()->count();
        foreach ($vaccines as $vaccine) {
            $content[$vaccine->name] = $vaccine->children->count();
        }
        return view('admin.dashboard')->with('content', $content)->with('vaccines', $vaccines);
    }
}
