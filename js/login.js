function get_active_config(){
  var e=sessionStorage.getItem("ipaddress");
  $.mobile.loading("show"),
  $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!1,type:"POST",
  crossDomain:!0,dataType:"json",
  data:{command:"get_active_config"},
    success:function(e){
      var o=e;
      return console.log(o),
      1!=o.success?($.mobile.loading("hide"),
      void alert(o.msg)):(window.localStorage.config=JSON.stringify(o.config),
      void $.mobile.loading("hide"))},
    error:function(e){
      $.mobile.loading("hide"),
      console.log("Error:"),
      console.log(e)}})}

function checklogindate(){
  console.log("checklogindate");
  var e=!0,
  o=sessionStorage.getItem("ipaddress");
  return
  $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!1,
  type:"POST",dataType:"json",
  data:{command:"checklogindate"},
    success:function(o){
      var n=o;e=n.success===!0?!0:!1}}),e}


function login(){
  if(1==validate()){
    var e=JSON.parse(window.localStorage.config||"{}"),
    o=sessionStorage.getItem("ipaddress");
    $.mobile.loading("show"),
    $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!0,
    type:"POST",crossDomain:!0,dataType:"json",
    data:{command:"checkloginballot",username:$("#username").val(),TermID:e.TermID},
      success:function(n){
        var a=n;
        return console.log(a),1==a.success?($.mobile.loading("hide"),
        $("#error_message").html(a.msg),
        $("#errModal").popup("open"),!1):void 
        $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!1,
        type:"POST",crossDomain:!0,dataType:"json",
        data:{command:"login",username:$("#username").val(),TermID:e.TermID},
      success:function(e){
            var o=e;return console.log(o),1!=o.success?($.mobile.loading("hide"),
            $("#error_message").html(o.msg),
            void $("#errModal").popup("open"),$(".servers").css({background:""})):($.mobile.loading("hide"),
            window.localStorage.voting_student=JSON.stringify(o.student),
            console.log("ballot.php"),
            window.location.href="ballot.php",void 0)},
      error:function(e){
            console.log("Error:"),
            console.log(e),
            $.mobile.loading("hide"),
            $("#error_message").html(e),
            $("#errModal").popup("open")}})},
      error:function(e){
            return $.mobile.loading("hide"),
            console.log("Error:"),
            console.log(e),empty=!1}})}}

function login2(){
  if(1==validate()){
    var e=JSON.parse(window.localStorage.config||"{}"),
    o=sessionStorage.getItem("ipaddress");
    $.mobile.loading("show"),
    $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!0,
    type:"POST",crossDomain:!0,dataType:"json",
    data:{command:"checkloginballot2",username:$("#username").val(),CollegeID:e.department_id,TermID:e.TermID},
      success:function(n){
        var a=n;
        return console.log(a),1==a.success?($.mobile.loading("hide"),
        $("#error_message").html(a.msg),
        $("#errModal").popup("open"),!1):void 
        $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!1,
        type:"POST",crossDomain:!0,dataType:"json",
        data:{command:"login2",username:$("#username").val(),CollegeID:e.department_id,TermID:e.TermID},
      success:function(e){
            var o=e;return console.log(o),1!=o.success?($.mobile.loading("hide"),
            $("#error_message").html(o.msg),
            void $("#errModal").popup("open")):($.mobile.loading("hide"),
            window.localStorage.voting_student=JSON.stringify(o.student),
            console.log("ballot.php"),
            window.location.href="ballot.php",void 0)},
      error:function(e){
            console.log("Error:"),
            console.log(e),
            $.mobile.loading("hide"),
            $("#error_message").html(e),
            $("#errModal").popup("open")}})},
      error:function(e){
            return $.mobile.loading("hide"),
            console.log("Error:"),
            console.log(e),empty=!1}})}}


function validate(){
  $('input[type="text"]').each(function(){
    $(this).val($(this).val().trim())});
    var e=!1;
    return""==$("#username").val()?(alert("Username is required."),$(".servers").css({background:""}),e=!0,!1):""==$("#server").val()?($(".servers").css({background:"red"}),alert("IP Address is required."),e=!0,!1):(sessionStorage.setItem("ipaddress",$("#server").val()),get_active_config(),0==checklogindate()?(alert("WARNING: Unable to login, Election already done."),!1):(console.log("return true"),!0))}
    $(document).ready(function(){
      var e=JSON.parse(window.localStorage.student||"{}");Object.keys(e).length>0&&(console.log("redirect to main"),window.location.href="ballot.php"),$("#server").val(sessionStorage.getItem("ipaddress"))}), 
            $(document).ready(function(){
            $("#ip").click(function(){
              if(this.click)
            $("#ipdraw").fadeIn('slow');
            $("#ip").fadeOut('slow');
          });
            }),
        $(document).ready(function(){
            $("#ip2").click(function(){
              if(this.click)
            $("#ip").fadeIn('slow');
            $("#ipdraw").fadeOut('slow');
          });
            });
