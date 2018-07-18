	function refresh(){
	fetch_all_candidate("1"),select_Courses(),fetch_college(),fetch_PartyList(),fetch_Positions()
	}

	function logout(){
		window.localStorage.clear(),window.location.href="index.php"
	}

	function checkCandidate(A,e){
		var t=!1,a=sessionStorage.getItem("ipaddress");
		return $.ajax({url:"http://"+a+"/cmuvoting/API/index.php",async:!1,type:"POST",crossDomain:!0,dataType:"json",
			data:{
			command:"checkCandidate",StudentID:A,TermID:e},
			success:function(A){var e=A;t=1==e.success?!0:!1}}),t}

	function resetHelpInLine(){
		$("span.help-inline").each(function(){$(this).text("")})}

	function validate(){
		resetHelpInLine(),
		$('input[type="text"]').each(function(){$(this).val($(this).val().trim())});
		var A=!1;
		return""==$("#txtstudentID").val()&&($("#txtstudentID").next("span").text("Student ID is required."),A=!0),
		""==$("#txtfirstName").val()&&($("#txtfirstName").next("span").text("First Name is required."),A=!0),
		""==$("#txtlastName").val()&&($("#txtlastName").next("span").text("Last Name is required."),A=!0),
		null==$("#chckCourse").val()&&($("#chckCourse").next("span").text("Course is required."),A=!0),
		null==$("#chckCollege").val()&&($("#chckCollege").next("span").text("College  is required."),A=!0),
		null==$("#chckPartyList").val()&&($("#chckPartyList").next("span").text("Party List is required."),A=!0),
		null==$("#chckPosition").val()&&($("#chckPosition").next("span").text("Position is required."),A=!0),
		""==$("#ValidationDate").val()&&($("#ValidationDate").next("span").text("Validation Date is required."),
			A=!0),
		1==A?(alert("Please input all the required fields correctly."),!1):!0}

		function save(){
			var A=$("#candidateID").val(),e=JSON.parse(window.localStorage.user||"{}"),
			t=JSON.parse(window.localStorage.config||"{}"),
			a=sessionStorage.getItem("ipaddress"),
			o=new Array,n=new Object;
			n.student_ID=$("#txtstudentID").val(),
			n.first_Name=$("#txtfirstName").val(),
			n.middle_Name=$("#txtmiddleName").val(),
			n.last_Name=$("#txtlastName").val(),
			n.gender=1==$("#txtgender").val()?"Male":"Female",
			n.Course=$("#chckCourse").val(),
			n.College=$("#chckCollege").val(),
			n.PartyList=$("#chckPartyList").val(),
			n.Position=$("#chckPosition").val(),
			n.Term=t.TermID,
			n.Created_by=e.UserAccountID,
			n.Validated_by=e.UserAccountID,
			n.ValidationDate=$("#ValidationDate").val(),
			$("#reg_userfile").get(0).files[0]?$("#reg_userfile").get(0).files[0].result?(n.candidate_Photo=$("#reg_userfile").get(0).files[0].result,
				n.image_type=$("#reg_userfile").get(0).files[0].type):(console.log("candidate_Photo ELSE"),n.candidate_Photo="data:image/jpeg;base64,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",
				n.image_type="image/jpeg"):""!==path?(n.candidate_Photo=path,n.image_type=type):(console.log("candidate_Photo"),n.candidate_Photo="data:image/jpeg;base64,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",
				n.image_type="image/jpeg"),o.push(n),
			""==A?1==validate()&&(console.log("Save"),$.ajax({url:"http://"+a+"/cmuvoting/API/index.php",async:!0,type:"POST",
				crossDomain:!0,
				dataType:"json",data:{command:"insert_candidate",data:o},
				success:function(A){
					var e=A;if(1==e.success)$("#btn-save").button("reset"),
				window.location.href="candidates-list.php";
				else if(e.success===!1)return $("#btn-save").button("reset"),
					void alert(e.msg)},
				error:function(A){
					$("#btn-save").button("reset"),console.log("Error:"),
				alert(A.responseText),
				console.log(A.message)}})):1==validate()&&(console.log("Edit"),
			$.ajax({url:"http://"+a+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,
				dataType:"json",data:{command:"update_candidate",candidate_id:A,data:o},
				success:function(A){
					var e=A; if(1==e.success)window.location.href="candidates-list.php";
				else if(e.success===!1)return void alert(e.msg)},
				error:function(A){console.log("Error:"),console.log(A.responseText),console.log(A.message)}}))}

		function fetch_student(){
			{var A=sessionStorage.getItem("ipaddress");JSON.parse(window.localStorage.config||"{}")}
		$.ajax({url:"http://"+A+"/cmuvoting/API/index.php",async:!1,type:"POST",crossDomain:!0,
			dataType:"json",data:{command:"getSelect2Student"},
			success:function(){console.log("success")},
			error:function(A){console.log("Error:"),console.log(A.responseText),console.log(A.message)}})}

		function fetchjson(){
			{var A=sessionStorage.getItem("ipaddress");JSON.parse(window.localStorage.config||"{}")}
			$.ajax({url:"http://"+A+"/cmuvoting/API/student.json",type:"get",dataType:"json",
				error:function(){},
				success:function(A){$("#cboStudent").empty();
				for(var e=0;e<A.length;e++){
					var t=A,a=""+t[e].StudentID+" - "+t[e].Fullname,o='<option id="'+t[e].StudentID+'" value="'+t[e].StudentID+'">'+a+"</option>";
					$("#cboStudent").append(o)}}})}

		function fetch_all_candidate(A){
				var e=JSON.parse(window.localStorage.config||"{}"),
					t=sessionStorage.getItem("ipaddress");
					$("#processing-modal").modal("show"),
					$("#tbl_candidates tbody > tr").remove(),
					$.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",
						data:{command:"select_all_candidate",TermID:e.TermID,page:A},
					success:function(A){
					for(var e=A,t=0;t<e.candidates.length;t++){
						var a,o=e.candidates,n=o[t].Photo;a="W0JJTkFSWV0="===n||""===n||null===n?"../../img/photo.jpg":"data:image/png;base64,"+n;
						var s='<tr>                            <td width="200px;"><img src="'+a+'" style="width: 200px;height: 100px;max-width: 100%;max-height: 100%;" class="img-responsive img-rounded" alt="Generic placeholder thumbnail"></td>                            <td align="center">'+o[t].StudentID+"</td>                            <td align='center'>"+o[t].CandidateName+"</td>                             <td align='center'>"+o[t].Course+"</td>                                <td align='center'>"+o[t].Position+"</td>                             <td align='center'>"+o[t].Partylist+"</td>                                                                           <td align='center'>"+o[t].ValidationDate+" , "+o[t].TimeRegistered+'</td>                            <td class=" ">                              <div class="text-right">                                <a class="upload-candidate-icon btn btn-primary btn" href="javascript:show_photo_uploader('+o[t].CandidateID+');" data-id="'+o[t].CandidateID+'">                                  <i class="icon-picture"></i>                                </a>                                <a class="edit-candidate-icon btn btn-success btn-xs" data-id="'+o[t].CandidateID+'">                                  <i class="icon-pencil"></i>                                </a>                                <a class="remove-candidate-icon btn btn-danger btn-xs" data-id="'+o[t].CandidateID+'">                                  <i class="icon-remove"></i>                                </a>                              </div>                            </td>                        </tr>';
					$("#tbl_candidates tbody").append(s),
				$(document).ready(function(){
            var e=JSON.parse(window.localStorage.config||"{}");
            $("#term").html(" ["+e.ElectionName+"  -  "+e.SchoolYear+"] ")
          });}
					$("#pagination").html(e.pagination),
					$("#tbl_candidates").addClass("tablesorter");
					var i=!0;$("table").trigger("update",[i]),
					$("#processing-modal").modal("hide")},
					error:function(A){
						$("#btn-save").button("reset"),console.log("Error:"),console.log(A.responseText),console.log(A.message),$("#processing-modal").modal("hide")}})}

		function search_candidate(){
			if(""==$("#searchValue").val())
		  return void refresh(),!1;
			var A=$("#searchValue").val(),
			e=JSON.parse(window.localStorage.config||"{}"),
			t=sessionStorage.getItem("ipaddress");
				$("#processing-modal").modal("show"),
				$("#tbl_candidates tbody > tr").remove(),
				$.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",
					data:{command:"search_candidate",value:A,TermID:e.TermID,page:"1"},
					success:function(A){
						var e=A;if(e&&e.candidates.length>0){for(var t=0;t<e.candidates.length;t++){
						var a,o=e.candidates,n=o[t].Photo;a="W0JJTkFSWV0="===n||""===n?"../../img/photo.jpg":"data:image/png;base64,"+n;
						var s='<tr>                                    <td width="200px;"><img src="'+a+'" style="width: 200px;height: 100px;max-width: 100%;max-height: 100%;" class="img-responsive img-rounded" alt="Generic placeholder thumbnail"></td>                                    <td align="center">'+o[t].StudentID+"</td>                            <td align='center'>"+o[t].CandidateName+"</td>                             <td align='center'>"+o[t].Course+"</td>                                <td align='center'>"+o[t].Position+"</td>                             <td align='center'>"+o[t].Partylist+"</td>                                                                         <td align='center'>"+o[t].ValidationDate+"</td>                          <td align='center'>"+o[t].TimeRegistered+'</td>                                    <td class=" ">                                      <div class="text-right">                                        <a class="upload-candidate-icon btn btn-primary btn" href="javascript:show_photo_uploader('+o[t].CandidateID+');" data-id="'+o[t].CandidateID+'">                                          <i class="icon-picture"></i>                                        </a>                                        <a class="edit-candidate-icon btn btn-success btn-xs" data-id="'+o[t].CandidateID+'">                                          <i class="icon-pencil"></i>                                        </a>                                        <a class="remove-candidate-icon btn btn-danger btn-xs" data-id="'+o[t].CandidateID+'">                                          <i class="icon-remove"></i>                                        </a>                                      </div>                                    </td>                                </tr>';
				$("#tbl_candidates tbody").append(s)}$("#pagination").html(e.pagination),
				$("#tbl_candidates").addClass("tablesorter");
				var i=!0;$("table").trigger("update",[i])}$("#processing-modal").modal("hide")},
				error:function(A){$("#btn-save").button("reset"),
				console.log("Error:"),
				console.log(A.responseText),console.log(A.message)}})}

		function search_candidateTyping(){
			if(""==$("#searchValue").val())
			 return void refresh(),!1;
			var A=$("#searchValue").val(),
			e=JSON.parse(window.localStorage.config||"{}"),
			t=sessionStorage.getItem("ipaddress");
				$.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",
					data:{command:"search_candidate",value:A,TermID:e.TermID,page:"1"},
					success:function(A){
						var e=A;$("#tbl_candidates tbody > tr").remove();
						for(var t=0;t<e.candidates.length;t++){
							var a,o=e.candidates,n=o[t].Photo;a="W0JJTkFSWV0="===n||""===n?"../../img/photo.jpg":"data:image/png;base64,"
							+n;var s='<tr>                            <td width="200px;"><img src="'+a+'" style="width: 200px;height: 100px;max-width: 100%;max-height: 100%;" class="img-responsive img-rounded" alt="Generic placeholder thumbnail"></td>                            <td align="center">'+o[t].StudentID+"</td>                            <td align='center'>"+o[t].CandidateName+"</td>                             <td align='center'>"+o[t].Course+"</td>                                <td align='center'>"+o[t].Position+"</td>                             <td align='center'>"+o[t].Partylist+"</td>                                                      <td align='center'>"+o[t].ValidationDate+" , "+o[t].TimeRegistered+'</td>                            <td class=" ">                              <div class="text-right">                                <a class="upload-candidate-icon btn btn-primary btn" href="javascript:show_photo_uploader('+o[t].CandidateID+');" data-id="'+o[t].CandidateID+'">                                  <i class="icon-picture"></i>                                </a>                                <a class="edit-candidate-icon btn btn-success btn-xs" data-id="'+o[t].CandidateID+'">                                  <i class="icon-pencil"></i>                                </a>                                <a class="remove-candidate-icon btn btn-danger btn-xs" data-id="'+o[t].CandidateID+'">                                  <i class="icon-remove"></i>                                </a>                              </div>                            </td>                        </tr>';
				$("#tbl_candidates tbody").append(s)}$("#pagination").html(e.pagination),
				$("#tbl_candidates").addClass("tablesorter");
				var i=!0;$("table").trigger("update",[i])},
				error:function(A){
					$("#btn-save").button("reset"),console.log("Error:"),console.log(A.responseText),console.log(A.message)}})}

		function select_Courses(){
			var A=sessionStorage.getItem("ipaddress");
			$.ajax({url:"http://"+A+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",
				data:{command:"select_For_ComboCourse"},
				success:function(A){
					var e=A;$("#chckCourse").empty();
					for(var t=0;t<e.programs.length;t++){
						var a=e.programs,o='<option id="'+a[t].course_id+'" value="'+a[t].course_id+'" hidden="true">'+a[t].course_description+"</option>";$("#chckCourse").append(o)}},
						error:function(A){console.log("Error:"),console.log(A.responseText),console.log(A.message)}})}

		function fetch_college(){
			var A=sessionStorage.getItem("ipaddress");
			$.ajax({url:"http://"+A+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",
				data:{command:"select_For_ComboCollege"},
				success:function(A){
					var e=A;$("#chckCollege").empty();
					for(var t=0;t<e.colleges.length;t++){
						var a=e.colleges,o='<option id="'+a[t].department_id+'" value="'+a[t].department_id+'" hidden="true">'+a[t].department_description+"</option>";$("#chckCollege").append(o)}},
						error:function(A){$("#btn-save").button("reset"),console.log("Error:"),console.log(A.responseText),console.log(A.message)}})}

		function fetch_PartyList(){
			var A=sessionStorage.getItem("ipaddress");
			$.ajax({url:"http://"+A+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",
				data:{command:"Select_For_ComboParty"},
				success:function(A){
					var e=A;$("#chckPartyList").empty();
					for(var t=0;t<e.partylist.length;t++){
						var a=e.partylist,o='<option id="'+a[t].PartyID+'" value="'+a[t].PartyID+'">'+a[t].PartyName+"</option>";$("#chckPartyList").append(o)}},
						error:function(A){
							$("#btn-save").button("reset"),console.log("Error:"),console.log(A.responseText),console.log(A.message)}})}

		function fetch_Positions(){
			var A=sessionStorage.getItem("ipaddress"),e=JSON.parse(window.localStorage.config||"{}");
			$.ajax({url:"http://"+A+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",
				data:{command:"select_ForComboPosition",TermID:e.TermID},
				success:function(A){
					var e=A;$("#chckPosition").empty();
					for(var t=0;t<e.positions.length;t++){
						var a=e.positions,o='<option id="'+a[t].PositionID+'" value="'+a[t].PositionID+'">'+a[t].PositionName+"</option>";
						$("#chckPosition").append(o)}},
				error:function(A){
					$("#btn-save").button("reset"),console.log("Error:"),console.log(A.responseText),console.log(A.message)}})}

		function show_photo_uploader(A){
			$("#uploadModal").modal("show"),
			$("#hidden_candidate_id").val(A)}

		function hide_photo_uploader(){
			$("#uploadModal").modal("hide"),
			$("#hidden_candidate_id").val(""),
			$("#userfile").fileinput("clear"),
			$("#userfile").fileinput("reset"),
			window.location.reload()}

		function upload_pic(){
			var A=JSON.parse(window.localStorage.config||"{}"),e=JSON.parse(window.localStorage.user||"{}");
			if(""==$("#userfile").val())
				return void alert("No file(s) selected. Please choose a Photo file to upload.");
			var t=new Array,
			a=new Object;
			a.photo=$("#userfile").get(0).files[0].result,
			a.candidate_id=$("#hidden_candidate_id").val(),
			a.TermID=A.TermID,
			a.user=e.UserAccountID,
			a.image_type=$("#userfile").get(0).files[0].type,t.push(a),console.log(t),console.log($("#userfile").get(0).files);
			var o=sessionStorage.getItem("ipaddress");
			$.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",
				data:{command:"upload_photo_candidate",data:t},
				success:function(A){
					return console.log(A),1==A.success?(alert(A.msg),
						void window.location.reload()):void 0},
				error:function(A){
					console.log("Error:"),console.log(A.responseText),console.log(A.message)}})}

		function commandToClear(){
			$("#candidateID").val(""),
			$("#txtstudentID").val(""),
			$("#txtfirstName").val(""),
			$("#txtmiddleName").val(""),
			$("#txtlastName").val(""),
			$("#txtgender").val(""),
			$("#chckCourse").val(""),
			$("#chckCollege").val(""),
			$("#chckPartyList").val(""),
			$("#chckPosition").val(""),
			$("#chckTerm").val("1"),
			$("#ValidationDate").val("mm/dd/yyy"),
			$("#upimage").attr("src","../../img/photo.jpg"),path="",type=""}

		function privilege(A){
			1==A._Dashboard&&$("#LIST li").eq(0).removeClass("hidden"),
			1==A._UsersAccount&&$("#LIST li").eq(1).removeClass("hidden"),
			1==A._Student&&$("#LIST li").eq(2).removeClass("hidden"),
			1==A._PartyList&&$("#LIST li").eq(3).removeClass("hidden"),
			1==A._Candidates&&$("#LIST li").eq(4).removeClass("hidden"),
			1==A._ElectoralPosition&&$("#LIST li").eq(5).removeClass("hidden"),
			1==A._AcademicProgram&&$("#LIST li").eq(6).removeClass("hidden"),
			1==A._ElectionConfig&&$("#LIST li").eq(7).removeClass("hidden"),
			1==A._UsersAccount&&$("#LIST li").eq(8).removeClass("hidden")}
			$.fn.modal.Constructor.prototype.enforceFocus=function(){};
			var path="",type="";
			$(document).ready(function(){
				var A=JSON.parse(window.localStorage.user||"{}"),e=sessionStorage.getItem("ipaddress"),t=JSON.parse(window.localStorage.config||"{}");
				Object.keys(A).length<1&&(console.log("redirect to main"),window.location.href="index.php"),
				$("#current_user").html(A.FullName+" ("+A.GroupName+")"),fetch_student(),privilege(A),fetch_all_candidate("1"),select_Courses(),fetch_college(),fetch_PartyList(),fetch_Positions(),
				$("#cboStudent").select2({placeholder:"Select a Student",initSelection:function(){},
					ajax:{url:"http://"+e+"/cmuvoting/API/index.php",type:"POST",dataType:"json",
					data:function(A){
						return{command:"search_student2",TermID:t.TermID,value:A}},
					results:function(A){
						var e=[];return $.each(A.students,function(A,t){e.push({id:t.StudentID,text:t.Fullname})}),{results:e}}}})}),
				$("#myModal").on("hidden.bs.modal",function(){
					$("#cboStudent").select2("val","")}),
				$("#cboStudent").change(function(){
					var A=JSON.parse(window.localStorage.config||"{}"),
					e=sessionStorage.getItem("ipaddress");
					return console.log("StudentID Value: ",$(this).val()),0!=checkCandidate($(this).val(),A.TermID)?void alert("WARNING: The selected Candidate is already on the record.."):void
				$.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",
					data:{command:"search_student",TermID:A.TermID,
					value:$(this).val(),page:"1"},
					success:function(A){
						for(var e=A,t=0;t<e.students.length;t++){
							var a=e.students;
								$("#txtstudentID").val(a[0].StudentID),
							$("#txtfirstName").val(a[0].first_name),
							$("#txtmiddleName").val(a[0].middle_name),
							$("#txtlastName").val(a[0].last_name),
							$("#chckCourse").val(a[0].course_id)
							$("#chckCollege").val(a[0].department_id)}}})}),
							$("#searchValue").keyup(function(){console.log("fetching ..."),search_candidateTyping()}),
							$(document).on("click",".edit-candidate-icon",function(){
								$("#cboStudent").addClass('.select2-search-hidden');
								var A=$(this).data("id"),e=sessionStorage.getItem("ipaddress"),
									t=JSON.parse(window.localStorage.config||"{}");
								$.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,type:"POST",
									data:{command:"get_candidate",candidate_id:A,TermID:t.TermID},
									success:function(A){
										var e=A;if(console.log(e.candidate),1==e.success){
											$("#candidateID").val(e.candidate.CandidateID),
											$("#txtstudentID").val(e.candidate.StudentID),
											$("#txtfirstName").val(e.candidate.FirstName),
											$("#txtmiddleName").val(e.candidate.MiddleName),
											$("#txtlastName").val(e.candidate.LastName),
											$("#chckCourse").val(e.candidate.ProgramID),
											$("#chckCollege").val(e.candidate.CollegeID),
											$("#chckPartyList").val(e.candidate.PartyID),
											$("#chckPosition").val(e.candidate.PositionID),
											$("#chckTerm").val(e.candidate.TermID);
											var t=e.candidate.ValidationDate;
											if(null!=t){
												var a=t.slice(0,10).split("-"),o=a[0]+"-"+a[1]+"-"+a[2];
												$("#ValidationDate").val(o)}
												var n,s=e.candidate.Photo;n="W0JJTkFSWV0="==s||""==s||null==s?"../../img/photo.jpg":"data:image/png;base64,"+s,
												$("#upimage").attr("src",n),path=n,type="image/png",
												$("#myModal").modal("show")}
												else if(e.success===!1)
													return $("#myModal").modal("hide"),void alert(e.msg)}})}),
												$(document).on("click",".remove-candidate-icon",function(){
												if(confirm("Are you sure to delete this Candidate?")){
													var A=$(this).data("id"),e=sessionStorage.getItem("ipaddress");
													$.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,type:"POST",
														data:{command:"delete_candidate",candidate_id:A},
														success:function(A){
															var e=A;if(1==e.success)window.location.href="candidates-list.php";
												else if(e.success===!1)
													return void alert(e.msg)}})}}),
													$("#pagination").on("click",".page-numbers",function(){
														var A=$(this).attr("data-id");fetch_all_candidate(A)});

														$(document).ready(function(){
														    document.getElementsByName("ValidationDate")[0].setAttribute('min', new Date().toISOString().split('T')[0]);
														});
														$(document).ready(function(){
															setInterval(function(){
																$('#time').load('assets/time.php')
															}, 1000);
															});

