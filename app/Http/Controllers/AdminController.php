<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard(){
        $today=Carbon::now()->format('Y/m/d');
        $orderstoday=Order::whereDate('created_at',$today);
        $orders=Order::all();
        
        return view('admin.dash',['today'=>$today,'orders'=>$orders,'orderstoday'=>$orderstoday]);
    }
    public function analytics(){
        $orders=Order::all();
        return response()->json(['data'=>$orders]);
    }

    //users methods
    public function allUsers(){
        $users=User::all()->sortDesc();
        return view('admin.user.u-all',['users'=>$users]);
    }

    public function userRegister(){
        return view('admin.user.u-register');
    }

    public function userSave(Request $request){
        $validator=$this->validate($request,[
            'full_name' => ['required', 'alpha', 'max:255'],
            'surnames' => ['required', 'alpha', 'max:255'],
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

    //orders
    public function allOrders(Request $request){
        //$orders=Order::all()->sortDesc();
        $orders=Order::when($request->input('dateRange') != null, function ($q) use ($request){
            $date= explode(" - ",$request->input('dateRange'));
            $star=Carbon::createFromFormat('Y/m/d',$date[0])->startOfDay();
            $end=Carbon::createFromFormat('Y/m/d',
            empty($date[1])?$date[0]:$date[1]
            )->endOfDay();
            return $q->whereBetween('created_at',[$star,$end]);
        })->when($request->input('status')!= null, function($q) use ($request){
            return $q->where('status',$request->input('status'));
        },function($q){
            return $q->orderBy('id','DESC');
        })->get();
        return view('admin.orders.o-all',[
            'orders'=>$orders
        ]);
    }

    public function order($id){
        $order=Order::where('id','=',$id)->firstOrFail();
        return view('admin.orders.o-detail',[
            'order'=>$order]);
    }
    
}
