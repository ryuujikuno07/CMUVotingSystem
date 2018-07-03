function get_active_config(){
  var e=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!1,
  type:"POST",crossDomain:!0,dataType:"json",
  data:{command:"get_active_config"},
    success:function(e){
      var o=e;
      return console.log(o),1!=o.success?void alert(o.msg):void(window.localStorage.config=JSON.stringify(o.config))},
    error:function(e){
      console.log("Error:"),
      console.log(e)}})}

function login(){
  if(1==validate()){
    var e=JSON.parse(window.localStorage.config||"{}"),
    o=sessionStorage.getItem("ipaddress");
    $("#processing-modal").modal("show"),
    $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!0,
    type:"POST",crossDomain:!0,dataType:"json",
    data:{command:"checklogin",username:$("#username").val(),TermID:e.TermID},
      success:function(e){
        var s=e;
        return console.log(s),1==s.success?($("#error_message").html(s.msg),
        $("#errModal").modal("show"),!1):void $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!1,
        type:"POST",crossDomain:!0,dataType:"json",
        data:{command:"main_login",username:$("#username").val(),password:$("#password").val()},
      success:function(e){
        var o=e;
        return console.log(o),1!=o.success?($("#processing-modal").modal("hide"),
        $("#error_message").html(o.msg),
        void $("#errModal").modal("show"),$(".servers").css({background:""}),$("#username").next("span").text(""),$("#password").next("span").text("")):($("#processing-modal").modal("hide"),
        window.localStorage.canvass_user=JSON.stringify(o.user),
        void(window.location.href="canvassing.php"))},
      error:function(e){
        console.log("Error:"),
        console.log(e),$("#processing-modal").modal("hide"),
        $("#error_message").html(e),$("#errModal").modal("show")}})},
      error:function(e){
        return console.log("Error:"),
        console.log(e),
        empty=!1,$("#processing-modal").modal("hide"),empty}})}}

function validate(){
  $('input[type="text"]').each(function(){$(this).val($(this).val().trim())});
  var e=!1;return""==$("#username").val()?($("#username").next("span").text("Username is required."),
  alert("Username is required."),$(".servers").css({background:""}),e=!0,!1):""==$("#password").val()?($("#password").next("span").text("Password is required."),
  alert("Password is required."),$(".servers").css({background:""}),e=!0,!1):""==$("#server").val()?($("#server").next("span").text("IP Address is required."),$(".servers").css({background:"red"}),
  alert("IP Address is required."),e=!0,!1):(sessionStorage.setItem("ipaddress",$("#server").val()),get_active_config(),
  console.log("return true"),!0)}
  $(document).ready(function(){
    var e=JSON.parse(window.localStorage.canvass_user||"{}");Object.keys(e).length>0&&(console.log("redirect to main"),
    window.location.href="canvassing.php"),
    $("#server").val(sessionStorage.getItem("ipaddress"))}),
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
