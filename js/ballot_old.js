var selected_candidate = new Array();


$(document).ready(function() {
    $('#processing-modal').modal('show');

    get_current_user();
    getCandidacyPosition();

    $('#candidate_list').empty();
    $('#my_ballot').empty();

    window.localStorage.removeItem("ballot");
    window.localStorage.removeItem("candidates");

    $('#processing-modal').modal('hide');
});


function logout() {

    window.localStorage.removeItem("ballot");
    window.localStorage.removeItem("candidates");
    window.localStorage.removeItem("config");
    window.localStorage.removeItem("positions");
    window.localStorage.removeItem("student");

    window.location.href = "index.php";
}

function get_current_user() {
    var user = JSON.parse(window.localStorage['student'] || '{}');
    $('#current_user').html(user.Fullname);
    $('#current_user_course').html(user.ProgName);
}


function getCandidacyPosition() {
    var ipaddress = sessionStorage.getItem("ipaddress");

    $.ajax({
        url: 'http://' + ipaddress + '/cmuvoting/API/index.php',
        async: false,
        type: 'POST',
        crossDomain: true,
        dataType: 'json',
        data: {
            command: 'getCandidacyPosition'
        },
        success: function(response) {
            var decode = response;
            console.log(decode);
            if (decode.success == true) {
                window.localStorage['positions'] = JSON.stringify(decode.positions);
                var len = decode.positions.length;
                $('#lstPositions').empty();
                if (len > 0) {

                    for (var i = 0; i < len; i++) {
                        var data = decode.positions[i];
                        var row = '<li data-id="' + data.PositionID + '"><a href="#"><i class="fa fa-angle-double-right"></i> ' + data.PositionName + '</a>';
                        $('#lstPositions').append(row);
                    }

                }

            } else {
                alert(decode.msg);
                return false;
            }
        },
        error: function(error) {
            console.log("Error:");
            console.log(error);
            return false;
        }
    });
}

function getCandidatesByPositionID(positionID, TermID) {
    var ipaddress = sessionStorage.getItem("ipaddress");

    $.ajax({
        url: 'http://' + ipaddress + '/cmuvoting/API/index.php',

        async: false,
        type: 'POST',
        crossDomain: true,
        dataType: 'json',
        data: {
            command: 'getCandidatesByPositionID',
            positionID: positionID,
            TermID: TermID
        },
        success: function(response) {
            var decode = response;
            console.log(decode);
            if (decode.success == true) {

                window.localStorage['candidates'] = JSON.stringify(decode.candidates);

                var len = decode.candidates.length;
                $('#candidate_list').empty();
                if (len > 0) {;
                    $('#processing-modal').modal('show');

                    for (var i = 0; i < len; i++) {
                        var data = decode.candidates[i];
                        var img = data.Photo;
                        var new_img;
                        if (img === 'W0JJTkFSWV0=' || img === '') {
                            new_img = '../../img/photo.jpg';
                        } else {
                            new_img = 'data:image/x-xbitmap;base64,' + img;
                        }
                        var row = '<a class="col-xs-6 col-sm-3 placeholder">\
                                <img src="' + new_img + '" width="120px" class="img-responsive" alt="Generic placeholder thumbnail">\
                                <h4>' + data.CandidateName + '</h4>\
                                <span class="text-muted">' + data.Partylist + '</span>\
                                <input type="hidden" id="candidate_id" name="candidate_id" value="' + data.CandidateID + '">\
                            </a>';
                        $('#candidate_list').append(row);
                    }
                    $('#processing-modal').modal('hide');

                }

            } else {
                alert(decode.msg);
                return false;
            }
        },
        error: function(error) {
            console.log("Error:");
            console.log(error);
            return false;
        }
    });
}

function getCandidatesByPositionIDByCollegeID(positionID, CollegeID, TermID) {
    var ipaddress = sessionStorage.getItem("ipaddress");

    $.ajax({
        url: 'http://' + ipaddress + '/cmuvoting/API/index.php',

        async: false,
        type: 'POST',
        crossDomain: true,
        dataType: 'json',
        data: {
            command: 'getCandidatesByPositionIDByCollegeID',
            positionID: positionID,
            TermID: TermID,
            CollegeID: CollegeID
        },
        success: function(response) {
            var decode = response;
            console.log(decode);
            if (decode.success == true) {

                window.localStorage['candidates'] = JSON.stringify(decode.candidates);

                var len = decode.candidates.length;
                $('#candidate_list').empty();
                if (len > 0) {;
                    $('#processing-modal').modal('show');

                    for (var i = 0; i < len; i++) {
                        var data = decode.candidates[i];
                        var img = data.Photo;
                        var new_img;
                        if (img === 'W0JJTkFSWV0=' || img === '') {
                            new_img = '../../img/photo.jpg';
                        } else {
                            new_img = 'data:image/x-xbitmap;base64,' + img;
                        }
                        var row = '<a class="col-xs-6 col-sm-3 placeholder">\
                                <img src="' + new_img + '" width="120px" class="img-responsive" alt="Generic placeholder thumbnail">\
                                <h4>' + data.CandidateName + '</h4>\
                                <span class="text-muted">' + data.Partylist + '</span>\
                                <input type="hidden" id="candidate_id" name="candidate_id" value="' + data.CandidateID + '">\
                            </a>';
                        $('#candidate_list').append(row);
                    }
                    $('#processing-modal').modal('hide');

                }

            } else {
                alert(decode.msg);
                return false;
            }
        },
        error: function(error) {
            console.log("Error:");
            console.log(error);
            return false;
        }
    });
}

function getCandidatesByPositionIDByCourseID(positionID, CourseID, TermID) {
    var ipaddress = sessionStorage.getItem("ipaddress");

    $.ajax({
        url: 'http://' + ipaddress + '/cmuvoting/API/index.php',

        async: false,
        type: 'POST',
        crossDomain: true,
        dataType: 'json',
        data: {
            command: 'getCandidatesByPositionIDByCourseID',
            positionID: positionID,
            TermID: TermID,
            ProgramID: CourseID
        },
        success: function(response) {
            var decode = response;
            console.log(decode);
            if (decode.success == true) {

                window.localStorage['candidates'] = JSON.stringify(decode.candidates);

                var len = decode.candidates.length;
                $('#candidate_list').empty();
                if (len > 0) {;
                    $('#processing-modal').modal('show');

                    for (var i = 0; i < len; i++) {
                        var data = decode.candidates[i];
                        var img = data.Photo;
                        var new_img;
                        if (img === 'W0JJTkFSWV0=' || img === '') {
                            new_img = '../../img/photo.jpg';
                        } else {
                            new_img = 'data:image/x-xbitmap;base64,' + img;
                        }
                        var row = '<a class="col-xs-6 col-sm-3 placeholder">\
                                <img src="' + new_img + '" width="120px" class="img-responsive" alt="Generic placeholder thumbnail">\
                                <h4>' + data.CandidateName + '</h4>\
                                <span class="text-muted">' + data.Partylist + '</span>\
                                <input type="hidden" id="candidate_id" name="candidate_id" value="' + data.CandidateID + '">\
                            </a>';
                        $('#candidate_list').append(row);
                    }
                    $('#processing-modal').modal('hide');

                }

            } else {
                alert(decode.msg);
                return false;
            }
        },
        error: function(error) {
            console.log("Error:");
            console.log(error);
            return false;
        }
    });
}


$(document).on("click", "#lstPositions li", function() {
    var config = JSON.parse(window.localStorage['config'] || '{}');
    var candidate = JSON.parse(window.localStorage['candidates'] || '{}');
    var positions = JSON.parse(window.localStorage['positions'] || '{}');
    var student = JSON.parse(window.localStorage['student'] || '{}');

    $('#lstPositions li').removeClass('active');
    $(this).addClass("active");
    $('#lblPosition').html($(this).text());

    var position_info;
    for (var i = 0; i < positions.length; i++) {
        if (positions[i].PositionID === $(this).attr("data-id")) {
            position_info = positions[i];
        }
    }

    if (position_info.VoteForAll == '1') {
        getCandidatesByPositionID($(this).attr("data-id"), config.TermID);
    } else if (position_info.VoteForCollege == '1') {
        getCandidatesByPositionIDByCollegeID($(this).attr("data-id"), student.CollegeID, config.TermID);
    } else if (position_info.VoteForCourses == '1') {
        getCandidatesByPositionIDByCourseID($(this).attr("data-id"), student.ProgID, config.TermID);
    }

});


$(document).on("click", ".placeholder", function() {

    console.log($(this).find('input[name="candidate_id"]').val());

    var config = JSON.parse(window.localStorage['config'] || '{}');
    var student = JSON.parse(window.localStorage['student'] || '{}');
    var ballot = JSON.parse(window.localStorage['ballot'] || '{}');
    var candidates = JSON.parse(window.localStorage['candidates'] || '{}');
    var positions = JSON.parse(window.localStorage['positions'] || '{}');

    var candidate_id = $(this).find('input[name="candidate_id"]').val();

    candidate = new Object();
    var candidate_info;
    var position_info;

    candidate.CandidateID = candidate_id;
    candidate.StudentID = student.StudentID;
    candidate.TermID = config.TermID;

    // GET Candidate Information on Localstorage
    for (var i = 0; i < candidates.length; i++) {
        if (candidates[i].CandidateID === candidate_id) {
            candidate_info = candidates[i];
        }
    }

    candidate.CandidateName = candidate_info.CandidateName;
    candidate.Position = candidate_info.Position;
    candidate.PositionID = candidate_info.PositionID;
    candidate.Photo = candidate_info.Photo;
    candidate.PartyID = candidate_info.PartyID;
    candidate.Partylist = candidate_info.Partylist;
    candidate.CollegeID = candidate_info.CollegeID;
    candidate.College = candidate_info.College;

    for (var i = 0; i < positions.length; i++) {
        if (positions[i].PositionID === candidate_info.PositionID) {
            position_info = positions[i];
        }
    }

    if (ballot.length > 0) {
        var vCounter = 0
        for (var i = 0; i < ballot.length; i++) {
            if (ballot[i]["CandidateID"] == candidate.CandidateID && ballot[i]["StudentID"] == candidate.StudentID && ballot[i]["TermID"] == candidate.TermID) {
                console.log('true');
                $('#error_message').html('Selected candidate(s) was already in your list. Please choose another candidate');
                $('#errModal').modal('show');
                return;
            }

            if (ballot[i].PositionID === position_info.PositionID) {
                vCounter = vCounter + 1;
            }

        }

        if (vCounter >= position_info.Allowed) {
            $('#error_message').html('You are only allowed to vote ' + position_info.Allowed + ' candidate(s) for ' + position_info.PositionName);
            $('#errModal').modal('show');
            return;
        }
    }



    selected_candidate.push(candidate);
    window.localStorage['ballot'] = JSON.stringify(selected_candidate);

    get_my_ballot();

});


function get_my_ballot() {
    var ballot = JSON.parse(window.localStorage['ballot'] || '{}');

    $('#my_ballot').empty();
    if (ballot.length > 0) {
        for (var i = 0; i < ballot.length; i++) {

            var img = ballot[i].Photo;
            var new_img;
            if (img === 'W0JJTkFSWV0=' || img === '') {
                new_img = '../img/photo.jpg';
            } else {
                new_img = 'data:image/x-xbitmap;base64,' + img;
            }

            var row = '<li>\
                        <div class="widget widget-state bg-green">\
                            <div class="state-info">\
                                <div class="image">\
                                    <a href="javascript:;">\
                                        <img src="' + new_img + '" alt="" />\
                                    </a>\
                                </div>\
                                <h4>' + ballot[i].CandidateName + '</h4>\
                                <p>' + ballot[i].Position + ' / ' + ballot[i].Partylist + '</p>\
                            </div>\
                            <div class="state-link">\
                                <a href="#" data-id="' + ballot[i].CandidateID + '" class="remove_candidate">Remove <i class="fa fa-times"></i></a>\
                            </div>\
                        </div>\
                    </li>';
            $('#my_ballot').append(row);
        }
    }
}

$(document).on("click", ".remove_candidate", function() {
    console.log($(this).attr("data-id"));

    var ballot = JSON.parse(window.localStorage['ballot'] || '{}');
    var candidate_id = $(this).attr("data-id");

    if (ballot.length > 0) {
        for (var i = 0; i < ballot.length; i++) {
            if (ballot[i].CandidateID === candidate_id) {
                ballot.splice(i, 1);
                window.localStorage['ballot'] = JSON.stringify(ballot);
            }
        }

        for (var i = 0; i < selected_candidate.length; i++) {
            if (selected_candidate[i].CandidateID === candidate_id) {
                selected_candidate.splice(i, 1);
            }
        }

    } else {
        console.log('removeItem');
        window.localStorage.removeItem("ballot");
    }
    console.log(ballot);


    get_my_ballot();
});

function clear_ballot() {
    window.localStorage.removeItem("ballot");
    selected_candidate.splice(0, selected_candidate.length);
    get_my_ballot();

    $('#removeModal').modal('hide');
}


function submit_ballot() {
    var ballot = JSON.parse(window.localStorage['ballot'] || '{}');
    var config = JSON.parse(window.localStorage['config'] || '{}');
    var student = JSON.parse(window.localStorage['student'] || '{}');

    var my_ballot = new Array();
    for (var i = 0; i < ballot.length; i++) {
        myballot = new Object();

        myballot.CandidateID = ballot[i].CandidateID;
        myballot.StudentID = ballot[i].StudentID;
        myballot.TermID = ballot[i].TermID;
        my_ballot.push(myballot);
    }

    var ipaddress = sessionStorage.getItem("ipaddress");

    $('#myModal').modal('hide');
    $('#processing-modal').modal('show');

    $.ajax({
        url: 'http://' + ipaddress + '/cmuvoting/API/index.php',
        async: false,
        type: 'POST',
        crossDomain: true,
        dataType: 'json',
        data: {
            command: 'Insert_To_Ballot',
            data: my_ballot
        },
        success: function(response) {
            var decode = response;
            console.log(decode);
            if (decode.success == true) {

                $('#processing-modal').modal('hide');

                $('#success_message').html(decode.msg);
                $('#successModal').modal('show');
            } else {
                $('#processing-modal').modal('hide');

                $('#error_message').html(decode.msg);
                $('#errModal').modal('show');
                return;
            }
        },
        error: function(error) {
            $('#processing-modal').modal('hide');
            console.log("Error:");
            console.log(error);
            return;
        }
    });
}

function success_vote() {
    console.log('redirect to main');
    $('#successModal').modal('hide');

    logout();
}
