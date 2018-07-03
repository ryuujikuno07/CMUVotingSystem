<!DOCTYPE html>
<html>

<head>
    <title>User profile | CMU Election System</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta content='text/html;charset=utf-8' http-equiv='content-type'>

    <link href="../../css/bootstrap-3/bootstrap.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../../css/light-theme.css" media="all" id="color-settings-body-color" rel="stylesheet" type="text/css" />
    <link href="../../css/theme-colors.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../../css/demo.css" media="all" rel="stylesheet" type="text/css" />

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
        <nav class='navbar navbar-default'>
        <a class='toggle-nav btn pull-left' href='#'>
            <i class='icon-reorder'></i>
        </a>
        <a class='navbar-brand' href='main.php'>
           <img src="../../img/logodaw.png" height="50px" width="130px">
        </a>
            <ul class='nav'>
                <li class='dropdown dark user-menu'>
                    <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                        <span id="current_user" class='user-name'></span>
                        <b class='caret'></b>
                    </a>
                    <ul class='dropdown-menu'>
                        <li>
                            <a href='user_profile.php'>
                                <i class='icon-user'></i>
                                Profile
                            </a>
                        </li>
                        <li class='divider'></li>

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
            <div class='navigation'>
                <div class='search'>
                    <form action='' method='get'>
                        <div class='search-wrapper'>
                            <input value="" class="search-query form-control" placeholder="Search..." autocomplete="off" name="q" type="text" />
                            <button class='btn btn-link icon-search' name='button' type='submit'></button>
                        </div>
                    </form>
                </div>
                <ul class='nav nav-stacked' id="LIST">
                    <li class='hidden'>
                        <a href='main.php' class="in">
                            <i class='icon-dashboard'></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class='hidden'>
                        <a href='user-account-list.php'><i class='icon-user'></i>
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
        <section id='content'>
            <div class='container'>
              <br><br>
                <div class='row' id='content-wrapper'>
                    <div class='col-xs-12'>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='page-header'>
                                    <h1 class='pull-left'>
                                        <i class='icon-user'></i>
                                        <span>User profile</span>
                                    </h1>
                                </div>
                            </div>
                        </div>

                            <div class='col-sm-9 col-lg-12'>
                                <div class='box'>
                                    <div class='box-content box-double-padding'>
                                        <form class='form' style='margin-bottom: 0;'>
                                            <fieldset>
                                                <div class='col-sm-4'>
                                                    <div class='lead'>
                                                        <i class='icon-github text-contrast'></i>
                                                        Account Information
                                                    </div>
                                                </div>
                                                <div class='col-sm-7 col-sm-offset-1'>
                                                    <div class='form-group'>
                                                        <label>Username</label>
                                                      <div class='form-line'>
                                                        <input class='form-control' style="text-align:center;" id='txtusername' name="txtusername" placeholder='Username' type='text' readonly="true">
                                                    </div>
                                                </div>

                                                    <div class='form-group'>
                                                      <label>Password: </label>
                                                        <div class='form-line'>
                                                        <input class='form-control' id='txtPassword' name="txtPassword" style="text-align:center;" placeholder='Password' type='Password' readonly="true">
                                                    </div>
                                                  </div>


                                                </div>
                                            </fieldset>
                                            <hr class='hr-normal'>
                                            <fieldset>
                                                <div class='col-sm-4'>
                                                    <div class='lead'>
                                                        <i class='icon-user text-contrast'></i>
                                                        Personal Information
                                                    </div>
                                                </div>
                                                <div class='col-sm-7 col-sm-offset-1'>
                                                    <div class='form-group'>
                                                        <label>First name</label>
                                                      <div class='form-line'>
                                                        <input class='form-control' id='txtfirstname' style="text-align:center;" name="txtfirstname" placeholder='First name' type='text' readonly="true">
                                                    </div>
                                                  </div>

                                                    <div class='form-group'>
                                                        <label>Last name</label>
                                                      <div class='form-line'>
                                                        <input class='form-control' id='txtlastname' style="text-align:center;" name="txtlastname" placeholder='Last name' type='text' readonly="true">
                                                    </div>
                                                  </div>

                                                   <div class='form-group'>
                                                        <label>Middle name</label>
                                                      <div class='form-line'>
                                                        <input class='form-control' id='txtmiddlename' style="text-align:center;" name="txtmiddlename" placeholder='Middle name' type='text' readonly="true">
                                                      </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <!-- <div class='form-actions form-actions-padding' style='margin-bottom: 0;'>
                                                <div class='text-right'>
                                                    <div class='btn btn-primary btn-lg'>
                                                        <i class='icon-save'></i>
                                                        Save
                                                    </div>
                                                </div>
                                            </div> -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

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
    <script type="text/javascript" src="../../js/profile.js"></script>

    <!-- Additional JS -->
    <script src="../../lib/plugins/node-waves/waves.js"></script>
    <script src="../../lib/plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="../../css/js/admin.js"></script>
    <script src="../../css/js/pages/ui/animations.js"></script>
</body>

</html>
