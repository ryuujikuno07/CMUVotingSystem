<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Canvassing Login</title>

    <!-- Add custom CSS here -->
    <link href="../../css/sb-admin-2.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../../css/bootstrap-3/bootstrap.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../../css/light-theme.css" media="all" id="color-settings-body-color" rel="stylesheet" type="text/css" />
    <link href="../../css/theme-colors.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../../css/demo.css" media="all" rel="stylesheet" type="text/css" />


    <!-- Addtiontal CSS -->
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

<body class="login" style="background:pink;">

  <div class='container' >
      <div class='middle-row' id='content-wrapper'>
          <div class='middle-wrapper'>
              <div class='login-container-header'>
                  <div class='container'>
                      <div class='row'>
                          <div class='col-lg-12'>
                              <div class='text-center'>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <img src="../../img/cmu.png" style="height:600px;  margin-width:0px; margin-height:0px; width:26%; position:relative; right:0px; top:50px;">
                    <div class='col-sm-9 col-lg-9' style="left:320px; bottom:460px;">
              <div class='login-container' >
                <div class="container">
                          <div class='col-sm-5 col-sm-offset-4 col-md-5 col-md-offset-4 col-lg-5 col-lg-offset-4'>
                              <h1 class='text-center'><h1><b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <u> Canvassing System</u></b></h1>
                              <br>
                              <form class='validate-form' align="center">
                                  <div class='col-lg-12 col-md-12'>
                                  <div class='form-group'>
                                      <div class='controls with-icon-over-input'>
                                        <div class="form-line">
                                          <input value="" style="text-align:center;" maxlength="100" placeholder="Username" class="form-control user input-lg" data-rule-required="true" name="username" id="username" type="text" autofocus/>
                                          <span class="help-inline"></span>
                                          <i class='icon-user text-muted icon-2x'></i>
                                      </div>
                                      </div>
                                  </div>
                                </div>


                                  <div class='col-lg-12'>
                                  <div class='form-group'>
                                      <div class='controls with-icon-over-input'>
                                        <div class="form-line">
                                          <input value="" style="text-align:center;" maxlength="100" placeholder="Password" class="form-control user input-lg" data-rule-required="true" name="password" id="password" type="password" />
                                          <span class="help-inline"></span>
                                          <i class='icon-lock text-muted icon-2x'></i>
                                      </div>
                                      </div>
                                  </div>
                                </div>

                                <div class='col-lg-12'>
                                  <div class='form-group' id="ipdraw" style="display:none;">
                                      <div class='controls with-icon-over-input'>
                                          <div class="form-line tooltip-demo">
                                          <input value="localhost" style="text-align:center;" maxlength="100" placeholder="IP:localhost" class="form-control user input-lg" data-rule-required="true" name="server" id="server" type="text" />
                                          <i data-toggle="tooltip" data-placement="left" title="Hide IP Address" id="ip2" class='btn icon-globe text-muted icon-2x'></i>
                                          <span class="help-inline"></span>
                                      </div>
                                    </div>
                                  </div>
                                </div>


                                     <div class='tooltip-demo col-lg-1' style="right: 40px; ">
                                        <a data-toggle="tooltip" data-placement="left" title="Show IP Address" class="servers btn ip-btn-block" id="ip"><i class='icon-globe text-muted icon-2x' style="top: 10px; "></i></a>
                                        </div>

                                        <div class='col-lg-11' style="right: 20px;">
                                          
                                         <a href="javascript:login();" class='btn btn-block'><h5>SIGN IN</h5></a>

                                         </div>

                              </form>
                  </div>
              </div>
          </div>
        </div>


                  <div class='login-container-footer'>
                      <div class='container'>
                          <div class='row'>
                              <div class='col-sm-12'>
                                  <div class='text-center'>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>

    <div class="modal modal-static fade" id="processing-modal" role="dialog" aria-hidden="true">
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

    <div class="modal fade" id="errModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-danger">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">X</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">ERROR</h4>
                </div>
                <div class="modal-body">
                    <h1>WARNING: An error occured!</h1>
                    <blockquote>
                        <p id="error_message"></p>
                    </blockquote>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn main-btn-block waves-effect" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../../lib/jquery/jquery-2.0.0.min.js" type="text/javascript"></script>
    <script src="../../lib/bootstrap-3/bootstrap.js" type="text/javascript"></script>
    <script src="../../lib/plugins/modernizr/modernizr.min.js" type="text/javascript"></script>
    <script src="../../lib/plugins/retina/retina.js" type="text/javascript"></script>
    <script src="../../lib/plugins/validate/jquery.validate.min.js" type="text/javascript"></script>
    <script src="../../lib/plugins/validate/additional-methods.js" type="text/javascript"></script>

    <!-- Additional JS -->
    <script src="../../lib/sb-admin-2.js" type="text/javascript"></script>
    <script src="../../lib/plugins/node-waves/waves.js"></script>
    <script src="../../lib/plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="../../css/js/admin.js"></script>
    <script src="../../css/js/pages/ui/animations.js"></script>    <script type="text/javascript" src="../../lib/jquery/jquery-2.0.0.min.js"></script>
    <script type="text/javascript" src="../../lib/bootstrap/js/bootstrap.js"></script>

    <script type="text/javascript" src="../../js/canvass_signin.js"></script>
    <script type="text/javascript" src="../../js/validation.js"></script>
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->

    <script type="text/javascript">

    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
    </script>

</body>

</html>
