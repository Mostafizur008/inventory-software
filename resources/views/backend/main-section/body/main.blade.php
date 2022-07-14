<!DOCTYPE html>
<html lang="en">

<head>
@include('backend.code-section.js.header.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->

  @include('backend.code-section.others.pre-loader')

  <!-- Navbar -->
  @include('backend.main-section.body.header.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  @include('backend.main-section.body.sidebar.sidebar')

  <!-- Content Wrapper. Contains page content -->
   @yield('main')
  <!-- /.content-wrapper -->

   @include('backend.main-section.body.footer.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('backend.code-section.js.footer.foot')
@yield('scripts')

</body>
</html>
