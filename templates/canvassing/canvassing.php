<!DOCTYPE html>
<html>

<head>
    <title>Canvassing System | CMU Election System</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta content='text/html;charset=utf-8' http-equiv='content-type'>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap-3/bootstrap.css" media="all" rel="stylesheet" type="text/css" />
    <!-- Add custom CSS here -->
    <link href="../../css/light-theme.css" media="all" id="color-settings-body-color" rel="stylesheet" type="text/css" />
    <link href="../../css/theme-colors.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../../css/demo.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../../css/canvass.css" />
    <link rel="stylesheet" href="../../lib/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../lib/morris.js-0.5.1/morris.css" />

      <!-- additional CSS -->
        <link href="../../css/style.css" media="all" rel="stylesheet" type="text/css" />
        <!-- Waves Effect Css -->
        <link href="../../lib/plugins/node-waves/waves.css" rel="stylesheet" />
        <!-- Animation Css -->
        <link href="../../lib/plugins/animate-css/animate.css" rel="stylesheet" />
        <link href="../../css/font.css" rel="stylesheet" type="text/css">
        <link href="../../lib/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

<link rel="icon" type="image/png" href="../../img/logo1.png" />
    <!--[if lt IE 9]>
      <script src="assets/javascripts/ie/html5shiv.js" type="text/javascript"></script>
      <script src="assets/javascripts/ie/respond.min.js" type="text/javascript"></script>
    <![endif]-->
</head>

<body class='contrast-pink without-footer'>
  <header>
      <nav class='navbar navbar-default navcolor' >
      <a class='toggle-nav btn pull-left' href='#'>
          <i class='icon-reorder'></i>
      </a>
      <a class='navbar-brand' href='canvassing.php'>
         <img src="../../img/logoDaw.png" height="40px" width="200px">
      </a>
          <ul class='nav'>
              <li class='dropdown dark user-menu'>
                  <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                      <span id="current_user" class='user-name'></span>
                      <b class='caret'></b>
                  </a>
                  <ul class='dropdown-menu'>
                      <li>
                          <a href='javascript:logout();'>
                              <b class='glyphicon glyphicon-off'></b>
                              Log Out
                          </a>
                      </li>
                  </ul>
              </li>
          </ul>
      </nav>
  </header>

    <div id='wrapper'>
        <div id='main-nav-bg'></div>
        <nav id='main-nav'>
            <div class='navigation' id="lst_dashboard">
                <ul class='nav nav-stacked list pink-background' id="LIST">
                    <li class="nav-header">
                        <h3 align="center" style="color:white;">
                            <i class='icon-dashboard'></i>
                            <span>Dashboard</span>
                        </h3>
                    </li>
                    <li>
                        <a href="javascript:GenerateDashboard();"><i class="fa fa-angle-double-right"></i>
                          <span>Statistics Overview</span></a>
                    </li>
                    <li>
                        <a href="javascript:GenerateRankingResult();"><i class="fa fa-angle-double-right"></i>
                          <span>Ranking Result</span></a>
                    </li>
                    <li>
                        <a href="charts.php"><i class="fa fa-angle-double-right"></i>
                          <span>Canvassing Charts</span></a>
                    </li>
                  </ul>

                  <ul class='nav nav-stacked list pink-background'>
                    <li class="nav-header">
                        <h4 align="center" style="color:white;">
                          <i class="icon-list"></i>
                            <span>Candidate Positions</span>
                        </h4>
                    </li>
                  </ul>

                  <ul class='nav nav-stacked list' id="lstPositions">
                    <li class="hidden">
                      <i class="fa fa-angle-double-right"></i>
                      <span></span>
                    </li>
                    <li class="nav-header">
                        <h4 align="center" style="color:white;">
                            <i class="icon-time icon-x pull-right" ></i>
                            <span id="time"></span>
                        </h4>
                    </li>
                  </ul>

            </div>
        </nav>
      </div>


      <div class='container' id="content">
          <div class='row' id='content-wrapper'>
              <div class='col-xs-12'>
                  <div class='row'>
                      <div class='col-sm-12'>
                          </div>
                          <i class="icon-time icon-x pull-right" id="time"></i></div>                </div>
                                      </div>
                                      </div>
            </div>


      <!-- Bootstrap core JavaScript -->
      <script type="text/javascript" src="../../lib/jquery/jquery-2.0.0.min.js"></script>
      <script type="text/javascript" src="../../lib/bootstrap/js/bootstrap.js"></script>
      <script type="text/javascript" src="../../lib/raphael/raphael-min.js"></script>
      <script type="text/javascript" src="../../lib/morris.js-0.5.1/morris.min.js"></script>
      <script src="../../lib/jquery/jquery-migrate.min.js" type="text/javascript"></script>
      <script src="../../lib/jquery/jquery-ui.min.js" type="text/javascript"></script>
      <script src="../../lib/plugins/jquery_ui_touch_punch/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
      <script src="../../lib/plugins/modernizr/modernizr.min.js" type="text/javascript"></script>
      <script src="../../lib/plugins/retina/retina.js" type="text/javascript"></script>
      <script src="../../lib/theme.js" type="text/javascript"></script>
      <script src="../../lib/demo.js" type="text/javascript"></script>
      <script src="../../lib/plugins/validate/jquery.validate.min.js" type="text/javascript"></script>
      <script src="../../lib/plugins/validate/additional-methods.js" type="text/javascript"></script>

    <!-- Additional JS -->
    <script type="text/javascript" src="assets/datetime.js"></script>
    <script src="../../lib/plugins/node-waves/waves.js"></script>
    <script src="../../lib/plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="../../css/js/admin.js"></script>
    <script src="../../css/js/pages/ui/animations.js"></script>

    <script type="text/javascript" src="../../js/canvassing.js"></script>
</body>

</html>
