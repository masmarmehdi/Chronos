<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('layouts.header')
    @include('layouts.sidebar')
    @section('main-content')
    @show
    @include('layouts.footer')
</div>
</body>
</html>
