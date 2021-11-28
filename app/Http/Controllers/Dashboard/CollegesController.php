<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\DoctorSubject;
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
        $doctor = auth()->guard('doctor')->user()->id;
        $files = DoctorSubject::where([['subject_id',$id],['doctor_id',$doctor]])->paginate(5);

        $subject_name = Subjecte::where('id', $id)->first();
        return view('dashboard.doctorsDashboard.files.index',compact('files','subject_name','id'));
    }


    public function add($id)
    {
        return view('dashboard.doctorsDashboard.files.create',compact('id'));
    }

    public function store(Request $request,$id)
    {
        $request->validate([
            'title'         => 'required',
            'description'   => 'required',
            'files'         => 'required',
        ]);


//        try{

            $data = $request->except('_token');

            if($request->file()){

                $data['files'] = uploadImage('public_uploads', $request->file('files'));

            }

            $data['subject_id'] = $id;
            $data['doctor_id'] = auth()->guard('doctor')->user()->id;

            DoctorSubject::create($data);

            session()->flash('success', 'File added successfully');

            return redirect()->route('subject.doctor.files',$id);

//        }catch(\Exception $e){
//            return redirect()->back()->with(['error'=>'there is problem please try again']);
//        }
    }

    public function edit($id)
    {
       $file =  DoctorSubject::where('id', $id)->first();
       return view('dashboard.doctorsDashboard.files.edit',compact('file'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'title'         => 'required',
            'description'   => 'required',
        ]);

        try{

            $data = $request->except('_token');

            $file =  DoctorSubject::where('id', $id)->first();
            if($request->file()){

                remove_image('public',$file->files);

                $data['files'] = uploadImage('public', $request->file('files'));

            }

            $file->update($data);

            session()->flash('success', 'File Updates successfully');

            return redirect()->route('subject.doctor.files',$file->subject_id);

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }

    }



    public function delete($id)
    {
        try{
            $file =  DoctorSubject::where('id', $id)->first();

            if(!$file)
            {
                return redirect()->back()->with(['error'=>'file not found']);
            }


            remove_image('public_uploads',$file->files);
            $file->delete();

            session()->flash('success', 'File deleted successfully');

            return redirect()->back();

        }catch(\Exception $e){

            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }


}
