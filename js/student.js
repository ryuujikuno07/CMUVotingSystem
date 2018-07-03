function refresh(){
	get_active_config(),fetch_all_student("1"),fetch_Term(),fetch_AcadProg()}

function logout(){
	window.localStorage.clear(),
	window.location.href="index.php"}

function resetHelpInLine(){
	$("span.help-inline").each(function(){$(this).text("")})}

function validate(){
	resetHelpInLine(),
	$('input[type="text"]').each(function(){$(this).val($(this).val().trim())});
	var e=!1;
	return""==$("#txtStudentID").val()&&($("#txtStudentID").next("span").text("Student ID is required."),e=!0),
	""==$("#txtPassword").val()&&($("#txtPassword").next("span").text("Password is required."),e=!0),
	""==$("#txtFirstName").val()&&($("#txtFirstName").next("span").text("First Name is required."),e=!0),
	""==$("#txtMiddleName").val()&&($("#txtMiddleName").next("span").text("Middle Name / Initial is required."),e=!0),
	""==$("#txtLastName").val()&&($("#txtLastName").next("span").text("Last Name is required."),e=!0),
	null==$("#chckCourse").val()&&($("#chckCourse").next("span").text("Course is required."),e=!0),
	null==$("#chckTerm").val()&&($("#chckTerm").next("span").text("Term is required."),e=!0),
	1==e?(alert("Please input all the required fields correctly."),!1):!0}

function save(){
	var e=$("#authenticity_token").val(),
	t=sessionStorage.getItem("ipaddress"),
	a=new Array,
	s=new Object;
	if(s.Student_ID=$("#txtStudentID").val(),
	s.Student_Password=$("#txtPassword").val(),
	s.Student_FirstName=$("#txtFirstName").val(),
	s.Student_MiddleInitial=$("#txtMiddleName").val(),
	s.Student_LastName=$("#txtLastName").val(),
	s.Student_ProgID=$("#chckCourse").val(),
	s.Student_TermID=$("#chckTerm").val(),
	s.Student_Gender=1==$("#chkGender").val()?"Male":"Female",			a.push(s),""==e)
	if(1==validate()){
		var n=$("#txtLastName").val()+", "+$("#txtFirstName").val()+" "+$("#txtMiddleName").val();
		if(checkStudentID($("#txtStudentID").val())===!0)
		return void alert("WARNING: Student ID already exist on this particular Election Term!");
		if(checkStudent(n)===!0)
		return void alert("WARNING: Student Name already exist on this particular Election Term!");
		$.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",data:{command:"insert_student",data:a},
		success:function(e){
			var t=e;
			if(1==t.success)$("#btn-save").button("reset"),
			alert(t.msg),window.location.href="student-list.php";
			else if(t.success===!1)return $("#btn-save").button("reset"),
			void alert(t.error)},
		error:function(e){
			$("#btn-save").button("reset"),console.log("Error:"),console.log(e.responseText),console.log(e.message)}})}
			else $("#btn-save").button("reset");
			else 1==validate()?$.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",data:{command:"update_student",student_id:$("#txtStudentID").val(),data:a},
		success:function(e){
			var t=e;
			if(console.log(t),1==t.success)$("#btn-save").button("reset"),alert(t.msg),window.location.href="student-list.php";
			else if(t.success===!1)return $("#btn-save").button("reset"),
			void alert(t.error)},
		error:function(e){
			$("#btn-save").button("reset"),console.log("Error:"),console.log(e.responseText),console.log(e.message)}}):$("#btn-save").button("reset")}

function checkStudent(e){
	var t=sessionStorage.getItem("ipaddress"),
	a=!1;return $.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!1,type:"POST",crossDomain:!0,dataType:"json",data:{command:"checkStudent",Fullname:e},
	success:function(e){
		var t=e;console.log(t),1==t.success?a=!0:0==t.success&&(a=!1)}}),a}

function checkStudentID(e){
	var t=sessionStorage.getItem("ipaddress"),
	a=!1;return $.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!1,type:"POST",crossDomain:!0,dataType:"json",data:{command:"checkStudentID",StudentID:e,TermID:$("#chckTerm").val()},
	success:function(e){
		var t=e;console.log(t),1==t.success?a=!0:0==t.success&&(a=!1)}}),a}

function get_active_config(){
	var e=sessionStorage.getItem("ipaddress");
	$.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",data:{command:"get_active_config"},
	success:function(e){
		var t=e;return 1!=t.success?void alert(t.msg):void(window.localStorage.config=JSON.stringify(t.config))},
	error:function(e){
		console.log("Error:"),console.log(e)}})}


function fetch_all_student(e){
	var
	a=JSON.parse(window.localStorage.config||"{}"),
	t=sessionStorage.getItem("ipaddress");
	$("#processing-modal").modal("show"),
	$("#tbl_student tbody > tr").remove(),
	$.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",data:{command:"select_all_student",TermID:a.TermID,page:e},
	success:function(e){
		var t=e;if(t&&t.students.length>0){
			for(var a=0;a<t.students.length;a++){
				var s=t.students,n='<tr data-password="'+s[a].Password+'" class="odd">   <td class="odd">                                    <div class="text-right">                        <a  class="check-activate-student bg-green btn waves-effect ac-btn-block-3 btn-xs " data-id="'+s[a].StudentID+'" data-termID="'+s[a].TermID+'"><i class="icon-key  "></i>                                                ACTIVATE (1)                                       </a> &nbsp    <a class="deactivate-student bg-red btn waves-effect ac-btn-block-3 btn-xs " data-id="'+s[a].StudentID+'" data-termID="'+s[a].TermID+'"><i class="icon-cut  "></i>                                          DEACTIVATE (0)                                       </a>                                    </div>                                </td>             <td style="text-align:center;">'+s[a].Password+"</td> <td style='text-align:center;'>"+s[a].StudentID+"</td>                                <td>"+s[a].Fullname+"</td>                                                             <td>"+s[a].Course+"</td>                                <td>"+s[a].College+"</td>                       <!--<td>"+s[a].ElectionTerm+'</td>         -->                                                    </tr>';
				$("#tbl_student tbody").append(n),
			$(document).ready(function(){
            var e=JSON.parse(window.localStorage.config||"{}");
            $("#term").html(" ["+e.ElectionName+"  -  "+e.SchoolYear+"] ")
          });}
				$("#pagination").html(t.pagination),
				$("#tbl_student").addClass("tablesorter");
				var o=!0;
				$("table").trigger("update",[o])}
				$("#processing-modal").modal("hide")},
				error:function(e){
                    console.log("Error:"),console.log(e),$("#processing-modal").modal("hide")}})}


function search_student(){
	var e=sessionStorage.getItem("ipaddress"),
	t=JSON.parse(window.localStorage.config||"{}");
	$("#processing-modal").modal("show"),
	$("#tbl_student tbody > tr").remove(),
	$.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",data:{command:"search_student",TermID:t.TermID,value:$("#txtSearch").val(),page:"1"},
	success:function(e){
		for(var t=e,a=0;a<t.students.length;a++){
			var s=t.students,
			n='<tr class="odd"><td class=" ">                                    <div class="text-right">                                        <a class="check-activate-student bg-green btn waves-effect ac-btn-block-3 btn-xs " data-id="'+s[a].StudentID+'" data-termID="'+s[a].TermID+'"><i class="icon-key  "></i>                                                ACTIVATE (1)                                        </a> &nbsp    <a class="deactivate-student bg-red btn waves-effect ac-btn-block-3 btn-xs " data-id="'+s[a].StudentID+'" data-termID="'+s[a].TermID+'"><i class="icon-cut  "></i>                                          DEACTIVATE (0)                                       </a>                                    </div>                                </td>             <td style="text-align:center;">'+s[a].Password+"</td> <td style='text-align:center;'>"+s[a].StudentID+"</td>                                <td>"+s[a].Fullname+"</td>                                       <td>"+s[a].CourseCode+"</td>                                <td>"+s[a].College+"</td>                       <!--<td>"+s[a].ElectionTerm+'</td>         -->                                                                                                              </tr>';
				$("#tbl_student tbody").append(n)}
				$("#pagination").html(t.pagination),
				$("#tbl_student").addClass("tablesorter");
				var o=!0;$("table").trigger("update",[o])},
			error:function(e){
				console.log("Error:"),console.log(e),$("#processing-modal").modal("hide")}})}


function search_studentTyping(){
	if(""===$("#txtSearch").val())return void refresh();
	var e=sessionStorage.getItem("ipaddress"),
	t=JSON.parse(window.localStorage.config||"{}");
	$("#tbl_student tbody > tr").remove(),
	$.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",data:{command:"search_student",TermID:t.TermID,value:$("#txtSearch").val(),page:"1"},
	success:function(e){
		for(var t=e,a=0;a<t.students.length;a++){
			var s=t.students,n='<tr class="odd"><td class=" ">                                    <div class="text-right">                                        <a class="check-activate-student bg-green btn waves-effect ac-btn-block-3 btn-xs " data-id="'+s[a].StudentID+'" data-termID="'+s[a].TermID+'"><i class="icon-key  "></i>                                                ACTIVATE (1)                                       </a> &nbsp    <a class="deactivate-student bg-red btn waves-effect ac-btn-block-3 btn-xs " data-id="'+s[a].StudentID+'" data-termID="'+s[a].TermID+'"><i class="icon-cut  "></i>                                          DEACTIVATE (0)                                       </a>                                    </div>                                </td>             <td style="text-align:center;">'+s[a].Password+"</td> <td style='text-align:center;'>"+s[a].StudentID+"</td>                                <td>"+s[a].Fullname+"</td>                           <td>"+s[a].CourseCode+"</td>                                <td>"+s[a].College+"</td>                       <!--<td>"+s[a].ElectionTerm+'</td>         -->                                                                                                              </tr>';
			$("#tbl_student tbody").append(n)}
			$("#pagination").html(t.pagination),
			$("#tbl_student").addClass("tablesorter");
			var o=!0;
			$("table").trigger("update",[o])},
		error:function(e){
console.log("Error:"),console.log(e)}})}

function fetch_AcadProg(){
	var e=sessionStorage.getItem("ipaddress");
	$.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",data:{command:"select_For_ComboCourse"},
	success:function(e){
		var t=e;$("#chckCourse").empty();
		for(var a=0;a<t.programs.length;a++){
			var s=t.programs,n='<option id="'+s[a].course_id+'" value="'+s[a].course_id+'">'+s[a].course_description+"</option>";
			$("#chckCourse").append(n)}},
	error:function(e){
		$("#btn-save").button("reset"),console.log("Error:"),console.log(e.responseText),console.log(e.message)}})}

function fetch_Term(){
	var e=sessionStorage.getItem("ipaddress");
	$.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",data:{command:"select2_config"},
	success:function(e){
		var t=e;$("#chckTerm").empty();
		for(var a=0;a<t.configs.length;a++){
			var s=t.configs,n='<option id="'+s[a].TermID+'" value="'+s[a].TermID+'">'+s[a].Config+"</option>";
			$("#chckTerm").append(n)}},
	error:function(e){
		$("#btn-save").button("reset"),console.log("Error:"),console.log(e.responseText),console.log(e.message)}})}

function commandtoClear(){
	$("#txtStudentID").val(""),
	$("#txtPassword").val(""),
	$("#txtFullname").val(""),
	$("#chkGender").val()}

function generate(){
	if(confirm("Are you sure to Refresh Student List?")){
		$("#generator").removeClass("hidden"),
		$("#result").addClass("hidden"),
		$("#btn-generate").button("loading");
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

		function generate2(){
			if(confirm("Are you sure to Deactivate password of all students?")){
				$("#generator2").removeClass("hidden"),
				$("#result2").addClass("hidden"),
				$("#btn-generate2").button("loading");
				var e=sessionStorage.getItem("ipaddress"),
				t=JSON.parse(window.localStorage.config||"{}");$.ajax({url:"http://"+e+"/cmuvoting/API/index.php",type:"POST",crossDomain:!0,dataType:"json",data:{command:"generate_password2",TermID:t.TermID},
			success:function(e){
				var t=e;return 1!=t.success?(alert(t.msg),
				$("#btn-generate2").button("reset"),
				$("#generator2").addClass("hidden"),
				void $("#result2").removeClass("hidden")):($("#btn-generate2").button("reset"),
				$("#lblgenerated2").html(t.student),
				$("#generator2").addClass("hidden"),
				$("#result2").removeClass("hidden"),
				alert(t.msg),
				void 0)},
			error:function(e){
				$("#btn-generate2").button("reset"),
				$("#generator2").addClass("hidden"),
				$("#result2").removeClass("hidden"),console.log("Error:"),console.log(e.responseText),console.log(e.message)}})}
				else $("#generator2").addClass("hidden"),
				$("#result2").removeClass("hidden")}

function stop_generate(){
	$("#generator").addClass("hidden"),
	$("#result").removeClass("hidden"),
	$("#btn-generate").button("reset"),
	$("#lblgenerated").html("0"),
	$("#passwordModal").modal("hide"),
	refresh()}

	function stop_generate2(){
		$("#generator2").addClass("hidden"),
		$("#result2").removeClass("hidden"),
		$("#btn-generate2").button("reset"),
		$("#lblgenerated2").html("0"),
		$("#passwordModal2").modal("hide"),
		refresh()}


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

		var e=JSON.parse(window.localStorage.user||"{}");Object.keys(e).length<1&&(console.log("redirect to main"),window.location.href="index.php"),$("#current_user").html(e.FullName+" ("+e.GroupName+")"),
		privilege(e),
		get_active_config(),
		fetch_all_student("1"),
		fetch_Term(),
		fetch_AcadProg()}),
		$("#txtSearch").keyup(function(){console.log("fetching ..."),search_studentTyping()}),
		$("#myModal").on("hidden.bs.modal",function(){resetHelpInLine(),
		$("#authenticity_token").val(""),
		$("#txtStudentID").val(""),
		$("#txtPassword").val(""),
		$("#txtLastName").val(""),
		$("#txtFirstName").val(""),
		$("#txtMiddleName").val(""),
		$("#chckCourse").val(""),
		$("#chckCollege").val(""),
		$("#chckTerm").val("")}),
		$(document).on("click",".edit-student",function(){var e=$(this).data("id"),
		t=$(this).data("termid"),
		a=sessionStorage.getItem("ipaddress");
		$.ajax({url:"http://"+a+"/cmuvoting/API/index.php",async:!0,type:"POST",data:{command:"get_student",student_id:e,TermID:t},
		success:function(e){
			var t=e;if(1==t.success)
			$("#authenticity_token").val(t.student.person_id),
			$("#txtStudentID").val(t.student.StudentID),
			$("#txtPassword").val(t.student.Password),
			$("#txtLastName").val(t.student.last_name),
			$("#txtFirstName").val(t.student.first_name),
			$("#txtMiddleName").val(t.student.middle_name),
			$("#chckCourse").val(t.student.Course),
			$("#chckCollege").val(t.student.College),
			$("#chckTerm").val(t.student.TermID),
			$("#myModal").modal("show");
			else if(t.success===!1)
			return $("#myModal").modal("hide"),
			void alert(t.msg)}})}),

			$(document).on("click",".check-activate-student",function(){if(confirm("Are you sure you want to ACTIVATE this Student for Voting?")){
				var e=$(this).data("id"),
				t=$(this).data("termid"),
				a=sessionStorage.getItem("ipaddress");
				$.ajax({url:"http://"+a+"/cmuvoting/API/index.php",async:!0,type:"POST",data:{command:"checkactivate",student_id:e,TermID:t},
			success:function(e){
				var t=e;
				if(1==t.success)alert(t.msg),window.location.href="student-list.php";
				else if(t.success===!1)return void alert(t.msg)}})}}),

			$(document).on("click",".deactivate-student",function(){if(confirm("Are you sure you want to DEACTIVATE this Student for Voting?")){
					var e=$(this).data("id"),
					t=$(this).data("termid"),
					a=sessionStorage.getItem("ipaddress");
					$.ajax({url:"http://"+a+"/cmuvoting/API/index.php",async:!0,type:"POST",data:{command:"deactivate_student",student_id:e,TermID:t},
				success:function(e){
					var t=e;
					if(1==t.success)alert(t.msg),window.location.href="student-list.php";
					else if(t.success===!1)return void alert(t.msg)}})}}),
					$("#pagination").on("click",".page-numbers",function(){var e=$(this).attr("data-id");fetch_all_student(e)});

                 $(document).ready(function(){
                        setInterval(function(){
                            $('#time').load('assets/time.php')
                        }, 1000);
                        });
