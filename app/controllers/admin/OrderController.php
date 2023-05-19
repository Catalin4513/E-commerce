<?php

namespace App\controllers\admin;
use App\classes\CSRFToken;
use App\classes\Request;
use App\classes\Role;
use App\classes\UploadFile;
use App\classes\ValidateRequest;
use App\controllers\BaseController;
use App\models\Category;
use App\classes\Redirect;
use App\classes\Session;
use App\models\Order;
use App\models\Product;
use App\models\SubCategory;

class OrderController extends BaseController{

    private $table_name = 'orders';

    public function __construct()
    {
        if(!Role::middleware('admin')){
            Redirect::to('/login');
        }
    }
    
    public function show()
    {
        $total = Order::all()->count();
        list($orders, $links) = paginate(10, $total, $this->table_name, new Order);
        return view('admin/transactions/orders', compact('orders', 'links'));
    }







}