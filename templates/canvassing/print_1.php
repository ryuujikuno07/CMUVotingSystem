<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Print Canvass Report | CMU Election System</title>

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
            <a class="navbar-brand" href="#">
               <img src="../../img/logoDaw.png" height="40px" width="200px">
            </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="javascript:window.print()"><i class="fa fa-print"></i> Print</a>
                </li>
                <li><a href="canvassing.php"><i class="fa fa-times"></i> Close</a>
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
                        ELECTION CANVASS REPORT <br> <strong id="term"></strong>
                    </h3>
                    <h4 class="pull-right">
                        <span id="time"></span>
                    </h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <address>
                            *<strong>Number of Registered Voters:</strong>
                            <i><strong><span id="announcement-voters-heading"></span></strong></i>
                        </address>
                        <address>
                            *<strong>Number of Voters Actually Voted:</strong>
                            <i><strong><span id="announcement-voted-heading"></span></strong></i>
                        </address>
                        <address>
                            *<strong>Number of Voters Not Voted:</strong>
                            <i><strong><span id="announcement-voteds-heading"></span></strong></i>
                        </address>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div id="print_content"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-xs-offset-2">
                <div class="col-xs-3">

                    <hr>
                    <center>
                        <strong>SAO President</strong>
                        <br>
                        <small>(Signature over printed name)</small>
                    </center>
                </div>
                <div class="col-xs-3">
                    <hr>
                    <center>
                        <strong>COMELEC Administrator</strong>
                        <br>
                        <small>(Signature over printed name)</small>
                    </center>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->


    <!-- Bootstrap core JavaScript -->
      <script src="../../lib/plugins/validate/additional-methods.js" type="text/javascript"></script>
        <script src="../../lib/tablesorter/jquery.tablesorter.js" type="text/javascript" ></script>
        <script src="../../lib/tablesorter/tables.js" type="text/javascript"></script>
        <script src="../../lib/theme.js" type="text/javascript"></script>
        <script src="../../lib/demo.js" type="text/javascript"></script>
    <script type="text/javascript" src="../../lib/jquery/jquery-2.0.0.min.js"></script>
    <script type="text/javascript" src="../../lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="../../js/ranking.js"></script>
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
</body>

</html>
