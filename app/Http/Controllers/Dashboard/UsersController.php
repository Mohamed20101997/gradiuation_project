<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index()
    {
        $users = Admin::where('role','!=','1')->whenSearch(Request()->search)->whenRole(Request()->role)->paginate(5);
        return view('dashboard.users.index',compact('users'));
    }


    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|unique:admins,email|email',
            'name' => 'required',
            'role' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        try{

            $data = $request->except('_token');

            if(!empty($data['password'])){
                $data['password'] = bcrypt($data['password']);
            }

            Admin::create($data);

            session()->flash('success', 'Users added successfully');

            return redirect()->route('user.index');

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
        $user = Admin::find($id);
        if($user){
            return view('dashboard.users.edit', compact('user'));
        }else{
            return redirect()->back()->with(['error'=>'this author is not found']);
        }

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:admins,email,'.$id,
            'name' => 'required',
            'role' => 'required',
            'password' => 'sometimes|confirmed',
        ]);
//        try{

            $user =  Admin::find($request->id);

            $data = $request->except('_token');

            if(!empty($data['password'])){
                $data['password'] = bcrypt($data['password']);
            }else{
                $data['password'] = $user->password;
            }

            $user->update($data);

            session()->flash('success', 'User Updated successfully');

            return redirect()->route('user.index');

//        }catch(\Exception $e){
//            return redirect()->back()->with(['error'=>'there is problem please try again']);
//        }
    }


    public function destroy($id)
    {
        try{
            $user =  Admin::find($id);

            if(!$user)
            {
                return redirect()->back()->with(['error'=>'user not found']);
            }

            $user->delete();

            session()->flash('success', 'User deleted successfully');

            return redirect()->route('user.index');

        }catch(\Exception $e){

            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }
}
