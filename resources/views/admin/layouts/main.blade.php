<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.partials.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  @include('admin.partials.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->

    @yield('content')

  </div>

  <!-- Main footer -->
@include('admin.partials.footer')

<!-- jQuery -->

@stack('scripts')
</body>
</html>
