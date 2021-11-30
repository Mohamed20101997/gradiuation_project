<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function index()
    {
        $doctors = Doctor::whenSearch(Request()->search)->paginate(5);
        return view('dashboard.doctors.index',compact('doctors'));
    }


    public function create()
    {
        return view('dashboard.doctors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:doctors,email|email',
            'name' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        try{

            $data = $request->except('_token');

            if(!empty($data['password'])){
                $data['password'] = bcrypt($data['password']);
            }

            Doctor::create($data);

            session()->flash('success', 'Doctor added successfully');

            return redirect()->route('doctor.index');

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
        $doctor = Doctor::find($id);
        if($doctor){
            return view('dashboard.doctors.edit', compact('doctor'));
        }else{
            return redirect()->back()->with(['error'=>'this doctor is not found']);
        }

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:doctors,email,'.$id,
            'name' => 'required',
            'password' => 'sometimes|confirmed',
        ]);
        try{

            $doctor =  Doctor::find($request->id);

            $data = $request->except('_token');

            if(!empty($data['password'])){
                $data['password'] = bcrypt($data['password']);
            }else{
                $data['password'] = $doctor->password;
            }

            $doctor->update($data);

            session()->flash('success', 'Doctor Updated successfully');

            return redirect()->route('doctor.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }


    public function destroy($id)
    {
        try{
            $doctor =  Doctor::find($id);

            if(!$doctor)
            {
                return redirect()->back()->with(['error'=>'doctor not found']);
            }

            $doctor->delete();

            session()->flash('success', 'Doctor deleted successfully');

            return redirect()->route('doctor.index');

        }catch(\Exception $e){

            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }
}
