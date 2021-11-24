<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {

        $students = Student::whenSearch(Request()->search)->paginate(5);
        return view('dashboard.students.index',compact('students'));
    }


    public function create()
    {
        $colleges = College::get();
        return view('dashboard.students.create',compact('colleges'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|unique:students,email|email',
            'name' => 'required',
            'college_id' =>'required|exists:colleges,id',
            'password' => 'required|confirmed|min:6',
        ]);

        try{

            $data = $request->except('_token');

            if(!empty($data['password'])){
                $data['password'] = bcrypt($data['password']);
            }

            Student::create($data);

            session()->flash('success', 'Student added successfully');

            return redirect()->route('student.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $student = Student::find($id);
        $colleges = College::get();
        if($student){
            return view('dashboard.students.edit', compact('student','colleges'));
        }else{
            return redirect()->back()->with(['error'=>'this student is not found']);
        }

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:students,email,'.$id,
            'name' => 'required',
            'college_id' =>'required|exists:colleges,id',
            'password' => 'sometimes|confirmed',
        ]);
        try{

            $student =  Student::find($request->id);

            $data = $request->except('_token');

            if(!empty($data['password'])){
                $data['password'] = bcrypt($data['password']);
            }else{
                $data['password'] = $student->password;
            }

            $student->update($data);

            session()->flash('success', 'Student Updated successfully');

            return redirect()->route('student.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }


    public function destroy($id)
    {
        try{
            $student =  Student::find($id);

            if(!$student)
            {
                return redirect()->back()->with(['error'=>'student not found']);
            }

            $student->delete();

            session()->flash('success', 'Student deleted successfully');

            return redirect()->route('student.index');

        }catch(\Exception $e){

            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }
}
