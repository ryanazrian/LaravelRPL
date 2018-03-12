<!DOCTYPE html>
<html>

@include('templates.partials._head')

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('templates.partials._header')  
  <!-- Left side column. contains the logo and sidebar -->
   @include('templates.partials._sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    @include('templates.partials._stats')
    @yield('content')
    {{-- @include('templates.partials._content') --}}
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('templates.partials._footer')
  <!-- Control Sidebar -->
  @include('templates.partials._aside')
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
 @include('templates.partials._script')
</body>
</html>
