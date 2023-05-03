@extends('layout')
@section('content')

<style>
    body {
            background-color: #f1f1f1;
        }
  
    .header {
        background-color: black;
        color: #fff;
        padding: 20px;
        text-align: center;
    }
   
    
</style>

<body>
<header class="header">
    <h1>List of all orders</h1>
</header>
<main class="container my-5" style="max-width: 900px">
    <div class="row">
      <div class="col-12">
        <table class="table table-bordered border-secondary">
          <thead>
            <tr>
              <th style="background-color: #d9e4f4">Order ID</th>
              <th style="background-color: #d9e4f4">Order address</th>
              <th style="background-color: #d9e4f4">Order items</th>
              <th style="background-color: #d9e4f4">Order status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
            <tr>
              <td>{{$order->id}}</td>
              <td>{{$order->destination_address}}</td>
              <td>
                @foreach($order->item_details as $item_details)
                <div>{{$item_details->name}}</div>
                @endforeach
              </td>
              <td>{{$order->status}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </main>
</body>
  
@endsection