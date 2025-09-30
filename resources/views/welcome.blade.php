@extends('layouts.app')
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Home page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card card-solid">
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{Session::get('success')}}
                    </div>
                @elseif(Session::has('fail'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        @foreach(Session::get('fail') as $message => $error)
                            <p>{{"$message : $error[0]"}}</p>
                        @endforeach
                    </div>
                @endif
                <div class="card-body pb-0">
                    <div class="row d-flex align-items-stretch" >
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                <div class="card bg-light">
                                    <div class="card-header text-muted border-bottom-0">
                                    </div>
                                    <div class="card-body pt-0">
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>

                </div>
                <!-- /.card-body -->

            <!-- /.card-footer -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
