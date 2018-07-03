function get_active_config(){
  var t=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+t+"/cmuvoting/API/index.php",
  async:!1,type:"POST",crossDomain:!0,dataType:"json",
  data:{command:"get_active_config"},
    success:function(t){
      var o=t;
      return console.log(o),
      1!=o.success?void alert(o.msg):void(window.localStorage.config=JSON.stringify(o.config))},
    error:function(t){
      console.log("Error:"),console.log(t)}})}

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
  o=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",
  async:!0,type:"POST",crossDomain:!0,dataType:"json",
  data:{command:"getStatisticsOverview",TermID:t.TermID},
    success:function(t){
      var o=t;
      if(console.log(o),1!=o.success)
      return void alert(o.msg);
      window.localStorage.totalVoters=o.totalVoters,
      window.localStorage.totalNotVoted=o.totalNotVoted,
      window.localStorage.totalVoted=o.totalVoted;
      var e=window.localStorage.totalVoted||"{}",
      r=window.localStorage.totalVoters||"{}",
      s=window.localStorage.totalNotVoted||"{}";
      $("#announcement-voted-heading").html(e),
      $("#announcement-voteds-heading").html(s),
      $("#announcement-voters-heading").html(r)},
    error:function(t){
        console.log("Error:"),
        console.log(t)}})}
        
  function getVotersActuallyVoted(e){
            var
            a=JSON.parse(window.localStorage.config||"{}"),
            t=sessionStorage.getItem("ipaddress");
            $("#processing-modal").modal("show"),
            $("#tbl_voters tbody > tr").remove(),
            $.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",data:{command:"getVotersActuallyVoted",TermID:a.TermID,page:e},
            success:function(e){
            		var t=e;if(t&&t.students.length>0){
            			for(var a=0;a<t.students.length;a++){

            				var s=t.students,n='<tr class="odd">             <td>'+s[a].StudentID+"</td>                                <td>"+s[a].last_name+"</td>            <td>"+s[a].first_name+"</td>                                <td>"+s[a].middle_name+"</td>                      <td>"+s[a].Course+"</td><td>"+s[a].DateTimeVoted+'</td>                               </tr>';
            				$("#tbl_voters tbody").append(n)}
            				$("#pagination").html(t.pagination),$("#tbl_voters").addClass("tablesorter");
            				var o=!0;
            				$("table").trigger("update",[o])}
            				$("#processing-modal").modal("hide"),$(document).ready(function(){
              var e=JSON.parse(window.localStorage.config||"{}");
              $("#term").html(" ["+e.ElectionName+"  -  "+e.SchoolYear+"] ")
            });},
          error:function(t){		
                        console.log("Error:"),console.log(e),$("#processing-modal").modal("hide")}})}

function getVotersNotVoted(e){
          var
          a=JSON.parse(window.localStorage.config||"{}"),
          t=sessionStorage.getItem("ipaddress");
          $("#processing-modal").modal("show"),
          $("#tbl_voters2 tbody > tr").remove(),
          $.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",data:{command:"getVotersNotVoted",TermID:a.TermID,page:e},
          success:function(e){
          		var t=e;if(t&&t.students.length>0){
          			for(var a=0;a<t.students.length;a++){

          				var s=t.students,n='<tr class="odd">             <td>'+s[a].StudentID+"</td>                                <td>"+s[a].last_name+"</td>            <td>"+s[a].first_name+"</td>                                <td>"+s[a].middle_name+"</td>                      <td>"+s[a].Course+'</td>                               </tr>';
          				$("#tbl_voters2 tbody").append(n)}
          				$("#pagination").html(t.pagination),$("#tbl_voters2").addClass("tablesorter");
          				var o=!0;
          				$("table").trigger("update",[o])}
          				$("#processing-modal").modal("hide"),$(document).ready(function(){
              var e=JSON.parse(window.localStorage.config||"{}");
              $("#term").html(" ["+e.ElectionName+"  -  "+e.SchoolYear+"] ")
            });},
          error:function(t){		          
                        console.log("Error:"),console.log(e),$("#processing-modal").modal("hide")}})}

        $(document).ready(function(){
        var t=JSON.parse(window.localStorage.canvass_user||"{}");
        $("#current_user").html(t.FullName+" ("+t.GroupName+")"),get_active_config(),getStatisticsOverview(),getVotersActuallyVoted('1'),getVotersNotVoted('1')}),
          $(document).ready(function(){
                        setInterval(function(){
                            $('#time').load('assets/time.php')
                        }, 1000);
                        });
