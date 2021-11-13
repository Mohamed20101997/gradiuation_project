<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
{
    $semesters = Semester::whenSearch(Request()->search)->paginate(5);
    return view('dashboard.semesters.index',compact('semesters'));
}


    public function create()
    {
        return view('dashboard.semesters.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
        ]);

        try{

            $data = $request->except('_token');

            Semester::create($data);

            session()->flash('success', 'Semester added successfully');

            return redirect()->route('semester.index');

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
        $semester = Semester::find($id);
        if($semester){
            return view('dashboard.semesters.edit', compact('semester'));
        }else{
            return redirect()->back()->with(['error'=>'this author is not found']);
        }

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        try{
            $semester =  Semester::find($request->id);

            $data = $request->except('_token');


            $semester->update($data);

            session()->flash('success', 'Semester Updated successfully');

            return redirect()->route('semester.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }


    public function destroy($id)
    {
        try{
            $semester =  Semester::find($id);

            if(!$semester)
            {
                return redirect()->back()->with(['error'=>'user not found']);
            }

            $semester->delete();

            session()->flash('success', 'Semester deleted successfully');

            return redirect()->route('semester.index');

        }catch(\Exception $e){

            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }
}
