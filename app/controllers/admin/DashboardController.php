<?php

namespace App\controllers\admin;

use App\classes\Request;
use App\classes\Role;
use App\controllers\BaseController;
use App\classes\Session;
use App\models\Order;
use App\models\Payment;
use App\models\Product;
use App\models\User;
use App\classes\Redirect;

use Illuminate\Database\Capsule\Manager as Capsule;


class DashboardController
{

    public function __construct(){

        if(!Role::middleware('admin')){

            Redirect::to('/login');
        }


    }
    public function show(){

     //$orders = Capsule::table('orders')->count(Capsule::raw('DISTINCT order_no'));
   $orders = Order::all()->count();

     $products = Product::all()->count();

     $users = User::all()->count();

     $payments = Payment::all()->sum('amount')/100;

        return view('admin/dashboard', compact('orders', 'products', 'payments', 'users'));
    }

    public function getChartData(){

        

        $revenue = Capsule::table('payments')->select(
            Capsule::raw('sum(amount) / 100 as `amount`'),
            Capsule::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),
            Capsule::raw('YEAR(created_at) year, Month(created_at) month')

        )->groupBy('year', 'month')->get();

        $orders = Capsule::table('orders')->select(
            Capsule::raw('count(id) as `count`'),
            Capsule::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),
            Capsule::raw('YEAR(created_at) year, Month(created_at) month')

        )->groupBy('year', 'month')->get();

        echo json_encode([
            'revenues' => $revenue, 'orders' => $orders
        ]);
  
 

    
   

    }

}