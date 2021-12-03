<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        dd('dd');
        $auth = auth()->guard('admin')->user()->id;
        $admins = Admin:: where('id', '!=', $auth)->whenSearch(Request()->search)->paginate(5);
        return view('dashboard.admins.index',compact('admins'));
    }


    public function create()
    {
        return view('dashboard.admins.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|unique:admins,email|email',
            'name' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        try{

            $data = $request->except('_token');

            if(!empty($data['password'])){
                $data['password'] = bcrypt($data['password']);
            }

            Admin::create($data);

            session()->flash('success', 'Admin added successfully');

            return redirect()->route('admin.index');

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
        $admin = Admin::find($id);
        if($admin){
            return view('dashboard.admins.edit', compact('admin'));
        }else{
            return redirect()->back()->with(['error'=>'this admin is not found']);
        }

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:admins,email,'.$id,
            'name' => 'required',
            'password' => 'sometimes|confirmed',
        ]);
        try{

            $admin =  Admin::find($request->id);

            $data = $request->except('_token');

            if(!empty($data['password'])){
                $data['password'] = bcrypt($data['password']);
            }else{
                $data['password'] = $admin->password;
            }

            $admin->update($data);

            session()->flash('success', 'Admin Updated successfully');

            return redirect()->route('admin.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }


    public function destroy($id)
    {
        try{
            $admin =  Admin::find($id);

            if(!$admin)
            {
                return redirect()->back()->with(['error'=>'admin not found']);
            }

            $admin->delete();

            session()->flash('success', 'Admin deleted successfully');

            return redirect()->route('admin.index');

        }catch(\Exception $e){

            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }
}
