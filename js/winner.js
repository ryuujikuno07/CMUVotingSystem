function get_active_config(){
  var t=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!1,
  type:"POST",crossDomain:!0,dataType:"json",
  data:{command:"get_active_config"},
    success:function(t){
      var e=t;
      return console.log(e),
      1!=e.success?void alert(e.msg):void(window.localStorage.config=JSON.stringify(e.config))},
    error:function(t){
      console.log("Error:"),
      console.log(t)}})}

    function date_time(id)
{
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
        d = date.getDate();
        day = date.getDay();
        days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        h = date.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        result = ''+days[day]+' '+months[month]+' '+d+' '+year+' '+h+':'+m+':'+s;
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("'+id+'");','1000');
        return true;
}

function getStatisticsOverview(){
  var t=JSON.parse(window.localStorage.config||"{}"),
  e=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,
  type:"POST",crossDomain:!0,dataType:"json",
  data:{command:"getStatisticsOverview",TermID:t.TermID},
    success:function(t){
      var e=t;
      if(console.log(e),1!=e.success)
      return void alert(e.msg);
      window.localStorage.totalVoters=e.totalVoters,
      window.localStorage.totalNotVoted=e.totalNotVoted,
      window.localStorage.totalVoted=e.totalVoted;
      var o=window.localStorage.totalVoted||"{}",
      a=window.localStorage.totalVoters||"{}",
      s=window.localStorage.totalNotVoted||"{}";
      $("#announcement-voted-heading").html(o),
      $("#announcement-voteds-heading").html(s),
      $("#announcement-voters-heading").html(a)},
    error:function(t){
      console.log("Error:"),
    console.log(t)}})}

function GenerateRankingResult(){
  var t=JSON.parse(window.localStorage.canvass_positions||"{}"),
  e=JSON.parse(window.localStorage.config||"{}"),
  o=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!0,
  type:"POST",crossDomain:!0,dataType:"json",
  data:{command:"getCandidateWinners",TermID:e.TermID},
    success:function(e){
      var o=e;console.log(o);
      var a="";
      if($("#content2").empty(),1!=o.success)
      return alert(o.msg),!1;
        for(var n=0;n<t.length;n++){
          var s=t[n];
          if(a+='<div class="panel panel-default">                                    <div class="panel-heading">                                        <h3 class="text-center"><strong>'+s.PositionName+'</strong></h3>                                    </div>                                    <div class="panel-body">                                        <table class="table table-condensed" id="tbl_voters">                                            <thead>                                                <tr>                                                    <td class="text-center"><strong>Name of Candidate</strong>                                                    </td>                                                    <td class="text-center"><strong>Course</strong>                                                    </td>                                                    <td class="text-center"><strong>Votes Garnered</strong>                                                    </td>                                                </tr>                                            </thead>                                            <tbody>',o.candidates.length>0)for(var r=0;r<o.candidates.length;r++){var d=o.candidates[r];s.PositionID==d.PositionID&&(a+='<tr>                                                <td class="lead text-center"> '+d.CandidateName+' </td>                                                <td class="lead text-center"> '+d.Program+' </td>                                                <td class="text-center lead">'+d.VoteCount+"</td>                                            </tr>",
          $("#tbl_candidate tbody").append(a))}
          if(o.candidates2.length>0)
          for(var r=0;r<o.candidates2.length;r++){
            var i=o.candidates2[r];s.PositionID==i.PositionID&&(a+='<tr>                                                <td class="lead text-center"> '+i.CandidateName+' </td>                                                <td class="lead text-center"> '+i.Program+' </td>                                                <td class="text-center lead">'+i.VoteCount+"</td>                                            </tr>",$("#tbl_candidate tbody").append(a))}a+="</tbody>                            </table>                        </div>                    </div>"}
            $("#print_content").append(a),
            $(document).ready(function(){
              var e=JSON.parse(window.localStorage.config||"{}");
              $("#term").html(" ["+e.ElectionName+"  -  "+e.SchoolYear+"] ")
                      });},
        error:function(t){
          return console.log("Error:"),
        console.log(t),!1}})}
        $(document).ready(function(){
          var t=JSON.parse(window.localStorage.canvass_user||"{}");
          $("#current_user").html(t.FullName+" ("+t.GroupName+")"),
            get_active_config(),
            getStatisticsOverview(),
            GenerateRankingResult()}),
                  $(document).ready(function(){
                        setInterval(function(){
                            $('#time').load('assets/time.php')
                        }, 1000);
                        });
