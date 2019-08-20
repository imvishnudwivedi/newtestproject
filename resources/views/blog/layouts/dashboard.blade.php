<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <meta name="_token" content="{!! csrf_token() !!}" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("/blog/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" media="all" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset("/blog/admin-lte/dist/css/AdminLTE.css")}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="{{ asset("/blog/admin-lte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />

    <link href="{{ asset("/blog/css/dropzone.min.css ")}}" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.4.8/select2-bootstrap.css" rel="stylesheet" type="text/css" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.4.8/select2.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset("/blog/css/bootstrap-select.min.css")}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>
<body class="skin-blue">
<div class="wrapper">

    <!-- Header -->
    @include('blog.layouts.header')

    <!-- Sidebar -->
    @include('blog.layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
              <p>Welcome Here!</p>
            </h1>
            <!-- You can dynamically generate breadcrumbs here -->
            {{-- <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol> --}}
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    @include('blog.layouts.footer')

</div><!-- ./wrapper -->
@section('script')
<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.3 -->
<script src="{{ asset ("/blog/tinymce/js/tinymce/tinymce.min.js") }}"></script>
<script src="{{ asset ("/blog/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ("/blog/admin-lte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/blog/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js") }}"></script>
<script src="{{ asset ("/blog/admin-lte/plugins/fastclick/fastclick.min.js") }}"></script>
<script src="{{ asset ("/blog/admin-lte/plugins/notify/bootstrap-notify.min.js") }}"></script>
<script src="{{ asset ("/blog/js/jquery.validate.js") }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset ("/blog/admin-lte/dist/js/app.min.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/blog/js/defaults.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/blog/js/multifilter.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/blog/js/moment.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/blog/js/bootstrap-select.min.js") }}"></script>

<script src="{{ asset ("/blog/js/dropzone.min.js") }}"></script>


<script type="text/javascript">
  $(function(){

     $('[data-toggle="popover"]').popover();
  });


  function addSelectPicker(id_array){
    for(var zq=0;zq<id_array.length;zq++){
    $('#'+id_array[zq]).selectpicker();
    }
  }
</script>
 @show

</body>
</html>