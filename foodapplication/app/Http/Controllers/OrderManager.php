<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderManager extends Controller
{
    function newOrder(){
        $orders = Orders::where("status","open")->get();
        $delivery_boys = Users::where("type","delivery")->get();
        return view("dashboard",compact("orders","delivery_boys"));
    }
}
