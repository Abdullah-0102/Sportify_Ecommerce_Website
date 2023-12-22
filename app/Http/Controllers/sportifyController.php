<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sportifyController extends Controller
{
    public function index(){
        return view("index");
    }

    public function contactUs(){
        return view("contactUs");
    }

    public function products(){
        return view("products");
    }

    public function checkOutPage(){
        return view("checkoutform");
    }
    public function preorder(){
        return view("preorderpage");
    }
}
