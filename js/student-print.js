
function logout(){
  window.localStorage.clear(),
  window.location.href=" index.php"}

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

function query_student(e){
        	var
        	a=JSON.parse(window.localStorage.config||"{}"),
        	t=sessionStorage.getItem("ipaddress");
        	$("#processing-modal").modal("show"),
        	$("#tbl_student tbody > tr").remove(),
        	$.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",data:{command:"Print_Student",TermID:a.TermID,page:e},
        	success:function(e){
        		var t=e;if(t&&t.students.length>0){
        			for(var a=0;a<t.students.length;a++){

        				var s=t.students,n='<tr class="odd">             <td>'+s[a].StudentID+"</td>                                <td>"+s[a].Fullname+'</td>                                 <!--<td>'+s[a].Gender+"</td> -->                           <td>"+s[a].Course+"</td>                                 <td>"+s[a].College+"</td>                      <!--<td>"+s[a].ElectionTerm+"</td>                                <td>"+s[a].Password+'</td>                   -->                            </tr>';
        				$("#tbl_student tbody").append(n)}
        				$("#pagination").html(t.pagination),
                $("#tbl_student").addClass("tablesorter"),
                $(document).ready(function(){
              var e=JSON.parse(window.localStorage.config||"{}");
              $("#term").html(" ["+e.ElectionName+"  -  "+e.SchoolYear+"] ")
            });
        				var o=!0;}
        				$("#processing-modal").modal("hide")},
        				error:function(e){
        					console.log("Error:"),console.log(e),$("#processing-modal").modal("hide")}})}


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
    $(document).ready(function(){var e=JSON.parse(window.localStorage.user||"{}"),
    o=JSON.parse(window.localStorage.config||"{}");
    Object.keys(e).length<1&&(console.log("redirect to main"),window.location.href="index.php"),$("#current_user").html(e.FullName+" ("+e.GroupName+")"),
  		query_student(1),privilege(e)}),
    $(document).ready(function(){
                        setInterval(function(){
                            $('#time').load('assets/time-print.php')
                        }, 1000);
                        });
