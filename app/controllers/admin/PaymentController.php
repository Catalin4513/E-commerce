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
use App\models\Payment;
use App\models\SubCategory;

class PaymentController extends BaseController
{
    private $table_name = 'payments';

    public function __construct()
    {
        if(!Role::middleware('admin')){
            Redirect::to('/login');
        }
    }
    
    public function show()
    {
        $total = Payment::all()->count();
        list($payments, $links) = paginate(7, $total, $this->table_name, new Payment);
        return view('admin/transactions/payments', compact('payments', 'links'));
    }
}
