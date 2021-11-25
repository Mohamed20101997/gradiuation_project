<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\Subjecte;
use Illuminate\Http\Request;

class CollegesController extends Controller
{

    public function index($id)
    {
       $doctor = auth()->guard('doctor')->user()->id;
       $subjects = Subjecte::where([['college_id', $id],['doctor_id', $doctor]])->paginate(5);

       return view('dashboard.doctorsDashboard.index',compact('subjects'));
    }


    public function files($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {

    }

    public function add($id)
    {

    }

    public function store(Request $request)
    {

    }




}
