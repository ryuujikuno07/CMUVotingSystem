function refresh(){
  fetch_all_party("1"),
  select2_config()}

function resetHelpInLine(){
  $("span.help-inline").each(function(){
    $(this).text("")})}

function logout(){
  window.localStorage.clear(),
  window.location.href="index.php"}

function validate(){
  resetHelpInLine(),
  $('input[type="text"]').each(function(){
    $(this).val($(this).val().trim())});
    var t=!1;
    return null==$("#cboElectionTerm").val()&&($("#cboElectionTerm").next("span").text("Election Term is required."),t=!0),
    ""==$("#txtName").val()&&($("#txtName").next("span").text("Partylist Name is required."),t=!0),
    ""==$("#txtShortName").val()&&($("#txtShortName").next("span").text("Partylist Shortname is required."),t=!0),
    ""==$("#txtExpName").val()&&($("#txtExpName").next("span").text("Partylist Expound Name is required."),t=!0),
    ""==$("#txtGoals").val()&&($("#txtGoals").next("span").text("Partylist Goals and Objectives is required."),t=!0),
    ""==$("#txtProjects").val()&&($("#txtProjects").next("span").text("Partylist Projects is required."),t=!0),
    ""==$("#dtpDateSubmitted").val()&&($("#dtpDateSubmitted").next("span").text("Date Submission is required."),t=!0),
    1==t?(alert("Please input all the required fields correctly."),!1):!0}

function save(){
  $("#btn-save").button("loading");
  var t=JSON.parse(window.localStorage.user||"{}"),
  e=$("#authenticity_token").val();
  if(""==e)
  if(1==validate()){
    var a=new Array;
    party=new Object,
    party.party_name=$("#txtName").val(),
    party.party_SName=$("#txtShortName").val(),
    party.party_logo="",
    party.party_goals=$("#txtGoals").val(),
    party.party_projects=$("#txtProjects").val(),
    party.party_submission=$("#dtpDateSubmitted").val(),
    party.created_by=t.FullName,
    party.modify_by=t.FullName,
    party.party_TermID=$("#cboElectionTerm").val(),a.push(party);
    var r=sessionStorage.getItem("ipaddress");
    $.ajax({url:"http://"+r+"/cmuvoting/API/index.php",async:!0,type:"POST",
    crossDomain:!0,dataType:"json",
    data:{command:"insert_partylist",data:a},
      success:function(t){
        var e=t;
        if(1==e.success)
        $("#btn-save").button("reset"),
        window.location.href="partylist-list.php";
        else if(e.success===!1)
        return $("#btn-save").button("reset"),
        void alert(e.msg)},
      error:function(t){
        $("#btn-save").button("reset"),
        console.log("Error:"),
        console.log(t.responseText),
        console.log(t.message)}})}
        else
        $("#btn-save").button("reset");
        else if(1==validate()){
          var a=new Array;
          party=new Object,
          party.party_name=$("#txtName").val(),
          party.party_SName=$("#txtShortName").val(),
          party.party_logo="",
          party.party_goals=$("#txtGoals").val(),
          party.party_projects=$("#txtProjects").val(),
          party.party_submission=$("#dtpDateSubmitted").val(),
          party.created_by=t.FullName,
          party.modify_by=t.FullName,
          party.party_TermID=$("#cboElectionTerm").val(),
          a.push(party);
          var r=sessionStorage.getItem("ipaddress");
          $.ajax({url:"http://"+r+"/cmuvoting/API/index.php",async:!0,
          type:"POST",crossDomain:!0,dataType:"json",
          data:{command:"update_party",party_id:e,data:a},
    success:function(t){
      var e=t;
      if(1==e.success)
      $("#btn-save").button("reset"),
      window.location.href="partylist-list.php";
      else if(e.success===!1)
      return $("#btn-save").button("reset"),
      void alert(e.msg)},
    error:function(t){
      $("#btn-save").button("reset"),
      console.log("Error:"),
      console.log(t.responseText),
      console.log(t.message)}})}
      else
      $("#btn-save").button("reset")}

function fetch_all_party(t){
  var e=sessionStorage.getItem("ipaddress");
  $("#processing-modal").modal("show"),
  $("#tbl_party tbody > tr").remove(),
  $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,type:"POST",
  crossDomain:!0,dataType:"json",
  data:{command:"select_all_party",page:t},
    success:function(t){
      var e=t;
      if(e&&e.partylist.length>0){
        for(var a=0;a<e.partylist.length;a++){
          var r=e.partylist,
          s='<tr class="odd">                                    <td>'+r[a].PartyName+"</td>                                    <!--<td>"+r[a].ExpName+"</td> -->                                    <td>"+r[a].ShortName+"</td>                                     <td>"+r[a].DateSubmitted+"</td>                                   <td>"+r[a].CreationDate+'</td>                                                                        <td class=" ">                                      <div class="text-right">                                        <a class="edit-party-icon btn btn-success btn-xs" data-id="'+r[a].PartyID+'">                                          <i class="icon-pencil"></i>                                        </a>                                        <a class="remove-party-icon btn btn-danger btn-xs" data-id="'+r[a].PartyID+'">                                          <i class="icon-remove"></i>                                        </a>                                      </div>                                    </td>                                </tr>';
          $("#tbl_party tbody").append(s),
        $(document).ready(function(){
            var e=JSON.parse(window.localStorage.config||"{}");
            $("#term").html(" ["+e.ElectionName+"  -  "+e.SchoolYear+"] ")
          });}
          $("#pagination").html(e.pagination),
          $("#tbl_party").addClass("tablesorter");
          var o=!0;$("table").trigger("update",[o])}
          $("#processing-modal").modal("hide")},
    error:function(t){
      $("#btn-save").button("reset"),
      console.log("Error:"),
      console.log(t.responseText),
      console.log(t.message),
      $("#processing-modal").modal("hide")}})}

function search_party(){
  if(""==$("#txtSearch").val())
  return void refresh(),!1;
  var t=sessionStorage.getItem("ipaddress");
  $("#processing-modal").modal("show"),
  $("#tbl_party tbody > tr").remove(),
  $.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!0,type:"POST",
  data:{command:"search_party",value:$("#txtSearch").val(),page:"1"},
    success:function(t){
      var e=t;
      if(e&&e.partylist.length>0){
        for(var a=0;a<e.partylist.length;a++){
          var r=e.partylist,
          s='<tr class="odd">                                    <td>'+r[a].PartyName+"</td>                                    <!--<td>"+r[a].ExpName+"</td> -->                                     <td>"+r[a].ShortName+"</td>                                    <td>"+r[a].DateSubmitted+"</td>                                   <td>"+r[a].CreationDate+"</td>                                     <td>"+r[a].Config+'</td>                                    <td class=" ">                                      <div class="text-right">                                        <a class="edit-party-icon btn btn-success btn-xs" data-id="'+r[a].PartyID+'">                                          <i class="icon-pencil"></i>                                        </a>                                        <a class="remove-party-icon btn btn-danger btn-xs" data-id="'+r[a].PartyID+'">                                          <i class="icon-remove"></i>                                        </a>                                      </div>                                    </td>                                </tr>';
          $("#tbl_party tbody").append(s)}
          $("#pagination").html(e.pagination),
          $("#tbl_party").addClass("tablesorter");
          var o=!0;$("table").trigger("update",[o])}
          $("#processing-modal").modal("hide")},
    error:function(t){
      console.log("Error:"),
      console.log(t),
      $("#processing-modal").modal("hide")}})}

function search_partytyping(){
    if(""==$("#txtSearch").val())
    return void refresh(),!1;
  var t=sessionStorage.getItem("ipaddress");
  $("#tbl_party tbody > tr").remove(),
  $.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!0,type:"POST",
  data:{command:"search_party",value:$("#txtSearch").val(),page:"1"},
    success:function(t){
      var e=t;
      if(e&&e.partylist.length>0){
        console.log(e.partylist);
        for(var a=0;a<e.partylist.length;a++){
          var r=e.partylist,
          s='<tr class="odd">                                    <td>'+r[a].PartyName+"</td>                                    <!--<td>"+r[a].ExpName+"</td>    -->                                   <td>"+r[a].ShortName+"</td>                                   <td>"+r[a].DateSubmitted+"</td>                                   <td>"+r[a].CreationDate+"</td>                                     <td>"+r[a].Config+'</td>                                    <td class=" ">                                      <div class="text-right">                                        <a class="edit-party-icon btn btn-success btn-xs" data-id="'+r[a].PartyID+'">                                          <i class="icon-pencil"></i>                                        </a>                                        <a class="remove-party-icon btn btn-danger btn-xs" data-id="'+r[a].PartyID+'">                                          <i class="icon-remove"></i>                                        </a>                                      </div>                                    </td>                                </tr>';
          $("#tbl_party tbody").append(s)}
          $("#pagination").html(e.pagination),
          $("#tbl_party").addClass("tablesorter");
          var o=!0;$("table").trigger("update",[o])}},
    error:function(t){
      console.log("Error:"),console.log(t)}})}

function select2_config(){
  var t=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!0,type:"POST",
  crossDomain:!0,dataType:"json",
  data:{command:"select2_config"},
    success:function(t){
      var e=t;$("#cboElectionTerm").empty();
      for(var a=0;a<e.configs.length;a++){
        var r=e.configs,
        s='<option id="'+r[a].TermID+'" value="'+r[a].TermID+'">'+r[a].Config+"</option>";
        $("#cboElectionTerm").append(s)}},
    error:function(t){
      console.log("Error:"),
      console.log(t.responseText),
      console.log(t.message)}})}

function commandtoClear(){
  $("#authenticity_token").val(""),
  $("#txtName").val(""),
  $("#txtExpName").val(""),
  $("#txtGoals").val(""),
  $("#txtProjects").val(""),
  $("#dtpDateSubmitted").val("")}

function privilege(t){
  1==t._Dashboard&&$("#LIST li").eq(0).removeClass("hidden"),
  1==t._UsersAccount&&$("#LIST li").eq(1).removeClass("hidden"),
  1==t._Student&&$("#LIST li").eq(2).removeClass("hidden"),
  1==t._PartyList&&$("#LIST li").eq(3).removeClass("hidden"),
  1==t._Candidates&&$("#LIST li").eq(4).removeClass("hidden"),
  1==t._ElectoralPosition&&$("#LIST li").eq(5).removeClass("hidden"),
  1==t._AcademicProgram&&$("#LIST li").eq(6).removeClass("hidden"),
  1==t._ElectionConfig&&$("#LIST li").eq(7).removeClass("hidden"),
  1==t._UsersAccount&&$("#LIST li").eq(8).removeClass("hidden")}
  $(document).ready(function(){
    var t=JSON.parse(window.localStorage.user||"{}");
    Object.keys(t).length<1&&(console.log("redirect to main"),window.location.href="index.php"),
    $("#current_user").html(t.FullName+" ("+t.GroupName+")"),
    privilege(t),
    fetch_all_party("1"),
    select2_config()}),
    $("#txtSearch").keyup(function(){
      console.log("fetching ..."),search_partytyping()}),
      $(document).on("click",".edit-party-icon",function(){
        var t=$(this).data("id"),
        e=sessionStorage.getItem("ipaddress");
        $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,type:"POST",data:{command:"get_party",party_id:t},
          success:function(t){
            var e=t;
            if(1==e.success){
              $("#authenticity_token").val(e.party.PartyID),
              $("#cboElectionTerm").val(e.party.TermID),
              $("#txtName").val(e.party.PartyName),
              $("#txtShortName").val(e.party.ShortName),
              $("#txtGoals").val(e.party.Goals),
              $("#txtProjects").val(e.party.Projects);
              var a=e.party.DateSubmitted,
              r=a.slice(0,10).split("-"),
              s=r[0]+"-"+r[1]+"-"+r[2];
              $("#dtpDateSubmitted").val(s),
              $("#myModal").modal("show")}
              else if(e.success===!1)
              return void alert(e.msg)}})}),
              $(document).on("click",".remove-party-icon",function(){
                if(confirm("Are you sure to delete this Partylist?")){
                  var t=$(this).data("id"),
                  e=sessionStorage.getItem("ipaddress");
                  $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,type:"POST",data:{command:"delete_party",party_id:t},
                  success:function(t){
                    var e=t;
                    if(1==e.success)alert(e.msg),
                    window.location.href="partylist-list.php";
                    else if(e.success===!1)
                    return void alert(e.msg)}})}}),
                    $("#pagination").on("click",".page-numbers",
                    function(){var t=$(this).attr("data-id");fetch_all_party(t)});
                    $(document).ready(function(){
                        document.getElementsByName("dtpDateSubmitted")[0].setAttribute('min', new Date().toISOString().split('T')[0]);
                    });
                     $(document).ready(function(){
                        setInterval(function(){
                            $('#time').load('assets/time.php')
                        }, 1000);
                        });
