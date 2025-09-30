<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Mystore</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @auth
            <div class="image">
                @if(Auth::user()->avatar == 'default.png')
                    <img src="/profile_pictures/default.png" class="img-circle elevation-2" alt="default user image">
                @else
                    <img src="/profile_pictures/{{Auth::user()->avatar}}" class="img-circle elevation-2" alt="{{Auth::user()->username}}'s avatar">
                @endif
            </div>
            <div class="info">
                @if(Auth::user()->role == 'admin')
                <a href="{{route('admin.profile')}}" class="d-block">{{Auth::user()->name}}</a>
                @elseif(Auth::user()->role == 'user')
                    <a href="{{route('user.profile')}}" class="d-block">{{Auth::user()->name}}</a>
                @endif
            </div>
            @endauth
        </div>


        <!-- Sidebar Menu -->

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <li class="nav-item">
                    @auth
                    @if(Auth::user()->role == 'admin')
                        <a href="{{route('admin.dashboard')}}" class="nav-link">
                            <i class="fas fa-tachometer-alt nav-icon"></i>
                            <p>Dashboard</p>
                        </a>
                    @endif
                    @endauth
                </li>
                <li class="nav-item">
                    @if(Auth::user()->role == 'admin')
                    <a href="{{route('product.show')}}" class="nav-link">
                        <i class="fab fa-product-hunt nav-icon"></i>
                        <p>Products</p>
                    </a>
                    @endif
                </li>
                @if(Auth::user()->role == 'admin')
                <li class="nav-item">
                    @auth
                        <a href="{{route('orders.show')}}" class="nav-link">
                            <i class="fas fa-receipt nav-icon"></i>
                                <p>Orders</p>
                        </a>
                </li>

                <li class="nav-item">
                    <a href="{{url('/admin/users')}}" class="nav-link">
                        <i class="fas fa-users nav-icon"></i>
                        <p>Users</p>
                    </a>
                </li>

                @endif
                @endauth
                <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Categories
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        @if(Auth::user()->role == 'admin')
                        <a href="{{route('category.show')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Category CRUD</p>
                        </a>
                        @endif
                    </li>
                    @foreach($categories as $category)
                    <li class="nav-item">
                        <a href="/category/{{$category->id}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{$category->name}}</p>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
