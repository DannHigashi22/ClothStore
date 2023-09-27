<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard(){
        //pedido y ventas de hoy
        $today=Carbon::now()->format('Y/m/d');
        $orderstoday=Order::whereDate('created_at',$today);
        //pedidos y ventas totales
        $orders=Order::all();
        //Recientes
        $rUser=User::selectRaw("concat(full_name,' ',surnames) as name")->orderBy('id','desc')->first();
        $rProduct=Product::select('name')->orderBy('id','desc')->first();
        $rOrder=Order::select('id')->orderBy('id','desc')->first();
        $rCategory=Category::select('name')->orderBy('id','desc')->first();
        //productos mas vendidos
        $mostsales=Product::selectRaw('products.*,sum(orders_detail.total) as total')
        ->join('orders_detail','products.id','=','orders_detail.product_id')->groupBy('products.id')->limit(4)->orderBy('total','desc')->get();
        
        return view('admin.dash',[
            'today'=>$today,
            'orders'=>$orders,
            'orderstoday'=>$orderstoday,
            'pMostsales'=>$mostsales,
            'recently'=>[$rUser->name,$rProduct->name,$rOrder->id,$rCategory->name]
        ]);
    }
    public function analytics(){
        //variables
        $presentYear=Carbon::now()->format('Y');
        $lastYear=Carbon::now()->subYear()->format('Y');

        //venta por año
        function salesYear($year){
            $rawsql="WITH RECURSIVE all_dates AS (
                SELECT '2023-01-01' AS dt 
                UNION ALL
                SELECT dt + INTERVAL 1 month FROM all_dates WHERE dt < '2023-11-31'
              )
              SELECT COALESCE(total, 0) AS total FROM all_dates
              LEFT JOIN (SELECT DATE_FORMAT(created_at,'%b %Y') as 'mes', sum(total) as total FROM `orders` WHERE year(created_at)=$year GROUP BY month(created_at)) as sales on DATE_FORMAT(dt,'%b %Y')=mes";
            return $rawsql;
        }
        $salesPresentYear=DB::select(salesYear($presentYear));
        $salesLastYear=DB::select(salesYear($lastYear));

        //orders last 6 days
        $queryOl="WITH RECURSIVE days AS (
            SELECT curdate() AS dt 
            UNION ALL
            SELECT dt - INTERVAL 1 day FROM days WHERE dt > date_add(NOW(), INTERVAL -5 DAY)
          )
            SELECT COALESCE(pedidos, 0) AS pedidos,date_format(dt,'%b-%d') as dias FROM days 
            LEFT JOIN (SELECT count(id) as pedidos,date_format(created_at,'%m-%d') as fecha FROM orders GROUP BY date_format(created_at,'%Y-%m-%d'))as orders_date on date_format(dt, '%m-%d')=fecha";
        $orderLast=Db::select($queryOl);

        //sales categories
        $salesCategories=Category::selectRaw("categories.name ,coalesce(sum(orders_detail.total),0) as total")
        ->leftjoin('products','categories.id','=','products.category_id')
        ->leftjoin('orders_detail','products.id','=','orders_detail.product_id')
        ->groupBy('categories.id')->get();

        $data=[
            'salesPresentYear'=>$salesPresentYear,
            'presentYear'=>$presentYear,
            'salesLastYear'=>$salesLastYear,
            'lastYear'=>$lastYear,
            'ordersLast6'=>$orderLast,
            'salesCategories'=>$salesCategories
        ];
 
        return response()->json($data,200);
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
