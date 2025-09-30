@extends('layouts.app')
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body pb-0">
                    <form name="sortProducts" id="sortProducts">
                        <div class="col-2 d-flex p-2 justify-content-end">
                            Sort:
                            <select name="sort" id="sort" class="form-select form-select-sm" aria-label="Default select example">
                                <option value="" selected disabled>Select</option>
                                <option value="product_latest" @if(isset($_GET['sort']) && $_GET['sort'] == 'product_latest') selected @endif>By Latest Products</option>
                                <option value="product_AZ" @if(isset($_GET['sort']) && $_GET['sort'] == 'product_AZ') selected @endif>From A-Z</option>
                                <option value="product_ZA" @if(isset($_GET['sort']) && $_GET['sort'] == 'product_ZA') selected @endif>From Z-A</option>
                                <option value="lowest_price" @if(isset($_GET['sort']) && $_GET['sort'] == 'lowest_price') selected @endif>By Lowest Price</option>
                                <option value="highest_price" @if(isset($_GET['sort']) && $_GET['sort'] == 'highest_price') selected @endif>By Highest Price</option>
                            </select>
                        </div>
                    </form>
                    <div class="row d-flex align-items-stretch">
                        @foreach($products as $product)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                <div class="card bg-light">
                                    <div class="card-header text-muted border-bottom-0">
                                        @foreach($categories as $category)
                                            @if($category->id == $product->category_id)
                                                {{$category->name}}
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="lead"><b>{{$product->name}}</b></h2>
                                                <p class="text-muted text-sm"><b>Description: </b> {{$product->description}}</p>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li><span class="fa-li"><i class="fas fa-tag"></i></span><b>Price:</b> {{$product->price}}$</li>
                                                </ul>
                                            </div>
                                            <div class=" col-12 text-center">
                                                <img src="/product_images/{{$product->image}}" alt="{{$product->name}}" class="img-fluid" width="1280" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <a href="{{route('product.detail', $product->id)}}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-info-circle "> More details</i>
                                            </a>
                                            <a href="#" class="btn btn-sm bg-teal add-to-cart" data-name="{{$product->name}}" data-price="{{$product->price}}" data-picture="{{$product->image}}" data-id="{{$product->id}}">
                                                <i class="fas fa-shopping-basket"> Add to cart</i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach



                    </div>


                </div>
                <!-- /.card-body -->
                <div class="card-footer " align="center">
                    {{$products->links()}}
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
