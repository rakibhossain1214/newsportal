<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Employee;
class DbController extends Controller
{
    public function index(){
        // $all = DB::table('employees')->select('name', 'age', 'city')->get();
        // $all = DB::table('employees')->pluck('name', 'age'); //used for drop down
        // $single = DB::table('employees')->first();
        // $limit = DB::table('employees')->orderBy('id','ASC')->limit(1)->get(); 
        // $limit = DB::table('employees')->orderBy('id','DESC')->limit(1)->get();
        // $count = DB::table('orders')->count();
        // $offset = DB::table('employees')->orderBy('salary','DESC')->offset(1)->limit(1)->get();  //maximum/highest
        $min = DB::table('employees')->min('salary');
        dd($min);
    }

    public function model(){
        // $result = DB::table('orders')
        //             ->join('users', 'users.id', '=', 'orders.user_id')
        //             ->select('users.name', 'orders.amount', 'orders.order_date')
        //             ->where('status',0)
        //             ->get();
        // dd($result);

        $result = Employee::all();
        dd($result);
    }
}
