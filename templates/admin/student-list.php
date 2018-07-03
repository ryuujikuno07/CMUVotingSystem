<!DOCTYPE html>
<html>

<head>
    <title>Students | CMU Election System</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta content='text/html;charset=utf-8' http-equiv='content-type'>

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
          <link href="../../css/font.css" rel="stylesheet" type="text/css" />
          <link href="../../lib/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet" />

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
              <i class='icon-reorder'></i>
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
                            <a href='javascript:logout()'>
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
                <ul class='nav nav-stacked' id="LIST">
                    <li class='hidden'>
                        <a href='main.php'>
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
                        <a href='student-list.php' class="in">
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
                                        <i class="icon-male"></i>
                                        <span>Students</span>
                                    </h1>
                                     <i class="icon-time icon-x pull-right" id="time"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="box bordered-box orange-border" style="margin-bottom:0;">
                                    <div class="box-header navcolor">
                                        <div class="title"><i class="icon-table"></i> List of Student <i id="term"></i></div>
                                        <div class="actions" >
                                            
             <!--   <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:#ff80ff !important; font-weight:bold; color:black;">
                    Student Sort by (College)  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a onclick="javascript:fetch_all_studentCOT();">College of Technology</a></li>
                    <li><a onclick="javascript:fetch_all_studentCAS();">College of Arts and Sciences</a></li>
                    <li><a onclick="javascript:fetch_all_studentCOE();">College of Education</a></li>
                    <li><a onclick="javascript:fetch_all_studentCBA();">College of Business and Accountancy</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="javascript:fetch_all_student();refresh();">All Colleges</a></li>
                </ul>
                </div>  -->

                                        </div>
                                    </div>
                                    <div class="box-content box-no-padding">
                                        <div class="responsive-table">
                                            <div class="scrollable-area">
                                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                                    <div class="row datatables-top">
                                                        <div class="col-sm-12 text-left">
                                                            <div class="dataTables_filter" id="DataTables_Table_0_filter">


                                                                <label>Search:
                                                                    <input type="text" aria-controls="DataTables_Table_0" style="width: 200px;" class="form-control input-sm alpha" placeholder="Search... " name="txtSearch" id="txtSearch">
                                                                    <!-- <a href="javascript:search_student();" class="btn btn-sm btn-success"> Search </a> -->
                                                                    



                                                                    <a href="#passwordModal2" data-toggle="modal" class="btn btn-sm s-btn-block1 bg-red waves-effect"><i class="icon-gears"></i> Deactivate All Password </a>
                                                                <!--  <a href="#passwordModal" data-toggle="modal" class="btn btn-sm s-btn-block1 bg-blue waves-effect"><i class="icon-gears"></i> Refresh  Student List</a> -->
                                                                    <a href="student-print.php" class="btn btn-sm s-btn-block bg-blue waves-effect"><i class="icon-print"></i> Print </a>
                                                                    <button onclick="javascript:refresh()" class="btn btn-sm s-btn-block bg-blue waves-effect" type="button"><i class="icon-refresh"></i> Refresh</button>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <table class="data-table table table-bordered table-hover table-condensed dataTable" style="margin-bottom:0;" id="tbl_student" aria-describedby="DataTables_Table_0_info">
                                                        <thead>
                                                            <tr role="row">


                                                            <th style="width: 128px;">

                                                            </th>

                                                            <th class="sorting"  style="text-align:center;">
                                                                Status
                                                            </th>

                                                                <th style="text-align:center;" class="sorting">
                                                                    Student No.
                                                                </th>

                                                                <th style="text-align:center;" class="sorting" >
                                                                    Full Name
                                                                </th>

                                                                <!--<th class="sorting" >
                                                                    Gender
                                                                </th>-->
                                                                <th style="text-align:center;" class="sorting">
                                                                    Course
                                                                </th> 
                                                               <th style="text-align:center;" class="sorting">
                                                                    College
                                                                </th>
                                                              <!--  <th class="sorting">
                                                                    Term
                                                                </th>
                                                                <th class="sorting">
                                                                    Password
                                                                </th>-->

                                                            </tr>
                                                        </thead>

                                                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                                                        </tbody>
                                                    </table>
                                                    <div class="row datatables-bottom">
                                                        <div class="col-sm-6">
                                                            <div class="dataTables_info" id="DataTables_Table_0_info">Showing 1 to 10 of 20 entries</div>
                                                        </div>
                                                        <div class="col-sm-6 text-left">
                                                            <div class="dataTables_paginate paging_bootstrap">
                                                                <!-- <ul class="pagination pagination-sm">
                                                                    <li class="prev disabled"><a href="#">← Previous</a>
                                                                    </li>
                                                                    <li class="active"><a href="#">1</a>
                                                                    </li>
                                                                    <li><a href="#">2</a>
                                                                    </li>
                                                                    <li class="next"><a href="#">Next → </a>
                                                                    </li>
                                                                </ul> -->
                                                                <div id="pagination" cellspacing="0">
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
                        </div>
                    </div>

        </section>

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

<!--        <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog">
              <form method="post">
                  <div class="modal-dialog modal-md" role="dialog">
                      <div class="modal-content">
                          <div class="modal-header pink-background">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-x5"></i></button>
                              <h3 class="modal-title" style="color:white;" id="defaultModalLabel">Student Information</h3>
                          </div>
                          <div class="modal-body">
                              <div class="row clearfix">
                                  <div class="col-sm-12">
                                    <input id="authenticity_token" name="authenticity_token" type="hidden">
                                    <br>
                                    <div class="form-group">
                                        <label>StudentID:</label>
                                        <div class="form-line">
                                          <input id="txtStudentID" name="txtStudentID" class="form-control user" maxlength="20" placeholder="Student ID" type="text">
                                          <span class="help-inline"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Password:</label>
                                        <div class="form-line">
                                          <input id="txtPassword" name="txtPassword" class="form-control user" placeholder="Password"
                                          maxlength="50" type="password">
                                          <span class="help-inline"></span>
                                        </div>
                                    </div>

                                      <div class="form-group">
                                          <label>First Name:</label>
                                          <div class="form-line">
                                            <input id="txtFirstName" name="txtFirstName" class="form-control alphabets" placeholder="First Name" type="text">
                                            <span class="help-inline"></span>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label>Middle Name:</label>
                                          <div class="form-line">
                                            <input id="txtMiddleName" name="txtMiddleName" class="form-control alphabets" maxlength="50" placeholder="Middle Initial" type="text">
                                            <span class="help-inline"></span>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label>Last Name:</label>
                                          <div class="form-line">
                                            <input id="txtLastName" name="txtLastName" class="form-control alphabets" maxlength="100" placeholder="Last Name" type="text">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label>Gender:</label>
                                          <div class="form-line">
                                            <select class="form-control valid" data-rule-required="true" id="chkGender" name="chkGender">
                                                <option id="1" value="1">Male</option>
                                                <option id="2" value="2">Female</option>
                                            </select>
                                             <span class="help-inline"></span>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label>Course:</label>
                                          <div class="form-line">
                                             <select class="form-control valid" data-rule-required="true" id="chckCourse" name="chckCourse">

                                            </select>
                                             <span class="help-inline"></span>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label>Term:</label>
                                          <div class="form-line">
                                              <select class="form-control valid" data-rule-required="true" id="chckTerm" name="chckTerm">
                                              </select>
                                               <span class="help-inline"></span>
                                          </div>
                                      </div>

                                  </div>
                              </div>
                          </div>
                          <div class="modal-footer" style="margin-top:-20px;">
                            <div class="col-sm-6 col-sm-offset-6">
                              <button onclick="javascript:save()" id="btn-save" type="submit" class="btn s-btn-block2 bg-blue btn-lg waves-effect" ><i class="icon-save"></i> SAVE CHANGES</button>
                              <button type="button" class="btn s-btn-block1 btn-lg waves-effect" data-dismiss="modal">CLOSE</button>
                          </div></div>
                      </div>
                  </div>
              </form>
              </div>

                </div>
              </div>
            </div>
          </div>
        </div
      </div
   </div> -->


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
                                <span class="help-inline">Note: Refreshing Student List may take some time.. Please wait..</span>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <div class="col-sm-8 col-sm-offset-4">
                        <button type="button" class="btn s-btn-block1 waves-effect" onclick="javascript:stop_generate();">CLOSE</button>
                        <button onclick="javascript:generate()" id="btn-generate" type="button" class="btn bg-blue s-btn-block2 waves-effect">
                            <i class="icon-save"></i> START GENERATE
                        </button>
                      </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="modal fade" id="passwordModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                        <div class="box">
                            <div class="box-header navcolor">
                                <div class="title">Deactivate All Student Password Generator</div>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-x5"></i></button>

                            </div>
                             <div class="box-content">
                                <div id="generator2" class="text-center hidden">
                                    <img src="../../img/loading.gif" class="icon" />
                                    <h4>Generating...</h4>
                                </div>
                                <div id="result2" class="box-content box-statistic text-right">
                                  <h3 class="title text-error" id="lblgenerated2">0</h3>
                                  <small>Generated</small>
                                  <div class="text-error icon-user align-left"></div>
                                </div>
                                <span class="help-inline">Note: Password generation may take some time.. Please wait..</span>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <div class="col-sm-8 col-sm-offset-4">
                        <button type="button" class="btn s-btn-block1 waves-effect" onclick="javascript:stop_generate2();">CLOSE</button>
                        <button onclick="javascript:generate2()" id="btn-generate2" type="button" class="btn bg-red s-btn-block2 waves-effect">
                            <i class="icon-save"></i> START GENERATE
                        </button>
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
                        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
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
        <script src="../../lib/tablesorter/jquery.tablesorter.js" type="text/javascript" ></script>
        <script src="../../lib/tablesorter/tables.js" type="text/javascript"></script>

        <script src="../../lib/jasny-bootstrap/js/jasny-bootstrap.js" type="text/javascript" /></script>
        <script src="../../lib/select2/select2.min.js" type="text/javascript"></script>

        <!-- Additional JS -->
        <script src="../../lib/plugins/node-waves/waves.js"></script>
        <script src="../../lib/plugins/bootstrap-notify/bootstrap-notify.js"></script>
        <script src="../../css/js/admin.js"></script>
        <script src="../../css/js/pages/ui/animations.js"></script>

        <script type="text/javascript" src="../../js/student.js"></script>
        <script type="text/javascript" src="../../js/validation.js"></script>
</body>

</html>
