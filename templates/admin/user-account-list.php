<!DOCTYPE html>
<html>

<head>
    <title>Users Account | CMU Election System</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta content='text/html;charset=utf-8' http-equiv='content-type'>

    <link href="../../css/bootstrap-3/bootstrap.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../../css/light-theme.css" media="all" id="color-settings-body-color" rel="stylesheet" type="text/css" />
    <link href="../../css/theme-colors.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../../css/demo.css" media="all" rel="stylesheet" type="text/css" />

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
                            <input value="" class="search-query form-control alpha" placeholder="Search..." maxlength="200" autocomplete="off" name="q" type="text" />
                            <button class='btn btn-link icon-search' name='button' type='submit'></button>
                        </div>
                    </form>
                </div>
                <ul class='nav nav-stacked' id="LIST">
                    <li class='hidden'>
                        <a href='main.php'>
                            <i class='icon-dashboard'></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class='hidden'>
                        <a href='user-account-list.php' class="in"><i class='icon-user'></i>
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
                                        <i class="icon-user"></i>
                                        <span>User Accounts</span>
                                    </h1>
                         <i class="icon-time icon-x pull-right" id="time"></i>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="box bordered-box green-border" style="margin-bottom:0;">
                                    <div class="box-header navcolor">
                                        <div class="title"><i class="icon-table"></i> List of Accounts</div>
                                    </div>
                                    <div class="box-content box-no-padding">
                                        <div class="responsive-table">
                                            <div class="scrollable-area">
                                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                                    <div class="row datatables-top">
                                                        <div class="col-sm-12 text-right">
                                                            <div class="dataTables_filter" id="DataTables_Table_0_filter">
                                                                <label>Search:
                                                                    <input id="searchValue" name="searchValue" type="text" aria-controls="DataTables_Table_0" style="width: 200px;" class="form-control input-sm alpha" maxlength="200"  placeholder="Search... ">
                                                                    <!-- <input onclick="javascript:search_user()" class="btn btn-sm btn-success" value="search" type="button"> -->
                                                                    <button onclick="javascript:commandtoClearUserAccount()" data-toggle="modal" data-target="#uapassModal"  class="btn btn-sm bg-blue user-btn-block waves-effect"><i class="icon-plus"></i> Add User</button>
                                                                    <a href="account-print.php" class="btn btn-sm bg-blue user-btn-block waves-effect"><i class="icon-print"></i> Print</a>
                                                                    <button onclick="javascript:refresh()" class="btn btn-sm bg-blue user-btn-block waves-effect" type="button"><i class="icon-refresh"></i> Refresh</button>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <table class="data-table table table-bordered table-hover  table-striped dataTable" style="margin-bottom:0;" id="tbl_user_account">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting">
                                                                    Name
                                                                </th>
                                                                <th class="sorting">
                                                                    Username
                                                                </th>
                                                                <th class="sorting">
                                                                    User Group
                                                                </th>
                                                                <th role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 128px;"></th>
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
                                                                <div id="Userpagination" cellspacing="0"></div>
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
                        </br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="box bordered-box green-border" style="margin-bottom:0;">
                                    <div class="box-header navcolor">
                                        <div class="title"><i class="icon-table"></i> List of User Groups</div>
                                    </div>
                                    <div class="box-content box-no-padding">
                                        <div class="responsive-table">
                                            <div class="scrollable-area">
                                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                                    <div class="row datatables-top">
                                                        <div class="col-sm-12 text-right">
                                                            <div class="dataTables_filter" id="DataTables_Table_0_filter">
                                                                <label>Search:
                                                                    <input id="searchValue1" name="searchValue1" type="text" aria-controls="DataTables_Table_0" style="width: 200px;" class="form-control input-sm alpha" maxlength="200" placeholder="Search... ">
                                                                    <!-- <input onclick="javascript:search_user_group()" class="btn btn-sm btn-success" value="search" type="button"> -->
                                                                    <button onclick="javascript:commandToClearUserGroup()" data-toggle="modal" data-target="#gapassModal" class="btn btn-sm bg-blue user-btn-block1 waves-effect"><i class="icon-plus"></i> Add User Group</button>
                                                                     <a href="UserGroup-print.php" class="btn btn-sm bg-blue user-btn-block waves-effect "><i class="icon-print"></i> Print</a>
                                                                    <button onclick="javascript:refresh()" class="btn btn-sm bg-blue user-btn-block waves-effect" type="button"><i class="icon-refresh"></i> Refresh</button>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <table class="data-table table table-bordered table-hover  table-striped dataTable" style="margin-bottom:0;" id="tbl_user_group" aria-describedby="DataTables_Table_0_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting">
                                                                    Group Name
                                                                </th>
                                                                <th class="sorting">
                                                                    Description
                                                                </th>
                                                                <th role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 128px;"></th>
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
                                                               <div id="Grouppagination" cellspacing="0"></div>
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

        <div class="modal fade bs-example-modal-lg" id="usersModal" tabindex="-1" role="document" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-md" role="dialog">
                      <div class="modal-content">
                          <div class="modal-header navcolor">
                              <button onclick="javascript:refresh();" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-x5"></i></button>
                              <h3 class="modal-title" id="defaultModalLabel">Users Information</h3>
                          </div>

                          <div class="modal-body">
                              <form method="post" action="#" accept-charset="UTF-8">
                              <div class="row clearfix">
                                  <div class="col-sm-12">
                                    <input id="authenticity_token" name="authenticity_token" type="hidden">
                                    <br>

                                    <div class="form-group">
                                        <label>User Group:</label>
                                        <div class="form-line">
                                          <select class="form-control valid" id="cboUserGroup" data-rule-required="true">
                                          </select>
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
                                            <span class="help-inline"></span>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label>Username:</label>
                                          <div class="form-line">
                                            <input id="txtUsername" name="txtUsername" class="form-control user" maxlength="100" placeholder="Username" type="text">
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
                                          <p style="font-size: 13px;font-weight:bold;color: #000;">Password should contain minimum of 6 characters</p>
                                      </div>

                                      <div class="form-group">
                                          <label>Confirm Password:</label>
                                          <div class="form-line">
                                            <input id="txtPassword2" name="txtPassword2" class="form-control user" maxlength="100" placeholder="Confirm Password" type="Password">
                                            <span class="help-inline"></span>
                                          </div>
                                      </div>

                                  </div>
                              </div>
                              </form>
                          </div>
                          <div class="modal-footer" style="margin-top:-20px;">
                            <div class="col-sm-6 col-sm-offset-6">
                              <button onclick="javascript:saveUserAccount();" id="btn-save" type="submit" class="btn user-btn-block3
                               bg-blue btn-lg waves-effect" ><i class="icon-save"></i> SAVE CHANGES</button>
                              <button onclick="javascript:refresh();" type="button" class="btn user-btn-block1 btn-lg waves-effect" data-dismiss="modal">CLOSE</button>
                          </div>
                        </div>


                      </div>
                  </div>
                  </form>
            </div><!-- users-modal -->


            <div class="modal fade bs-example-modal-lg" id="userGroupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-md" role="dialog">
                          <div class="modal-content">
                              <div class="modal-header navcolor">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-x5"></i></button>
                                  <h3 class="modal-title" id="defaultModalLabel">User Group Information</h3>
                              </div>

                              <div class="modal-body">
                                  <form method="post" action="#" accept-charset="UTF-8">
                                  <div class="row clearfix">
                                      <div class="col-sm-12">
                                        <input id="authenticationGroupID" name="authenticationGroupID" type="hidden">
                                        <br>
                                        <div class="form-group">
                                            <label>Group Name:</label>
                                            <div class="form-line">
                                              <input id="txtGroupName" name="txtGroupName" class="form-control mention alphabets" placeholder="Group Name" style="margin-bottom: 0;" maxlength="100" type="text">
                                              <span class="help-inline"></span>
                                            </div>
                                        </div>

                                          <div class="form-group">
                                              <label>Description:</label>
                                              <div class="form-line">
                                                <input id="txtDesc" name="txtDesc" class="form-control mention alphabets" placeholder="Description" maxlength="4000" style="margin-bottom: 0;" type="text">
                                                <span class="help-inline"></span>
                                              </div>
                                          </div>

                                          <div class="form-group">
                                              <label>Privilege:</label>

                                                <div class="checkbox">
                                                    <label>
                                                      <input id="chckDashBoard" name="chckDashBoard" value="1" type="checkbox"> <strong>DashBoard</strong>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                      <input id="chckUserAcc" name="chckUserAcc" value="1" type="checkbox"> <strong>Users Account</strong>
                                                    </label>
                                                </div>
                                               <!--  <div class="checkbox">
                                                    <label>
                                                      <input id="chckCollege" name="chckCollege" value="1" type="checkbox"> <strong>College</strong>
                                                    </label>
                                                </div> -->
                                                <div class="checkbox">
                                                    <label>
                                                      <input id="chckStudent" name="chckStudent" value="1" type="checkbox"> <strong>Student</strong>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                      <input id="chckParty" name="chckParty" value="1" type="checkbox"> <strong>Party List</strong>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                      <input id="chckCandidates" name="chckCandidates" value="1" type="checkbox"> <strong>Candidates</strong>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                      <input id="chckElectoral" name="chckElectoral" value="1" type="checkbox"> <strong>Electoral Position</strong>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                      <input id="chckAcademic" name="chckAcademic" value="1" type="checkbox"> <strong>Academic Program</strong>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                      <input id="chckElection" name="chckElection" value="1" type="checkbox"> <strong>Election Configuration</strong>
                                                    </label>
                                                </div>
                                          </div>
                                      </div>
                                  </div>
                                  </form>
                              </div>
                              <div class="modal-footer" style="margin-top:-20px;">
                                <div class="col-sm-6 col-sm-offset-6">
                                  <button onclick="javascript:saveUserGroup();" id="btn-saveUserGroup" type="button" class="btn user-btn-block3 bg-blue btn-lg waves-effect" ><i class="icon-save"></i> SAVE CHANGES</button>
                                  <button type="button" class="btn user-btn-block1 btn-lg waves-effect" data-dismiss="modal">CLOSE</button>
                              </div>
                            </div>


                          </div>
                      </div>
                      </form>
                </div><!-- usersGroup-modal -->

                <!--  PASSWORD RESTRICTIONS  -->


                <div class="modal fade bs-example-modal-lg" id="uapassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-md" role="dialog">
                              <div class="modal-content">
                                  <div class="modal-header navcolor">
                                      <button onclick="javascript:refresh();" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-x5"></i></button>
                                      <h3 class="modal-title" id="defaultModalLabel">Admin</h3>
                                  </div>

                                  <div class="modal-body">
                                      <form method="post" action="#" accept-charset="UTF-8">
                                      <div class="row clearfix">
                                          <div class="col-sm-12">
                                            <input id="authenticity_token" name="authenticity_token" type="hidden">
                                            <br>

                                              <div class="form-group">
                                                  <label>Password:</label>
                                                  <div class="form-line">
                                                    <input id="aPassword" name="aPassword" class="form-control user" placeholder="Password"
                                                    maxlength="50" type="password">
                                                    <span class="help-inline"></span>
                                                  </div>
                                              </div>


                                          </div>
                                      </div>
                                      </form>
                                  </div>
                                  <div class="modal-footer" style="margin-top:-20px;">
                                    <div class="col-sm-6 col-sm-offset-6">
                                      <button onclick="javascript:UserAddLogin();commandtoClearUserAccount();" id="btn-save" type="submit" class="btn user-btn-block3
                                       bg-blue btn-lg waves-effect" >ACCESS</button>
                                      <button onclick="javascript:refresh();" type="button" class="btn user-btn-block1 btn-lg waves-effect" data-dismiss="modal">CLOSE</button>
                                  </div>
                                </div>


                              </div>
                          </div>
                          </form>
                    </div><!--uepassModal -->

                <div class="modal fade bs-example-modal-lg" id="uepassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-md" role="dialog">
                              <div class="modal-content">
                                  <div class="modal-header navcolor">
                                      <button onclick="javascript:refresh();" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-x5"></i></button>
                                      <h3 class="modal-title" id="defaultModalLabel">Admin</h3>
                                  </div>

                                  <div class="modal-body">
                                      <form method="post" action="#" accept-charset="UTF-8">
                                      <div class="row clearfix">
                                          <div class="col-sm-12">
                                            <input id="authenticity_token" name="authenticity_token" type="hidden">
                                            <br>

                                              <div class="form-group">
                                                  <label>Password:</label>
                                                  <div class="form-line">
                                                    <input id="uPassword" name="uPassword" class="form-control user" placeholder="Password"
                                                    maxlength="50" type="password">
                                                    <span class="help-inline"></span>
                                                  </div>
                                              </div>


                                          </div>
                                      </div>
                                      </form>
                                  </div>
                                  <div class="modal-footer" style="margin-top:-20px;">
                                    <div class="col-sm-6 col-sm-offset-6">
                                      <button onclick="javascript:UserEditLogin();commandtoClearUserAccount();" id="btn-save" type="submit" class="btn user-btn-block3
                                       bg-blue btn-lg waves-effect" >ACCESS</button>
                                      <button onclick="javascript:refresh();" type="button" class="btn user-btn-block1 btn-lg waves-effect" data-dismiss="modal">CLOSE</button>
                                  </div>
                                </div>


                              </div>
                          </div>
                          </form>
                    </div><!--uepassModal -->


  <div class="modal fade bs-example-modal-lg" id="urpassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md" role="dialog">
                            <div class="modal-content">
                                <div class="modal-header navcolor">
                                    <button onclick="javascript:refresh();" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-x5"></i></button>
                                    <h3 class="modal-title" id="defaultModalLabel">Admin</h3>
                                </div>

                                <div class="modal-body">
                                    <form method="post" action="#" accept-charset="UTF-8">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                          <input id="authenticity_token" name="authenticity_token" type="hidden">
                                          <br>

                                            <div class="form-group">
                                                <label>Password:</label>
                                                <div class="form-line">
                                                  <input id="rPassword" name="rPassword" class="form-control user" placeholder="Password"
                                                  maxlength="50" type="password">
                                                  <span class="help-inline"></span>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer" style="margin-top:-20px;">
                                  <div class="col-sm-6 col-sm-offset-6">
                                    <button onclick="javascript:UserDeleteLogin();commandtoClearUserAccount();" id="btn-save" type="submit" class="btn user-btn-block3
                                     bg-blue btn-lg waves-effect" >ACCESS</button>
                                    <button onclick="javascript:refresh();" type="button" class="btn user-btn-block1 btn-lg waves-effect" data-dismiss="modal">CLOSE</button>
                                </div>
                              </div>


                            </div>
                        </div>
                        </form>
                      </div><!--urpass-modal -->

<div class="modal fade bs-example-modal-lg" id="gapassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="dialog">
                        <div class="modal-content">
                            <div class="modal-header navcolor">
                                <button onclick="javascript:refresh();" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-x5"></i></button>
                                <h3 class="modal-title" id="defaultModalLabel">Admin</h3>
                            </div>

                            <div class="modal-body">
                                <form method="post" action="#" accept-charset="UTF-8">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                      <input id="authenticity_token" name="authenticity_token" type="hidden">
                                      <br>

                                        <div class="form-group">
                                            <label>Password:</label>
                                            <div class="form-line">
                                              <input id="gaPassword" name="gaPassword" class="form-control user" placeholder="Password"
                                              maxlength="50" type="password">
                                              <span class="help-inline"></span>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="modal-footer" style="margin-top:-20px;">
                              <div class="col-sm-6 col-sm-offset-6">
                                <button onclick="javascript:GroupAddLogin();commandToClearUserGroup();" id="btn-save" type="submit" class="btn user-btn-block3
                                 bg-blue btn-lg waves-effect" >ACCESS</button>
                                <button onclick="javascript:refresh();" type="button" class="btn user-btn-block1 btn-lg waves-effect" data-dismiss="modal">CLOSE</button>
                            </div>
                          </div>


                        </div>
                    </div>
                    </form>
              </div><!--gepass-modal -->

                    <div class="modal fade bs-example-modal-lg" id="gepassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md" role="dialog">
                                            <div class="modal-content">
                                                <div class="modal-header navcolor">
                                                    <button onclick="javascript:refresh();" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-x5"></i></button>
                                                    <h3 class="modal-title" id="defaultModalLabel">Admin</h3>
                                                </div>

                                                <div class="modal-body">
                                                    <form method="post" action="#" accept-charset="UTF-8">
                                                    <div class="row clearfix">
                                                        <div class="col-sm-12">
                                                          <input id="authenticity_token" name="authenticity_token" type="hidden">
                                                          <br>

                                                            <div class="form-group">
                                                                <label>Password:</label>
                                                                <div class="form-line">
                                                                  <input id="gePassword" name="gePassword" class="form-control user" placeholder="Password"
                                                                  maxlength="50" type="password">
                                                                  <span class="help-inline"></span>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer" style="margin-top:-20px;">
                                                  <div class="col-sm-6 col-sm-offset-6">
                                                    <button onclick="javascript:GroupEditLogin();commandToClearUserGroup();" id="btn-save" type="submit" class="btn user-btn-block3
                                                     bg-blue btn-lg waves-effect" >ACCESS</button>
                                                    <button onclick="javascript:refresh();" type="button" class="btn user-btn-block1 btn-lg waves-effect" data-dismiss="modal">CLOSE</button>
                                                </div>
                                              </div>


                                            </div>
                                        </div>
                                        </form>
                                  </div><!--gepass-modal -->

        <div class="modal fade bs-example-modal-lg" id="grpassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="dialog">
                                                  <div class="modal-content">
                                                      <div class="modal-header navcolor">
                                                          <button onclick="javascript:refresh();" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-x5"></i></button>
                                                          <h3 class="modal-title" id="defaultModalLabel">Admin</h3>
                                                      </div>

                                                      <div class="modal-body">
                                                          <form method="post" action="#" accept-charset="UTF-8">
                                                          <div class="row clearfix">
                                                              <div class="col-sm-12">
                                                                <input id="authenticity_token" name="authenticity_token" type="hidden">
                                                                <br>

                                                                  <div class="form-group">
                                                                      <label>Password:</label>
                                                                      <div class="form-line">
                                                                        <input id="grPassword" name="uPassword" class="form-control user" placeholder="Password"
                                                                        maxlength="50" type="password">
                                                                        <span class="help-inline"></span>
                                                                      </div>
                                                                  </div>


                                                              </div>
                                                          </div>
                                                          </form>
                                                      </div>
                                                      <div class="modal-footer" style="margin-top:-20px;">
                                                        <div class="col-sm-6 col-sm-offset-6">
                                                          <button onclick="javascript:GroupDeleteLogin();commandToClearUserGroup();" id="btn-save" type="submit" class="btn user-btn-block3
                                                           bg-blue btn-lg waves-effect" >ACCESS</button>
                                                          <button onclick="javascript:refresh();" type="button" class="btn user-btn-block1 btn-lg waves-effect" data-dismiss="modal">CLOSE</button>
                                                      </div>
                                                    </div>


                                                  </div>
                                              </div>
                                              </form>
                                        </div><!--grpassModal -->





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
    <script type="text/javascript" src="../../js/users.js"></script>
    <script type="text/javascript" src="../../js/validation.js"></script>

    <!-- Additional JS -->
    <script src="../../lib/plugins/node-waves/waves.js"></script>
    <script src="../../lib/plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="../../css/js/admin.js"></script>
    <script src="../../css/js/pages/ui/animations.js"></script>


</body>

</html>
