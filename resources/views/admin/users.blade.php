@extends('layouts.app')
@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item">Users</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card-body">
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{Session::get('success')}}
                    </div>
                @elseif(Session::has('fail'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{Session::get('fail')}}
                    </div>
                @endif
                <div class="table-responsive">

                    <table id="example2" class="table table-bordered table-hover">
                        <thead clas="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($users as $user)
                            <tr class="content-wrapper">
                                <td>{{$user->id}}</td>
                                <td><img src="/profile_pictures/{{$user->avatar}}" width="100" height="auto"></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>{{$user->updated_at}}</td>
                            </tr>

                        @endforeach



                        </tbody>
                    </table>

                </div>
                <div align="center">{{ $users->links() }}</div>

            </div>
        </section>
        <!-- /.content -->
    </div>  <!-- /.content-wrapper -->
@endsection
