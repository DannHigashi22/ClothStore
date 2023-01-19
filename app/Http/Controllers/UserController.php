<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 

class UserController extends Controller{
    /*Admin Functions */

    public function edit($id=null){
        if (empty($id)) {
            $id=Auth::user()->id;
        }
        $user=User::findorfail($id);
        return view('admin.user.u-edit',[
            'user'=>$user
        ]);
    }

    public function update(Request $request,$id){
        $validate=$request->validate([
            'full_name' => ['required','not_regex:/[0-9|_|-|$|@]/','max:255'],
            'surnames' => ['required','not_regex:/[0-9|_|-|$|@]/', 'max:255'],
            'phone' => ['required', 'int', 'min:8'],
            'email' => ['required', 'string', 'email', 'max:255', "unique:users,email,$id"],
            'role'=>['required','int']
        ]);

        $full_name=$request->input('full_name');
        $surnames=$request->input('surnames');
        $phone=$request->input('phone');
        $email=$request->input('email');
        $role=$request->input('role',2);

        $user=User::findorfail($id);
        $user->full_name=$full_name;
        $user->surnames=$surnames;
        $user->phone=$phone;
        $user->email=$email;

        $user->update();

        return \redirect()->route('a-users')->with(['message'=>'Usuario actualizado correctamente']);
    }

    public function delete($id){
        $user=User::findorfail($id);
        if ($user->role->name=='Admin') {
            return \redirect()->route('a-users')->with(['message_error'=>'Error al borrar Usuario']);
        }
        $user->delete();
        return \redirect()->route('a-users')->with(['message'=>'Usuario borrado correctamente']);
    }

}
