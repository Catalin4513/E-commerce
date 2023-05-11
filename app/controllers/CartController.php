<?php

namespace App\controllers;


use App\classes\Cart;
use App\classes\CSRFToken;
use App\classes\Request;
use App\models\Product;

class CartController extends BaseController
{
public function addItem(){
    if(Request::has('post')){
        $request= Request::get('post');
        if(CSRFToken::verifyCSRFToken($request->token, false)){

            if(!$request->product_id){

                throw new \Exception('Malicious Activity');
            }
            Cart::add($request);
            echo json_encode(['success' =>' Product Added to Cart Successfully']);
            exit;

        }
    }


}

}