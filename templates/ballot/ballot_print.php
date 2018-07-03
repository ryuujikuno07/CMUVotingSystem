<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Print Vote Result | CMU Election System</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../lib/bootstrap/css/bootstrap.css">

    <!-- Add custom CSS here -->
          <link href="../../css/light-theme.css" media="all" id="color-settings-body-color" rel="stylesheet" type="text/css" />
 
    <link rel="stylesheet" href="../../lib/jquery.mobile-1.4.2/jquery.mobile-1.4.2.css">
    <link rel="stylesheet" href="../../lib/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="../../css/sample.css">
    <link rel="icon" type="image/png" href="../../img/logo1.png" />
    <link href="../../css/theme-colors.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/png" href="../../img/logo1.png" />
</head>

<body>

    <!-- Sidebar -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            
            <a class="navbar-brand" href="#">
               <img src="../../img/logoDaw.png" height="40px" width="200px">
            </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a id="print" href="javascript:print_vote();"><i class="fa fa-print fa-2x"></i><h4> Print</h4></a>
                </li>
            </ul>
        </div>
    </nav>

        <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <strong>City Of Malabon University : VOTERS REPORT : <small id="term"></small></strong>
           
              <div class="panel panel-default">
                  <div class="panel-heading">

                    <table class="table table-condensed" id="tbl_voters1">
                        <thead></thead>
                    </table>
                  </div>
                  <div class="panel-body" >
                    <table class="table table-condensed" id="tbl_voters">
                            <thead>
                            <tr>
                                <td><strong>Candidate Name</strong></td>
                                <td><strong>Position</strong></td>
                                <td><strong>Party List</strong></td>
                            </tr>
                            </thead>

                        <tbody>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                  </div>
              </div>
            </div>
        </div>
                            

        <div class="row">
            <div class="col-xs-12 col-xs-offset-2">
                    <center>
                        <p id="current_user" style="text-transform: uppercase;"></p>
                        <strong>Student Name</strong>
                        <br>
                        <small>(Signature over printed name)</small>
                    </center>
            </div>
        </div>
    </div>
    </div>
    <!-- /#page-wrapper -->


    <h5 align="center">-- NOTHING TO FOLLOWS -- </h5>
    <hr>

            <div data-role="popup" id="successModal" data-overlay-theme="a" data-theme="a" data-dismissible="false" style="max-width:400px;">
            <div data-role="header" data-theme="a">
            <h2></h2>
            </div>
            <div role="main" class="ui-content">
                <h3 class="ui-title">CONGRATULATIONS</h3>
                <center>
                <blockquote>
                    <p>Thank you for participating the election</p>
                </blockquote>
                <a href="javascript:success_vote();"  class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" >YES</a>
            </div>
        </div>




</body>
    <!-- Bootstrap core JavaScript -->

          
    <script type="text/javascript">
    </script>

          
    <script type="text/javascript" src="../../lib/jquery/jquery-2.0.0.min.js"></script>
    <script src="../../js/index.js"></script>
    <script src="../../lib/jquery.mobile-1.4.2/jquery.mobile-1.4.2.js"></script>
    <script src="assets/datetime.js" type="text/javascript" ></script>
    <script type="text/javascript" src="../../lib/bootstrap/js/bootstrap.js"></script>
    <script src="../../js/ballot.js"></script>
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->

</html>
