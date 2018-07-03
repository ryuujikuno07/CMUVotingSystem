<!DOCTYPE html>
<html>
<head>

	<title>Ballots | CMU Voting System</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<meta content='text/html;charset=utf-8' http-equiv='content-type'>
	<link rel="shortcut icon" href="favicon.ico">


    <link href="../../css/bootstrap-3/bootstrap.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../../css/sb-admin-2.css" media="all" rel="stylesheet" type="text/css" />
	<link href="../../css/light-theme.css" media="all" id="color-settings-body-color" rel="stylesheet" type="text/css" />
	<link rel="stylesheet"  href="../../lib/jquery.mobile-1.4.2/jquery.mobile-1.4.2.css">
	<link rel="stylesheet" href="../../lib/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="../../css/sample.css">

	<link rel="icon" type="image/png" href="../../img/logo1.png" />
</head>
<body>

<div data-role="page" class="jqm-demos jqm-home">

	<div data-role="header" class="jqm-header" style="text-align:center; background:pink;">
		<img src="../../img/logodaw.png" alt="CMU Voting System" height="300px" width="600px" align="center">

		<h1 style="font-weight:bold; font-size:2em;"><u><b>Voting System</b></u></h1>
	</div><!-- /header -->

	<div class='login-container'>
			<div class='container'>
					<div class='row'>
							<div class='col-sm-4 col-sm-offset-4'>
	<div role="main" class="ui-content">
        <form role="form"><center>
            <input id="username" type="text" placeholder="Username  /  Student ID" class="form-control user ui-input-text" style="font-weight:bold; text-align:center;" maxlength="100">

           <div class="form-group" id="ipdraw" style="display: none;">
           		<div class='tooltip-demo controls with-icon-over-input'>
            <input id="server" type="text" placeholder="IP:localhost" class="form-control user ui-input-text " style="font-weight:bold; text-align:center;" maxlength="100"><i data-toggle="tooltip" data-placement="left" title="Hide IP Address" id="ip2" class='btn icon-globe text-muted icon-2x'></i>
            </div>
            </div>

         <div class='tooltip-demo col-lg-2' style="right: 20px; top: 12px;">
         <i data-toggle="tooltip" data-placement="bottom" title="Show IP Address" id="ip" class='servers btn icon-globe text-muted icon-2x'></i>
         </div>

         <div class='col-lg-10' style="right: 25px;">
            <a href="javascript:login();" class="ui-btn ui-btn-c ui-corner-all custom-btn-index">Sign in</a>
          </div>
        </form><!-- /content -->

	<div data-role="popup" id="errModal" data-overlay-theme="a" data-theme="a" data-dismissible="false" style="max-width:400px;">
	    <div data-role="header" data-theme="b">
	    <h1>ERROR</h1>
	    </div>
	    <div role="main" class="ui-content">
	        <h3 class="ui-title">WARNING: An error occurred!</h3>
					<center>
						<blockquote>
                <h4><p id="error_message"></p><h4>
            </blockquote>
	        <a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back">OK</a>
	    </div>
	</div>
</div><!-- /page -->

	<script type="text/javascript" src="../../lib/jquery/jquery-2.0.0.min.js"></script>
	<script src="../../js/index.js"></script>
	<script src="../../lib/jquery.mobile-1.4.2/jquery.mobile-1.4.2.js"></script>
    <script src="../../lib/bootstrap-3/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" src="../../js/login.js"></script>
<script type="text/javascript" src="../../js/validation.js"></script>
    <script src="../../lib/sb-admin-2.js" type="text/javascript"></script>

    <script type="text/javascript">

    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
    </script>

</body>
</html>
