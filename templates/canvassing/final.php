<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blank Page - SB Admin</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../lib/bootstrap/css/bootstrap.css">

    <!-- Add custom CSS here -->
    <link rel="stylesheet" href="../../css/final.css" />
    <link rel="stylesheet" href="../../lib/font-awesome/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="../../img/logo1.png" />
</head>

<body>

    <!-- Sidebar -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
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

    <div class="container">

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
                <div class="row">
                  <div class="col-lg-12">
                    <h1 class="text-center">FINAL CANVASSING RESULT</h1>
                  </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <p>
                            <button type="button" class="btn btn-primary"><i class="fa fa-print fa-lg"></i> Print</button>
                        </p>
                    </div>
                </div><!-- /.row -->
                <div class="row">
                    <h1 class="text-center">PRESIDENT</h1>
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <div class="media col-md-3">
                                <figure class="pull-left">
                                    <img src="../../img/photo.jpg" width="120px" class="img-responsive img-circle" alt="thumbnail">
                                </figure>
                            </div>
                            <div class="col-md-6">
                                <h3 class="list-group-item-heading">Aquino, Benigno </h3>
                                <h4>null</h4>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <div class="address">4</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="media col-md-3">
                                <figure class="pull-left">
                                    <img src="../../img/photo.jpg" width="120px" class="img-responsive img-circle" alt="thumbnail">
                                </figure>
                            </div>
                            <div class="col-md-6">
                                <h3 class="list-group-item-heading">Gordon, Richard </h3>
                                <h4>null</h4>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <div class="address">0</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="media col-md-3">
                                <figure class="pull-left">
                                    <img src="../../img/photo.jpg" width="120px" class="img-responsive img-circle" alt="thumbnail">
                                </figure>
                            </div>
                            <div class="col-md-6">
                                <h3 class="list-group-item-heading">Villanueva, Eddie </h3>
                                <h4>null</h4>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <div class="address">0</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="media col-md-3">
                                <figure class="pull-left">
                                    <img src="../../img/photo.jpg" width="120px" class="img-responsive img-circle" alt="thumbnail">
                                </figure>                                            '
                            </div>
                            <div class="col-md-6">
                                <h3 class="list-group-item-heading">Villar, Manny </h3>
                                <h4>null</h4>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <div class="address">0</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="media col-md-3">
                                <figure class="pull-left">
                                    <img src="../../img/photo.jpg" width="120px" class="img-responsive img-circle" alt="thumbnail">
                                </figure>
                            </div>
                            <div class="col-md-6">
                                <h3 class="list-group-item-heading">Estrada, Joseph </h3>
                                <h4>null</h4>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <div class="address">0</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    </br>

                    <h1 class="text-center">VICE-PRESIDENT</h1>
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <div class="media col-md-3">
                                <figure class="pull-left">
                                    <img src="../../img/photo.jpg" width="120px" class="img-responsive img-circle" alt="thumbnail">
                                </figure>
                            </div>
                            <div class="col-md-6">
                                <h3 class="list-group-item-heading">Juan Dela Cruz</h3>
                                <h4>BS-HRM</h4>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <div class="address">215</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    </br>

                    <h1 class="text-center">SENATORS</h1>
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <div class="media col-md-3">
                                <figure class="pull-left">
                                    <img src="../../img/photo.jpg" width="120px" class="img-responsive img-circle" alt="Generic placeholder thumbnail">
                                </figure>
                            </div>
                            <div class="col-md-6">
                                <h3 class="list-group-item-heading">Juan Dela Cruz</h3>
                                <h4>BS-Envi. Sci.</h4>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <div class="address">215</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="media col-md-3">
                                <figure class="pull-left">
                                    <img src="../../img/photo.jpg" width="120px" class="img-responsive img-circle" alt="Generic placeholder thumbnail">
                                </figure>
                            </div>
                            <div class="col-md-6">
                                <h3 class="list-group-item-heading">Juan Dela Cruz</h3>
                                <h4>BS-Com.Sci</h4>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <div class="address">215</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="media col-md-3">
                                <figure class="pull-left">
                                    <img src="../../img/photo.jpg" width="120px" class="img-responsive img-circle" alt="Generic placeholder thumbnail">
                                </figure>
                            </div>
                            <div class="col-md-6">
                                <h3 class="list-group-item-heading">Juan Dela Cruz</h3>
                                <h4>BS-IT</h4>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <div class="address">215</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="media col-md-3">
                                <figure class="pull-left">
                                    <img src="../../img/photo.jpg" width="120px" class="img-responsive img-circle" alt="Generic placeholder thumbnail">
                                </figure>
                            </div>
                            <div class="col-md-6">
                                <h3 class="list-group-item-heading">Juan Dela Cruz</h3>
                                <h4>BS-IT</h4>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <div class="address">215</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </br>
                        <h1 class="text-center">GOVERNORS</h1>
                        <div class="list-group">
                            <a href="#" class="list-group-item">
                                <div class="media col-md-3">
                                    <figure class="pull-left">
                                        <img src="../../img/photo.jpg" width="120px" class="img-responsive img-circle" alt="Generic placeholder thumbnail">
                                    </figure>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="list-group-item-heading">Juan Dela Cruz</h3>
                                    <h4>BS-IT</h4>
                                </div>
                                <div class="col-md-3 text-center">
                                    <div class="panel panel-primary">
                                        <div class="panel-body">
                                            <div class="address">215</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item">
                                <div class="media col-md-3">
                                    <figure class="pull-left">
                                        <img src="../../img/photo.jpg" width="120px" class="img-responsive img-circle" alt="Generic placeholder thumbnail">
                                    </figure>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="list-group-item-heading">Juan Dela Cruz</h3>
                                    <h4>BS-HRM</h4>
                                </div>
                                <div class="col-md-3 text-center">
                                    <div class="panel panel-primary">
                                        <div class="panel-body">
                                            <div class="address">215</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        </br>
                        <h1 class="text-center">VICE-GOVERNORS</h1>
                        <div class="list-group">
                            <a href="#" class="list-group-item">
                                <div class="media col-md-3">
                                    <figure class="pull-left">
                                        <img src="../../img/photo.jpg" width="120px" class="img-responsive img-circle" alt="Generic placeholder thumbnail">
                                    </figure>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="list-group-item-heading">Juan Dela Cruz</h3>
                                    <h4>BS-IT</h4>
                                </div>
                                <div class="col-md-3 text-center">
                                    <div class="panel panel-primary">
                                        <div class="panel-body">
                                            <div class="address">215</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item">
                                <div class="media col-md-3">
                                    <figure class="pull-left">
                                        <img src="../../img/photo.jpg" width="120px" class="img-responsive img-circle" alt="Generic placeholder thumbnail">
                                    </figure>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="list-group-item-heading">Juan Dela Cruz</h3>
                                    <h4>BS-HRM</h4>
                                </div>
                                <div class="col-md-3 text-center">
                                    <div class="panel panel-primary">
                                        <div class="panel-body">
                                            <div class="address">215</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->


    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../../lib/Jquery/jquery-2.0.0.min.js"></script>
    <script type="text/javascript" src="../../lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="../../js/ranking.js"></script>
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
</body>

</html>
                       
