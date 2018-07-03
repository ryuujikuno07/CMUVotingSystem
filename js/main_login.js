function validate(){
  $('input[type="text"]').each(function(){
    $(this).val($(this).val().trim())});
    var e=!1;
    return""==$("#username").val()?($("#username").next("span").text("Username is required."),
    alert("Username is required."),$(".servers").css({background:""}),e=!0,!1):""==$("#password").val()?($("#password").next("span").text("Password is required."),
    alert("Password is required."),$(".servers").css({background:""}),e=!0,!1):""==$("#server").val()?($("#server").next("span").text("IP Address is required."),
    alert("IP Address is required."),$(".servers").css({background:"red"}),e=!0,!1):(sessionStorage.setItem("ipaddress",$("#server").val()),!0)}

function login(){
  if(1==validate()){
    var e=sessionStorage.getItem("ipaddress");
    $("#processing-modal").modal("show"),
    $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!1,type:"POST",
    crossDomain:!0,dataType:"json",
    data:{command:"main_login",username:$("#username").val(),password:$("#password").val()},
      success:function(e){
        var s=e;
        return 0==s.success?($("#processing-modal").modal("hide"),
        $("#error_message").html(s.msg),$("#errModal").modal("show"),$("#username").next("span").text(""),$("#password").next("span").text(""),$(".servers").css({background:""}),!1):($("#processing-modal").modal("hide"),
        window.localStorage.user=JSON.stringify(s.user),
        void(window.location.href="main.php"))},
      error:function(e){
        return console.log("Error:"),
        console.log(e),empty=!1,
        $("#processing-modal").modal("hide"),empty}})}}
        $(document).ready(function(){
          $("#server").val(sessionStorage.getItem("ipaddress"));
          var e=JSON.parse(window.localStorage.user||"{}");
          Object.keys(e).length>0&&(console.log("redirect to main"),window.location.href="main.php")}),
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
