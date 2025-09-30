<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyStore</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>

            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('home')}}" class="nav-link">Home</a>
            </li>
            @auth
                @if(Auth::user()->role == 'admin')
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{route('admin.profile')}}" class="nav-link">Profile</a>
                    </li>
                @elseif(Auth::user()->role == 'user')
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{route('user.profile')}}" class="nav-link">Profile</a>
                    </li>
                @endif
            @endauth
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-none d-sm-inline-block">

            @guest
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('login')}}" class="nav-link">Login</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('register')}}" class="nav-link">Register</a>
                </li>
            @endguest
            <li class="nav-item d-none d-sm-inline-block">
                <i class="fas fa-shopping-cart nav-link" data-toggle="modal" data-target="#cart">Cart</i>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
            @auth
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="submit" style="border-style: none; background-color:white" class="nav-link" value="Log out">
                </form>
            @endauth
            </li>
        </ul>

    </nav>
    <!-- /.navbar -->
    <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <button class="clear-cart btn btn-danger"><i class="fas fa-trash"></i></button>
                </div>
                <form action="{{route('checkout.show')}}" method="get">
                    <div class="modal-body">
                        <table class="show-cart table">
                        </table>
                        <div align="right"><h4>Total price: <span class="total-cart"></span></h4></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Purchase</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
