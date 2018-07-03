<!DOCTYPE html>
<html>

<head>
    <title>Dashboard | CMU Election System</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta content='text/html;charset=utf-8' http-equiv='content-type'>

    <link href="../../css/bootstrap-3/bootstrap.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../../css/light-theme.css" media="all" id="color-settings-body-color" rel="stylesheet" type="text/css" />
    <link href="../../css/theme-colors.css" media="all" rel="stylesheet" type="text/css" />

    <!-- additional-CSS -->
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
      <nav class='navbar navbar-default navcolor'>
        <a class='toggle-nav btn pull-left' href='#'>
            <i id='panel' class='icon-reorder'></i>
        </a>
          <a class='navbar-brand' href='main.php'>
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
                              <i class='icon-signout'></i>
                              Sign out
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
            <div class='navigation' id="LIST">
                <ul class='nav nav-stacked list' >
                    <li class='hidden'>
                        <a href='main.php' class="in">
                            <i class='icon-dashboard'></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class='hidden'>
                        <a href='user-account-list.php' class=""><i class='icon-user'></i>
                          <span>Users Account</span>
                        </a>
                    </li>
                    <!-- <li class='hidden'>
                        <a href='college-list.php'>
                            <i class='icon-group'></i>
                            <span>College</span>
                        </a>
                    </li> -->
                    <li class='hidden'>
                        <a href='student-list.php'>
                            <i class='icon-male'></i>
                            <span>Students</span>
                        </a>
                    </li>
                    <li class='hidden'>
                        <a href='partylist-list.php'>
                            <i class='icon-star'></i>
                            <span>Party List</span>
                        </a>
                    </li>
                    <li class='hidden'>
                        <a href='candidates-list.php'>
                            <i class='icon-group'></i>
                            <span>Candidates</span>
                        </a>
                    </li>
                    <li class='hidden'>
                        <a href='position-list.php'>
                            <i class='icon-reorder'></i>
                            <span>Electoral Position</span>
                        </a>
                    </li>
                    <li class='hidden'>
                        <a href='academic-program-list.php'>
                            <i class='icon-certificate'></i>
                            <span>Academic Program</span>
                        </a>
                    </li>
                    <li class='hidden'>
                        <a href='config-list.php'>
                            <i class='icon-cogs'></i>
                            <span>Election Configuration</span>
                        </a>
                    </li>

            </div>
        </nav>
        <section id="content">
            <div class="container">
              <br><br>
                <div class="row" id="content-wrapper">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-header">
                                    <h1 class="pull-left">
                                        <i class='icon-dashboard'></i>
                                        <span>Dashboard</span>
                                    </h1>

                            <i class="icon-time icon-x pull-right" id="time"></i>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box bg-light-blue hover-expand-effect">
                                    <div class="icon">
                                          <i class="icon-check-sign icon-5x"></i>
                                    </div>
                                    <div class="content">
                                        <div class="text"><strong>VOTED!</strong></div>
                                        <div class="number count-to" id="announcement-voted-heading">
                                        </div>
                                    </div>
                                </div>
                              </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box bg-red hover-expand-effect">
                                    <div class="icon">
                                          <i class="icon-unchecked icon-5x"></i>
                                    </div>
                                    <div class="content">
                                        <div class="text"><strong>NOT VOTED</strong></div>
                                        <div class="number count-to" id="announcement-notvoted-heading">
                                        </div>
                                    </div>
                                </div>
                              </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box bg-light-green hover-expand-effect">
                                    <div class="icon">
                                            <i class="icon-group icon-5x"></i>
                                    </div>
                                    <div class="content">
                                        <div class="text">TOTAL VOTERS</div>
                                        <div class="number count-to"  id="announcement-voters-heading">
                                        </div>
                                    </div>
                                </div>
                            </div>

                          </div>
                        </div>

                        <div id="Configure" class="row hidden">
                            <div class="col-sm-12">
                                <div class="box">
                                    <div class="box-header navcolor">
                                        <div class="title"><i class="icon-gears"></i> Election Configuration</div>
                                    </div>
                                    <div class="box-content">
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <h3>Current Election Term:
                                                    <span class="active_term" id="lblElectionTerm"></span>
                                                </h3>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="text-right">

                                                <!--    <a href="#passwordModal" data-toggle="modal" class="btn btn-md main-btn-block2 bg-blue waves-effect"><i class="icon-gears"></i> Refresh  Student List</a>-->

                                                        <a data-toggle="modal" data-target="#myModal" class="btn btn-md main-btn-block1 bg-blue  waves-effect"><i class="icon-check"></i> Configure</a>
                                                        </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-md" role="dialog">
                      <div class="modal-content">
                          <div class="modal-header navcolor">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-x5"></i></button>
                              <h3 class="modal-title"  id="defaultModalLabel">Election Configuration</h3>
                          </div>

                          <div class="modal-body">
                              <form method="post" action="#" accept-charset="UTF-8">
                              <div class="row clearfix">
                                  <div class="col-sm-12">
                                    <input id="authenticity_token" name="authenticity_token" type="hidden">
                                    <br>

                                    <div class="form-group">
                                        <label>Election Term:</label>
                                        <div class="form-line">
                                        <select class="form-control" id="cboElectionTerm">
                                        </select>
                                           <span class="help-inline"></span>
                                        </div>
                                    </div>
                                    <span style="font-style:italic; color:red;"><small>Note: Activating Election Term may take some time.. Please wait..</small></span>

                                  </div>
                              </div>
                              </form>
                          </div>
                          <div class="modal-footer" style="margin-top:-20px;">
                            <div class="col-sm-8 col-sm-offset-4">
                              <button type="button" class="btn main-btn-block1 waves-effect " data-dismiss="modal">CLOSE</button>

                              <a href="javascript:activate_term();generate();" type="button" id="btn-save" class="btn main-btn-block2 bg-blue waves-effect "><i class="icon-check"></i> ACTIVATE</a>
                          </div>
                        </div>


                      </div>
                  </div>
                  </form>
            </div><!-- mymodal -->



            <div class="modal modal-static fade" id="processing-modal myModal" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center">
                                <img src="../../img/loading.gif" class="icon" />
                                <h4>Processing...</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<!-- REFRESH STUDENT LIST 
         <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                            <div class="box">
                                <div class="box-header navcolor">
                                    <div class="title">Refresh Student List Generator</div>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-x5"></i></button>

                                </div>
                                 <div class="box-content">
                                    <div id="generator" class="text-center hidden">
                                        <img src="../../img/loading.gif" class="icon" />
                                        <h4>Generating...</h4>
                                    </div>
                                    <div id="result" class="box-content box-statistic text-right">
                                      <h3 class="title text-error" id="lblgenerated">0</h3>
                                      <small>Generated</small>
                                      <div class="text-error icon-user align-left"></div>
                                    </div>
                                    <span class="help-inline" style="font-style:italic; color:red;"><small>Note: Refreshing Student List may take some time.. Please wait..</small></span>
                                </div>
                            </div>
                        <div class="modal-footer">
                            <div class="col-sm-8 col-sm-offset-4">
                            <button type="button" class="btn s-btn-block1 waves-effect" onclick="javascript:stop_generate();">CLOSE</button>
                            <button onclick="javascript:generate()" id="btn-generate" type="button" class="btn bg-blue s-btn-block2 waves-effect">
                                <i class="icon-save"></i> START GENERATE
                            </button>
                          </div>
                        </div> -->
                    </div>  

                </div>

            </div>

    <script type="text/javascript" src="assets/datetime.js"></script>
    <script src="../../lib/jquery/jquery-2.0.0.min.js" type="text/javascript"></script>
    <script src="../../lib/jquery/jquery.mobile.custom.min.js" type="text/javascript"></script>
    <script src="../../lib/jquery/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="../../lib/jquery/jquery-ui.min.js" type="text/javascript"></script>
    <script src="../../lib/plugins/jquery_ui_touch_punch/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
    <script src="../../lib/bootstrap-3/bootstrap.js" type="text/javascript"></script>
    <script src="../../lib/plugins/modernizr/modernizr.min.js" type="text/javascript"></script>
    <script src="../../lib/plugins/retina/retina.js" type="text/javascript"></script>
    <script src="../../lib/theme.js" type="text/javascript"></script>
    <script src="../../lib/demo.js" type="text/javascript"></script>
    <script src="../../lib/plugins/validate/jquery.validate.min.js" type="text/javascript"></script>
    <script src="../../lib/plugins/validate/additional-methods.js" type="text/javascript"></script>

    <!-- Additional JS -->
    <script src="../../lib/plugins/node-waves/waves.js"></script>
    <script src="../../lib/plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="../../css/js/admin.js"></script>
    <script src="../../css/js/pages/ui/animations.js"></script>

    <script type="text/javascript" src="../../js/dashboard.js"></script>
</body>

</html>
