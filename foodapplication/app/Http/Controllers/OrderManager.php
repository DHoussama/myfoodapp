<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Orders ;
use App\Models\User ;


class OrderManager extends Controller
{
    function newOrders(){
        $orders = Orders::where("status","open")->get();
        $orders= json_decode(json_encode($orders));
        $delivery_boys = User::where("type","delivery")->get();
        $products = Products::get() ;
        foreach($orders as $Key => $order){
            $order_item_ids = json_decode($order->items);
            foreach($order_item_ids as $key2 => $order_item) {
                foreach($products as $product) {
                if ($order_item->item_id == $product->id) {
                $orders[$Key]->item_details[$key2] = $product ;
                }
                }
            }
        }
        return view("dashboard",compact("orders","delivery_boys"));
    }

    function assignOrder(Request $request) {
       $order = Orders::where("id",$request->order_id)->first() ;
       $order->delivery_boy_email = $request->delivery_boy_email ;
       $order->status = "assigned";
       if ($order->save()) {
        return redirect(route("dashboard"))->with("success", "Order Assigned Succeffully") ;
       }
       return redirect(route("dashboard"))->with("Failed", "Order Failed succeffully") ;
       

    }
}
