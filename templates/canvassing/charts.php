<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Canvassing System | Print Canvass Report</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../lib/bootstrap/css/bootstrap.css">

    <!-- Add custom CSS here -->
    <link rel="stylesheet" href="../../css/canvass.css" />
    <link rel="stylesheet" href="../../lib/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../lib/morris.js-0.5.1/morris.css" />
</head>

<body>
    <!-- Sidebar -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
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
                       <img src="../../img/logoDaw.png" alt="Voting System" style="width:60px; height:50px;">
                        City of Malabon University
                        <br>
                        <strong>Commission on Election</strong>
                    </h3>
                </div>
                <br>
                <div class="invoice-title">
                    <h4 class="pull-right">
                        <strong id="time"></strong>
                    </h4>
                    <h3>
                        ELECTION CANVASS REPORT <br> <strong id="term"></strong>
                    </h3>
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
                <div id="content">

                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript --> 
    <script type="text/javascript" src="../../lib/jquery/jquery-2.0.0.min.js"></script>
    <script type="text/javascript" src="../../lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="../../lib/raphael/raphael-min.js"></script>
    <script type="text/javascript" src="../../lib/morris.js-0.5.1/morris.min.js"></script>
    <script type="text/javascript" src="../../js/canvassingchart.js"></script>

</body>

</html>
