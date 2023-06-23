<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }
    public function create()
    {
        $companies=User::all();
        return view('users.create', compact('companies'));
    }
    //to store new companies
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'email'=>'required',
            'address'=>'required',
        ]);
        $selectedCompanyId=$request->input('company_id');
        $user = new User();
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->address=$request->input('address');
        $user->company_id=$selectedCompanyId;
        $user->save();
        

        return redirect()->route('users.index')->with('success','user created successfully');
    }

    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    public function update(Request $request,User $user)
    {
        User::success('Updated Successfully');
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'company_id'=>'required',
        ]);
        $user->fill($request->post())->save();
        return redirect()->route('users.index')->with('success','user updated successfully');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    

    }
}
