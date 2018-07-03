function get_active_config(){
  var o=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!1,
  type:"POST",crossDomain:!0,dataType:"json",
  data:{command:"get_active_config"},
    success:function(o){
      var t=o;return console.log(t),
      1!=t.success?void alert(t.msg):void(window.localStorage.config=JSON.stringify(t.config))},
    error:function(o){
      console.log("Error:"),
      console.log(o)}})}

function getStatisticsOverview(){
  var o=JSON.parse(window.localStorage.config||"{}"),
  t=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!1,
  type:"POST",crossDomain:!0,dataType:"json",
  data:{command:"getStatisticsOverview",TermID:o.TermID},
    success:function(o){
      var t=o;if(console.log(t),1!=t.success)
      return void alert(t.msg);
      window.localStorage.totalVoters=t.totalVoters,
      window.localStorage.totalNotVoted=t.totalNotVoted,
      window.localStorage.totalVoted=t.totalVoted;
      var a=window.localStorage.totalVoted||"{}",
      e=window.localStorage.totalVoters||"{}",
      s=window.localStorage.totalNotVoted||"{}";
      $("#announcement-voted-heading").html(a),
      $("#announcement-voters-heading").html(e),
      $("#announcement-notvoted-heading").html(s)},
    error:function(o){
      console.log("Error:"),
      console.log(o)}})}

function getCandidacyPosition(e){
  var o=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!1,type:"POST",
  crossDomain:!0,dataType:"json",
  data:{command:"getCandidacyPosition",TermID:e},
    success:function(e){
      var t=e;
      if(console.log(t),1!=t.success)
      return alert(t.msg),!1;window.localStorage.positions=JSON.stringify(t.positions);
      var a=t.positions.length;
      if($("#lstPositions").empty(),a>0)
      for(var e=0;a>e;e++){
        var s=t.positions[e],
        i='<li data-id="'+s.PositionID+'"><a href="#"><i class="fa fa-angle-double-right"></i> '+s.PositionName+"</a>";
        $("#lstPositions").append(i)}},
    error:function(e){
      return console.log("Error:"),
      console.log(e),!1}})}

function getCandidatesByPositionID(o,t){
  var a=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+a+"/cmuvoting/API/index.php",async:!1,type:"POST",
  crossDomain:!0,dataType:"json",
  data:{command:"getCandidatesCanvassingByPositionID",positionID:o,TermID:t},
    success:function(o){
      var t=o;if(console.log(t),1!=t.success)
      return alert(t.msg),!1;window.localStorage.candidates=JSON.stringify(t.candidates);
      var a=t.candidates.length;
      if($("#tbl_candidate tbody > tr").remove(),a>0){
        $("#processing-modal").modal("show");
        for(var e=0;a>e;e++){
          var s,i=t.candidates[e],
          n=i.Photo;
          s="W0JJTkFSWV0="===n||""===n?"../../img/photo.jpg":"data:image/x-xbitmap;base64,"+n;
          var r='<tr>                                        <td class="table-profile">                                            <div class="table-image">                                                <img src="'+s+'" width="120px" class="img-responsive img-circle" alt="Generic placeholder thumbnail">                                            </div>                                            <div class="table-info">                                                <h4>'+i.CandidateName+"</h4>                                                <small>"+i.Program+"</small>                                                <small>"+i.Partylist+'</small>                                            </div>                                        </td>                                        <td class="table-score">'+i.VoteCount+'</td>                                        <td class="table-score">32.3%</td>                                    </tr>';
          $("#tbl_candidate tbody").append(r)}
          $("#processing-modal").modal("hide")}},
    error:function(o){
        return console.log("Error:"),
        console.log(o),!1}})}
        $(document).ready(function(){
          var t=JSON.parse(window.localStorage.canvass_user||"{}"),
          o=JSON.parse(window.localStorage.config||"{}");
          $("#current_user").html(t.FullName+" ("+t.GroupName+")"),
          get_active_config(),
          getCandidacyPosition(o.TermID),
          getStatisticsOverview(),
          $("#lstPositions li").removeClass("active"),
          $("#lstPositions li:first").addClass("active")}),
          $(document).on("click","#lstPositions li",function(){
            var o=JSON.parse(window.localStorage.config||"{}");
            $("#lstPositions li").removeClass("active"),
            $(this).addClass("active"),
            $("#lblPosition").html($(this).text()),
            getCandidatesByPositionID($(this).attr("data-id"),o.TermID)});
