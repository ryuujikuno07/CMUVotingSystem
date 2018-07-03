<!DOCTYPE html>
<html>

<head>
    <title>Candidates | CMU Election System</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta content='text/html;charset=utf-8' http-equiv='content-type'>

    <link href="../../css/bootstrap-3/bootstrap.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../../css/light-theme.css" media="all" id="color-settings-body-color" rel="stylesheet" type="text/css" />
    <link href="../../css/theme-colors.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../../css/demo.css" media="all" rel="stylesheet" type="text/css" />
    <!-- <link href="../../lib/plugins/fileupload/jquery.fileupload-ui.css" media="all" rel="stylesheet" type="text/css" /> -->
     <link rel="stylesheet" href="../../lib/select2/select2.css">
     <link rel="stylesheet" href="../../lib/select2/select2-bootstrap.css">
    <link href="../../lib/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" type="text/css" />

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

<body class='contrast-pink'>
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
                    <form action='#' method='get'>
                        <div class='search-wrapper'>
                            <input value="" class="search-query form-control alpha" placeholder="Search..." autocomplete="off" name="q" type="text" />
                            <button class='btn btn-link icon-search' name='button' type='submit'></button>
                        </div>
                    </form>
                </div>
                <ul class='nav nav-stacked' id="LIST">
                    <li class=''>
                        <a href='main.php'>
                            <i class='icon-dashboard'></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class=''>
                        <a href='user-account-list.php'><i class='icon-user'></i>
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
                        <a href='student-list.php'>
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
                        <a href='candidates-list.php' class="in">
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
                                        <i class="icon-group"></i>
                                        <span>Candidates</span>
                                    </h1>
                                     <i class="icon-time icon-x pull-right" id="time"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="box bordered-box" style="margin-bottom:0;">
                                    <div class="box-header navcolor">
                                        <div class="title"><i class="icon-table"></i> List of Candidates <i id="term"></i></div>
                                    </div>
                                    <div class="box-content box-no-padding">
                                        <div class="responsive-table">
                                            <div class="scrollable-area">
                                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                                    <div class="row datatables-top">
                                                        <div class="col-sm-12 text-right">
                                                            <div class="dataTables_filter" id="DataTables_Table_0_filter">
                                                                <label>Search:
                                                                    <input id="searchValue" name="searchValue" type="text" aria-controls="DataTables_Table_0" style="width: 200px;" class="form-control input-sm alpha" placeholder="Search... ">
                                                                    <!-- <input onclick="javascript:search_candidate()" class="btn btn-sm btn-success alpha" value="search" type="button"> -->
                                                                    <button onclick="javascript:commandToClear()" data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-sm cand-btn-block2 bg-blue waves-effect"><i class="icon-plus"></i> Add Candidate</button>
                                                                    <a href="candidates-print.php" class="btn btn-sm cand-btn-block bg-blue waves-effect"><i class="icon-print"></i> Print</a>
                                                                    <a href="javascript:fetch_all_candidate('1');" class="btn btn-sm cand-btn-block bg-blue  waves-effect"><i class="icon-refresh"></i> Refresh</a>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                    <table class="data-table table-bordered table-hover table-striped dataTable" style="margin-bottom:0;" id="tbl_candidates">
                                                        <thead>
                                                            <tr role="row">
                                                                <th  class="sorting" style="text-align:center;">
                                                                    Photo
                                                                </th>
                                                                <th  class="sorting"  style="text-align:center;">
                                                                    Student ID
                                                                </th>
                                                                <th  class="sorting"  style="text-align:center;">
                                                                    Full Name
                                                                </th>
                                                                <th class="sorting" style="text-align:center;">
                                                                    Course
                                                                </th>
                                                                <th class="sorting"  style="text-align:center;">
                                                                    Position
                                                                </th>
                                                                <th class="sorting"  style="text-align:center;">
                                                                    Party List
                                                                </th>
                                                               
                                                            
                                                                <th class="sorting"  style="text-align:center;">
                                                                    Date and Time Registered
                                                                </th>
                                                                
                                                                <th role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 128px;" aria-label=": activate to sort column ascending"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                                                        </tbody>
                                                    </table>
                                                    </div> <!-- Div ng table -->


                                                    <div class="row datatables-bottom">
                                                        <div class="col-sm-6">
                                                            <div class="dataTables_info" id="DataTables_Table_0_info">Showing 1 to 10 of 20 entries</div>
                                                        </div>
                                                        <div class="col-sm-6 text-right">
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
            </div>
        </div>
      </section>

        <!-- MODAL FORM -->

        <div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                        <div class="box">
                            <div class="box-header navcolor">
                                <div class="title">Candidates Form</div>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-x5" ></i></button>
                            </div>
                            <div class="box-content">
                                <div class="row">
                                    <div class="col-sm-9 col-lg-9">
                                        <form class="form" style="margin-bottom: 0;" accept-charset="UTF-8">
                                            <input id="authenticity_token" name="authenticity_token" type="hidden" class="form-control alphabets">
                                                <input id="candidateID" name="candidateID" type="hidden"></input>
                                                <br>
                                                 <div class="form-group">
                                                    <label for="cboFaculty" class="col-sm-3 control-label">Student :</label>
                                                    <div class="col-sm-8 col-xs-12">
                                                        <!-- <select class="form-control valid" data-rule-required="true" id="cboStudent" name="cboStudent">
                                                        </select> -->
                                                        <input type="hidden" id="cboStudent" class="form-control valid alphabets"/>
                                                        <span class="help-inline alphabets"></span>
                                                        <!-- <input type="hidden" id="cboStudent" class="form-control">   -->
                                                    </div>
                                                </div>
                                                <br>
                                            <div class="form-group">
                                                <label class="control-label col-sm-3 col-xs-12">Student ID :</label>
                                                <div class="col-sm-8 col-xs-12">
                                                  <div class="form-line">

                                                    <input id="txtstudentID" name="txtstudentID" class="form-control alphabets" placeholder="Student ID" type="text" readonly>
                                                    <span class="help-inline"></span>
                                                </div>
                                              </div>
                                            </div>
                                            <br>

                                            <div class="form-group">
                                                <label class="control-label col-sm-3 col-xs-12">First Name :</label>
                                                <div class="col-sm-8 col-xs-12">
                                                  <div class="form-line">
                                                    <input id="txtfirstName" name="txtfirstName"   class="form-control alphabets" placeholder="First Name" type="text" readonly>
                                                    <span class="help-inline"></span>
                                                </div>
                                              </div>
                                            </div>
                                            <br>

                                            <div class="form-group">
                                                <label class="control-label col-sm-3 col-xs-12">Middle Name :</label>
                                                <div class="col-sm-8 col-xs-12">
                                                  <div class="form-line">
                                                    <input id="txtmiddleName" name="txtmiddleName"  class="form-control alphabets" placeholder="Middle Name" type="text" readonly>
                                                    <span class="help-inline"></span>
                                                </div>
                                              </div>
                                            </div>
                                            <br>

                                            <div class="form-group">
                                                <label class="control-label col-sm-3 col-xs-12">Last Name :</label>
                                                <div class="col-sm-8 col-xs-12">
                                                  <div class="form-line">
                                                    <input id="txtlastName"  name="txtlastName" class="form-control alphabets" placeholder="Last Name" type="text" readonly>
                                                    <span class="help-inline"></span>
                                                </div>
                                            </div>
                                          </div>
                                          <br>

                                          <!--  <div class="form-group">
                                                <label class="control-label col-sm-3 col-xs-12">Gender :</label>
                                                <div class="col-sm-8 col-xs-12">
                                                  <div class="form-line">
                                                     <input id="txtgender" name="txtgender"   class="form-control alphabets" placeholder="Gender" type="text" readonly>
                                                     <span class="help-inline"></span>
                                                </div>
                                            </div>
                                          </div> 
                                                <br>-->
                                          

                                            <div class="form-group">
                                                <label class="control-label col-sm-3 col-xs-12">Course :</label>
                                                <div class="col-sm-8 col-xs-12">
                                                  <div class="form-line">
                                                    <select id="chckCourse" name="chckCourse"   class="form-control alphabets" placeholder="Course" type="text" hidden="true "readonly>
                                                    </select>
                                                    <span class="help-inline"></span>
                                                </div>
                                            </div>
                                          </div>

                                            <br>
                                          <div class="form-group">
                                              <label class="control-label col-sm-3 col-xs-12">College :</label>
                                              <div class="col-sm-8 col-xs-12">
                                                <div class="form-line">
                                                  <select id="chckCollege" name="chckCollege"   class="form-control alphabets" placeholder="College" type="text" hidden="true "readonly>
                                                  </select>
                                                  <span class="help-inline"></span>
                                              </div>
                                          </div>
                                        </div>
                                          <br>
                                            <!-- <div class="form-group">
                                                <label class="control-label col-sm-3 col-xs-12">College :</label>
                                                <div class="col-sm-8 col-xs-12">
                                                    <select class="form-control valid" data-rule-required="true" id="chckCollege" name="chckCollege">

                                                    </select>
                                                    <span class="help-inline"></span>
                                                </div>
                                            </div> -->
                                            <div class="form-group">
                                                <label class="control-label col-sm-3 col-xs-12">Party List :</label>
                                                <div class="col-sm-8 col-xs-12">
                                                    <div class="form-line">
                                                    <select class="form-control"  data-rule-required="true" id="chckPartyList" name="chckPartyList">

                                                    </select>
                                                    <span class="help-inline"></span>
                                                  </div>
                                            </div>
                                          </div>
                                          <br>

                                            <div class="form-group">
                                                <label class="control-label col-sm-3 col-xs-12">Position :</label>
                                                <div class="col-sm-8 col-xs-12">
                                                  <div class="form-line">
                                                    <select class="form-control valid"   data-rule-required="true" id="chckPosition" name="chckPosition">
                                                    </select>
													                          <span class="help-inline"></span>
                                                  </div>
                                            </div>
                                          </div>
                                          <br>

                                            <div class="form-group">
                                                <label class="control-label col-sm-3 col-xs-12">Validation Date :</label>
                                                <div class="col-sm-3">
                                                  <div class="form-line">
                                                    <input id="ValidationDate" name="ValidationDate" class="form-control" type="date">
                                                    <span class="help-inline"></span>

                                                </div>
                                            </div>
                                          </div>

                                          <br>
                                            <div class="row">
                                                <div class="col-sm-6  col-sm-offset-6">
                                                <button type="button" class="btn cand-btn-block1 btn-lg waves-effect" data-dismiss="modal">CLOSE</button>
                                                &nbsp  &nbsp  &nbsp
                                                <button onclick="javascript:save()" id="btn-save" type="button" class="btn cand-btn-block2 bg-blue btn-lg waves-effect"><i class="icon-save"></i> SAVE CHANGES</button>
                                                <br>
                                                </div>
                                                <br>
                                            </div>
                                            <br>
                                        </form>
                                    </div>

                                    <div class="col-sm-3 col-lg-2">
                                        <div class="box">
                                            <form id="form" enctype="multipart/form-data">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img id="upimage" class="img-responsive " src="../../img/photo.jpg">
                                                  </div>
                                                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                                  <div>
                                                    <span class="btn btn-default btn-file">
                                                        <span class="fileinput-new waves-effect">Select image</span>
                                                        <span class="fileinput-exists waves-effect">Change</span>
                                                        <input id="reg_userfile" name="reg_userfile" value="../../img/photo.jpg" type="file">
                                                    </span>
                                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                  </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div> <!--col-sm-3 col-lg-2-->
                                </div>
                            </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


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



        <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-info  navcolor" >
                        <button type="button" class="close" onclick="javascript:hide_photo_uploader();">
                            <span aria-hidden="true">X</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Upload Candidate Photo</h4>
                    </div>
                    <div class="modal-body">
                        <div class='box box-nomargin'>
                            <div class='box-header navcolor'>
                              <div class='title'>Upload Photo</div>
                            </div>
                            <div class='box-content'>
                                <form id="form" enctype="multipart/form-data">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                      <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        <img id="upimage" class="img-responsive " src="../../img/photo.jpg">
                                      </div>
                                      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                      <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input id="userfile" name="userfile" type="file">
                                            <input id="hidden_candidate_id" name="hidden_candidate_id" type="hidden">
                                        </span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                      </div>
                                    </div>
                                    <button type="button" class="btn btn-primary" onclick="javascript:upload_pic();">Upload</button>
                                </form>
                            </div>
                        </div>
                        <center>

                        </center>
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
        <script src="../../lib/select2/select2.min.js" type="text/javascript"></script>
        <script src="../../lib/tablesorter/jquery.tablesorter.js" type="text/javascript" ></script>
        <script src="../../lib/tablesorter/tables.js" type="text/javascript"></script>
        <script src="../../lib/jasny-bootstrap/js/jasny-bootstrap.js" type="text/javascript" /></script>
        <!-- Additional JS -->
        <script src="../../lib/plugins/node-waves/waves.js"></script>
        <script src="../../lib/plugins/bootstrap-notify/bootstrap-notify.js"></script>
        <script src="../../css/js/admin.js"></script>
        <script src="../../css/js/pages/ui/animations.js"></script>
        <script type="text/javascript" src="../../js/candidate.js"></script>
        <script type="text/javascript" src="../../js/validation.js"></script>
</body>
</html>
