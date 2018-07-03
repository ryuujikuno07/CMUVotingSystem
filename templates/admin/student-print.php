<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CMU Election System || Print Student List</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../lib/bootstrap/css/bootstrap.css">

    <!-- Add custom CSS here -->
    <link href="../../css/light-theme.css" media="all" id="color-settings-body-color" rel="stylesheet" type="text/css" />
      <link href="../../css/theme-colors.css" media="all" rel="stylesheet" type="text/css" />
      <link href="../../css/demo.css" media="all" rel="stylesheet" type="text/css" /><link href="../../lib/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../css/final.css" />
    <link rel="stylesheet" href="../../lib/font-awesome/css/font-awesome.min.css">

<link rel="icon" type="image/png" href="../../img/logo1.png" />
</head>

<body>

    <!-- Sidebar -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="student-list.php">
            <img src="../../img/logoDaw.png" height="40px" width="200px">
            </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="javascript:window.print()"><i class="fa fa-print"></i> Print</a>
                </li>
                <li><a href="student-list.php"><i class="fa fa-times"></i> Close</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="text-center">
                    <h3>
                      <img src="../../img/logodaw.png" alt="Voting System" style="width:60px; height:50px;">
                      City of Malabon University
                        <br>
                        <strong>Commission on Election</strong>
                    </h3>
                </div>
                <br>
                <div class="invoice-title">
                    <h3>
                        List of all Students <br /> <strong id="term"></strong>
                    </h3>
                    <h4 class="pull-right">
                        <span id="time"></span>
                    </h4>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <table id="tbl_student" class="table table-striped">
                       <thead align="center">
                            <tr role="row">

                                <th>
                                    Student ID
                                </th>
                                <th style="text-align: center;">
                                    Full Name
                                </th>
                                <!-- <th>
                                    Gender
                                </th> -->
                                <th style="text-align: center;">
                                    Course
                                </th>
                                 <th style="text-align: center;">
                                    College
                                </th>
                            <!--    <th>
                                    Term
                                </th>
                                <th>
                                    Password
                                </th> -->
                            </tr>
                        </thead>
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                        </tbody>
                      </table>
                </div>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div id="print_content">
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /#page-wrapper -->

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


    <!-- Bootstrap core JavaScript -->
    <script src="../../lib/theme.js" type="text/javascript"></script>
    <script src="../../lib/demo.js" type="text/javascript"></script>
    <script src="../../lib/plugins/validate/jquery.validate.min.js" type="text/javascript"></script>
    <script src="../../lib/plugins/validate/additional-methods.js" type="text/javascript"></script>
    <script src="../../lib/tablesorter/jquery.tablesorter.js" type="text/javascript" ></script>
    <script src="../../lib/tablesorter/tables.js" type="text/javascript"></script>
    <script type="text/javascript" src="../../lib/jquery/jquery-2.0.0.min.js"></script>
    <script type="text/javascript" src="../../lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="../../js/student-print.js"></script>
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
</body>

</html>
