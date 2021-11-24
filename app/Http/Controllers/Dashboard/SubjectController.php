<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\College;
use App\Models\Semester;
use App\Models\Subjecte;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subjecte::whenSearch(Request()->search)->paginate(5);
        return view('dashboard.subjects.index',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colleges   = College::get();
        $semesters  = Semester::get();
        $doctors    = Doctor::get();

        return view('dashboard.subjects.create',compact('colleges','semesters','doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'hours'         => 'required|numeric',
            'college_id'    => 'required|exists:colleges,id',
            'semester_id'   => 'required|exists:semesters,id',
            'doctor_id'     => 'required|exists:doctors,id',
        ]);

        try{

            $data = $request->except('_token');
            Subjecte::create($data);
            session()->flash('success', 'Subjecte added successfully');

            return redirect()->route('subject.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colleges   = College::get();
        $semesters  = Semester::get();
        $doctors   = Doctor::get();
        $subject = Subjecte::find($id);
        if($subject){
            return view('dashboard.subjects.edit', compact('subject','colleges','semesters','doctors'));
        }else{
            return redirect()->back()->with(['error'=>'this author is not found']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required',
            'hours'         => 'required|numeric',
            'college_id'    => 'required|exists:colleges,id',
            'semester_id'   => 'required|exists:semesters,id',
            'doctor_id'     => 'required|exists:doctors,id',
        ]);
        try{
            $subject = Subjecte::find($request->id);

            $data = $request->except('_token');

            $subject->update($data);

            session()->flash('success', 'Subject Updated successfully');

            return redirect()->route('subject.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $subject = Subjecte::find($id);
            if(!$subject)
            {
                return redirect()->back()->with(['error'=>'user not found']);
            }

            $subject->delete();

            session()->flash('success', 'Subject deleted successfully');

            return redirect()->route('subject.index');

        }catch(\Exception $e){

            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }
}
