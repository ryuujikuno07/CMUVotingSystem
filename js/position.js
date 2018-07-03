function refresh(){
  fetch_all_position("1"),select2_config()}

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
    ""==$("#txtPosition").val()&&($("#txtPosition").next("span").text("Position Name is required."),t=!0),
    ""==$("#txtPositionCode").val()&&($("#txtPositionCode").next("span").text("Short Name is required."),t=!0),
    ""==$("#txtPerBallot").val()&&($("#txtPerBallot").next("span").text("No. of candidates on this position allow per ballot is required."),t=!0),
    ""==$('input[name="mycheckbox"]').val()&&($('input[name="mycheckbox"]').next("span").text("Voter filtration is required."),t=!0),
    1==t?(alert("Please input the required fields correctly."),!1):!0}

function save(){
  $("#btn-save").button("loading");
  var t=$("#authenticity_token").val(),
  o=sessionStorage.getItem("ipaddress"),
  e=new Array,
  i=new Object;
  if(i.ElectionID=$("#cboElectionTerm").val(),
  i.Position_Code=$("#txtPositionCode").val(),
  i.Position_Name=$("#txtPosition").val(),
  i.Short_Name="",
  i.Qualified=$("#txtLimit").val(),
  i.SortOrder=$("#txtRanking").val(),
  i.Allowed=$("#txtPerBallot").val(),
  i.AllowPerCourse=$("#txtPerCourse").val(),
  i.AllowPerCollege=$("#txtPerCollege").val(),
  i.AllowPerParty=$("#txtPerParty").val(),
  i.VoteForAll=1==$("#vfa").prop("checked")?"1":"0",
  i.VoteForCollege=1==$("#vfc").prop("checked")?"1":"0",
  i.VoteForCourse=1==$("#vfp").prop("checked")?"1":"0",
  e.push(i),""===t)
  if(validate()===!0){
    if(CheckIfExistPositionName($("#txtPosition").val())===!0)
    return void alert("Electoral Position already exist on the Particular Election Term");
    if(CheckIfExistPositionCode($("#txtPositionCode").val())===!0)
    return void alert("Electoral Position Code already exist on the Particular Election Term");
    $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",
    data:{command:"insert_position",data:e},
      success:function(t){
        var o=t;if(o.success===!0)
        $("#btn-save").button("reset"),
        alert(o.msg),
        window.location.href="position-list.php";
        else if(o.success===!1)
        return $("#btn-save").button("reset"),
        void alert(o.msg)},
      error:function(t){
        $("#btn-save").button("reset"),
        console.log("Error:"),
        console.log(t.responseText),
        console.log(t.message)}})}
        else
        $("#btn-save").button("reset");
        else 1==validate()?$.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",
        data:{command:"update_position",position_id:t,data:e},
          success:function(t){
            var o=t;
            if(o.success===!0)
            $("#btn-save").button("reset"),
            alert(o.msg),
            window.location.href="position-list.php";
            else if(o.success===!1)
            return $("#btn-save").button("reset"),
            void alert(o.msg)},
          error:function(t){
            $("#btn-save").button("reset"),
            console.log("Error:"),
            console.log(t.responseText),
            console.log(t.message)}}):$("#btn-save").button("reset")}

function fetch_all_position(t){
  var o=JSON.parse(window.localStorage.config||"{}"),
  e=sessionStorage.getItem("ipaddress");
  $("#processing-modal").modal("show"),
  $("#tbl_position tbody > tr").remove(),
  $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,type:"POST",
  crossDomain:!0,dataType:"json",
  data:{command:"select_all_position",TermID:o.TermID,page:t},
    success:function(t){
      var o=t;
      if(o&&o.positions.length>0){
        for(var e=0;e<o.positions.length;e++){
          var i=o.positions,
          s='<tr class="odd">                                                    <td>'+i[e].PositionName+"</td>                             <!-- <td>"+i[e].PositionCode+"</td>       -->                                                                   <td>"+i[e].Allowed+"</td>                                    <!-- <td>"+i[e].AllowPerCourses+"</td>                                    <td>"+i[e].AllowPerCollege+"</td>                                    <td>"+i[e].AllowPerParty+"</td>                                     <td>"+i[e].Qualified+"</td>    -->                                <!-- <td>"+i[e].SortOrder+"</td>              -->                       <td>"+i[e].VoteForAll+"</td>                                   <td>"+i[e].VoteForCourses+"</td>                                     <td>"+i[e].VoteForCollege+'</td>                                     <td class=" ">                                      <div class="text-right">                                        <a class="edit-Position-icon btn btn-success btn-xs" data-id="'+i[e].PositionID+'">                                          <i class="icon-pencil"></i>                                        </a>                                        <a class="remove-Position-icon btn btn-danger btn-xs" data-id="'+i[e].PositionID+'">                                          <i class="icon-remove"></i>                                        </a>                                      </div>                                    </td>                                </tr>';
          $("#tbl_position tbody").append(s),
          $(document).ready(function(){
            if ($('input[id="value"]').val() == 1)
              $("#check").html("<input type='checkbox' checked disabled/>");
            }),
        $(document).ready(function(){
            var e=JSON.parse(window.localStorage.config||"{}");
            $("#term").html(" ["+e.ElectionName+"  -  "+e.SchoolYear+"] ")
          });}
          $("#pagination").html(o.pagination),
          $("#tbl_position").addClass("tablesorter");
          var n=!0;
          $("table").trigger("update",[n])}
          $("#processing-modal").modal("hide")},
    error:function(t){
      $("#btn-save").button("reset"),
      console.log("Error:"),
      console.log(t.responseText),
      console.log(t.message),
      $("#processing-modal").modal("hide")}})}

function search_position(){
  if(""==$("#txtSearch").val())
  return alert("Please input item to search fields correctly."),refresh(),
  !1;
  var t=JSON.parse(window.localStorage.config||"{}"),
  o=sessionStorage.getItem("ipaddress");
  $("#processing-modal").modal("show"),
  $("#tbl_position tbody > tr").remove(),
  $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!0,
  type:"POST",crossDomain:!0,dataType:"json",
  data:{command:"search_position",TermID:t.TermID,value:$("#txtSearch").val(),page:"1"},
    success:function(t){
      var o=t;
      if(o&&o.positions.length>0){
        for(var e=0;e<o.positions.length;e++){
          var i=o.positions,
          s='<tr class="odd">                                                                   <td>'+i[e].PositionName+"</td>                             <!-- <td>"+i[e].PositionCode+"</td>       -->                                                                   <td>"+i[e].Allowed+"</td>                                    <!-- <td>"+i[e].AllowPerCourses+"</td>                                    <td>"+i[e].AllowPerCollege+"</td>                                    <td>"+i[e].AllowPerParty+"</td>                                     <td>"+i[e].Qualified+"</td>      -->                              <!-- <td>"+i[e].SortOrder+"</td>              -->                       <td>"+i[e].VoteForAll+"</td>                                    <td>"+i[e].VoteForCourses+"</td>                                   <td>"+i[e].VoteForCollege+'</td>                                    <td class=" ">                                      <div class="text-right">                                        <a class="edit-Position-icon btn btn-success btn-xs" data-id="'+i[e].PositionID+'">                                          <i class="icon-pencil"></i>                                        </a>                                        <a class="remove-Position-icon btn btn-danger btn-xs" data-id="'+i[e].PositionID+'">                                          <i class="icon-remove"></i>                                        </a>                                      </div>                                    </td>                                </tr>';
          $("#tbl_position tbody").append(s),
          $(document).ready(function(){
            var e=JSON.parse(window.localStorage.config||"{}");
            $("#term").html(" ["+e.ElectionName+"  -  "+e.SchoolYear+"] ")
          });}
          $("#pagination").html(o.pagination),
          $("#tbl_position").addClass("tablesorter");
          var n=!0;
          $("table").trigger("update",[n])}
          $("#processing-modal").modal("hide")},
    error:function(t){
      $("#btn-save").button("reset"),
      console.log("Error:"),
      console.log(t.responseText),
      console.log(t.message),
      $("#processing-modal").modal("hide")}})}

function selectOnlyThis(id){
    var mycheckbox = document.getElementsByName("mycheckbox");
    Array.prototype.forEach.call(mycheckbox,function(el){
      el.checked = false;
    });
    id.checked = true;
}



function search_positionTying(){
  if(""===$("#txtSearch").val())return void refresh();
  var t=JSON.parse(window.localStorage.config||"{}"),
  o=sessionStorage.getItem("ipaddress");
  $("#tbl_position tbody > tr").remove(),
  $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!0,type:"POST",
  crossDomain:!0,dataType:"json",
  data:{command:"search_position",TermID:t.TermID,value:$("#txtSearch").val(),page:"1"},
    success:function(t){
      var o=t;
      if(o&&o.positions.length>0){
        for(var e=0;e<o.positions.length;e++){
          var i=o.positions,
          s='<tr class="odd">                                              <td>'+i[e].PositionName+"</td>                             <!-- <td>"+i[e].PositionCode+"</td>       -->                                                                   <td>"+i[e].Allowed+"</td>                                    <!-- <td>"+i[e].AllowPerCourses+"</td>                                    <td>"+i[e].AllowPerCollege+"</td>                                    <td>"+i[e].AllowPerParty+"</td>                                     <td>"+i[e].Qualified+"</td>   -->                                 <!-- <td>"+i[e].SortOrder+"</td>              -->                       <td>"+i[e].VoteForAll+"</td>                                  <td>"+i[e].VoteForCourses+"</td>                                        <td>"+i[e].VoteForCollege+'</td>                                    <td class=" ">                                      <div class="text-right">                                        <a class="edit-Position-icon btn btn-success btn-xs" data-id="'+i[e].PositionID+'">                                          <i class="icon-pencil"></i>                                        </a>                                        <a class="remove-Position-icon btn btn-danger btn-xs" data-id="'+i[e].PositionID+'">                                          <i class="icon-remove"></i>                                        </a>                                      </div>                                    </td>                                </tr>';
          $("#tbl_position tbody").append(s)}
          $("#pagination").html(o.pagination),
          $("#tbl_position").addClass("tablesorter");
          var n=!0;
          $("table").trigger("update",[n])}},
    error:function(t){
      $("#btn-save").button("reset"),console.log("Error:"),console.log(t.responseText),console.log(t.message)}})}

function select2_config(){
  var t=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",
  data:{command:"select_For_ComboConfig"},
  success:function(t){
    var o=t;$("#cboElectionTerm").empty();
    for(var e=0;e<o.configs.length;e++){
      var i=o.configs,s='<option id="'+i[e].TermID+'" value="'+i[e].TermID+'">'+i[e].Config+"</option>";
      $("#cboElectionTerm").append(s)}},
  error:function(t){
    console.log("Error:"),console.log(t.responseText),
    console.log(t.message)}})}

    function select_College(){
      var t=sessionStorage.getItem("ipaddress");
      $.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!0,type:"POST",
      crossDomain:!0,dataType:"json",
      data:{command:"select_For_ComboCollege"},
        success:function(t){
          var e=t;$("#cboCollege").empty();
          for(var a=0;a<e.colleges.length;a++){
            var r=e.colleges,
            s='<option id="'+r[a].department_id+'" value="'+r[a].department_id+'">'+r[a].department_description+"</option>";
            $("#cboCollege").append(s)}},
        error:function(t){
          console.log("Error:"),
          console.log(t.responseText),
          console.log(t.message)}})}


function commandToClear(){
  $("#authenticity_token").val(""),
  $("#cboElectionTerm").val(""),
  $("#txtPositionCode").val(""),
  $("#txtPosition").val(""),
  $("#txtShortName").val(""),
  $("#txtRanking").val(""),
  $("#txtPerBallot").val(""),
  $("#cboCollege").val(""),
  $("#vfa").prop("checked",!1),
  $("#vfp").prop("checked",!1),
  $("#vfc").prop("checked",!1)}


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

function CheckIfExistPositionName(t){
  var o=sessionStorage.getItem("ipaddress"),
  t=!1;return $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!1,type:"POST",crossDomain:!0,dataType:"json",
  data:{command:"CheckIfExistPositionName",value:t},
    success:function(o){
      var e=o;console.log(e),1==e.success?t=!0:0==e.success&&(t=!1)}}),t}

function CheckIfExistPositionCode(t){
  var o=sessionStorage.getItem("ipaddress"),
  t=!1;return $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!1,type:"POST",crossDomain:!0,dataType:"json",
  data:{command:"CheckIfExistPositionCode",value:t},
    success:function(o){
      var e=o;console.log(e),1==e.success?t=!0:0==e.success&&(t=!1)}}),t}
      $(document).ready(function(){
        var t=JSON.parse(window.localStorage.user||"{}");
        Object.keys(t).length<1&&(console.log("redirect to main"),window.location.href="index.php"),
        $("#current_user").html(t.FullName+" ("+t.GroupName+")"),
        privilege(t),
        refresh(),select_College()}),
        $("#txtSearch").keyup(function(){
          console.log("fetching ..."),search_positionTying()}),
          $("#pagination").on("click",".page-numbers",function(){
            var t=$(this).attr("data-id");fetch_all_position(t)}),
            $(document).on("click",".edit-Position-icon",function(){
              var t=$(this).data("id"),
              o=sessionStorage.getItem("ipaddress");
              $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!0,type:"POST",
              data:{command:"get_position",position_id:t},
              success:function(t){
                var o=t;if(1==o.success)
                $("#authenticity_token").val(o.position.PositionID),
                $("#cboElectionTerm").val(o.position.TermID),
                $("#txtPositionCode").val(o.position.PositionCode),
                $("#txtPosition").val(o.position.PositionName),
                $("#txtShortName").val(o.position.ShortName),
                $("#txtLimit").val(o.position.Qualified),
                $("#txtRanking").val(o.position.SortOrder),
                $("#txtPerBallot").val(o.position.Allowed),
                $("#txtPerCourse").val(o.position.AllowPerCourses),
                $("#txtPerCollege").val(o.position.AllowPerCollege),
                $("#txtPerParty").val(o.position.AllowPerParty),
                1==o.position.VoteForAll?$("#vfa").prop("checked",!0):$("#vfa").prop("checked",!1),
                1==o.position.VoteForCollege?$("#vfc").prop("checked",!0):$("#vfc").prop("checked",!1),
                1==o.position.VoteForCourses?$("#vfp").prop("checked",!0):$("#vfp").prop("checked",!1),
                $("#cboCollege").val(o.position.CollegeID),
                $("#myModal").modal("show");
                else if(o.success===!1)return $("#myModal").modal("hide"),void alert(o.msg)}})}),
                $(document).on("click",".remove-Position-icon",function(){
                  if(confirm("Are you sure to delete this Position?")){
                    var t=$(this).data("id"),o=sessionStorage.getItem("ipaddress");
                    $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!0,type:"POST",
                    data:{command:"delete_position",position_id:t},
                    success:function(t){
                      var o=t;if(1==o.success)window.location.href="position-list.php";else if(o.success===!1)return void alert(o.msg)}})}});
                 $(document).ready(function(){
                        setInterval(function(){
                            $('#time').load('assets/time.php')
                        }, 1000);
                        });
