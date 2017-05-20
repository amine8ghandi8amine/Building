<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ getSetting( 'site-name' ) }} | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->

  {!! Html::style('dashboard/bootstrap/css/bootstrap.min.css') !!}

  {{--{!! Html::style('dashboard/bootstrap/css/bootstrap-rtl.min.css') !!}--}}
  <!-- Font Awesome -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  
  @yield('usefullStyleSheetBeforSkin')
  
  <!-- Theme style -->
  {!! Html::style('dashboard/dist/css/AdminLTE.min.css') !!}
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  {!! Html::style('dashboard/dist/css/skins/_all-skins.min.css') !!}



  @yield('usefullStyleSheet')
  

  {!! Html::style('cust/sweetAlert/sweetalert.css') !!}

  {!! Html::style('cust/select2/css/select2.css') !!}

  {!! Html::style('dashboard/custom.css') !!}
  @yield('styling')

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ route('admin-panel.index') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">ل . ت</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">لوحة التحكم</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    @include('admin.partials.navBar')
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  
  @include('admin.partials.aside')


  <!-- flash messages -->

  @include('admin.partials.flashMessage')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
  @include('admin.partials.footer')

  <!-- Control Sidebar -->
  @include('admin.partials.asideControl')
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
{!! Html::script('dashboard/plugins/jQuery/jquery-2.2.3.min.js') !!}
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
{!! Html::script('dashboard/bootstrap/js/bootstrap.min.js') !!}


@yield('usefullJS')


<!-- Slimscroll -->
{!! Html::script('dashboard/plugins/slimScroll/jquery.slimscroll.min.js') !!}


<!-- FastClick -->
{!! Html::script('dashboard/plugins/fastclick/fastclick.js') !!}

<!-- AdminLTE App -->
{!! Html::script('dashboard/dist/js/app.min.js') !!}

@yield('usefullJSTwo')

<!-- AdminLTE for demo purposes -->
{!! Html::script('dashboard/dist/js/demo.js') !!}

{!! Html::script('cust/sweetAlert/sweetalert-dev.js') !!}

{!! Html::script('cust/select2/js/select2.js') !!}


@yield('scripting')

</body>
</html>
