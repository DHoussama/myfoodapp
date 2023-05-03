@extends('layoutforlogin')
@section("title", "Login To Home Admin")
@section('content')
         <head>
    <title>Login Form</title>
    <style>
        body {
            background-image:  url({{ asset('/images/foodpic.jpg') }});
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            font-family: Arial, sans-serif;
            
        }
        
        .container {
            max-width: 500px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .card {
            background-color: rgba(0, 0, 0, 0.6);
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            padding: 20px;
        }
        
        .card-header {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-control {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
            background-color: rgba(255, 255, 255, 0.5);
            color: #fff;
        }
        
        .btn {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
            background-color: #3c3c3c;
            color: #fff;
            cursor: pointer;
        }
        
        .btn:hover {
            background-color: #000;
        }
        
        .card-header {
            color: #e91e63;
        }
        .text-danger {
            color: #ff0000;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h3 class="card-header">Welcome Back Home</h3>
            <form method="POST" action="">
                @csrf
                <div class="form-group">
                    <input type="text" placeholder="Email" id="email" class="form-control" name="email"
                           autofocus value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" id="password" class="form-control" name="password">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn">Log in</button>
                </div>
            </form>
        </div>
    </div>
</body>   
@endsection
    