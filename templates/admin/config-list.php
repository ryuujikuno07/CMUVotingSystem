<!DOCTYPE html>
<html>

<head>
    <title>Election Configuration | CMU Election System</title>
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
                   <!--  <li class='hidden'>
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
                        <a href='config-list.php' class="in">
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
                                        <i class="icon-cogs"></i>
                                        <span>Election Configuration</span>
                                    </h1>
                                     <i class="icon-time icon-x pull-right" id="time"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="box bordered-box purple-border" style="margin-bottom:0;">
                                    <div class="box-header navcolor">
                                        <div class="title"><i class="icon-table"></i> Election Configuration List</div>
                                    </div>
                                    <div class="box-content box-no-padding">
                                        <div class="responsive-table">
                                            <div class="scrollable-area">
                                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                                    <div class="row datatables-top">
                                                        <div class="col-sm-12 text-right">
                                                            <div class="dataTables_filter" id="DataTables_Table_0_filter">
                                                                <label>Search:
                                                                    <input type="text" id="txtSearch" name="txtSearch" style="width: 200px;" class="form-control input-sm alpha" placeholder="Search... ">
                                                                    <!-- <a href="javascript:search_config();" class="btn btn-sm btn-success"><i class="icon-search"></i> Search</a> -->
                                                                    <button onclick="javascript:commandToClear()" data-toggle="modal" data-target="#myModal" class="btn btn-sm ec-btn-block2 bg-blue waves-effect" type="button"><i class="icon-plus"></i>  Add Configuration</button>
                                                                    <a href="config-print.php" class="btn btn-sm ec-btn-block bg-blue waves-effect"><i class="icon-print"></i> Print</a>
                                                                    <button onclick="javascript:refresh();" class="btn btn-sm ec-btn-block bg-blue waves-effect"><i class="icon-refresh"></i> Refresh</button>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <table class="data-table table table-bordered table-hover  table-striped dataTable" style="margin-bottom:0; text-align:center;" id="tbl_config" aria-describedby="DataTables_Table_0_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting"  style="text-align: center;" >
                                                                    Election Name
                                                                </th>

                                                                <th class="sorting"  style="text-align: center;">
                                                                    Short Name
                                                                </th>
                                                                <th class="sorting"  style="text-align: center;">
                                                                    Election Term
                                                                </th>

                                                              <!--  <th class="sorting"  style="text-align: center;">
                                                                    Election Term From ALL Voters
                                                                </th>

                                                                <th class="sorting"  style="text-align: center;">
                                                                    Voters From (College)
                                                                </th>   -->

                                                                <th class="sorting"  style="text-align: center;">
                                                                    Election Date
                                                                </th>
                                                                <th class="sorting"  style="text-align: center;">
                                                                    Time Start
                                                                </th>
                                                                <th class="sorting"  style="text-align: center;">
                                                                    Time End
                                                                </th>
                                                                <th  role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 128px;  text-align: center;"></th>
                                                            </tr>
                                                        </thead>

                                                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                                                        </tbody>
                                                    </table>
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
                                                                <div id="pagination" cellspacing="0"></div>
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

        <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-md" role="dialog">
                      <div class="modal-content">
                          <div class="modal-header navcolor">
                              <button type="button" class="close" data-dismiss="modal" onclick="javascript:commandToClear();refresh();" aria-hidden="true"><i class="icon-remove icon-x5"></i></button>
                              <h3 class="modal-title" id="defaultModalLabel">Election Configuration</h3>
                          </div>

                          <div class="modal-body">
                              <form method="post" action="#" accept-charset="UTF-8">
                              <div class="row clearfix">
                                  <div class="col-sm-12">
                                    <input id="txtTermID" name="txtTermID" type="hidden">
                                    <br>

                                    <div class="form-group">
                                        <label>Election Name:</label>
                                        <div class="form-line">
                                          <input class="form-control alpha" placeholder="Election Name" id="txtElectionName" name="txtElectionName" maxlength="40" type="text" required>
                                          <span class="help-inline"></span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label>Short Name:</label>
                                        <div class="form-line">
                                          <input class="form-control alpha" placeholder="Short Name" id="txtShortName" name="txtShortName" maxlength="40" type="text" required>
                                          <span class="help-inline"></span>
                                        </div>
                                    </div>

                               <!--     <div class="form-group">
                                        <label class="control-label col-sm-4 col-xs-12">Vote For All :</label>
                                        <div class="col-sm-8 col-xs-12">
                                            <input class="form-control" type="checkbox" value="1" id="vfa" name="mycheckbox" onclick="selectOnlyThis(this)" required>
                                      </div>

                                        <label class="control-label col-sm-4 col-xs-12 with-gap">Vote For College:</label>
                                        <div class="col-sm-8 col-xs-12">
                                            <input class="form-control"  type="checkbox" value="2" id="vfc" name="mycheckbox" onclick="selectOnlyThis(this)" required>
                                        </div>
                                  </div>

                                  <br>

                                    <div class="form-group" id="selectDrop" style="display:none;">
                                        <label>Select Voters (College):</label>
                                          <div class="form-line">
                                            <select id="cboCollege" name="cboCollege" class="form-control">
                                            </select>
                                            <span class="help-inline"></span>
                                    </div>
                                  </div> -->


                                                                    <br>

                                      <div class="form-group">
                                          <label>School Year:</label>
                                          <div class="form-line">
                                            <input class="form-control alphabets2" id="txtSY" maxlength="4" name="txtSY" type="text" placeholder="Start School Year" readonly="true">
                                          </div>
                                        </div>

                                      <div class="form-group">
                                          <div class="form-line">
                                            <input class="form-control alphabets2" maxlength="4" id="txtSY2" name="txtSY2" type="text" placeholder="End School Year" readonly="true"/>
                                            <span class="help-inline"></span>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label>Election Date:</label>
                                          <div class="form-line">
                                            <input type="date" class="form-control" id="dtpElectionDate" name="dtpElectionDate" >
                                            <span class="help-inline"></span>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label>Time Start:</label>
                                          <div class="form-line">
                                            <input class="form-control" type="time" id="dtpTimeStart" name="dtpTimeStart">
                                            <span class="help-inline"></span>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label>Time End:</label>
                                          <div class="form-line">
                                            <input class="form-control" type="time" id="dtpTimeEnd" name="dtpTimeEnd">
                                            <span class="help-inline"></span>
                                          </div>
                                      </div>


                                  </div>
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer" style="margin-top:-20px;">
                            <div class="col-sm-6 col-sm-offset-6">
                              <button onclick="javascript:save();commandToClear();" type="button" class="btn ec-btn-block3 bg-blue btn-lg waves-effect" ><i class="icon-save"></i> SAVE CHANGES</button>
                              <button type="button" onclick="javascript:commandToClear();refresh();" class="btn ec-btn-block1 btn-lg waves-effect" data-dismiss="modal">CLOSE</button>
                          </div>
                        </div>


                      </div>
                  </div>
                  </form>
            </div><!-- myModal -->


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

        <script src="../../lib/tablesorter/jquery.tablesorter.js" type="text/javascript" ></script>
        <script src="../../lib/tablesorter/tables.js" type="text/javascript"></script>

        <!-- Additional JS -->
        <script src="../../lib/plugins/node-waves/waves.js"></script>
        <script src="../../lib/plugins/bootstrap-notify/bootstrap-notify.js"></script>
        <script src="../../css/js/admin.js"></script>
        <script src="../../css/js/pages/ui/animations.js"></script>

        <script src="../../js/config.js" type="text/javascript"></script>
        <script src="../../js/validation.js" type="text/javascript"></script>
</body>

</html>
