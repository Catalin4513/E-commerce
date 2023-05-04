<?php

namespace App\controllers;
use App\classes\Mail;



class IndexController extends BaseController
{

    public function show(){
        
      
       
        echo "Inside homepage from controller class"; 

        $mail = new Mail();
        $data= [

            'to'=>'ioncebotari@gmail.com',
            'subject' => 'Welcome to My Store',
            'view' =>'welcome',
            'name' => 'Ion',
            'body' => "Testing email template"
                ];

                
               
        if($mail->send($data)){
echo "Email send succesfuly";
        }
        else {
            echo " Email sending failed";
        }



    }



  

   
}