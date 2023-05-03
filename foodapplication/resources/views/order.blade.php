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
    <h1>History of orders</h1>
</header>
<main class="container my-5" style="max-width: 900px">
    <div class="row">
      <div class="col-12">
        <table class="table table-bordered border-secondary">
          <thead>
            <tr>
              <th style="background-color: #d9e4f4">Order ID</th>
              <th style="background-color: #d9e4f4">Order items</th>
              <th style="background-color: #d9e4f4">Customer email</th>
              <th style="background-color: #d9e4f4">Customer address</th>
              <th style="background-color: #d9e4f4">Delivery email</th>
              <th style="background-color: #d9e4f4">Order status</th>
            </tr>
          </thead>
          <tbody>
            <header>
              <h1>Open Orders:</h1>
          </header>
            @foreach($orders as $order)
            @if ( $order->status == 'open' )
            <tr>
              <td>{{$order->id}}</td>
              <td>
                @foreach($order->item_details as $item_details)
                <div>{{$item_details->name}}</div>
                @endforeach
              </td>
              <td>{{$order->customer_email}}</td>
              <td>{{$order->destination_address}}</td>
              <td>{{$order->delivery_boy_email}}</td>
              <td>{{$order->status}}</td>
            </tr>
            @endif          
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <main class="container my-5" style="max-width: 900px">
    <div class="row">
      <div class="col-12">
        <table class="table table-bordered border-secondary">
          <thead>
            <tr>
              <th style="background-color: #d9e4f4">Order ID</th>
              <th style="background-color: #d9e4f4">Order items</th>
              <th style="background-color: #d9e4f4">Customer email</th>
              <th style="background-color: #d9e4f4">Customer address</th>
              <th style="background-color: #d9e4f4">Delivery email</th>
              <th style="background-color: #d9e4f4">Order status</th>
            </tr>
          </thead>
          <tbody>
            <header>
              <h1>Assigned Orders:</h1>
          </header>
            @foreach($orders as $order)
            @if ( $order->status == 'assigned' )
            <tr>
              <td>{{$order->id}}</td>
              <td>
                @foreach($order->item_details as $item_details)
                <div>{{$item_details->name}}</div>
                @endforeach
              </td>
              <td>{{$order->customer_email}}</td>
              <td>{{$order->destination_address}}</td>
              <td>{{$order->delivery_boy_email}}</td>
              <td>{{$order->status}}</td>
            </tr>
            @endif          
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </main>
  <main class="container my-5" style="max-width: 900px">
    <div class="row">
      <div class="col-12">
        <table class="table table-bordered border-secondary">
          <thead>
            <tr>
              <th style="background-color: #d9e4f4">Order ID</th>
              <th style="background-color: #d9e4f4">Order items</th>
              <th style="background-color: #d9e4f4">Customer email</th>
              <th style="background-color: #d9e4f4">Customer address</th>
              <th style="background-color: #d9e4f4">Delivery email</th>
              <th style="background-color: #d9e4f4">Order status</th>
            </tr>
          </thead>
          <tbody>
            <header>
              <h1>Delivered Orders:</h1>
          </header>
            @foreach($orders as $order)
            @if ( $order->status == 'delivered' )
            <tr>
              <td>{{$order->id}}</td>
              <td>
                @foreach($order->item_details as $item_details)
                <div>{{$item_details->name}}</div>
                @endforeach
              </td>
              <td>{{$order->customer_email}}</td>
              <td>{{$order->destination_address}}</td>
              <td>{{$order->delivery_boy_email}}</td>
              <td>{{$order->status}}</td>
            </tr>
            @endif          
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </main>
</body>
  
@endsection