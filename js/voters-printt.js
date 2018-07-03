function get_active_config(){
  var t=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!1,type:"POST",
  crossDomain:!0,dataType:"json",
  data:{command:"get_active_config"},
    success:function(t){
      var o=t;
      return console.log(o),1!=o.success?void alert(o.msg):void(window.localStorage.config=JSON.stringify(o.config))},
    error:function(t){
      console.log("Error:"),console.log(t)}})}

function getStatisticsOverview(){
  var t=JSON.parse(window.localStorage.config||"{}"),
  o=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!0,type:"POST",
  crossDomain:!0,dataType:"json",
  data:{command:"getStatisticsOverview",TermID:t.TermID},
    success:function(t){
      var o=t;
      if(console.log(o),1!=o.success)return void alert(o.msg);
      window.localStorage.totalVoters=o.totalVoters,
      window.localStorage.totalNotVoted=o.totalNotVoted,
      window.localStorage.totalVoted=o.totalVoted;
      var e=window.localStorage.totalVoted||"{}",
      r=window.localStorage.totalVoters||"{}";
      window.localStorage.totalNotVoted||"{}",
      $("#announcement-voted-heading").html(e),
      $("#announcement-voteds-heading").html(e),
      $("#announcement-voters-heading").html(r)},
    error:function(t){
      console.log("Error:"),console.log(t)}})}

function getVotersActuallyVoted(){
  var t=JSON.parse(window.localStorage.config||"{}"),
  o=sessionStorage.getItem("ipaddress");
  $("#tbl_voters tbody > tr").remove(),
  $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!0,type:"POST",
  crossDomain:!0,dataType:"json",
  data:{command:"getVotersActuallyVoted",TermID:t.TermID},
    success:function(t){
      var o=t;
      if(console.log(o),1!=o.success)
      return alert(o.msg),!1;
      if(o.students)
      for(var e=0;e<o.students.length;e++){
        var r=o.students[e],a="<tr>                                        <td> "+r.StudentID+" </td>                                        <td> "+r.last_name+" </td>                                        <td> "+r.first_name+" </td>                                        <td> "+r.middle_name+" </td>                                        <td>"+r.Course+"</td>                                    </tr>";
        $("#tbl_voters tbody").append(a),
      $(document).ready(function(){
        var e=JSON.parse(window.localStorage.config||"{}");
        $("#term").html(" ["+e.ElectionName+"  -  "+e.SchoolYear+"] ")
            });}},
    error:function(t){
      return console.log("Error:"),
      console.log(t),!1}})}

function getVotersNotVoted(){
  var t=JSON.parse(window.localStorage.config||"{}"),
  o=sessionStorage.getItem("ipaddress");
  $("#tbl_voters2 tbody > tr").remove(),
  $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!0,
  type:"POST",crossDomain:!0,dataType:"json",
  data:{command:"getVotersNotVoted",TermID:t.TermID},
    success:function(t){
      var o=t;
      if(console.log(o),1!=o.success)
      return alert(o.msg),!1;
      if(o.students)
      for(var e=0;e<o.students.length;e++){
        var r=o.students[e],a="<tr>                                        <td> "+r.StudentID+" </td>                                        <td> "+r.last_name+" </td>                                        <td> "+r.first_name+" </td>                                        <td> "+r.middle_name+" </td>                                        <td>"+r.Course+"</td>                                    </tr>";
        $("#tbl_voters2 tbody").append(a)}},
    error:function(t){
      return console.log("Error:"),
      console.log(t),!1}})}
      $(document).ready(function(){
        var t=JSON.parse(window.localStorage.canvass_user||"{}");
        $("#current_user").html(t.FullName+" ("+t.GroupName+")"),
        Date.prototype.yyyymmdd=function(){
          var t=this.getFullYear().toString(),
          o=(this.getMonth()+1).toString(),
          e=this.getDate().toString();
          return t+"/"+(o[1]?o:"0"+o[0])+"/"+(e[1]?e:"0"+e[0])},
          d=new Date,
          $("#date_now").html(d.toDateString()),get_active_config(),getStatisticsOverview(),getVotersActuallyVoted(),getVotersNotVoted(});
