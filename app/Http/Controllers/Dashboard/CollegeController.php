<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{

    public function index()
    {
        $colleges = College::whenSearch(Request()->search)->paginate(5);
        return view('dashboard.colleges.index',compact('colleges'));
    }


    public function create()
    {
        return view('dashboard.colleges.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
        ]);

        try{

            $data = $request->except('_token');

            College::create($data);

            session()->flash('success', 'College added successfully');

            return redirect()->route('college.index');

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
        $college = College::find($id);
        if($college){
            return view('dashboard.colleges.edit', compact('college'));
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
        $college =  College::find($request->id);

        $data = $request->except('_token');


        $college->update($data);

        session()->flash('success', 'College Updated successfully');

        return redirect()->route('college.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }


    public function destroy($id)
    {
        try{
            $college =  College::find($id);

            if(!$college)
            {
                return redirect()->back()->with(['error'=>'user not found']);
            }

            $college->delete();

            session()->flash('success', 'College deleted successfully');

            return redirect()->route('college.index');

        }catch(\Exception $e){

            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }
}
