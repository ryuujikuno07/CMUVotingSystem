function logout(){
  window.localStorage.clear(),
  window.location.href="index.php"}

  function refresh(){
  	window.location.href="main.php"}

function get_active_config(){
  var e=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!1,type:"POST",
  crossDomain:!0,dataType:"json",
  data:{command:"get_active_config"},
    success:function(e){
      var o=e;
      return 1!=o.success?void alert(o.msg):void(window.localStorage.config=JSON.stringify(o.config))},
    error:function(e){
      console.log("Error:"),
      console.log(e)}})}

function getStatisticsOverview(){
  var e=JSON.parse(window.localStorage.config||"{}"),
  o=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!1,type:"POST",
  crossDomain:!0,dataType:"json",
  data:{command:"getStatisticsOverview",TermID:e.TermID},
    success:function(e){
      var o=e;if(1!=o.success)
      return void alert(o.msg);
      window.localStorage.totalVoters=o.totalVoters,
      window.localStorage.totalNotVoted=o.totalNotVoted,
      window.localStorage.totalVoted=o.totalVoted;
      var t=window.localStorage.totalVoted||"{}",
      n=window.localStorage.totalVoters||"{}",
      a=window.localStorage.totalNotVoted||"{}";
      $("#announcement-voted-heading").html(t),
      $("#announcement-voters-heading").html(n),
      $("#announcement-notvoted-heading").html(a)},
    error:function(e){
      console.log("Error:"),
      console.log(e)}})}

function select2_config(){
  var e=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!1,type:"POST",
  crossDomain:!0,dataType:"json",
  data:{command:"select2_config"},
    success:function(e){
      var o=e;$("#cboElectionTerm").empty();
      for(var t=0;t<o.configs.length;t++){
        var n=o.configs,
        a='<option id="'+n[t].TermID+'" value="'+n[t].TermID+'">'+n[t].Config+"</option>";
        $("#cboElectionTerm").append(a)}},
    error:function(e){
      console.log("Error:"),
      console.log(e.responseText),
      console.log(e.message)}})}

function activate_term(){
    var o=$("#cboElectionTerm").val(),
    e=sessionStorage.getItem("ipaddress");
    $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!1,type:"POST",
    data:{command:"activate_configuration",TermID:o},
      success:function(o){
        var t=o;if(1==t.success)generate(),
        window.location.href="main.php";
        else if(t.success===!1)
        return void alert(t.msg)}})}

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

function stop_generate(){
  $("#generator").addClass("hidden"),
  $("#result").removeClass("hidden"),
  $("#btn-generate").button("reset"),
  $("#lblgenerated").html("0"),
  $("#passwordModal").modal("hide"),
  refresh()}

function privilege(e){
  "Administrator"==e.GroupName?$("#Configure").removeClass("hidden"):$("#Configure").addClass("hidden"),
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
    privilege(e),
    get_active_config();
    var o=JSON.parse(window.localStorage.config||"{}");
    $("#lblElectionTerm").html(" [ "+o.ElectionName+" - "+o.SchoolYear+" ] "),getStatisticsOverview(),select2_config()});
    $(document).ready(function(){
      setInterval(function(){
        $('#time').load('assets/time.php')
      }, 1000);
      $("#panel").panel("open");
      });
