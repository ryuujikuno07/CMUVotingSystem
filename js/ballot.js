function logout(){
  window.localStorage.removeItem("ballot"),
  window.localStorage.removeItem("voting_candidates"),
  window.localStorage.removeItem("config"),
  window.localStorage.removeItem("voting_positions"),
  window.localStorage.removeItem("voting_student"),
  window.location.href="index.php"}

function getCandidacyPosition(r){
  $.mobile.loading("show");
  var e=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+e+"/cmuvoting/API/index.php",async:!0,
  type:"POST",crossDomain:!0,dataType:"json",
  data:{command:"getCandidacyPosition",TermID:r},
    success:function(r){
      var a=r;
      if(console.log(a),1!=a.success)
      return $.mobile.loading("hide"),
      alert(a.msg),!1;window.localStorage.voting_positions=JSON.stringify(a.positions);
      var t=a.positions.length;
      if($("#lstPositions").empty(),t>0){
        for(var o=0;t>o;o++){
          var i=a.positions[o],
          n='<li data-id="'+i.PositionID+'">                                <a href="#"><i class="fa fa-angle-double-right"></i> '+i.PositionName+"</a></li>";
          $("#lstPositions").append(n)}
          var d=$("#lstPositions");
          d.hasClass("ui-listview")?d.listview("refresh"):d.trigger("create")}
          $.mobile.loading("hide")},
    error:function(r){
      return $.mobile.loading("hide"),
      console.log("Error:"),console.log(e),!1}})}

function getCandidatesByPositionID(e,a){
  var t=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!0,
  type:"POST",crossDomain:!0,dataType:"json",
  data:{command:"getCandidatesByPositionID",positionID:e,TermID:a},
    success:function(e){
      var a=e;
      if(console.log(a),1!=a.success)
      return alert(a.msg),
      !1;window.localStorage.voting_candidates=JSON.stringify(a.candidates);
      var t=a.candidates.length;
      if($("#candidate_list").empty(),
      $("#candidate_list").html(""),t>0){$.mobile.loading("show");
      for(var o=0;t>o;o++){
        var i,n=a.candidates[o],
        d=n.Photo;i="W0JJTkFSWV0="===d||""===d?"../../img/photo.jpg":"data:image/x-xbitmap;base64,"+d;
        var l='<div class="ui-block-b">                                        <div class="jqm-block-content text-center">                                            <h3>'+n.CandidateName+'</h3>                                            <a class="placeholder">                                                <img src="'+i+'">                                                <h4>'+n.Partylist+'</h4>                                                <input type="hidden" id="candidate_id" name="candidate_id" value="'+n.CandidateID+'">                                                <input type="hidden" id="candidate_name" name="candidate_name" value="'+n.CandidateName+'">                                            </a>                                        </div>                                    </div>';
        $("#candidate_list").append(l).trigger("create")}
        $.mobile.loading("hide")}},
    error:function(e){
      return $.mobile.loading("hide"),
      console.log("Error:"),
      console.log(e),!1}})}

function getCandidatesByPositionIDByCollegeID(e,a,t){
  var o=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!0,
  type:"POST",crossDomain:!0,dataType:"json",
  data:{command:"getCandidatesByPositionIDByCollegeID",positionID:e,TermID:t,CollegeID:a},
    success:function(e){
      var a=e;
      if(console.log(a),1!=a.success)
      return alert(a.msg),!1;window.localStorage.voting_candidates=JSON.stringify(a.candidates);
      var t=a.candidates.length;
      if($("#candidate_list").empty(),
      $("#candidate_list").html(""),t>0){$.mobile.loading("show");
      for(var o=0;t>o;o++){
        var i,n=a.candidates[o],d=n.Photo;i="W0JJTkFSWV0="===d||""===d?"../../img/photo.jpg":"data:image/x-xbitmap;base64,"+d;
        var l='<div class="ui-block-b">                                        <div class="jqm-block-content text-center">                                            <h3>'+n.CandidateName+'</h3>                                            <a class="placeholder ">                                                <img src="'+i+'">                                                <h4>'+n.Partylist+'</h4>                                                <input type="hidden" id="candidate_id" name="candidate_id" value="'+n.CandidateID+'">                                                <input type="hidden" id="candidate_name" name="candidate_name" value="'+n.CandidateName+'">                                            </a>                                        </div>                                    </div>';
        $("#candidate_list").append(l).trigger("create")}
        $.mobile.loading("hide")}},
    error:function(e){
      return $.mobile.loading("hide"),
      console.log("Error:"),
      console.log(e),!1}})}

function getCandidatesByPositionIDByCourseID(e,a,t){
  var o=sessionStorage.getItem("ipaddress");
  $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",async:!0,
  type:"POST",crossDomain:!0,dataType:"json",
  data:{command:"getCandidatesByPositionIDByCourseID",positionID:e,TermID:t,ProgramID:a},
    success:function(e){
      var a=e;
      if(console.log(a),1!=a.success)
      return alert(a.msg),!1;window.localStorage.voting_candidates=JSON.stringify(a.candidates);
      var t=a.candidates.length;
      if($("#candidate_list").empty(),
      $("#candidate_list").html(""),t>0){
        $.mobile.loading("show");
        for(var o=0;t>o;o++){
          var i,n=a.candidates[o],
          d=n.Photo;i="W0JJTkFSWV0="===d||""===d?"../../img/photo.jpg":"data:image/x-xbitmap;base64,"+d;
          var l='<div class="ui-block-b">                                        <div class="jqm-block-content text-center">                                            <h3>'+n.CandidateName+'</h3>                                            <a class="placeholder ">                                                <img src="'+i+'">                                                <h4>'+n.Partylist+'</h4>                                                <input type="hidden" id="candidate_id" name="candidate_id" value="'+n.CandidateID+'">                                                <input type="hidden" id="candidate_name" name="candidate_name" value="'+n.CandidateName+'">                                            </a>                                        </div>                                    </div>';
          $("#candidate_list").append(l).trigger("create")}
          $.mobile.loading("hide")}},
    error:function(e){
      return $.mobile.loading("hide"),
      console.log("Error:"),
      console.log(e),!1}})}

function get_my_ballot(){
  var e=JSON.parse(window.localStorage.ballot||"{}");
  if($("#my_ballot3").empty(),e.length>0){
    for(var a=0;a<e.length;a++){
      var i='<tr class="odd">             <td>'+e[a].CandidateName+"</td>                                <td>"+e[a].Position+"</td>       <td>"+e[a].Partylist+'</td>                               </tr>';
      $("#my_ballot3").append(i)}}

    if($("#my_ballot").empty(),e.length>0){
    for(var a=0;a<e.length;a++){
      var t,o=e[a].Photo;
      t="W0JJTkFSWV0="===o||""===o?"../img/photo.jpg":"data:image/x-xbitmap;base64,"+o;
      var i='<li class="selected-panel" data-icon="home">                        <div class="image">                             <img src="'+t+'" alt="" />                        </div>                        <div class="info">                            <span>'+e[a].CandidateName+"</span>                            <small>"+e[a].Position+" / "+e[a].Partylist+'</small>                        </div>                        <div class="state-link">                            <a href="#" data-id="'+e[a].CandidateID+'" class="remove_candidate">Remove <i class="fa fa-times"></i></a>                        </div>                    </li>';

      $("#my_ballot").append(i)}
      var n=$("#my_ballot");
      n.hasClass("ui-listview")?n.listview("refresh"):n.trigger("create");
      var n=$("#my_ballot2");
      n.hasClass("ui-listview")?n.listview("refresh"):n.trigger("create")}
    }

function clear_ballot(){
  window.localStorage.removeItem("ballot"),
  selected_candidate.splice(0,selected_candidate.length),
  get_my_ballot(),
  $("#removeModal").popup("close")}

function review_ballot(){
  $("#myModal").popup("close"),
  $("#myModal").on({popupafterclose:function(){setTimeout(function(){$("#panel-left").panel("open")},100)}})}

function submit_ballot1(){
  $("#myModal").popup("close"),
  $("#myModal").on({popupafterclose:function(){$("#error_message").html("WARNING: You are not allowed to submit empty ballot. Please try again"),
  setTimeout(function(){$("#errModal").popup("open",{transition:"pop"})},100)}})}

function submit_ballot(){
  for(var e=JSON.parse(window.localStorage.ballot||"{}"),a=(JSON.parse(window.localStorage.config||"{}"),JSON.parse(window.localStorage.voting_student||"{}"),new Array),t=0;t<e.length;t++)
  myballot=new Object,
  myballot.CandidateID=e[t].CandidateID,
  myballot.StudentID=e[t].StudentID,
  myballot.TermID=e[t].TermID,
  a.push(myballot);
  if($("#myModal").popup("close"),Object.keys(e).length<1)
  return void $("#myModal").on({popupafterclose:function(){$("#error_message").html("WARNING: You are not allowed to submit empty ballot. Please try again"),setTimeout(function(){$("#errModal").popup("open",{transition:"pop"})},100)}});
  var o=sessionStorage.getItem("ipaddress"),
  b=JSON.parse(window.localStorage.voting_student||"{}"),
  c=JSON.parse(window.localStorage.config||"{}");
  $.mobile.loading("show"),
  $.ajax({url:"http://"+o+"/cmuvoting/API/index.php",
  async:!0,type:"POST",crossDomain:!0,dataType:"json",
  data:{command:"Insert_To_Ballot",data:a,student_id:b,TermID:c},
    success:function(e){
      var a=e;
      return console.log(a),1!=a.success?($.mobile.loading("hide")
      ,$("#error_message").html(a.msg),
      void $("#myModal").on({popupafterclose:function(){setTimeout(function(){$("#errModal").popup("open")},100)}})):($.mobile.loading("hide"),
      $("#success_message").html(a.msg),window.location.href='ballot_print.php',
      $("#myModal").on({popupafterclose:function(){setTimeout(function(){$("#successModal").popup("open")},100)}}),void 0)},
    error:function(e){
      $.mobile.loading("hide"),
      console.log("Error:"),console.log(e)}})}


function Print_Ballot(e){
            var
            a=JSON.parse(window.localStorage.config||"{}"),
            b=JSON.parse(window.localStorage.voting_student||"{}"),
            t=sessionStorage.getItem("ipaddress");
            $("#processing-modal").modal("show"),
            $("#tbl_voters tbody > tr").remove(),
            $.ajax({url:"http://"+t+"/cmuvoting/API/index.php",async:!0,type:"POST",crossDomain:!0,dataType:"json",data:{command:"Print_Ballot",username:b.StudentID,TermID:a.TermID,page:e},
            success:function(e){
                    var t=e;
                    if(t&&t.candidates.length>0){
                  for(var a=0;a<1;a++){
                    var s=t.candidates,n='<tr style="font-size:8px;"> <td><strong>Ballot ID: </strong>'+s[a].ElectionCode+' </td> <td><strong>Student ID: </strong> '+s[a].StudentID+'</td> <td><strong>Student Name: </strong> '+s[a].StudentName+'</td> <td><strong>Time Voted: </strong> '+s[a].DateTimeVoted+'</td> </tr>';
                    $("#tbl_voters1 thead").append(n)}
                    $("#pagination").html(t.pagination),
                    $("#tbl_voters1").addClass("tablesorter");
                    var o=!0;
                    $("table").trigger("update",[o])}

                var t=e;if(t&&t.candidates.length>0){
                  for(var a=0;a<t.candidates.length;a++){
                    var s=t.candidates,n='  <tr class="odd" style="font-size:10px;">             <td>'+s[a].CandidateName+"</td>                                <td>"+s[a].PositionName+"</td>            <td>"+s[a].PartyName+'</td>                               </tr>';
                    $("#tbl_voters tbody").append(n)}
                    $("#pagination").html(t.pagination),
                    $("#tbl_voters").addClass("tablesorter");
                    var o=!0;
                    $("table").trigger("update",[o])}
                    $("#processing-modal").modal("hide")},
          error:function(t){    
                        console.log("Error:"),console.log(e),$("#processing-modal").modal("hide")}})}


function success_vote(){
    console.log("redirect to main"),$("#successModal").popup("close"),logout()} 

function print_vote(){
  window.print(),$("#successModal").popup("open");
}

function toast(e){
  var a=$('<div class="ui-loader ui-overlay-shadow ui-body-e ui-corner-all"><h4>'+e+"</h4></div>");
  a.css({display:"block",background:"#2a2a2a",opacity:.9,position:"fixed",padding:"7px","text-align":"center",width:"270px",color:"#fff",left:($(window).width()-284)/2,top:$(window).height()/2-20});
  var t=function(){
    $(this).remove()};
    a.click(t),a.appendTo($.mobile.pageContainer).delay(2000),a.fadeOut(400,t)}
    var selected_candidate=new Array;
    $(document).ready(function(){
      $.mobile.loading("show"),
      console.log("document ready");
      var e=JSON.parse(window.localStorage.voting_student||"{}"),
      o=JSON.parse(window.localStorage.config||"{}");
      Object.keys(e).length<0&&(console.log("redirect to main"),
      window.location.href="index.php"),
      $("#current_user").html(e.Fullname),
      $("#current_userid").html(e.StudentID),
      $("#current_user_course").html(e.course_description),
      $("#current_user_college").html(e.department_description),
      getCandidacyPosition(o.TermID),
      Print_Ballot(e.StudentID,o.TermID),
      getCandidatesByPositionIDByCollegeID(e.CollegeID,o.TermID),
      $("#candidate_list").empty(),
      $("#my_ballot").empty(),
      window.localStorage.removeItem("ballot"),
      window.localStorage.removeItem("voting_candidates"),
      $.mobile.loading("hide")}),
      $(document).on("click","#lstPositions li",function(){
        var e=JSON.parse(window.localStorage.config||"{}"),
        a=(JSON.parse(window.localStorage.voting_candidates||"{}"),
        JSON.parse(window.localStorage.voting_positions||"{}")),
        t=JSON.parse(window.localStorage.voting_student||"{}");
        $("#lstPositions li").removeClass("active"),
        $(this).addClass("active"),
        $("#lblPosition").html($(this).text()),
        $("#candidate_list").empty(),
        $("#candidate_list").html("");
        for(var o,i=0;i<a.length;i++)
        a[i].PositionID===$(this).attr("data-id")&&(o=a[i]);
        "1"==o.VoteForAll?getCandidatesByPositionID($(this).attr("data-id"),e.TermID):"1"==o.VoteForCollege?getCandidatesByPositionIDByCollegeID($(this).attr("data-id"),
        t.department_id,e.TermID):"1"==o.VoteForCourses&&getCandidatesByPositionIDByCourseID($(this).attr("data-id"),t.course_id,e.TermID),
        $("#panel-right").panel("close")}),
        $(document).on("click",".placeholder",function(){
          console.log($(this).find('input[name="candidate_id"]').val()),
          console.log($(this).find('input[name="candidate_name"]').val());
          var e=JSON.parse(window.localStorage.config||"{}"),
          a=JSON.parse(window.localStorage.voting_student||"{}"),
          t=JSON.parse(window.localStorage.ballot||"{}"),
          o=JSON.parse(window.localStorage.voting_candidates||"{}"),
          i=JSON.parse(window.localStorage.voting_positions||"{}"),
          n=$(this).find('input[name="candidate_id"]').val();
          candidate=new Object;
          var d,l;
          candidate.CandidateID=n,
          candidate.StudentID=a.StudentID,
          candidate.TermID=e.TermID;
          for(var s=0;s<o.length;s++)o[s].CandidateID===n&&(d=o[s]);
          candidate.CandidateName=d.CandidateName,
          candidate.Position=d.Position,
          candidate.PositionID=d.PositionID,
          candidate.Photo=d.Photo,
          candidate.PartyID=d.PartyID,
          candidate.Partylist=d.Partylist,
          candidate.CollegeID=d.CollegeID,
          candidate.College=d.College;
          for(var s=0;s<i.length;s++)i[s].PositionID===d.PositionID&&(l=i[s]);
          if(t.length>0){
            for(var r=0,s=0;s<t.length;s++){
              if(t[s].CandidateID==candidate.CandidateID&&t[s].StudentID==candidate.StudentID&&t[s].TermID==candidate.TermID)
              return console.log("true"),
              $("#error_message").html("Selected candidate(s) was already in your list. Please choose another candidate"),
              void $("#errModal").popup("open",{transition:"pop"});
              t[s].PositionID===l.PositionID&&(r+=1)}
              if(r>=l.Allowed)
              return $("#error_message").html("You are only allowed to vote "+l.Allowed+" candidate(s) for "+l.PositionName),
              void $("#errModal").popup("open",{transition:"pop"})}
              selected_candidate.push(candidate),
              window.localStorage.ballot=JSON.stringify(selected_candidate),
              $("#selected_candidate").html($(this).find('input[name="candidate_name"]').val()),
              toast($(this).find('input[name="candidate_name"]').val()+" is added to your ballot!.."),
              get_my_ballot(),$("#panel-left").panel("open")}),
              $(document).on("click",".remove_candidate",
              function(){console.log($(this).attr("data-id"));
              var e=JSON.parse(window.localStorage.ballot||"{}"),
              a=$(this).attr("data-id");
              if(e.length>0){
                for(var t=0;t<e.length;t++)
                e[t].CandidateID===a&&(e.splice(t,1),
                window.localStorage.ballot=JSON.stringify(e));
                for(var t=0;t<selected_candidate.length;t++)
                selected_candidate[t].CandidateID===a&&selected_candidate.splice(t,1)}
                else console.log("removeItem"),
                window.localStorage.removeItem("ballot");
                console.log(e),get_my_ballot()}),
              $(document).ready(function(){
            var e=JSON.parse(window.localStorage.config||"{}");
            $("#term").html(" ["+e.ElectionName+"  -  "+e.SchoolYear+"] ")
          });
