function refresh(){
  fetch_all_acadPrograms("1"),fetch_college()}

function resetHelpInLine(){
  $("span.help-inline").each(function(){
    $(this).text("")})}

function logout(){
  window.localStorage.clear(),
  window.location.href="index.php"}

  function validate(){
    resetHelpInLine(),
    $('input[type="text"]').each(function(){$(this).val($(this).val().trim())});
    var e=!1;return""==$("#txtProgramName").val()&&($("#txtProgramName").next("span").text("Course Name Code is required."),
    e=!0),""==$("#txtProgramCode").val()&&($("#txtProgramCode").next("span").text("Course Code is required."),e=!0),
    ""==$("#chckCourse").val()&&($("#chckCourse").next("span").text("College is required."),e=!0),
    1==e?(alert("Please fill all required fields correctly."),!1):!0}

function save(){
  var e=$("#txtProgID").val(),
  a=new Array,
  o=new Object;
  o.course_description=$("#txtProgramName").val(),
  o.course_code=$("#txtProgramCode").val(),
  o.college_ID=$("#chckCourse").val(),
  a.push(o);
  var t=sessionStorage.getItem("ipaddress");
  ""==e?1==validate()?1==checkCourses($("#txtProgramName").val())?alert("WARNING: Data already exist!"):$.ajax({url:"http://"+t+"/cmuvoting/API/index.php",
  async:!0,type:"POST",
  crossDomain:!0,dataType:"json",
  data:{command:"insert_acad_programs",data:a},
    success:function(e){
      var a=e;
      if(1==a.success)$("#btn-save").button("reset"),
      window.location.href="academic-program-list.php";
      else if(a.success===!1)
      return $("#btn-save").button("reset"),
      void alert(a.error)},
    error:function(e){
      console.log("Error:"),
      console.log(e.responseText),
      console.log(e.message)}}):$("#btn-save").button("reset"):1==validate()?$.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!0,
      type:"POST",crossDomain:!0,
      dataType:"json",data:{command:"update_acad_programs",course_id:e,data:a},
    success:function(e){
      var a=e;
      if(1==a.success)$("#btn-save").button("reset"),
      window.location.href="academic-program-list.php";
      else if(a.success===!1)return $("#btn-save").button("reset"),
      void alert(a.error)},
    error:function(e){
      $("#btn-save").button("reset"),
      console.log("Error:"),
      console.log(e.responseText),
      console.log(e.message)}}):$("#btn-save").button("reset")}

function checkCourses(e){
  var a=sessionStorage.getItem("ipaddress"),
  o=!1;return
  $.ajax({url:"http://"+a+"/cmuvoting/API/index.php",async:!1,
  type:"POST",crossDomain:!0,
  dataType:"json",
  data:{command:"checkCourses",course_description:e},
    success:function(e){
      var a=e;
      console.log(a),
      1==a.success?o=!0:0==a.success&&(o=!1)}}),o}

function fetch_all_acadPrograms(e){
  var a=sessionStorage.getItem("ipaddress");
  $("#processing-modal").modal("show"),
  $("#tbl_courses tbody > tr").remove(),
  $.ajax({url:"http://"+a+"/cmuvoting/API/index.php",async:!0,
  type:"POST",crossDomain:!0,
  dataType:"json",
  data:{command:"select_all_acad_programs",page:e},
    success:function(e){
      var a=e;
      if(a&&a.programs.length>0){
        for(var o=0;o<a.programs.length;o++){
          var t=a.programs,s='<tr class="odd">                                    <td class=" sorting_1">'+t[o].course_description+'</td>                                     <td class=" ">'+t[o].course_code+'</td>   <td class=" ">'+t[o].College+'</td>                                         <!--  <td class=" ">                                      <div class="text-right">                                    <a class="edit-college-icon btn btn-success btn-xs" data-id="'+t[o].course_id+'">                                          <i class="icon-pencil"></i>                                        </a>                                        <a class="remove-college-icon btn btn-danger btn-xs" data-id="'+t[o].course_id+'">                                          <i class="icon-remove"></i>                                         </a>                                      </div>                                    </td> -->                               </tr>';
          $("#tbl_courses tbody").append(s)}
          $("#pagination").html(a.pagination),
          $("#tbl_courses").addClass("tablesorter");
          var r=!0;$("table").trigger("update",[r])}
          $("#processing-modal").modal("hide")},
        error:function(e){
          $("#btn-save").button("reset"),
          console.log("Error:"),
          console.log(e.responseText),
          console.log(e.message),
          $("#processing-modal").modal("hide")}})}

function search_Course(){
  var e=$("#searchValue").val(),
  a=sessionStorage.getItem("ipaddress");
  $("#processing-modal").modal("show"),
  $("#tbl_courses tbody > tr").remove(),
  $.ajax({url:"http://"+a+"/cmuvoting/API/index.php",async:!0,type:"POST",
  crossDomain:!0,dataType:"json",
  data:{command:"search_acad_programs",value:e,page:"1"},
    success:function(e){
      var a=e;if(a&&a.programs.length>0){
        for(var o=0;o<a.programs.length;o++){
          var t=a.programs,s='<tr class="odd">                                    <td>'+t[o].course_description+'</td>                                     <td>'+t[o].course_code+'</td>         <td>'+t[o].College+'</td>                                       <td class=" ">                                      <div class="text-right">                                <!--        <a class="edit-college-icon btn btn-success btn-xs" data-id="'+t[o].course_id+'">                                          <i class="icon-pencil"></i>                                        </a>                                        <a class="remove-college-icon btn btn-danger btn-xs" data-id="'+t[o].course_id+'">                                          <i class="icon-remove"></i>                                        </a>                      -->                </div>                                    </td>                                </tr>';
          $("#tbl_courses tbody").append(s)}
          $("#pagination").html(a.pagination),
          $("#tbl_courses").addClass("tablesorter");
          var r=!0;
          $("table").trigger("update",[r])}
          $("#processing-modal").modal("hide")},
        error:function(e){
          $("#btn-save").button("reset"),
          console.log("Error:"),
          console.log(e.responseText),
          console.log(e.message),
          $("#processing-modal").modal("hide")}})}

function search_CourseTyping(){
  var e=$("#searchValue").val(),
  a=sessionStorage.getItem("ipaddress");
  $("#tbl_courses tbody > tr").remove(),
  $.ajax({url:"http://"+a+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",
  data:{command:"search_acad_programs",value:e,page:"1"},
    success:function(e){
      var a=e;
      if(a&&a.programs.length>0){for(var o=0;o<a.programs.length;o++){
        var t=a.programs,s='<tr class="odd">                                    <td>'+t[o].course_description+"</td>                                     <td>"+t[o].course_code+"</td>                              <td>"+t[o].College+'</td>                                        <td class=" ">                                      <div class="text-right">                   <!--                     <a class="edit-college-icon btn btn-success btn-xs" data-id="'+t[o].course_id+'">                                          <i class="icon-pencil"></i>                                        </a>                                        <a class="remove-college-icon btn btn-danger btn-xs" data-id="'+t[o].course_id+'">                                          <i class="icon-remove"></i>                                        </a>             -->                         </div>                                    </td>                                </tr>';
        $("#tbl_courses tbody").append(s)}
        $("#pagination").html(a.pagination),
        $("#tbl_courses").addClass("tablesorter");
        var r=!0;
        $("table").trigger("update",[r])}},
      error:function(e){
        $("#btn-save").button("reset"),
        console.log("Error:"),
        console.log(e.responseText),
        console.log(e.message)}})}

function fetch_college(){
  var e=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",
  data:{command:"select_For_Combo"},
  success:function(e){
    var a=e;$("#chckCourse").empty();
    for(var o=0;o<a.colleges.length;o++){
      var t=a.colleges,s='<option id="'+t[o].CollegeID+'" value="'+t[o].CollegeID+'">'+t[o].CollegeName+"</option>";
      $("#chckCourse").append(s)}},
  error:function(e){
    $("#btn-save").button("reset"),
    console.log("Error:"),
    console.log(e.responseText),
    console.log(e.message)}})}

function commandToClear(){
  $("#txtProgID").val(""),
  $("#txtProgramName").val(""),
  $("#txtShortName").val(""),$("#txtProgramCode").val(""),
  $("#chckCourse").val("")}

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
    fetch_all_acadPrograms("1"),
    fetch_college()}),
    $("#searchValue").keyup(function(){console.log("fetching ..."),search_CourseTyping()}),
    $(document).on("click",".edit-college-icon",function(){
      var e=$(this).data("id"),
      a=sessionStorage.getItem("ipaddress");
      $.ajax({url:"http://"+a+"/cmuvoting/API/index.php",async:!0,type:"POST",
      data:{command:"get_acad_programs",course_id:e},
      success:function(e){
        var a=e;
        if(1==a.success)
        $("#txtProgramName").val(a.program.course_description),
        $("#txtProgramCode").val(a.program.course_code),
        $("#txtProgID").val(a.program.course_id),
        $("#chckCourse").val(a.program.CollegeID),
        $("#myModal").modal("show");
        else if(a.success===!1)return $("#myModal").modal("hide"),void alert(a.msg)}})}),
    $(document).on("click",".remove-college-icon",function(){
      if(confirm("Are you sure to delete this Academic Program?")){
        var e=$(this).data("id"),
        a=sessionStorage.getItem("ipaddress");
        $.ajax({url:"http://"+a+"/cmuvoting/API/index.php",async:!0,type:"POST",
        data:{command:"delete_acad_programs",course_id:e},
      success:function(e){
        var a=e;if(1==a.success)window.location.href="academic-program-list.php";
        else if(a.success===!1)return void alert(a.msg)}})}}),
        $("#pagination").on("click",".page-numbers",function(){var e=$(this).attr("data-id");fetch_all_acadPrograms(e)});
    $(document).ready(function(){
      setInterval(function(){
        $('#time').load('assets/time.php')
      }, 1000);
      });
