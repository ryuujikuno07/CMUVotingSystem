function refresh(){
  fetch_all_config("1"),select_College()}

function resetHelpInLine(){
  $("span.help-inline").each(function(){
    $(this).text("")})}

function logout(){
  window.localStorage.clear(),
  window.location.href="index.php"}

function selectOnlyThis(id){
    var mycheckbox = document.getElementsByName("mycheckbox");
    Array.prototype.forEach.call(mycheckbox,function(el){
      el.checked = false;});
    id.checked = true;}


function validate(){
  resetHelpInLine(),
  $('input[type="text"]').each(function(){$(this).val($(this).val().trim())});
  var t=!1;
  return""==$("#txtElectionName").val()&&($("#txtElectionName").next("span").text("Election Name is required."),t=!0),
  ""==$("#txtShortName").val()&&($("#txtShortName").next("span").text("Short Name / Election Code is required."),t=!0),
  ""==$("#txtSY").val()&&($("#txtSY2").next("span").text("School Year is required."),t=!0),
  ""==$("#txtSY2").val()&&($("#txtSY2").next("span").text("School Year is required."),
  ""==$("#dtpElectionDate").val()&&($("#dtpElectionDate").next("span").text("Election Date is required."),t=!0),t=!0),
  ""==$("#dtpTimeStart").val()&&($("#dtpTimeStart").next("span").text("Time Start is required."),t=!0),
  ""==$("#dtpTimeEnd").val()&&($("#dtpTimeEnd").next("span").text("Time End is required."),t=!0),
  1==t?(alert("Please input all the required fields correctly."),!1):!0}

function save(){
  $("#btn-save").button("loading");
  var t=JSON.parse(window.localStorage.user||"{}"),
  e=$("#txtTermID").val();
  if(""==e)
    if(1==validate()){
    var i=new Array;
    config=new Object,
    config.ElectionName=$("#txtElectionName").val(),
    config.ElectionCode=$("#txtShortName").val(),
    config.SchoolYear=$("#txtSY").val()+"-"+$("#txtSY2").val(),
    config.ElectionDate=$("#dtpElectionDate").val(),
    config.ElectionStart=$("#dtpTimeStart").val(),
    config.ElectionEnd=$("#dtpTimeEnd").val(),
    config.InActive="0",
    config.CreatedBy=t.FullName,
    i.push(config);
    var o=sessionStorage.getItem("ipaddress");
    $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!0,
    type:"POST",crossDomain:!0,dataType:"json",
    data:{command:"insert_config",data:i},
      success:function(t){
        var e=t;
        if(1==e.success)
        $("#btn-save").button("reset"),
        window.location.href="config-list.php";
        else if(e.success===!1)
        return $("#btn-save").button("reset"),
        void alert(e.msg)},
      error:function(t){
        $("#btn-save").button("reset"),
        console.log("Error:"),
        console.log(t.responseText),
        console.log(t.message)}})}
        else $("#btn-save").button("reset");
        else if(1==validate()){
          var i=new Array;
          config=new Object,
          config.ElectionName=$("#txtElectionName").val(),
          config.ElectionCode=$("#txtShortName").val(),
          config.SchoolYear=$("#txtSY").val()+"-"+$("#txtSY2").val(),
          config.ElectionDate=$("#dtpElectionDate").val(),
          config.ElectionStart=$("#dtpTimeStart").val(),
          config.ElectionEnd=$("#dtpTimeEnd").val(),
          config.InActive="0",
          config.CreatedBy=t.FullName,i.push(config);
          var o=sessionStorage.getItem("ipaddress");
          $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!0,
          type:"POST",crossDomain:!0,dataType:"json",
          data:{command:"update_config",TermID:e,data:i},
            success:function(t){
              var e=t;
              if(1==e.success)$("#btn-save").button("reset"),
              window.location.href="config-list.php";
              else if(e.success===!1)return $("#btn-save").button("reset"),
              void alert(e.msg)},
              error:function(t){$("#btn-save").button("reset"),
              console.log("Error:"),
              console.log(t.responseText),
              console.log(t.message)}})}
              else $("#btn-save").button("reset")}

function search_config(){
  if(""==$("#txtSearch").val())
  return alert("Please input item to search fields correctly."),refresh(),!1;
  var t=$("#txtSearch").val(),
  e=sessionStorage.getItem("ipaddress");
  $("#processing-modal").modal("show"),
  $("#tbl_config tbody > tr").remove(),
  $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,
  type:"POST",data:{command:"search_config",value:t,page:"1"},
    success:function(t){
      var e=t;
      if(e&&e.configs.length>0){
        for(var i=0;i<e.configs.length;i++){
          var o=e.configs,a='<tr class="odd">                                    <td>'+o[i].ElectionName+"</td>             <td>"+o[i].ElectionCode+"</td>                       <td>"+o[i].SchoolYear+"</td> <!--<td>"+o[i].VotersForAll+"</td>  <td>"+o[i].College+"</td>   -->                                   <td>"+o[i].ElectionDate+"</td>                                    <td>"+o[i].TimeStart+"</td>                                    <td>"+o[i].TimeEnd+'</td>                                    <td>                                      <div class="text-right">                                        <a class="active-config-icon btn btn-primary btn-xs" data-toggle="tooltip" title="Activate As Active Election Configuration" data-id="'+o[i].TermID+'">                                          <i class="icon-check"></i>                                        </a>                                        <a class="edit-config-icon btn btn-success btn-xs" data-toggle="tooltip" title="Modify Configuration" data-id="'+o[i].TermID+'">                                          <i class="icon-pencil"></i>                                        </a>                                        <a class="remove-config-icon btn btn-danger btn-xs" data-toggle="tooltip" title="Delete Configuration" data-id="'+o[i].TermID+'">                                          <i class="icon-remove"></i>                                        </a>                                      </div>                                    </td>                                </tr>';$("#tbl_config tbody").append(a)}
          $("#pagination").html(e.pagination),
          $("#tbl_config").addClass("tablesorter");
          var n=!0;
          $("table").trigger("update",[n])}
          $("#processing-modal").modal("hide")},
      error:function(t){
        console.log("Error:"),
        console.log(t),$("#processing-modal").modal("hide")}})}

function search_configTyping(){
  if(""==$("#txtSearch").val())
  return void refresh(),!1;
  var t=$("#txtSearch").val(),
  e=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,
  type:"POST",data:{command:"search_config",value:t,page:"1"},
    success:function(t){
      var e=t;
      $("#tbl_config tbody > tr").remove();
      for(var i=0;i<e.configs.length;i++){
        var o=e.configs,a='<tr class="odd">                            <td>'+o[i].ElectionName+"</td>                            <td>"+o[i].ElectionCode+"</td><td>"+o[i].SchoolYear+"</td> <!--<td>"+o[i].VotersForAll+"</td>      <td>"+o[i].College+"</td>   -->                         <td>"+o[i].ElectionDate+"</td>                            <td>"+o[i].TimeStart+"</td>                            <td>"+o[i].TimeEnd+'</td>                            <td>                              <div class="text-right">                                <a class="active-config-icon btn btn-primary btn-xs" data-toggle="tooltip" title="Activate As Active Election Configuration" data-id="'+o[i].TermID+'">                                  <i class="icon-check"></i>                                </a>                                <a class="edit-config-icon btn btn-success btn-xs" data-toggle="tooltip" title="Modify Configuration" data-id="'+o[i].TermID+'">                                  <i class="icon-pencil"></i>                                </a>                                <a class="remove-config-icon btn btn-danger btn-xs" data-toggle="tooltip" title="Delete Configuration" data-id="'+o[i].TermID+'">                                  <i class="icon-remove"></i>                                </a>                              </div>                            </td>                        </tr>';
        $("#tbl_config tbody").append(a)}
        $("#tbl_config").addClass("tablesorter");
        var n=!0;$("table").trigger("update",[n])}})}

function fetch_all_config(t){
  var e=sessionStorage.getItem("ipaddress");
  $("#processing-modal").modal("show"),
  $("#tbl_config tbody > tr").remove(),
  $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,
  type:"POST",crossDomain:!0,dataType:"json",
  data:{command:"select_all_config",page:t},
    success:function(t){
      var e=t;
      if(e&&e.configs.length>0){
        for(var i=0;i<e.configs.length;i++){
          var o=e.configs,a='<tr class="odd">                                    <td>'+o[i].ElectionName+"</td><td>"+o[i].ElectionCode+"</td>                                    <td>"+o[i].SchoolYear+"</td>                                 <!--<td>"+o[i].VotersForAll+"</td>                                   <td>"+o[i].College+"</td>     -->                                   <td>"+o[i].ElectionDate+"</td>                                    <td>"+o[i].TimeStart+"</td>                                    <td>"+o[i].TimeEnd+'</td>                                    <td>                                      <div class="text-right">                                        <a class="active-config-icon btn btn-primary btn-xs" data-toggle="tooltip" title="Activate As Active Election Configuration" data-id="'+o[i].TermID+'">                                          <i class="icon-check"></i>                                        </a>                                        <a class="edit-config-icon btn btn-success btn-xs waves-effect" data-toggle="tooltip" title="Modify Configuration" data-id="'+o[i].TermID+'">                                          <i class="icon-pencil"></i>                                        </a>                                        <a class="remove-config-icon btn btn-danger btn-xs waves-effect" data-toggle="tooltip" title="Delete Configuration" data-id="'+o[i].TermID+'">                                          <i class="icon-remove"></i>                                        </a>                                      </div>                                    </td>                                </tr>';
          $("#tbl_config tbody").append(a)}
          $("#pagination").html(e.pagination),
          $("#tbl_config").addClass("tablesorter");
          var n=!0;$("table").trigger("update",[n])}
          $("#processing-modal").modal("hide")},
      error:function(t){
        $("#btn-save").button("reset"),
        console.log("Error:"),
        console.log(t.responseText),
        console.log(t.message),
        $("#processing-modal").modal("hide")}})}


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
  $("#txtTermID").val(""),
  $("#txtElectionName").val(""),
  $("#txtShortName").val(""),
  $("#cboCollege").val(""),
  $("#vfa").prop("checked",!1),
  $("#vfc").prop("checked",!1),
  $("#txtSY").val(""),
  $("#txtSY2").val(""),
  $("#dtpElectionDate").val("mm/dd/yyy"),
  $("#dtpTimeStart").val(""),
  $("#dtpTimeEnd").val("")}

  function generate(){
      if(confirm("Activate this Election Configuration?")){

          		$("#generator").removeClass("hidden"),
          		$("#result").addClass("hidden"),
          		$("#btn-save").button("loading");
          		var e=sessionStorage.getItem("ipaddress"),
          		t=JSON.parse(window.localStorage.config||"{}");$.ajax({url:"http://"+e+"/cmuvoting/API/index.php",type:"POST",crossDomain:!0,dataType:"json",data:{command:"generate_password"},
          	success:function(e){
          		var t=e;return 1!=t.success?(alert(t.msg),
          		$("#btn-generate").button("reset"),
          		$("#generator").addClass("hidden"),
          		void $("#result").removeClass("hidden")):($("#btn-generate").button("reset"),
          		$("#lblgenerated").html(t.student),
          		$("#generator").addClass("hidden"),
          		$("#result").removeClass("hidden"),
          		alert(t.msg),
          		void 0)},
          	error:function(e){
          		$("#btn-generate").button("reset"),
          		$("#generator").addClass("hidden"),
          		$("#result").removeClass("hidden"),console.log("Error:"),console.log(e.responseText),console.log(e.message)}})}
          		else $("#generator").addClass("hidden"),
          		$("#result").removeClass("hidden")}




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
    Object.keys(t).length<1&&(console.log("redirect to main"),
    window.location.href="index.php"),
    $("#current_user").html(t.FullName+" ("+t.GroupName+")"),
    privilege(t),
    fetch_all_config("1"),
    select_College()}),
    $("#txtSearch").keyup(function(){
      console.log("fetching ..."),search_configTyping()}),
      $(document).on("click",".edit-config-icon",function(){
        var t=$(this).data("id"),
        e=sessionStorage.getItem("ipaddress");
        $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,
        type:"POST",data:{command:"get_config",TermID:t},
          success:function(t){
            var e=t;
            if(1==e.success){
              $("#txtTermID").val(e.config.TermID),
              $("#txtElectionName").val(e.config.ElectionName),
              $("#txtShortName").val(e.config.ElectionCode);
              var i=e.config.SchoolYear,
              o=i.slice(0,10).split("-");
              $("#txtSY").val(o[0]),
              $("#txtSY2").val(o[1]);
              var i=e.config.ElectionDate;
              if(null!=i){
                var o=i.slice(0,10).split("-"),
                a=o[0]+"-"+o[1]+"-"+o[2];
                $("#dtpElectionDate").val(a)}
              var c=e.config.TimeStart;
              if(null!=c){
                var o=c.slice(0,10).split(":"),
                b=o[0]+":"+o[1];
                $("#dtpTimeStart").val(b)}
              var f=e.config.TimeEnd;
              if(null!=f){
                var o=f.slice(0,10).split(":"),
                d=o[0]+":"+o[1];
                $("#dtpTimeEnd").val(d)}
                $("#myModal").modal("show")}
                else if(e.success===!1)
                return $("#myModal").modal("hide"),
                void alert(e.msg)}})}),
                $(document).on("click",".remove-config-icon",function(){
                  if(confirm("Are you sure to delete this Election Configuration?")){
                    var t=$(this).data("id"),
                    e=sessionStorage.getItem("ipaddress");
                    $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,
                    type:"POST",data:{command:"delete_config",TermID:t},
                    success:function(t){
                      var e=t;
                      if(1==e.success)window.location.href="config-list.php";
                      else if(e.success===!1)return void alert(e.msg)}})}}),
                      $(document).on("click",".active-config-icon",function(){
                          $("#btn-save").button("loading");
                          var t=$(this).data("id"),
                          e=sessionStorage.getItem("ipaddress");
                          $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,type:"POST",
                          data:{command:"activate_configuration",TermID:t},
                    success:function(t){
                      var e=t;
                      if(1==e.success)
                  		$("#btn-save").button("reset"),generate(),
                      window.location.href="config-list.php";
                      else if(e.success===!1)return void alert(e.msg)}})}),
                      $("#pagination").on("click",".page-numbers",function(){
                        var t=$(this).attr("data-id");
                        fetch_all_config(t)});
                        $(document).ready(function(){
                            document.getElementsByName("dtpElectionDate")[0].setAttribute('min', new Date().toISOString().split('T')[0]);
                        });
                        $(document).ready(function(){
                          $("#dtpElectionDate").change(function(){
                            var mystr = $("#dtpElectionDate").val();
                            var expiredate = new Date(mystr);

                            expiredate.setFullYear(expiredate.getFullYear());

                              var someFormattedDate =
                              expiredate.toLocaleString("en", {year: "numeric"});
                          $("#txtSY").val(someFormattedDate);
                              var y = expiredate.getFullYear()+1;
                          $("#txtSY2").val(y);
                          });
                        });
                        $(document).ready(function(){
                          $("#vfa").click(function(){
                            if(this.checked)
                          $("#selectDrop").fadeOut('slow');
                          });
                        });
                        $(document).ready(function(){
                          $("#vfc").change(function(){
                            if(this.checked)
                            $("#selectDrop").fadeIn('slow');
                          });
                        });
                        $(document).ready(function(){
                        setInterval(function(){
                            $('#time').load('assets/time.php')
                        }, 1000);
                        });
