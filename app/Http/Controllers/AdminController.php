<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dash');
    }

    //users methods
    public function allUsers(){
        $users=User::all();
        return view('admin.users',['users'=>$users]);
    }

    public function userRegister(){
        return view('admin.user-register');
    }

    public function userSave(Request $request){
        $validator=$this->validate($request,[
            'full_name' => ['required', 'string', 'max:255'],
            'surnames' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'int', 'min:8'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
        $full_name=$request->input('full_name');
        $surname=$request->input('surnames');
        $email=$request->input('email');
        $phone=$request->input('phone');
        $password=$request->input('password');
        if($request->input('role') ||($request->input('role')!=1 && $request->input('role')!=2)){
            $role_id=2;
        }else{
            $role_id=$request->input('role');
        }
        User::create([
            'role_id'=> $role_id,
            'full_name' => $full_name,
            'surnames' => $surname,
            'phone' => $phone,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
        return redirect()->route('a-users')->with(['message'=>'Usuario Creado correctamente']);
    }

    //products methods

    public function productCreate(){
        return view('admin.create-product');
    }
    public function productSave(Request $request){
        
    }

}
