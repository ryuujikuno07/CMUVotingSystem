function getStatisticalCharts(){
  var t=JSON.parse(window.localStorage.canvass_positions||"{}"),
  a=JSON.parse(window.localStorage.config||"{}"),
  o=sessionStorage.getItem("ipaddress"),
  e=new Array;
  $("#content").empty(),
  $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!1,type:"POST",
  crossDomain:!0,dataType:"json",
  data:{command:"getCandidatesFinalCanvassing",TermID:a.TermID},
    success:function(t){
      var a=t;if(1!=a.success)return alert(a.msg),!1;
      if(a.candidates.length>0)
        for(var o=0;o<a.candidates.length;o++){
          var i=a.candidates[o],
          s=new Object;
          s.CandidateName=i.CandidateName,
          s.VoteCount=i.VoteCount,
          s.PositionID=i.PositionID,e.push(s)}}});
          for(var i=0;i<t.length;i++){
            for(var s=t[i],n=(new Array,' <div class="panel panel-primary">                        <div class="panel-heading" align="center">                            <i class="icon-long-arrow-right"></i><strong class="panel-title">'+s.PositionName+'</strong>                        </div>                        <div class="panel-body">'),
            r=0;r<e.length;r++){
              var d=e[r];
              if(s.PositionID==d.PositionID){
                var l=window.localStorage.totalVoters||"{}",
                c=d.VoteCount/l*100;
                n+='<div class="row">                                <div class="col-md-4">                                    <p class="lead">'+d.CandidateName+'</p>                                </div>                                <div class="col-md-6">                                    <div class="progress">                                      <div class="progress-bar" role="progressbar" aria-valuenow="'+Number(c).toFixed(2)+'" aria-valuemin="0" aria-valuemax="100" style="width: '+Number(c).toFixed(2)+'%;">                                       ('+Number(c).toFixed(2)+"%) "+d.VoteCount+'                                      </div>                                    </div>                                </div>                                <div class="col-md-2">                                    <p class="lead">('+Number(c).toFixed(2)+" %) "+d.VoteCount+'</p>                                </div>                            </div>                            <!-- <div class="flot-chart">                                <div id="'+s.PositionID+'" class="flot-chart-content"></div>                            </div> -->'}}n+="</div>            </div>",$("#content").append(n)}
            $(document).ready(function(){
            var e=JSON.parse(window.localStorage.config||"{}");
            $("#term").html(" ["+e.ElectionName+"  -  "+e.SchoolYear+"] ")
          });}

function date_time(id){
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
  a=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+a+"/cmuvoting/API/index.php",
  async:!0,type:"POST",crossDomain:!0,
  dataType:"json",data:{command:"getStatisticsOverview",TermID:t.TermID},
    success:function(t){
      var a=t;
      if(console.log(a),1!=a.success)
      return void alert(a.msg);
      window.localStorage.totalVoters=a.totalVoters,
      window.localStorage.totalNotVoted=a.totalNotVoted,
      window.localStorage.totalVoted=a.totalVoted;{
        var o=window.localStorage.totalVoted||"{}",
        e=window.localStorage.totalVoters||"{}",
        s=window.localStorage.totalNotVoted||"{}";}
        $("#announcement-voted-heading").html(o),
        $("#announcement-voteds-heading").html(s),
        $("#announcement-voters-heading").html(e)},
    error:function(t){
      console.log("Error:"),
      console.log(t)}})}
      $(document).ready(function(){
        getStatisticsOverview(),
        getStatisticalCharts()}),
      $(document).ready(function(){
        setInterval(function(){
            $('#time').load('assets/time.php')
        }, 1000);
        });
