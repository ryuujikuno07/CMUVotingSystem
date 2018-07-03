function refresh(){
  fetch_all_user("1"),fetch_all_user_group("1")}

function resetHelpInLine(){
  $("span.help-inline").each(function(){
    $(this).text("")})}

function logout(){
  window.localStorage.clear(),
  window.location.href=" index.php"}

function validate(){
  resetHelpInLine(),
  $('input[type="text"]').each(function(){$(this).val($(this).val().trim())});
  var e=!1;
  return null==$("#cboUserGroup").val()&&($("#cboUserGroup").next("span").text("User Group is required."),e=!0),
  ""==$("#txtFirstName").val()&&($("#txtFirstName").next("span").text("First Name is required."),e=!0),
  ""==$("#txtMiddleName").val()&&($("#txtMiddleName").next("span").text("Middle Name is required."),e=!0),
  ""==$("#txtLastName").val()&&($("#txtLastName").next("span").text("Last Name is required."),e=!0),
  ""==$("#txtUsername").val()&&($("#txtUsername").next("span").text("Username is required."),e=!0),
  $("#txtPassword").val().length<6&&($("#txtPassword").next("span").text("Password is too short."),e=!0),
  ""==$("#txtPassword2").val()&&($("#txtPassword2").next("span").text("Confirm Password is required."),e=!0),
  $("#txtPassword").val()!==$("#txtPassword2").val()&&($("#txtPassword2").next("span").text("Password did not match."),e=!0),
  1==e?(alert("Please input all the required fields correctly."),!1):!0}

  function validateUserGroup(){
    resetHelpInLine(),
    $('input[type="text"]').each(function(){$(this).val($(this).val().trim())});
    var e=!1;
    return""==$("#txtGroupName").val()&&($("#txtGroupName").next("span").text("Group Name is required."),e=!0),
    ""==$("#txtDesc").val()&&($("#txtDesc").next("span").text("Description is required."),e=!0),
    1==e?(alert("Please input all the required fields correctly."),!1):!0}

function saveUserAccount(){
  $("#btn-save").button("loading");
  var e=$("#authenticity_token").val(),
  s=JSON.parse(window.localStorage.user||"{}");
  if(""==e)
  if(1==validate()){
    var t=new Array;
    usersAcc=new Object,
    usersAcc.User_Group=$("#cboUserGroup").val(),
    usersAcc.First_Name=$("#txtFirstName").val(),
    usersAcc.Middle_Name=$("#txtMiddleName").val(),
    usersAcc.Last_Name=$("#txtLastName").val(),
    usersAcc.User_Username=$("#txtUsername").val(),
    usersAcc.User_Password=$("#txtPassword").val(),
    usersAcc.CreatedBy=s.UserAccountID,
    t.push(usersAcc);
    var r=sessionStorage.getItem("ipaddress");
    $.ajax({url:"http://"+r+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",data:{command:"insert_user",data:t},
    success:function(e){
      var s=e;
      if(1==s.success)
      $("#btn-save").button("reset"),
      window.location.href="user-account-list.php";
      else if(s.success===!1)
      return $("#btn-save").button("reset"),
      void alert(s.error)},
    error:function(e){
      $("#btn-save").button("reset"),
      console.log("Error:"),
      console.log(e.responseText),
      console.log(e.message)}})}
      else $("#btn-save").button("reset");
      else if(1==validate()){
        var t=new Array;
        usersAcc=new Object,
        usersAcc.User_Group=$("#cboUserGroup").val(),
        usersAcc.First_Name=$("#txtFirstName").val(),
        usersAcc.Middle_Name=$("#txtMiddleName").val(),
        usersAcc.Last_Name=$("#txtLastName").val(),
        usersAcc.User_Username=$("#txtUsername").val(),
        usersAcc.User_Password=$("#txtPassword").val(),
        usersAcc.ModifiedBy=s.UserAccountID,
        t.push(usersAcc);
        var r=sessionStorage.getItem("ipaddress");
        $.ajax({url:"http://"+r+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",data:{command:"update_user",UserAccountID:e,data:t},
        success:function(e){
          var s=e;
          if(1==s.success)
          $("#btn-save").button("reset"),
          window.location.href="user-account-list.php";
          else if(s.success===!1)
          return $("#btn-save").button("reset"),
          void alert(s.error)},
          error:function(e){
            $("#btn-save").button("reset"),
            console.log("Error:"),
            console.log(e.responseText),
            console.log(e.message)}})}
            else $("#btn-save").button("reset")}

function saveUserGroup(){
  $("#btn-saveUserGroup").button("loading");
  var e=$("#authenticationGroupID").val();
  if(""==e)
  if(1==validateUserGroup()){
    var s=new Array;
    UserGroup=new Object,
    UserGroup.Group_Name=$("#txtGroupName").val(),
    UserGroup.Group_Desc=$("#txtDesc").val(),
    UserGroup.DashBoard=1==$("#chckDashBoard").prop("checked")?"1":"0",
    UserGroup.UserAcc=1==$("#chckUserAcc").prop("checked")?"1":"0",
    UserGroup.College=1==$("#chckCollege").prop("checked")?"1":"0",
    UserGroup.Student=1==$("#chckStudent").prop("checked")?"1":"0",
    UserGroup.Party=1==$("#chckParty").prop("checked")?"1":"0",
    UserGroup.Candidates=1==$("#chckCandidates").prop("checked")?"1":"0",
    UserGroup.Electoral=1==$("#chckElectoral").prop("checked")?"1":"0",
    UserGroup.Academic=1==$("#chckAcademic").prop("checked")?"1":"0",
    UserGroup.Election=1==$("#chckElection").prop("checked")?"1":"0",
    s.push(UserGroup);
    var t=sessionStorage.getItem("ipaddress");
    $.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",data:{command:"insert_user_group",data:s},
    success:function(e){
      var s=e;
      if(1==s.success)
      $("#btn-saveUserGroup").button("reset"),
      window.location.href="user-account-list.php";
      else if(0==s.success)
      return $("#btn-saveUserGroup").button("reset"),
      void alert(s.error)},
    error:function(e){
      $("#btn-save").button("reset"),
      console.log("Error:"),
      console.log(e.responseText),
      console.log(e.message)}})}
      else $("#btn-saveUserGroup").button("reset");
      else if(1==validateUserGroup()){
        var s=new Array;
        UserGroup=new Object,
        UserGroup.Group_ID=$("#authenticationGroupID").val(),
        UserGroup.Group_Name=$("#txtGroupName").val(),
        UserGroup.Group_Desc=$("#txtDesc").val(),
        UserGroup.DashBoard=1==$("#chckDashBoard").prop("checked")?"1":"0",
        UserGroup.UserAcc=1==$("#chckUserAcc").prop("checked")?"1":"0",
        UserGroup.College=1==$("#chckCollege").prop("checked")?"1":"0",
        UserGroup.Student=1==$("#chckStudent").prop("checked")?"1":"0",
        UserGroup.Party=1==$("#chckParty").prop("checked")?"1":"0",
        UserGroup.Candidates=1==$("#chckCandidates").prop("checked")?"1":"0",
        UserGroup.Electoral=1==$("#chckElectoral").prop("checked")?"1":"0",
        UserGroup.Academic=1==$("#chckAcademic").prop("checked")?"1":"0",
        UserGroup.Election=1==$("#chckElection").prop("checked")?"1":"0",
        s.push(UserGroup);
        var t=sessionStorage.getItem("ipaddress");
        $.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",data:{command:"update_user_group",GroupID:e,data:s},
        success:function(e){
          var s=e;if(1==s.success)$("#btn-saveUserGroup").button("reset"),window.location.href="user-account-list.php";else if(0==s.success)return $("#btn-saveUserGroup").button("reset"),void alert(s.error)},
        error:function(e){
          $("#btn-save").button("reset"),
          console.log("Error:"),
          console.log(e.responseText),
          console.log(e.message)}})}
          else $("#btn-saveUserGroup").button("reset")}

function search_user(){
  var e=sessionStorage.getItem("ipaddress"),
  s=$("#searchValue").val();
  $("#processing-modal").modal("show"),
  $("#tbl_user_account tbody > tr").remove(),
  $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,type:"POST",
  crossDomain:!0,dataType:"json",
  data:{command:"search_user",value:s},
    success:function(e){
      var s=e;
      if(s&&s.users.length>0){
        for(var t=0;t<s.users.length;t++){
          var r=s.users,o='<tr class="odd">                                    <td>'+r[t].FullName+"</td>                                    <td>"+r[t].UserName+"</td>                                    <td>"+r[t].GroupName+'</td>                                    <td class=" ">                                      <div class="text-right">                                           <a data-toggle="modal" data-target="#uepassModal" class="btn btn-success btn-xs" data-id="'+r[t].UserAccountID+'">                                          <i class="icon-pencil"></i>                                        </a>             <input type="hidden" class="edit-usersaccount-icon btn btn-success btn-xs" data-id="'+r[t].UserAccountID+'"/>                       <a data-toggle="modal" data-target="#urpassModal" class="btn btn-danger btn-xs" data-id="'+r[t].UserAccountID+'">                                          <i class="icon-remove"></i>                                        </a>   <input type="hidden" class="remove-usersaccount-icon btn btn-success btn-xs" data-id="'+r[t].UserAccountID+'"/>                                   </div>                                     </td>                                </tr>';
          $("#tbl_user_account tbody").append(o)}
          $("#pagination").html(s.pagination),
          $("#tbl_user_account").addClass("tablesorter");
          var a=!0;
          $("table").trigger("update",[a])}
          $("#processing-modal").modal("hide")},
        error:function(e){
          $("#btn-save").button("reset"),
          console.log("Error:"),
          console.log(e.responseText),
          console.log(e.message),
          $("#processing-modal").modal("hide")}})}

function search_userTyping(){
  var e=sessionStorage.getItem("ipaddress"),
  s=$("#searchValue").val();
  $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,type:"POST",
  crossDomain:!0,dataType:"json",
  data:{command:"search_user",value:s},
  success:function(e){
    var s=e;
    $("#tbl_user_account tbody > tr").remove();
    for(var t=0;t<s.users.length;t++){
      var r=s.users,o='<tr class="odd">                            <td>'+r[t].FullName+"</td>                            <td>"+r[t].UserName+"</td>                            <td>"+r[t].GroupName+'</td>                            <td class=" ">                              <div class="text-right">                                                     <a data-toggle="modal" data-target="#uepassModal" class="btn btn-success btn-xs" data-id="'+r[t].UserAccountID+'">                                          <i class="icon-pencil"></i>                                        </a>             <input type="hidden" class="edit-usersaccount-icon btn btn-success btn-xs" data-id="'+r[t].UserAccountID+'"/>                       <a data-toggle="modal" data-target="#urpassModal" class="btn btn-danger btn-xs" data-id="'+r[t].UserAccountID+'">                                          <i class="icon-remove"></i>                                        </a>   <input type="hidden" class="remove-usersaccount-icon btn btn-success btn-xs" data-id="'+r[t].UserAccountID+'"/>                                                                 </div>                            </td>                        </tr>';
      $("#tbl_user_account tbody").append(o)}
      $("#tbl_user_account").addClass("tablesorter");
      var a=!0;
      $("table").trigger("update",[a])},
    error:function(e){
      $("#btn-save").button("reset"),
      console.log("Error:"),
      console.log(e.responseText),
      console.log(e.message)}})}

function search_user_group(){
  var e=sessionStorage.getItem("ipaddress"),
  s=$("#searchValue1").val();
  $("#processing-modal").modal("show"),
  $("#tbl_user_group tbody > tr").remove(),
  $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",
  data:{command:"search_user_group",value:s},
    success:function(e){
      var s=e;$("#cboUserGroup").empty();
      if(s&&s.groups.length>0){
        for(var t=0;t<s.groups.length;t++){
          var r=s.groups,o="<tr>                                    <td>"+r[t].GroupName+"</td>                                    <td>"+r[t].Desc+'</td>                                    <td class=" ">                                      <div class="text-right">                                                      <a data-toggle="modal" data-target="#gepassModal" class="btn btn-success btn-xs" data-id="'+r[t].GroupID+'">                                          <i class="icon-pencil"></i>                                        </a>             <input type="hidden" class="edit-group-icon btn btn-success btn-xs" data-id="'+r[t].GroupID+'"/>                       <a data-toggle="modal" data-target="#grpassModal" class="btn btn-danger btn-xs" data-id="'+r[t].GroupID+'">                                          <i class="icon-remove"></i>                                        </a>   <input type="hidden" class="remove-group-icon btn btn-success btn-xs" data-id="'+r[t].GroupID+'"/>                                                                       </div>                                    </td>                                </tr>';
          $("#tbl_user_group tbody").append(o);
          var a='<option id="'+r[t].GroupID+'" value="'+r[t].GroupID+'">'+r[t].GroupName+"</option>";
          $("#cboUserGroup").append(a)}
          $("#pagination").html(s.pagination),
          $("#tbl_user_group").addClass("tablesorter");
          var c=!0;
          $("table").trigger("update",[c])}
          $("#processing-modal").modal("hide")},
        error:function(e){
          $("#btn-save").button("reset"),
          console.log("Error:"),
          console.log(e.responseText),
          console.log(e.message),
          $("#processing-modal").modal("hide")}})}

function search_user_groupTyping(){
  var e=sessionStorage.getItem("ipaddress"),
  s=$("#searchValue1").val();
  $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,
  dataType:"json",data:{command:"search_user_group",value:s},
    success:function(e){
      var s=e;
      $("#tbl_user_group tbody > tr").remove(),$("#cboUserGroup").empty();
      for(var t=0;t<s.groups.length;t++){
        var r=s.groups,o="<tr>                            <td>"+r[t].GroupName+"</td>                            <td>"+r[t].Desc+'</td>                            <td class=" ">                              <div class="text-right">                                          <a data-toggle="modal" data-target="#gepassModal" class="btn btn-success btn-xs" data-id="'+r[t].GroupID+'">                                          <i class="icon-pencil"></i>                                        </a>             <input type="hidden" class="edit-group-icon btn btn-success btn-xs" data-id="'+r[t].GroupID+'"/>                       <a data-toggle="modal" data-target="#grpassModal" class="btn btn-danger btn-xs" data-id="'+r[t].GroupID+'">                                          <i class="icon-remove"></i>                                        </a>   <input type="hidden" class="remove-group-icon btn btn-success btn-xs" data-id="'+r[t].GroupID+'"/>                                                              </div>                            </td>                        </tr>';
        $("#tbl_user_group tbody").append(o);var a='<option id="'+r[t].GroupID+'" value="'+r[t].GroupID+'">'+r[t].GroupName+"</option>";
        $("#cboUserGroup").append(a)}
        $("#tbl_user_group").addClass("tablesorter");
        var c=!0;
        $("table").trigger("update",[c])},
      error:function(e){
        $("#btn-save").button("reset"),
        console.log("Error:"),
        console.log(e.responseText),
        console.log(e.message)}})}

function fetch_all_user(e){
  var s=sessionStorage.getItem("ipaddress");
  $("#processing-modal").modal("show"),
  $("#tbl_user_account tbody > tr").remove(),
  $.ajax({url:"http://"+s+"/cmuvoting/API/index.php",async:!0,type:"POST",
  crossDomain:!0,dataType:"json",
  data:{command:"select_all_user",page:e},
    success:function(e){
      var s=e;
      if(s&&s.users.length>0){
        for(var t=0;t<s.users.length;t++){
          var r=s.users,o='<tr class="odd">                                    <td>'+r[t].FullName+"</td>                                    <td>"+r[t].UserName+"</td>                                    <td>"+r[t].GroupName+'</td>                                    <td class=" ">                                      <div class="text-right">                                        <a data-toggle="modal" data-target="#uepassModal" class="btn btn-success btn-xs" data-id="'+r[t].UserAccountID+'">                                          <i class="icon-pencil"></i></a>             <input type="hidden" class="edit-usersaccount-icon btn btn-success btn-xs" data-id="'+r[t].UserAccountID+'"/>                       <a data-toggle="modal" data-target="#urpassModal" class="btn btn-danger btn-xs" data-id="'+r[t].UserAccountID+'">                                          <i class="icon-remove"></i>                                        </a>   <input type="hidden" class="remove-usersaccount-icon btn btn-success btn-xs" data-id="'+r[t].UserAccountID+'"/>                                   </div>                                    </td>                                </tr>';
          $("#tbl_user_account tbody").append(o)}
          $("#Userpagination").html(s.pagination),
          $("#tbl_user_account").addClass("tablesorter");
          var a=!0;
          $("table").trigger("update",[a])}
          $("#processing-modal").modal("hide")},
        error:function(e){
          $("#btn-save").button("reset"),
          console.log("Error:"),
          console.log(e.responseText),
          console.log(e.message),
          $("#processing-modal").modal("hide")}})}

function fetch_all_user_group(e){
  var s=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+s+"/cmuvoting/API/index.php",
  async:!0,type:"POST",crossDomain:!0,dataType:"json",
  data:{command:"select_all_user_group",page:e},
  success:function(e){
    var s=e;
    if($("#tbl_user_group tbody > tr").remove(),$("#cboUserGroup").empty(),s&&s.groups.length>0){
      for(var t=0;t<s.groups.length;t++){
        var r=s.groups,o="<tr>                                    <td>"+r[t].GroupName+"</td>                                    <td>"+r[t].Desc+'</td>                                    <td class=" ">                                      <div class="text-right">                                            <a data-toggle="modal" data-target="#gepassModal" class="btn btn-success btn-xs" data-id="'+r[t].GroupID+'">                                          <i class="icon-pencil"></i>                                        </a>             <input type="hidden" class="edit-group-icon btn btn-success btn-xs" data-id="'+r[t].GroupID+'"/>                       <a data-toggle="modal" data-target="#grpassModal" class="btn btn-danger btn-xs" data-id="'+r[t].GroupID+'">                                          <i class="icon-remove"></i>                                        </a>   <input type="hidden" class="remove-group-icon btn btn-success btn-xs" data-id="'+r[t].GroupID+'"/>                                   </div>                                     </td>                                </tr>';
        $("#tbl_user_group tbody").append(o);
        var a='<option id="'+r[t].GroupID+'" value="'+r[t].GroupID+'">'+r[t].GroupName+"</option>";
        $("#cboUserGroup").append(a)}
        $("#Grouppagination").html(s.pagination),
        $("#tbl_user_group").addClass("tablesorter");
        var c=!0;
        $("table").trigger("update",[c])}},
      error:function(e){
        $("#btn-save").button("reset"),
        console.log("Error:"),
        console.log(e.responseText),
        console.log(e.message)}})}

function commandtoClearUserAccount(){
  $("#authenticity_token").val(""),
  $("#txtFirstName").val(""),
  $("#txtMiddleName").val(""),
  $("#txtLastName").val(""),
  $("#txtUsername").val(""),
  $("#txtPassword").val(""),
  $("#txtPassword2").val(""),
  $("#aPassword").val(""),
  $("#uPassword").val(""),
  $("#rPassword").val("")}

function commandToClearUserGroup(){
  $("#authenticationGroupID").val(""),
  $("#txtGroupName").val(""),
  $("#txtDesc").val(""),
  $("#gaPassword").val(""),
  $("#gePassword").val(""),
  $("#grPassword").val(""),
  $("#chckDashBoard").prop("checked",!1),
  $("#chckUserAcc").prop("checked",!1),
  $("#chckCollege").prop("checked",!1),
  $("#chckStudent").prop("checked",!1),
  $("#chckParty").prop("checked",!1),
  $("#chckCandidates").prop("checked",!1),
  $("#chckElectoral").prop("checked",!1),
  $("#chckAcademic").prop("checked",!1),
$("#chckElection").prop("checked",!1)}


function UserLogin(){
          var e=sessionStorage.getItem("ipaddress");
          $("#processing-modal").modal("show"),
          $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!1,type:"POST",
          crossDomain:!0,dataType:"json",
          data:{command:"adminlogin",password:$("#aaPassword").val()},
            success:function(e){
              var s=e;
              return 0==s.success?($("#apassModal").modal("hide"),$("#processing-modal").modal("hide"),
              $("#error_message").html(s.msg),
              $("#errModal").modal("show"),!1):($("#apassModal").modal("hide"),$("#processing-modal").modal("hide"),
              window.localStorage.user=JSON.stringify(s.user),
              void (window.location.href = "user-account-list.php"))},
            error:function(e){
              return console.log("Error:"),
              console.log(e),empty=!1,
              $("#processing-modal").modal("hide"),empty}})}


function GroupAddLogin(){
          var e=sessionStorage.getItem("ipaddress");
          $("#processing-modal").modal("show"),
          $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!1,type:"POST",
          crossDomain:!0,dataType:"json",
          data:{command:"adminlogin",password:$("#gaPassword").val()},
            success:function(e){
              var s=e;
              return 0==s.success?($("#gapassModal").modal("hide"),$("#processing-modal").modal("hide"),
              $("#error_message").html(s.msg),
              $("#errModal").modal("show"),!1):($("#gapassModal").modal("hide"),$("#processing-modal").modal("hide"),
              window.localStorage.user=JSON.stringify(s.user),
              void $("#userGroupModal").modal("show"))},
            error:function(e){
              return console.log("Error:"),
              console.log(e),empty=!1,
              $("#processing-modal").modal("hide"),empty}})}

  function GroupEditLogin(){
            var e=sessionStorage.getItem("ipaddress");
            $("#processing-modal").modal("show"),
            $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!1,type:"POST",
            crossDomain:!0,dataType:"json",
            data:{command:"adminlogin",password:$("#gePassword").val()},
              success:function(e){
                var s=e;
                return 0==s.success?($("#gepassModal").modal("hide"),$("#processing-modal").modal("hide"),
                $("#error_message").html(s.msg),
                $("#errModal").modal("show"),!1):($("#gepassModal").modal("hide"),$("#processing-modal").modal("hide"),
                window.localStorage.user=JSON.stringify(s.user),
                void $(".edit-group-icon").trigger("click"))},
              error:function(e){
                return console.log("Error:"),
                console.log(e),empty=!1,
                $("#processing-modal").modal("hide"),empty}})}

function GroupDeleteLogin(){
                          var e=sessionStorage.getItem("ipaddress");
                          $("#processing-modal").modal("show"),
                          $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!1,type:"POST",
                          crossDomain:!0,dataType:"json",
                          data:{command:"adminlogin",password:$("#grPassword").val()},
                            success:function(e){
                              var s=e;
                              return 0==s.success?($("#grpassModal").modal("hide"),$("#processing-modal").modal("hide"),
                              $("#error_message").html(s.msg),
                              $("#errModal").modal("show"),!1):($("#grpassModal").modal("hide"),$("#processing-modal").modal("hide"),
                              window.localStorage.user=JSON.stringify(s.user),
                              void $(".remove-group-icon").trigger("click"))},
                            error:function(e){
                              return console.log("Error:"),
                              console.log(e),empty=!1,
                              $("#processing-modal").modal("hide"),empty}})}                

  function UserEditLogin(){
            var e=sessionStorage.getItem("ipaddress");
            $("#processing-modal").modal("show"),
            $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!1,type:"POST",
            crossDomain:!0,dataType:"json",
            data:{command:"adminlogin",password:$("#uPassword").val()},
              success:function(e){
                var s=e;
                return 0==s.success?($("#uepassModal").modal("hide"),$("#processing-modal").modal("hide"),
                $("#error_message").html(s.msg),
                $("#errModal").modal("show"),!1):($("#uepassModal").modal("hide"),$("#processing-modal").modal("hide"),
                window.localStorage.user=JSON.stringify(s.user),
                void $(".edit-usersaccount-icon").trigger("click"))},
              error:function(e){
                return console.log("Error:"),
                console.log(e),empty=!1,
                $("#processing-modal").modal("hide"),empty}})}


      function UserAddLogin(){
                var e=sessionStorage.getItem("ipaddress");
                $("#processing-modal").modal("show"),
                $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!1,type:"POST",
                crossDomain:!0,dataType:"json",
                data:{command:"adminlogin",password:$("#aPassword").val()},
                  success:function(e){
                    var s=e;
                    return 0==s.success?($("#uapassModal").modal("hide"),$("#processing-modal").modal("hide"),
                    $("#error_message").html(s.msg),
                    $("#errModal").modal("show"),!1):($("#uapassModal").modal("hide"),$("#processing-modal").modal("hide"),
                    window.localStorage.user=JSON.stringify(s.user),
                    void $("#usersModal").modal("show"))},
                  error:function(e){
                    return console.log("Error:"),
                    console.log(e),empty=!1,
                    $("#processing-modal").modal("hide"),empty}})}

                function UserDeleteLogin(){
                          var e=sessionStorage.getItem("ipaddress");
                          $("#processing-modal").modal("show"),
                          $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!1,type:"POST",
                          crossDomain:!0,dataType:"json",
                          data:{command:"adminlogin",password:$("#rPassword").val()},
                            success:function(e){
                              var s=e;
                              return 0==s.success?($("#urpassModal").modal("hide"),$("#processing-modal").modal("hide"),
                              $("#error_message").html(s.msg),
                              $("#errModal").modal("show"),!1):($("#urpassModal").modal("hide"),$("#processing-modal").modal("hide"),
                              window.localStorage.user=JSON.stringify(s.user),
                              void $(".remove-usersaccount-icon").trigger("click"))},
                            error:function(e){
                              return console.log("Error:"),
                              console.log(e),empty=!1,
                              $("#processing-modal").modal("hide"),empty}})}

function privilege(e){
  1==e._Dashboard&&$("#LIST li").eq(0).removeClass("hidden"),
  1==e._UsersAccount&&$("#LIST li").eq(1).removeClass("hidden"),
  1==e._Student&&$("#LIST li").eq(2).removeClass("hidden"),
  1==e._PartyList&&$("#LIST li").eq(3).removeClass("hidden"),
  1==e._Candidates&&$("#LIST li").eq(4).removeClass("hidden"),
  1==e._ElectoralPosition&&$("#LIST li").eq(5).removeClass("hidden"),
  1==e._AcademicProgram&&$("#LIST li").eq(6).removeClass("hidden"),
  1==e._ElectionConfig&&$("#LIST li").eq(7).removeClass("hidden"),
  1==e._UsersAccount&&$("#LIST li").eq(8).removeClass("hidden")}
  $(document).ready(function(){
    var e=JSON.parse(window.localStorage.user||"{}");
    Object.keys(e).length<1&&(console.log("redirect to main"),window.location.href="index.php"),
    $("#current_user").html(e.FullName+" ("+e.GroupName+")"),
    privilege(e),
    fetch_all_user("1"),
    fetch_all_user_group("1")}),
    $("#searchValue1").keyup(function(){search_user_groupTyping()}),
    $("#searchValue").keyup(function(){search_userTyping()}),
    $(document).on("click",".edit-usersaccount-icon",function(){
      var e=$(this).data("id"),
      s=sessionStorage.getItem("ipaddress");
      $.ajax({url:"http://"+s+"/cmuvoting/API/index.php",async:!0,type:"POST",
      data:{command:"get_userForEdit",user_id:e},
      success:function(e){
        var s=e;if(1==s.success)$("#authenticity_token").val(s.user.UserAccountID),$("#cboUserGroup").val(s.user.GroupID),$("#txtFirstName").val(s.user.FirstName),$("#txtMiddleName").val(s.user.MiddleName),$("#txtLastName").val(s.user.LastName),$("#txtUsername").val(s.user.UserName),$("#txtPassword").val(s.user.Password),$("#usersModal").modal("show");else if(s.success===!1)return $("#usersModal").modal("hide"),void alert(s.msg)}})}),
        $(document).on("click",".edit-group-icon",function(){
          var e=$(this).data("id"),
          s=sessionStorage.getItem("ipaddress");
          $.ajax({url:"http://"+s+"/cmuvoting/API/index.php",async:!0,type:"POST",
          data:{command:"get_user_group",GroupID:e},
          success:function(e){
            var s=e;return 1!=s.success?($("#userGroupModal").modal("hide"),
            void alert(s.msg)):($("#authenticationGroupID").val(s.group.GroupID),

            $("#txtGroupName").val(s.group.GroupName),
            $("#txtDesc").val(s.group.Desc),
            1==s.group._Dashboard?$("#chckDashBoard").prop("checked",!0):$("#chckDashBoard").prop("checked",!1),
            1==s.group._UsersAccount?$("#chckUserAcc").prop("checked",!0):$("#chckUserAcc").prop("checked",!1),
            1==s.group._College?$("#chckCollege").prop("checked",!0):$("#chckCollege").prop("checked",!1),
            1==s.group._Student?$("#chckStudent").prop("checked",!0):$("#chckStudent").prop("checked",!1),
            1==s.group._PartyList?$("#chckParty").prop("checked",!0):$("#chckParty").prop("checked",!1),
            1==s.group._Candidates?$("#chckCandidates").prop("checked",!0):$("#chckCandidates").prop("checked",!1),
            1==s.group._ElectoralPosition?$("#chckElectoral").prop("checked",!0):$("#chckElectoral").prop("checked",!1),
            1==s.group._AcademicProgram?$("#chckAcademic").prop("checked",!0):$("#chckAcademic").prop("checked",!1),
            1==s.group._ElectionConfig?$("#chckElection").prop("checked",!0):$("#chckElection").prop("checked",!1),void
            $("#userGroupModal").modal("show"))}})}),
            $(document).on("click",".remove-usersaccount-icon",function(){
              if(confirm("Are you sure to delete this User?")){
                var e=$(this).data("id"),
                s=sessionStorage.getItem("ipaddress");
                $.ajax({url:"http://"+s+"/cmuvoting/API/index.php",async:!0,type:"POST",
                data:{command:"delete_user",UserAccountID:e},
                success:function(e){
                  var s=e;
                  if(1==s.success)window.location.href="user-account-list.php";
                  else if(s.success===!1)return void alert(s.msg)}})}}),
                  $(document).on("click",".remove-group-icon",function(){
                    if(confirm("Are you sure to delete this User Group?")){
                      var e=$(this).data("id"),
                      s=sessionStorage.getItem("ipaddress");
                      $.ajax({url:"http://"+s+"/cmuvoting/API/index.php",async:!0,type:"POST",
                      data:{command:"delete_user_group",GroupID:e},success:function(e){var s=e;
                        if(1==s.success)window.location.href="user-account-list.php";
                        else if(0==s.success)return void alert(s.msg)}})}}),
                        $("#Userpagination").on("click",".page-numbers",function(){var e=$(this).attr("data-id");fetch_all_student(e)}),
                          $("#Grouppagination").on("click",".page-numbers",function(){var e=$(this).attr("data-id");fetch_all_user_group(e)});

                        $(document).ready(function(){
                        setInterval(function(){
                            $('#time').load('assets/time.php')
                        }, 1000);
                        });
