<!DOCTYPE html>
<html>

<head>
    <title>Users Account | Voting System</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta content='text/html;charset=utf-8' http-equiv='content-type'>
    <meta content='Flat administration template for Twitter Bootstrap. Twitter Bootstrap 3 template with Ruby on Rails support.' name='description'>
    <link href='../../meta_icons/favicon.ico' rel='shortcut icon' type='image/x-icon'>
    <link href='../../meta_icons/apple-touch-icon.png' rel='apple-touch-icon-precomposed'>
    <link href='../../meta_icons/apple-touch-icon-57x57.png' rel='apple-touch-icon-precomposed' sizes='57x57'>
    <link href='../../meta_icons/apple-touch-icon-72x72.png' rel='apple-touch-icon-precomposed' sizes='72x72'>
    <link href='../../meta_icons/apple-touch-icon-114x114.png' rel='apple-touch-icon-precomposed' sizes='114x114'>
    <link href='../../meta_icons/apple-touch-icon-144x144.png' rel='apple-touch-icon-precomposed' sizes='144x144'>
    <link href="../../css/bootstrap-3/bootstrap.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../../css/light-theme.css" media="all" id="color-settings-body-color" rel="stylesheet" type="text/css" />
    <link href="../../css/theme-colors.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../../css/demo.css" media="all" rel="stylesheet" type="text/css" />

<link rel="icon" type="image/png" href="../../img/logo1.png" />
    <!--[if lt IE 9]>
      <script src="assets/javascripts/ie/html5shiv.js" type="text/javascript"></script>
      <script src="assets/javascripts/ie/respond.min.js" type="text/javascript"></script>
    <![endif]-->
</head>

<body class='contrast-red without-footer'>
    <header>
        <nav class='navbar navbar-default'>
            <a class='navbar-brand' href='main.php'>
            <img src="../../img/logodaw.png" height="50px" width="150px">
            </a>
            <a class='toggle-nav btn pull-left' href='#'>
                <i class='icon-reorder'></i>
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
                        <li>
                            <a href='user_profile.php'>
                                <i class='icon-cog'></i>
                                Settings
                            </a>
                        </li>
                        <li class='divider'></li>
                        <li>
                            <a href='login.php'>
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
                    <form action='http://www.bublinastudio.com/flattybs3/search_results.php' method='get'>
                        <div class='search-wrapper'>
                            <input value="" class="search-query form-control" placeholder="Search..." autocomplete="off" name="q" type="text" />
                            <button class='btn btn-link icon-search' name='button' type='submit'></button>
                        </div>
                    </form>
                </div>
                <ul class='nav nav-stacked'>
                    <li class=''>
                        <a href='main.php'>
                            <i class='icon-dashboard'></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class=''>
                        <a href='user-accounts.php'><i class='icon-user'></i>
                <span>Users Account</span>
              </a>
                    </li>
                    <!-- <li>
                        <a href='college-list.php'>
                            <i class='icon-group'></i>
                            <span>College</span>
                        </a>
                    </li> -->
                    <li class=''>
                        <a href='student-list.php' class="in">
                            <i class='icon-male'></i>
                            <span>Students</span>
                        </a>
                    </li>
                    <li>
                        <a href='partylist-list.php'>
                            <i class='icon-star'></i>
                            <span>Party List</span>
                        </a>
                    </li>
                    <li class=''>
                        <a href='candidates-list.php'>
                            <i class='icon-group'></i>
                            <span>Candidates</span>
                        </a>
                    </li>
                    <li>
                        <a href='position-list.php'>
                            <i class='icon-reorder'></i>
                            <span>Electoral Position</span>
                        </a>
                    </li>
                    <li>
                        <a href='academic-program-list.php'>
                            <i class='icon-certificate'></i>
                            <span>Academic Program</span>
                        </a>
                    </li>
                    <li>
                        <a href='config-list'>
                            <i class='icon-cogs'></i>
                            <span>Election Configuration</span>
                        </a>
                    </li>
            </div>
        </nav>
        <section id="content">
            <div class="container">
                <div class="row" id="content-wrapper">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-header">
                                    <h1 class="pull-left">
                                        <i class="icon-male"></i>
                                        <span>Students</span>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="box">
                                    <div class="box-header green-background">
                                        <div class="title">Student Information</div>
                                        <div class="actions">
                                            <a class="btn box-remove btn-xs btn-link" href="#">
                                            </a>

                                            <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                        </a>
                                        </div>
                                    </div>
                                    <div class="box-content">
                                        <form class="form form-horizontal" style="margin-bottom: 0;" method="post" action="#" accept-charset="UTF-8">
                                            <input name="authenticity_token" type="hidden">
                                            <div class="form-group">
                                                <label class="control-label col-sm-3 col-xs-12">Student ID :</label>
                                                <div class="col-sm-8 col-xs-12">
                                                    <input class="form-control" placeholder="Student ID" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-3 col-xs-12">Password :</label>
                                                <div class="col-sm-8 col-xs-12">
                                                    <input class="form-control" placeholder="Password" type="password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-3 col-xs-12">Full Name :</label>
                                                <div class="col-sm-8 col-xs-12">
                                                    <input class="form-control" placeholder="Full Name" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-3 col-xs-12">Gender :</label>
                                                <div class="col-sm-8 col-xs-12">
                                                    <input class="form-control" placeholder="Gender" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-3 col-xs-12">Program ID :</label>
                                                <div class="col-sm-8 col-xs-12">
                                                    <input class="form-control" placeholder="Program ID" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-3 col-xs-12">College :</label>
                                                <div class="col-sm-8 col-xs-12">
                                                    <select class="form-control valid" data-rule-required="true" id="validation_select" name="validation_select">
                                                        <option></option>
                                                        <option>CSE</option>
                                                        <option>BSBA</option>
                                                        <option>SMFT</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-3 col-xs-12">Team :</label>
                                                <div class="col-sm-8 col-xs-12">
                                                    <select class="form-control valid" data-rule-required="true" id="validation_select" name="validation_select">
                                                        <option></option>
                                                        <option>Team A</option>
                                                        <option>Team B</option>
                                                        <option>Team C</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-4">
                                                    <button href="college-list.php" class="btn btn-success btn-block btn-lg" type="submit">
                                                        <i class="icon-save"></i>
                                                        Save
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer id="footer">
                    <div class="footer-wrapper">
                        <div class="row">
                            <div class="col-sm-6 text">
                                Copyright © 2013 Your Project Name
                            </div>
                            <div class="col-sm-6 buttons">
                                <a class="btn btn-link" href="http://www.bublinastudio.com/flatty">Preview</a>
                                <a class="btn btn-link" href="https://wrapbootstrap.com/theme/flatty-flat-administration-template-WB0P6NR1N">Purchase</a>
                            </div>
                        </div>
                    </div>
                </footer>
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
</body>

</html>
