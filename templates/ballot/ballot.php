<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ballots | Voting System</title>
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="../../lib/jquery.mobile-1.4.2/jquery.mobile-1.4.2.css">
    <link rel="stylesheet" href="../../lib/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="../../css/sample.css">
    <link rel="icon" type="image/png" href="../../img/logo1.png" />
    <link href="../../css/theme-colors.css" media="all" rel="stylesheet" type="text/css" />


</head>

<body>

    <div data-role="page" class="jqm-demos jqm-home">

        <div data-role="header" class="jqm-header" style="background:pink;">
            <h2>
                <img src="../../img/logodaw.png"alt="Voting System">
            </h2>

            <a href="#" class="jqm-navmenu-link ui-btn ui-btn-icon-notext ui-corner-all ui-icon-bars ui-nodisc-icon ui-alt-icon ui-btn-left  ">Menu</a>
            <a href="#" class="jqm-search-link ui-btn ui-btn-icon-notext ui-corner-all ui-icon-bullets ui-nodisc-icon ui-alt-icon ui-btn-right">
                Ballot
            </a>
        </div>
        <!-- /header -->

        <div role="main" class="ui-content jqm-content background" style="background:pink;">
        	<h2 id="lblPosition"></h2>
            <div class="ui-grid-c ui-responsive placeholders" id="candidate_list">
	        </div>
        </div>
        <!-- /content -->
        <div id="panel-right" data-role="panel" class="jqm-navmenu-panel" data-position="left" data-display="overlay" data-theme="a">
        	<ul class="jqm-list ui-alt-icon ui-nodisc-icon">
                <li class="profile-panel" data-icon="home">
                    <div class="image">
                        <img src="../../img/photo.jpg">
                    </div>
                    <div class="info">
                        <strong id="current_user"> ***** </strong><br>
                        <small style="color:white;" id="current_user_course">*****</small>
                        <small style="color:white;" id="current_user_college">*****</small>
                    </div>
                </li>
             <!--   <li data-icon="info"><a href="javascript:print();" data-transition="pop"> About Developer</a></li>
                <li data-icon="info"><a href="#system" data-transition="pop"> About Voting System</a></li> -->
                <li data-icon="back"><a href="javascript:logout();"> Logout</a></li>
                <li data-role="collapsible" data-collapsed="false" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right" data-inset="false">
                    <h3>Candidate Positions</h3>
                    <ul data-role="listview">
                        <li data-role="list-divider"></li>
                    </ul>
                    <ul data-role="listview" id="lstPositions">
                    </ul>
                </li>
           </ul>
        </div>
        <!-- /panel -->


        <div id="panel-right" data-role="panel" class="jqm-search-panel" data-position="right" data-display="overlay" data-theme="a">
            <ul class="jqm-list" data-role="listview">
                <li data-role="list-divider">Selected Candidate</li>
                <li data-role="list-divider"></li>
            </ul>
            <ul class="jqm-list" data-role="listview" id="my_ballot">
            </ul>
        </div>
        <center>
        <div data-role="footer" data-position="fixed" data-tap-toggle="false" class="jqm-footer" style="background:pink;">
        	<a href="#myModal" data-icon="check" data-transition="pop" data-rel="popup" data-position-to="window" data-role="button" data-mini="true" class="jqm-search-link custom-btn ui-btn ui-btn-left ui-btn-e btn">Submit Ballot</a>
          <h1></h1>
            <a href="#removeModal" data-icon="delete" data-transition="pop" data-rel="popup" data-position-to="window" data-role="button" data-mini="true" class="jqm-search-link custom-btn1 ui-btn ui-btn-f ui-btn-right ">Clear Ballot</a>
        </div>

        <!-- /panel -->

        <div data-role="popup" id="popupBasic" data-theme="a">
            <p><span id="selected_candidate"></span> is added to your ballot!..</p>
        </div>

        <div data-role="popup" id="errModal" data-overlay-theme="a" data-theme="a" data-dismissible="false" style="max-width:400px;">
            <div data-role="header" data-theme="a">
            <h1>WARNING</h1>
            </div>
            <div role="main" class="ui-content">
                <h3 class="ui-title">WARNING: An error occured!</h3>
                <center>
                <blockquote>
                    <p id="error_message"></p>
                </blockquote>
                <a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back">OK</a>
            </div>
        </div>


        <div data-role="popup" id="removeModal" data-overlay-theme="d" data-theme="a" data-dismissible="false" style="max-width:400px;">
            <div data-role="header" data-theme="a">
            <h1>Clear Ballot</h1>
            </div>
            <div role="main" class="ui-content">
                <h3 class="ui-title">Are you sure to Clear your ballot?</h3>
                <blockquote>
                     <p>Clearing the list of your ballot will restart you to choose again.</p>
                </blockquote><center>
                <a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back">NO</a>
                <a href="javascript:clear_ballot();" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" >YES</a>
            </div>
        </div>

        <div data-role="popup" id="successModal" data-overlay-theme="a" data-theme="a" data-dismissible="false" style="max-width:400px;">
            <div data-role="header" data-theme="a">
            <h2>CONGRATULATIONS</h2>
            </div>
            <div role="main" class="ui-content">
                <h3 class="ui-title">THANK YOU !!!</h3>
                <center>
                <blockquote>
                    <p id="success_message"></p>
                </blockquote>
                <a href="javascript:success_vote();"  class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" >YES</a>
            </div>
        </div>

        <div data-role="popup" id="myModal" data-overlay-theme="d" data-theme="a" data-dismissible="false" style="max-width:400px;">
            <div data-role="header" data-theme="a">
            <h1>Submit Ballot</h1>
            </div>
            <div role="main" class="ui-content">
                <h3 class="ui-title">Are you sure to submit this ballot?</h3>
                <center>
                <a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back">NO</a>
                <a href="javascript:submit_ballot();" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" >YES</a>
            </div>
        </div>
    </div>
    <!-- /page -->


</body>

    <script type="text/javascript" src="../../lib/jquery/jquery-2.0.0.min.js"></script>
    <script src="../../js/index.js"></script>
    <script src="../../lib/jquery.mobile-1.4.2/jquery.mobile-1.4.2.js"></script>
    <script src="../../js/ballot.js"></script>

</html>
