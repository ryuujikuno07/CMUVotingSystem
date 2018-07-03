function logout(){
   window.localStorage.clear(),window.location.href=" index.php"
  }

function createTask(t,a){
  var s=new Array;task=new Object,
  task.task_name=t.trim(),
  task.task_function=a,s.push(task),
  window.localStorage.task=JSON.stringify(s),
  setInterval(function(){task=JSON.parse(window.localStorage.task||"{}")},1e3),
  task&&("Statistics Overview"===task.task_name?myVar=setInterval(task.task_function,5e3):"Ranking Result"===task.task_name?myVar=setInterval(task.task_function,5e3):"Position"===task.task_name&&(myVar=setInterval(task.task_function,5e3)))
  }

function myStopFunction(){
  clearInterval(myVar),
  window.localStorage.removeItem("task")
  }

function get_active_config(){
  var t=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!1,
  type:"POST",crossDomain:!0,dataType:"json",
  data:{command:"get_active_config"},
    success:function(t){
      var a=t;return 1!=a.success?void alert(a.msg):void(window.localStorage.config=JSON.stringify(a.config))},
    error:function(t){
      console.log("Error:"),
      console.log(t)}})}

function getStatisticsOverview(){
  var t=JSON.parse(window.localStorage.config||"{}"),
  a=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+a+"/cmuvoting/API/index.php",
  async:!0,type:"POST",crossDomain:!0,
  dataType:"json",data:{command:"getStatisticsOverview",TermID:t.TermID},
    success:function(t){
      var a=t;if(1!=a.success)return void alert(a.msg);
      window.localStorage.totalVoters=a.totalVoters,
      window.localStorage.totalNotVoted=a.totalNotVoted,
      window.localStorage.totalVoted=a.totalVoted;
      var s=window.localStorage.totalVoted||"{}",
      e=window.localStorage.totalVoters||"{}",
      i=window.localStorage.totalNotVoted||"{}";
      $("#announcement-voted-heading").html(s),
      $("#announcement-voters-heading").html(e),
      $("#announcement-notvoted-heading").html(i)},
    error:function(t){
      console.log("Error:"),
      console.log(t)}})}

function getCandidacyPosition(r){
  var t=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+t+"/cmuvoting/API/index.php",
  async:!0,type:"POST",crossDomain:!0,
  dataType:"json",data:{command:"getCandidacyPosition",TermID:r},
    success:function(r){
      var a=r;if(1!=a.success)return alert(a.msg),
      !1;window.localStorage.canvass_positions=JSON.stringify(a.positions);
      var s=a.positions.length;
      if($("#lstPositions").empty(),s>0)
        for(var e=0;s>e;e++){
          var i=a.positions[e],
          n='<li data-id="'+i.PositionID+'"><a href="#"><i class="fa fa-angle-double-right"></i><span> '+i.PositionName+"</span></a>";$("#lstPositions").append(n)}},
    error:function(r){
      return console.log("Error:"),
      console.log(t),!1}})}

function GenerateDashboard(){
  $("#content").empty(),
    $(document).ready(function(){
              var e=JSON.parse(window.localStorage.config||"{}");
              $("#term").html(" ["+e.ElectionName+"  -  "+e.SchoolYear+"] ")
            });
  var t='<h1>Statistics Overview<small id="term"></small> </h1>  <div class="row clearfix"> <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"> <div class="info-box bg-light-blue hover-expand-effect"> <div class="icon"> <i class="fa fa-check-square fa-5x"></i> </div> <div class="content"> <div class="text"><strong>VOTED!</strong></div> <div class="number count-to" id="announcement-voted-heading"> </div> </div> </div> </div> <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" > <div class="info-box bg-red hover-expand-effect "> <div class="icon"> <i class="fa fa-square-o fa-5x"></i> </div> <div class="content"> <div class="text"><strong>NOT VOTED</strong></div> <div class="number count-to" id="announcement-notvoted-heading"> </div> </div> </div> </div> <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"> <div class="info-box bg-light-green hover-expand-effect"> <div class="icon"> <i class="fa fa-users fa-5x"></i> </div> <div class="content"> <div class="text">TOTAL VOTERS</div> <div class="number count-to"  id="announcement-voters-heading"> </div> </div> </div> </div> </div>           <div class="row">              <div class="btn-group btn-group-lg">                <a href="print2.php" class="btn canvass-btn-block3 bg-blue"><span class="glyphicon glyphicon-print"></span>  <strong> Print Voters Actually Voted </strong></a>     </div>       <div class="btn-group btn-group-lg" >    <a href="print3.php" class="btn canvass-btn-block3 bg-blue"><span class="glyphicon glyphicon-print"></span><strong> Print Voters Not Voted </strong></a>              </div>            </div>';$("#content").append(t),getStatisticsOverview()}

function getCandidatesByPositionID(t,a,s){
    $("#content").empty(),
        $(document).ready(function(){
              var c=JSON.parse(window.localStorage.config||"{}");
              $("#terma").html(" ["+c.ElectionName+"  -  "+c.SchoolYear+"] ")
            });
    var e='<div class="row" style="background:pink;"><h1>                <span id="lblPosition"></span>                <small>Statistics Overview</small> <br><strong id="terma"></strong>           </h1></div>          <div class="row">                <div class="col-lg-12">                    <div class="table-responsive">                        <table class="table" style="margin-left:20px;" id="tbl_candidate">                            <thead>                                <tr>                                    <th style="width:60%">Candidate</th>                                    <th style="width:20%">Total Votes</th>                                    <th style="width:20%">% Votes</th>                                </tr>                            </thead>                            <tbody>                            </tbody>                        </table>                    </div>                </div>            </div>';
    $("#content").append(e),
    $("#lblPosition").html(s);
    var i=sessionStorage.getItem("ipaddress");
    $.ajax({url:"http://"+i+"/cmuvoting/API/index.php",async:!0,
    type:"POST",crossDomain:!0,
    dataType:"json",data:{command:"getCandidatesCanvassingByPositionID",positionID:t,TermID:a},
      success:function(t){
        var a=t;
        if(1!=a.success)return alert(a.msg),
        !1;window.localStorage.candidates=JSON.stringify(a.candidates);
        var s=a.candidates.length;
        if($("#tbl_candidate tbody > tr").remove(),s>0){$("#processing-modal").modal("show");
          for(var e=0;s>e;e++){
            var i,n=a.candidates[e],
            o=n.Photo;
            i="W0JJTkFSWV0="===o||""===o?"../../img/photo.jpg":"data:image/x-xbitmap;base64,"+o;
            var l=window.localStorage.totalVoters||"{}",
            r=n.VoteCount/l*100,
            d='<tr>                                    <td class="table-profile">                                        <div class="table-image">                                            <img src="'+i+'" class="img-responsive img-circle" alt="Generic placeholder thumbnail">                                        </div>                                        <div class="table-info" >                                            <h4>'+n.CandidateName+"         </h4>                                            <small>"+n.Program+"</small>                                           <small>"+n.Partylist+"</small> <small>"+n.ElectionName+'</small>                                            <small></small>                                        </div>                                    </td>                                    <td class="table-score">'+n.VoteCount+'</td>                                    <td class="table-score">'+Number(r).toFixed(2)+" %</td>                                </tr>";$("#tbl_candidate tbody").append(d)}$("#processing-modal").modal("hide")}},
      error:function(t){
          return console.log("Error:"),
          console.log(t),!1}})}

function LayoutRankingResult(){
  $("#content").empty(),
    $(document).ready(function(){
              var b=JSON.parse(window.localStorage.config||"{}");
              $("#term").html(" ["+b.ElectionName+"  -  "+b.SchoolYear+"] ")
            });
    var t='<div class="row">                      <div class="col-lg-12">                        <h1 class="text-center">FINAL CANVASSING RESULT <br><small><p id="term"></p></small></h1>                      </div>                    </div>                    <div class="row" style="margin-left:5px;">                    <div class="col-lg-6">                          <p>                              <a href="print.php" type="button" class="btn btn-lg canvass-btn-block3 bg-blue"><i class="fa fa-print fa-lg"></i> Print Canvassing</a>                         <!--     <a href="print-winner.php" type="button" class="btn btn-lg canvass-btn-block3 bg-blue"><i class="fa fa-print fa-lg"></i> Print Winners</a>           -->               </p>                      </div>                    </div>                    <div id="content2"></div>';
    $("#content").append(t)}

function privilege(e){
      1==e._StatisticsOverview&&$("#LIST li").eq(0).removeClass("hidden"),
      1==e._RankingResult&&$("#LIST li").eq(1).removeClass("hidden"),
      1==e._CanvassingCharts&&$("#LIST li").eq(2).removeClass("hidden"),      1==e._StatisticsOverview&&$("#LIST li").eq(3).removeClass("hidden"),
      1==e._lstPositions&&$("#LIST li").eq(4).removeClass("hidden")}

function GenerateRankingResult(){
  var t=JSON.parse(window.localStorage.canvass_positions||"{}"),
  a=JSON.parse(window.localStorage.config||"{}"),
  s=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+s+"/cmuvoting/API/index.php",async:!0,
  type:"POST",crossDomain:!0,
  dataType:"json",data:{command:"getCandidatesFinalCanvassing",TermID:a.TermID},
    success:function(a){
      var s=a,e="";
      if($("#content2").empty(),1!=s.success)return alert(s.msg),!1;
      if(s.candidates.length>0)
        for(var i=0;i<t.length;i++){
          var n=t[i];
          e+="<br><div class='row' style='background:pink;'><h1>"+n.PositionName+'</h1> </div>                               <div class="row">                                    <div class="col-lg-12">                                        <div class="table-responsive">                                            <table class="table" id="tbl_candidate">                                                <thead>                                                    <tr>                                                        <th style="width:60%">Candidate</th>                                                        <th style="width:20%">Total Votes</th>                                                    </tr>                                                </thead>                                                <tbody>';
          for(var o=0;o<s.candidates.length;o++){
            var l=s.candidates[o];
            if(n.PositionID==l.PositionID){
              var r,d=l.Photo;
              r="W0JJTkFSWV0="===d||""===d?"../../img/photo.jpg":"data:image/x-xbitmap;base64,"+d,e+='<tr>                                        <td class="table-profile">                                            <div class="table-image">                                                <img src="'+r+'" width="120px"  class="img-responsive img-circle" alt="Generic placeholder thumbnail">                                            </div>                                            <div class="table-info">                                             <h4>'+l.CandidateName+"</h4>                                               <small>"+l.Program+"</small>                                          <small>"+l.Partylist+"</small>                                               <small>"+l.ElectionName+'</small>                                            </div>                                        </td>                                        <td class="table-score">'+l.VoteCount+"</td>                                    </tr>",$("#tbl_candidate tbody").append(e)}}e+="</tbody>                                </table>                            </div>                        </div>                    </div>"}
              $("#content2").append(e)},
      error:function(t){
                return console.log("Error:"),
                console.log(t),!1}})}
                var myVar,task;
                $(document).ready(function(){
                  var t=JSON.parse(window.localStorage.canvass_user||"{}"),
                  o=JSON.parse(window.localStorage.config||"{}");
                  Object.keys(t).length<1&&(console.log("redirect to main"),
                  window.location.href="index.php"),
                  $("#current_user").html(t.FullName),
                  get_active_config(),
                  getCandidacyPosition(o.TermID),
                  $("#lst_dashboard li").removeClass("active"),
                  $("#lst_dashboard li").eq(1).addClass("active"),
                  $("#lst_dashboard li").eq(1).text(),GenerateDashboard(),
                  myStopFunction(),
                  createTask($("#lst_dashboard li").eq(1).text(),
                  "getStatisticsOverview()")}),
                  $(document).on("click","#lst_dashboard li",
                  function(){$("#lstPositions li").removeClass("active"),
                  $("#lst_dashboard li").removeClass("active"),
                  $(this).addClass("active"),
                  myStopFunction(),"Statistics Overview"==$(this).text().trim()?createTask($(this).text(),"getStatisticsOverview()"):"Ranking Result"==$(this).text().trim()&&(LayoutRankingResult(),
                  createTask($(this).text(),
                  "GenerateRankingResult()")),
                  task.length>0&&("Statistics Overview"===task[0].task_name?myVar=setInterval(task[0].task_function,3e3):"Ranking Result"===task[0].task_name?myVar=setInterval(task[0].task_function,8e3):"Position"===task[0].task_name&&(myVar=setInterval(task[0].task_function,5e3))),
                  console.log($(this).text())}),
                  $(document).on("click","#lstPositions li",
                  function(){var t=JSON.parse(window.localStorage.config||"{}"),
                  e=JSON.parse(window.localStorage.user||"{}");
                  $("#lst_dashboard li").removeClass("active"),
                  $("#lstPositions li").removeClass("active"),
                  $(this).addClass("active"),
                  getCandidatesByPositionID($(this).attr("data-id"),
                  t.TermID,$(this).text()),
                  myStopFunction(),
                  createTask($(this).text(),"getCandidatesByPositionID("+$(this).attr("data-id")+","+t.TermID+")")}),privilege(e);    $(document).ready(function(){
                        setInterval(function(){
                          $('#time').load('assets/time.php')
                        }, 1000);
                        });
