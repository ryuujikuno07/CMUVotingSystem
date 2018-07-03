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

function query_config(){
  var e=sessionStorage.getItem("ipaddress");
  $("#processing-modal").modal("show"),
  $("#tbl_config tbody > tr").remove(),
  $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,type:"POST",
  crossDomain:!0,dataType:"json",
  data:{command:"Print_Config"},
    success:function(e){
      var o=e;if(o&&o.configs.length>0)
      for(var t=0;t<o.configs.length;t++){
        var n=o.configs,
        i='<tr class="odd">                                   <td style="text-align:center;">'+n[t].ElectionName+"</td>                                    <td style='text-align:center;'>"+n[t].ElectionCode+"</td>                                    <td style='text-align:center;'>"+n[t].SchoolYear+"</td>                                  <!--  <td style='text-align:center;'>"+n[t].VotersForAll+"</td>                                   <td style='text-align:center;'>"+n[t].College+"</td>   -->                                 <td style='text-align:center;'>"+n[t].ElectionDate+"</td>                                    <td style='text-align:center;'>"+n[t].TimeStart+"</td>                                    <td style='text-align:center;'>"+n[t].TimeEnd+"</td>                                    </tr>";
        $("#tbl_config tbody").append(i)}
        $("#processing-modal").modal("hide")},
    error:function(e){
      console.log("Error:"),
      console.log(e.responseText),
      console.log(e.message),
      $("#processing-modal").modal("hide")}})}

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
    Object.keys(e).length<1&&(console.log("redirect to main"),
    window.location.href="index.php"),
    $("#current_user").html(e.FullName+" ("+e.GroupName+")"),
      query_config(),privilege(e)}),
    $(document).ready(function(){
                        setInterval(function(){
                            $('#time').load('assets/time-print.php')
                        }, 1000);
                        });