<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\Doctor;
use App\Models\Student;
use App\Models\Subjecte;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public function index()
    {
        //get the latest 5 record on the [Doctor , Student] table
        $doctors = Doctor::orderBy('id', 'desc')->take(5)->get();
        $students = Student::orderBy('id', 'desc')->take(5)->get();

        // get count of all records on the [doctor , student , subject ,  college] tables

        $doctor_counts = Doctor::get()->count();
        $student_counts = Student::get()->count();
        $subject_counts = Subjecte::get()->count();
        $college_counts = College::get()->count();

        return view('dashboard.welcome', compact('doctors', 'students', 'doctor_counts', 'student_counts', 'subject_counts', 'college_counts'));

    } //end of index

} //end of controller
