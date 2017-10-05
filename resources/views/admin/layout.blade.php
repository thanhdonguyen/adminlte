<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Compose Message</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ url('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('admin/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ url('admin/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('admin/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ url('admin/css/skins/_all-skins.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url('admin/plugins/iCheck/flat/blue.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ url('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
   <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- <link rel="stylesheet" href="{{ url('admin/bower_components/select2/dist/css/select2.min.css') }}"> -->
  <link rel="stylesheet" href="{{ url('admin/css/magicsuggest-min.css') }}">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css" /> -->
  <!-- <link rel="stylesheet" href="{{ url('admin/plugins/iCheck/flat/blue.css') }}"> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <!-- Navbar-top -->

  @include('admin.include.navtop')

  </header>
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.include.sidebar')

  <!-- Content Wrapper. Contains page content -->
    @yield('content')
  <!-- /.content-wrapper -->
  @include('admin.include.footer')

  <!-- Control Sidebar -->
  @include('admin.include.aside')
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<!-- Bootstrap 3.3.7 -->
<!-- <script src="{{ url('admin/bower_components/jquery/dist/jquery.min.js') }}"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="{{ url('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ url('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ url('admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('admin/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('admin/js/demo.js') }}"></script>
<!-- iCheck -->
<script src="{{ url('admin/plugins/iCheck/icheck.min.js') }}"></script>
<!-- <script src="{{ url('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script> -->
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ url('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script src="{{ url('admin/js/magicsuggest-min.js') }}"></script>
<!-- DataTables -->
<script src="{{ url('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ url('admin/js/sweetalert.min.js') }}"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script> -->
<script type="text/javascript" src="{{ url('admin/js/admin.js') }}"></script>


<!-- Page Script -->
<!-- <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
      ajax : {
        url: '/api/mail',
        dataType : 'json',
        delay : 200,
        data : function(params){
          return{
            q : params.term,
            page : params.page
          };
        },
        processResults : function(data,params){
          params.page = params.page || 1;

          return{
            results : data.data,
            pagination: {
              more : (params.page * 10) < data.total
            }
          };
        }
      },
      mininumInputLenght : 1,
      tags: true,
      templateResult : function(repo){
        if(repo.loading) return repo.email;

        var markup = repo.email;

        return markup;
      },
      templateSelection :function(repo)
      {
        return repo.email;
      },
      escapeMarkup : function(markup ){return markup;}
    });
  });
</script> -->
</body>
</html>
