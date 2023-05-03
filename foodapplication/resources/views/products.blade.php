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
        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin: 20px 0;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin: 20px 0;
        }
        .form-label {
            font-weight: bold;
        }
        .product {
            margin-top: 20px;
        }
        .product .card {
            border: none;
        }
        
    </style> 
<script>
    // Hide success message after 5 seconds
    setTimeout(function() {
      var successMessage = document.getElementById('success-message');
      if (successMessage) {
        successMessage.style.display = 'none';
      }
    }, 4000);
  
    // Hide error message after 5 seconds
    setTimeout(function() {
      var errorMessage = document.getElementById('error-message');
      if (errorMessage) {
        errorMessage.style.display = 'none';
      }
    }, 4000);
  </script>

<body>
    <header class="header">
        <h1>Product List</h1>
    </header>
    <main class="container my-5">
        <div class="row">
            @if ($errors->any())
              <div class="col-12">
                @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">{{$error}}</div>
                @endforeach
              </div>
            @endif
            @if(session()->has('success'))
              <div id="success-message" class="alert alert-success alert-dismissible">
                {{session('success')}}
              </div>
            @endif
            @if(session()->has('error'))
              <div id="error-message" class="alert alert-danger alert-dismissible">
                {{session('error')}}
              </div>
            @endif
            <div class="col-12 col-md-6">
                <div class="fs-5 fw-bold mb-2 text-decoration-underline">Add New Item</div>
                <form method="POST" action="{{route('product.add')}}" >
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" name="description" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" name="price" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image URL</label>
                        <input type="text" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
            <div class="col-12 col-md-6">
                <div class="fs-5 fw-bold mb-2 text-decoration-underline">List of All Items</div>
                <div class="products">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-8">
                                    <div class="fw-bold">{{$product->name}} | Price: {{$product->price}}$</div>
                                    <small>{{$product->description}}</small>
                                </div>
                                <div class="col-4">
                                    <img src="{{$product->image}}" width="100%" height="auto">
                                    <a href="{{route("product.delete")}}?id={{$product->id}}">Delete</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                </div>
            </div>
        </div>
    </main>
@endsection
