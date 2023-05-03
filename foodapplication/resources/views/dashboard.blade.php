@extends('layout')
@section('content')


<style>
    .body {
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
    <h1>New Orders</h1>
</header>
<main class="container my-5" style="max-width: 700px">
    <div>
        <ul class="list-group">
            @forelse($orders as $order)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-6">
                            <div class="fw-bold">
                                <ul class="list-unstyled mb-3">
                                    @foreach($order->item_details as $item_details)
                                        <li>{{$item_details->name}}</li>
                                    @endforeach
                                </ul>
                                <div class="text-secondary">
                                    Address: {{$order->destination_address}}
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <form action="{{route("order.assign")}}" method="POST">
                                @csrf
                                <div class="form-floating mb-3">
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

@endsection
