<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\DoctorSubject;
use App\Models\Semester;
use App\Models\Subjecte;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $college_id = auth()->guard('student')->user()->college->id;

        // get the all semesters if the Semester had a subject on this college

        $semesters = Semester::whereHas('subject', function ($q) use ($college_id) {
            return $q->where('college_id', $college_id);
        })->paginate(10);

        return view('home', compact('semesters'));
    }

    public function getSubjects($semester_id){

        $college_id = auth()->guard('student')->user()->college->id;
        // get the all Subjects if the semester_id  == $semester_id and  $college_id == $college_id
        $subjects = Subjecte::where([['semester_id',$semester_id],['college_id', $college_id]])->paginate(10);

        $semester_name = Semester:: where('id',$semester_id)->first();

        return view('subjects', compact('subjects','semester_name'));
    }

    public function uploads($subject_id){

        // get the all Subjects if the semester_id  == $semester_id and  $college_id == $college_id
        $uploads = DoctorSubject::where('subject_id',$subject_id)->paginate(10);

        $subjectName = Subjecte::where('id', $subject_id)->first();

        return view('uploads', compact('uploads','subjectName'));
    }

    public function get_model(Request $request){

        $upload = DoctorSubject::where('id',$request->id)->first();
        return view('description', compact('upload'))->render();
    }
}
