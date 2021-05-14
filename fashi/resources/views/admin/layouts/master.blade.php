<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thememinister.com/crm/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jun 2019 11:06:57 GMT -->
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <base href="{{ asset('')}}">
      <meta name="csrf-token" content="{{csrf_token()}}">
      <title>CRM Admin Panel</title>

      <!-- Favicon and touch icons -->
      <link rel="shortcut icon" href="admin_assets/dist/img/ico/favicon.png" type="image/x-icon">
      <!-- Start Global Mandatory Style
         =====================================================================-->
      <!-- jquery-ui css -->
      <link href="admin_assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap -->
      <link href="admin_assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap rtl -->
      <!--<link href="admin_assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
      <!-- Lobipanel css -->
      <link href="admin_assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pace css -->
      <link href="admin_assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>
      <!-- Font Awesome -->
      <link href="admin_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pe-icon -->
      <link href="admin_assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
      <!-- Themify icons -->
      <link href="admin_assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
      <link href="admin_assets/style.css" rel="stylesheet" type="text/css"/>
      <!-- End Global Mandatory Style
         =====================================================================-->
      <!-- Start page Label Plugins
         =====================================================================-->
      <!-- Emojionearea -->
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
      <link href="admin_assets/plugins/emojionearea/emojionearea.min.css" rel="stylesheet" type="text/css"/>
      <!-- Monthly css -->
      <link href="admin_assets/plugins/monthly/monthly.css" rel="stylesheet" type="text/css"/>
      <!-- End page Label Plugins
         =====================================================================-->
      <!-- Start Theme Layout Style
         =====================================================================-->
      <!-- Theme style -->
      <link href="admin_assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
      <!-- Theme style rtl -->
      <!--<link href="admin_assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
      <!-- End Theme Layout Style
         =====================================================================-->
   </head>
   <body class="hold-transition sidebar-mini">
        @include('admin.layouts.header')
         <!-- =============================================== -->
         <!-- Left side column. contains the sidebar -->
         @include('admin.layouts.sidebar')
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
        @yield('content')
            <!-- /.content-wrapper -->
        @include('admin.layouts.footer')

      <!-- /.wrapper -->
      <!-- Start Core Plugins
         =====================================================================-->
      <!-- jQuery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      {{-- <script src="admin_assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script> --}}
      <!-- jquery-ui -->
      <script src="admin_assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
        $( function() {
            $( "#datepicker" ).datepicker({
                minDate:0,
                dateFormat:'yy-mm-dd',
            });
        } );
        </script>
      <!-- Bootstrap -->
      <script src="admin_assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <!-- lobipanel -->
      <script src="admin_assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
      <!-- Pace js -->
      <script src="admin_assets/plugins/pace/pace.min.js" type="text/javascript"></script>
      <!-- SlimScroll -->
      <script src="admin_assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript">    </script>
      <!-- FastClick -->
      <script src="admin_assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
      <!-- CRMadmin frame -->
      <script src="admin_assets/dist/js/custom.js" type="text/javascript"></script>
      {{-- Modal --}}
      <script src="admin_assets/plugins/modals/classie.js" type="text/javascript"></script>
      <script src="admin_assets/plugins/modals/modalEffects.js" type="text/javascript"></script>

      <!-- End Core Plugins
         =====================================================================-->
      <!-- Start Page Lavel Plugins
         =====================================================================-->
      <!-- ChartJs JavaScript -->
      <script src="admin_assets/plugins/chartJs/Chart.min.js" type="text/javascript"></script>
      <!-- Counter js -->
      <script src="admin_assets/plugins/counterup/waypoints.js" type="text/javascript"></script>
      <script src="admin_assets/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
      <!-- Monthly js -->
      <script src="admin_assets/plugins/monthly/monthly.js" type="text/javascript"></script>
      <!-- End Page Lavel Plugins
         =====================================================================-->
      <!-- Start Theme label Script
         =====================================================================-->
      <!-- Dashboard js -->
      <script src="admin_assets/dist/js/dashboard.js" type="text/javascript"></script>
      <script src="admin_assets/js/canvasjs.min.js" type="text/javascript"></script>

      <!-- End Theme label Script
         =====================================================================-->
        <script type="text/javascript" charset="utf8" src="admin_assets/js/jquery.dataTables.js"></script>
      <script>
        $(document).ready( function () {
            $('#table_id').DataTable({
                "paging": false,
            });
        } );
      </script>

      <link rel="stylesheet" href="admin_assets/css/bootstrap-toggle.css">
      <script src="admin_assets/js/bootstrap-toggle.js"></script>
      @include('sweetalert::alert')


@yield('script')
   </body>

<!-- Mirrored from thememinister.com/crm/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jun 2019 11:08:11 GMT -->
</html>

