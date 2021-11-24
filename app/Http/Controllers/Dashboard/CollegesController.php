<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\College;
use Illuminate\Http\Request;

class CollegesController extends Controller
{

    public function index()
    {
        $doctor = auth()->guard('doctor')->user()->id;
        $colleges = College::where()->get();

        return $colleges;

        return view('dashboard.colleges.index',compact('colleges'));
    }


}
