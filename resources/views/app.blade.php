<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Towerhouse portfolio</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/admin-assets/css/bootstrap.css')}}" rel="stylesheet"/>
    <!--external css-->
    <link href="{{ asset('/admin-assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin-assets/css/zabuto_calendar.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin-assets/js/gritter/css/jquery.gritter.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin-assets/lineicons/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin-assets/css/jquery-ui.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin-assets/css/jquery-ui.structure.css')}}"/>

    @section("css")
    @show

    <!-- Custom styles for this template -->
    <link href="{{ asset('/admin-assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('/admin-assets/css/style-responsive.css')}}" rel="stylesheet">
    <script src="{{ asset('/admin-assets/js/jquery-1.8.3.min.js')}}"></script>
    <script src="{{ asset('/admin-assets/js/chart-master/Chart.js')}}"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('/admin-assets/css/animate.css')}}">
    <link href="{{ asset('/admin-assets/css/froala_editor.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-assets/css/froala_style.min.css')}}" rel="stylesheet" type="text/css" />
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="/" class="logo"><b>{{ $_site['title'] }}</b></a>
            <!--logo end-->

            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="{{ url('/auth/logout') }}">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      @include("admin.common.sidebarmenu")

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          @yield('content')
      </section>

      <!--main content end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('/admin-assets/js/bootstrap.min.js')}}"></script>
    <script class="include" type="text/javascript" src="{{ asset('/admin-assets/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{ asset('/admin-assets/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{ asset('/admin-assets/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-assets/js/jquery.sparkline.js')}}"></script>
    <!--jquery-ui sortable-->
    <script src="{{ asset('/admin-assets/js/jquery-ui.js')}}"></script>

    <!--common script for all pages-->
    <script src="{{ asset('/admin-assets/js/common-scripts.js')}}"></script>

    <script type="text/javascript" src="{{ asset('/admin-assets/js/gritter/js/jquery.gritter.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/admin-assets/js/gritter-conf.js')}}"></script>

    <!--script for this page-->
    <script src="{{ asset('/admin-assets/js/sparkline-chart.js')}}"></script>
	<script src="{{ asset('/admin-assets/js/zabuto_calendar.js')}}"></script>

	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });

            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });


        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>

    <script src="{{ asset('/admin-assets/js/validator.js')}}"></script>
    @section("scripts")
    @show
  </body>
</html>