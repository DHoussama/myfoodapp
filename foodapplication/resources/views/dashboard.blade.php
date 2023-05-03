@extends('layout')
@section('content')


<style>
    body {
        background-color: #f1f1f1;
    }
    .header {
        background-color: #000;
        color: #fff;
        padding: 20px;
        text-align: center;
    }
    .container {
        max-width: 700px;
        margin: 0 auto;
        padding: 0 20px;
    }
    .list-group-item {
        margin-bottom: 20px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,.05);
    }
    .list-group-item .row {
        display: flex;
        align-items: center;
    }
    .list-group-item .col-6 {
        flex: 1;
    }
    .list-group-item .fw-bold {
        font-weight: bold;
    }
    .list-group-item .text-secondary {
        color: #6c757d;
        margin-bottom: 10px;
    }
    .form-floating {
        margin-bottom: 10px;
    }
    .btn {
        font-size: 16px;
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 20px;
    }
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        color: #fff;
    }
    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
    .alert-warning {
        background-color: #fff3cd;
        border-color: #ffeeba;
        color: #856404;
        padding: 10px;
        border-radius: 10px;
    }
</style>
</head>
<body>
<header class="header">
    <h1>New Orders</h1>
</header>
<main class="container my-5">
    <ul class="list-group">
        @forelse($orders as $order)
            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">
                        <div class="fw-bold">
                            <div class="text-secondary">
                                Order:
                            </div>
                            <ul class="list-unstyled mb-3">
                                @foreach($order->item_details as $item_details)
                                    <li>{{$item_details->name}}</li>
                                @endforeach
                            </ul>
                            <div >
                                <span class="text-secondary" >Address:</span>   <span style="list-unstyled mb-3">{{$order->destination_address}}</span>
                            </div>
                            <div >
                                <span class="text-secondary">Customer:</span> {{$order->customer_email}}
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <form action="{{route("order.assign")}}" method="POST">
                            @csrf
                            <div class="form-floating">
                                <input name="order_id" value="{{$order->id}}" hidden>
                                <select class="form-select" id="delivery_boy_email" name="delivery_boy_email"
                                        aria-label="Floating label select example">
                                    @foreach($delivery_boys as $delivery_boy)
                                        <option value="{{$delivery_boy->email}}">{{$delivery_boy->name}}</option>
                                    @endforeach
                                </select>
                                    <label for="delivery_boy_email">Select delivery boy</label>
                                </div>
                                <input type="submit" class="btn btn-success rounded-pill" value="Assign">
                            </form>
                        </div>
                    </div>
                </li>
            @empty
                <li class="list-group-item">
                    <div class="alert alert-warning">No new orders</div>
                </li>
            @endforelse
        </ul>
    </div>
</main>
</body>
@endsection
