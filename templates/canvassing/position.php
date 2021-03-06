<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Canvassing System</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../lib/bootstrap/css/bootstrap.css">

    <!-- Add custom CSS here -->
    <link rel="stylesheet" href="../../css/canvass.css" />
    <link rel="stylesheet" href="../../lib/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../lib/morris/morris-0.4.3.min.css">
    <link rel="icon" type="image/png" href="../../img/logo1.png" />
</head>

<body>

    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Canvassing</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span id="current_user"></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Help</a>
                        </li>
                        <li><a href="javascript:logout();">Logout</a>
                        </li>
                        <li><a href="#">Feedback</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div id="container">

        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li class="nav-header">Dashboard</li>
                    <li><a href="canvassing.php"><i class="fa fa-angle-double-right"></i> Statistics Overview</a>
                    </li>
                    <li><a href="final.php"><i class="fa fa-angle-double-right"></i> Ranking Result</a>
                    </li>
                </ul>
                <ul class="nav nav-sidebar">
                    <li class="nav-header">Candidate Positions</li>
                </ul>
                <ul class="nav nav-sidebar" id="lstPositions">
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1>
                    <span id="lblPosition"></span>
                    <small>Statistics Overview</small>
                </h1>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table" id="tbl_candidate">
                                <thead>
                                    <tr>
                                        <th style="width:60%">
                                            Candidate
                                        </th>
                                        <th style="width:20%">Total Votes
                                        </th>
                                        <th style="width:20%">% Votes
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->


            <div class="modal modal-static fade" id="processing-modal" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center">
                                <img src="../../img/loading.gif" class="icon" />
                                <h4>Processing...
                                    <button type="button" class="close" style="float: none;" data-dismiss="modal" aria-hidden="true">X</button>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /#page-wrapper -->


        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="../../lib/Jquery/jquery-2.0.0.min.js"></script>
        <script type="text/javascript" src="../../lib/bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="../../js/canvass_position.js"></script>
        <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
</body>

</html>
                       
