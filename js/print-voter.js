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
        
 function Print_Ballot(e){
            var
            a=JSON.parse(window.localStorage.config||"{}"),
            t=sessionStorage.getItem("ipaddress");
            $("#processing-modal").modal("show"),
            $("#tbl_voters tbody > tr").remove(),
            $.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",data:{command:"Print_Ballot",TermID:a.TermID,page:e},
            success:function(e){
                var t=e;if(t&&t.candidates.length>0){
                  for(var a=0;a<t.candidates.length;a++){

                    var s=t.candidates,n='<tr> <td><strong>Candidate Name</strong></td> <td><strong>Position</strong></td> <td><strong>Partylist</strong></td> </tr>  <tr class="odd">             <td>'+s[a].CandidateName+"</td>                                <td>"+s[a].PositionName+"</td>            <td>"+s[a].PartyName+'</td>                               </tr>';
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

        $(document).ready(function(){
        var t=JSON.parse(window.localStorage.canvass_user||"{}");
        $("#current_user").html(t.FullName+" ("+t.GroupName+")"),Print_Ballot('1'),get_active_config());
