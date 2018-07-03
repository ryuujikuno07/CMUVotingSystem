<?php

function insert_candidate($data){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$newimage = $data[0]['candidate_Photo'];
		switch ($data[0]['image_type']) {
			case 'image/jpg':
				$newimage = str_replace('data:image/jpg;base64,','', $newimage);
				break;
			case 'image/jpeg':
				$newimage = str_replace('data:image/jpeg;base64,','', $newimage);
				break;
			case 'image/png':
				$newimage = str_replace('data:image/png;base64,','', $newimage);
				break;
			case 'image/gif':
				$newimage = str_replace('data:image/gif;base64,','', $newimage);
				break;
			default:
				print json_encode(array('success'=>false,'msg'=>'Invalid file type'));
				return;
				break;
		}
		$newimage = base64_decode($newimage);

		if ($stmt = $mysqli->prepare('INSERT INTO election_candidates(StudentID,LastName,FirstName,MiddleName,ProgramID,CollegeID,PartyID,PositionID,Photo,TermID,TimeRegistered,CreatedBy,CreatedOn,ValidatedBy,ValidationDate) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,NOW(),?)')){
			$stmt->bind_param("ssssssssssssss", $data[0]['student_ID'],$data[0]['last_Name'],$data[0]['first_Name'],$data[0]['middle_Name'],$data[0]['Course'],$data[0]['College'],$data[0]['PartyList'],$data[0]['Position'],$newimage,$data[0]['Term'],$data[0]['Time_Registered'],$data[0]['Created_by'],$data[0]['Validated_by'],$data[0]['ValidationDate']);
			$stmt->execute();


			print json_encode(array('success' =>true,'msg' =>'Record successfully saved'));

	}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}
}


function update_candidate($candidate_id,$data){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{

		$newimage = $data[0]['candidate_Photo'];
		switch ($data[0]['image_type']) {
			case 'image/jpg':
				$newimage = str_replace('data:image/jpg;base64,','', $newimage);
				break;
			case 'image/jpeg':
				$newimage = str_replace('data:image/jpeg;base64,','', $newimage);
				break;
			case 'image/png':
				$newimage = str_replace('data:image/png;base64,','', $newimage);
				break;
			case 'image/gif':
				$newimage = str_replace('data:image/gif;base64,','', $newimage);
				break;
			default:
				print json_encode(array('success'=>false,'msg'=>'Invalid file type'));
				return;
				break;
		}
		$newimage = base64_decode($newimage);

		if ($stmt = $mysqli->prepare("UPDATE election_candidates SET StudentID=?,LastName=?,FirstName=?,MiddleName=?,ProgramID=?,CollegeID=?,PartyID=?,PositionID=?,Photo=?,TimeRegistered=?,ModifiedBy=?,ModifiedOn=NOW(),ValidatedBy=?,ValidationDate=? WHERE CandidateID='$candidate_id' AND TermID='".$data[0]['Term']."'")){
			$stmt->bind_param("sssssssssssss",
				$data[0]['student_ID'],
				$data[0]['last_Name'],
				$data[0]['first_Name'],
				$data[0]['middle_Name'],
				$data[0]['Course'],
				$data[0]['College'],
				$data[0]['PartyList'],
				$data[0]['Position'],
				$newimage,
				$data[0]['Time_Registered'],
				$data[0]['Created_by'],
				$data[0]['Validated_by'],
				$data[0]['ValidationDate']);
			$stmt->execute();
			print json_encode(array('success' =>true,'msg' =>'Record successfully updated'));
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}
}

function delete_candidate($CandidateID){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		if($stmt = $mysqli->prepare("DELETE FROM election_candidates WHERE CandidateID =?")){
			$stmt->bind_param("s", $CandidateID);
			$stmt->execute();
			$stmt->close();
			print json_encode(array('success' =>true,'msg' =>'Record successfully deleted'));
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}
}

function select_all_candidate($TermID,$page){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$limit = 10;
		$adjacent = 3;

		if($page==1){
		   $start = 0;
		}else{
		  $start = ($page-1)*$limit;
		}

		$query1 = "SELECT (CONCAT(C.LastName,', ',C.FirstName,' ',SUBSTR(C.MiddleName,1,1))) AS CandidateName,C.CandidateID,
		    (SELECT PositionName FROM election_positions WHERE PositionID=C.PositionID LIMIT 1) AS Position,C.PositionID,
		    (SELECT department_description FROM department_table WHERE department_id=C.CollegeID LIMIT 1) AS College,C.CollegeID,
		    (SELECT PartyName FROM election_partylist WHERE PartyID=C.PartyID LIMIT 1) AS Partylist,C.PartyID,
			(SELECT course_code  FROM course_table WHERE course_id=C.ProgramID LIMIT 1) AS Course,C.ProgramID,
			(SELECT CONCAT(SchoolYear,' - ',ElectionName) FROM election_configuration WHERE TermID=C.TermID LIMIT 1) AS ElectionTerm,C.TermID,
			C.Photo,DATE_FORMAT(C.ValidationDate,'%a %b-%d-%Y') AS ValidationDate,C.ValidatedBy, DATE_FORMAT(C.TimeRegistered,'%h:%i %p') AS TimeRegistered,C.StudentID
			FROM election_candidates C WHERE C.TermID='$TermID' ORDER BY C.PositionID;";

		$result1 = $mysqli->query($query1);
		$rows = $result1->num_rows;

		$query = "SELECT(CONCAT(C.LastName,', ',C.FirstName,' ',SUBSTR(C.MiddleName,1,1))) AS CandidateName,C.CandidateID,
		    (SELECT PositionName FROM election_positions WHERE PositionID=C.PositionID LIMIT 1) AS Position,C.PositionID,
		    (SELECT department_description FROM department_table WHERE department_id=C.CollegeID LIMIT 1) AS College,C.CollegeID,
		    (SELECT PartyName FROM election_partylist WHERE PartyID=C.PartyID LIMIT 1) AS Partylist,C.PartyID,
			(SELECT course_code  FROM course_table WHERE course_id=C.ProgramID LIMIT 1) AS Course,C.ProgramID,
			(SELECT CONCAT(SchoolYear,' - ',ElectionName) FROM election_configuration WHERE TermID=C.TermID LIMIT 1) AS ElectionTerm,C.TermID,
			C.Photo,DATE_FORMAT(C.TimeRegistered,'%h:%i %p') AS TimeRegistered,C.ValidatedBy, DATE_FORMAT(C.ValidationDate,'%a %b-%d-%Y') AS ValidationDate,C.StudentID
			FROM election_candidates C WHERE C.TermID='$TermID' ORDER BY C.PositionID LIMIT $start, $limit;";

		$mysqli->set_charset("utf8");
		$result = $mysqli->query($query);
		$data = array();
		$data2 = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$data2= array('CandidateID'=>$row['CandidateID'],
		    		'Photo'=> base64_encode($row['Photo']),
		    		'CandidateName'=>$row['CandidateName'],
		    		'Position'=>$row['Position'],'PositionID' =>$row['PositionID'],
		    		'Partylist'=>$row['Partylist'],'PartyID'=>$row['PartyID'],
		    		'College'=>$row['College'],'CollegeID'=>$row['CollegeID'],
		    		'ElectionTerm'=>$row['ElectionTerm'],'TermID'=>$row['TermID'],
		    		'Course'=>$row['Course'],'ProgramID'=>$row['ProgramID'],
		    		'TimeRegistered'=>$row['TimeRegistered'],'ValidatedBy'=>$row['ValidatedBy'],
		    		'ValidationDate'=>$row['ValidationDate'],'StudentID'=>$row['StudentID']);
		    array_push($data, $data2);
		}

		$paging = pagination($limit,$adjacent,$rows,$page);

		print json_encode(array('success' =>true,'candidates' =>$data,'pagination'=>$paging));

	}
}

function get_candidate($candidate_id,$TermID){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$query ="SELECT C.LastName,C.FirstName,C.MiddleName,C.CandidateID,
		    (SELECT PositionName FROM election_positions WHERE PositionID=C.PositionID LIMIT 1) AS Position,C.PositionID,
		    (SELECT department_description FROM department_table WHERE department_id=C.CollegeID LIMIT 1) AS College,C.CollegeID,
		    (SELECT PartyName FROM election_partylist WHERE PartyID=C.PartyID LIMIT 1) AS Partylist,C.PartyID,
			(SELECT course_description  FROM course_table WHERE course_id=C.ProgramID LIMIT 1) AS Course,C.ProgramID,
			(SELECT CONCAT(SchoolYear,' - ',ElectionName) FROM election_configuration WHERE TermID=C.TermID LIMIT 1) AS ElectionTerm,C.TermID,
			C.Photo,DATE_FORMAT(C.TimeRegistered,'%Y-%m-%d') AS TimeRegistered,C.ValidatedBy, DATE_FORMAT(C.ValidationDate,'%Y-%m-%d') AS ValidationDate,C.StudentID
			FROM election_candidates C INNER JOIN department_table D on C.CollegeID = D.department_id WHERE CandidateID='$candidate_id' AND TermID='$TermID' LIMIT 1;";

		$data = array();

		$result = $mysqli->query($query);
		$data = array();
		$data2 = array();

		if($row = $result->fetch_array(MYSQLI_ASSOC)){

					$data2= array('CandidateID'=>$row['CandidateID'],
		    		'Photo'=> base64_encode($row['Photo']),
		    		'LastName'=>$row['LastName'],
		    		'FirstName'=>$row['FirstName'],
		    		'MiddleName'=>$row['MiddleName'],
		    		'Position'=>$row['Position'],'PositionID' =>$row['PositionID'],
		    		'Partylist'=>$row['Partylist'],'PartyID'=>$row['PartyID'],
		    		'College'=>$row['College'],'CollegeID'=>$row['CollegeID'],
		    		'ElectionTerm'=>$row['ElectionTerm'],'TermID'=>$row['TermID'],
		    		'Course'=>$row['Course'],'ProgramID'=>$row['ProgramID'],
		    		'TimeRegistered'=>$row['TimeRegistered'],'ValidatedBy'=>$row['ValidatedBy'],
		    		'ValidationDate'=>$row['ValidationDate'],'StudentID'=>$row['StudentID']);


			 array_push($data, $data2);

			print json_encode(array('success' =>true,'candidate' =>$data2));

		}else{
			print json_encode(array('success' =>false,'msg' =>"No record found!"));
		}
	}
}

function search_candidate($value,$TermID,$page){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{

		$limit = 10;
		$adjacent = 3;

		if($page==1){
		   $start = 0;
		}else{
		  $start = ($page-1)*$limit;
		}

		$query1 = "SELECT (CONCAT(C.LastName,', ',C.FirstName,' ',SUBSTR(C.MiddleName,1,1))) AS CandidateName,C.CandidateID,
		    (SELECT PositionName FROM election_positions WHERE PositionID=C.PositionID LIMIT 1) AS Position,C.PositionID,
		    (SELECT department_description FROM department_table WHERE department_id=C.CollegeID LIMIT 1) AS College,C.CollegeID,
		    (SELECT PartyName FROM election_partylist WHERE PartyID=C.PartyID LIMIT 1) AS Partylist,C.PartyID,
			(SELECT course_code  FROM course_table WHERE course_id=C.ProgramID LIMIT 1) AS Course,C.ProgramID,
			(SELECT CONCAT(SchoolYear,' - ',ElectionName) FROM election_configuration WHERE TermID=C.TermID LIMIT 1) AS ElectionTerm,C.TermID,
			C.Photo,DATE_FORMAT(C.TimeRegistered,'%h:%i %p') AS TimeRegistered,C.ValidatedBy, DATE_FORMAT(C.ValidationDate,'%a %b-%d-%Y') AS ValidationDate,C.StudentID
			FROM election_candidates C
			WHERE C.TermID='$TermID' AND (C.LastName LIKE '%$value%') OR (C.FirstName LIKE '%$value%') OR (C.StudentID LIKE '%$value%')
			ORDER BY C.PositionID;";

		$result1 = $mysqli->query($query1);
		$rows = $result1->num_rows;

		$query = "SELECT (CONCAT(C.LastName,', ',C.FirstName,' ',SUBSTR(C.MiddleName,1,1))) AS CandidateName,C.CandidateID,
		    (SELECT PositionName FROM election_positions WHERE PositionID=C.PositionID LIMIT 1) AS Position,C.PositionID,
		    (SELECT department_description FROM department_table WHERE department_id=C.CollegeID LIMIT 1) AS College,C.CollegeID,
		    (SELECT PartyName FROM election_partylist WHERE PartyID=C.PartyID LIMIT 1) AS Partylist,C.PartyID,
			(SELECT course_code  FROM course_table WHERE course_id=C.ProgramID LIMIT 1) AS Course,C.ProgramID,
			(SELECT CONCAT(SchoolYear,' - ',ElectionName) FROM election_configuration WHERE TermID=C.TermID LIMIT 1) AS ElectionTerm,C.TermID,
			C.Photo,DATE_FORMAT(C.TimeRegistered,'%h:%i %p') AS TimeRegistered,C.ValidatedBy, DATE_FORMAT(C.ValidationDate,'%a %b-%d-%Y') AS ValidationDate,C.StudentID
			FROM election_candidates C
			WHERE (C.LastName LIKE '%$value%') OR (C.FirstName LIKE '%$value%') OR (C.StudentID LiKE '%$value%')
			AND C.TermID='$TermID' ORDER BY C.PositionID LIMIT $start, $limit;";

			$result = $mysqli->query($query);
			$data = array();
			$data2 = array();
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$data2= array('CandidateID'=>$row['CandidateID'],
			    		'Photo'=> base64_encode($row['Photo']),
			    		'CandidateName'=>$row['CandidateName'],
			    		'Position'=>$row['Position'],'PositionID' =>$row['PositionID'],
			    		'Partylist'=>$row['Partylist'],'PartyID'=>$row['PartyID'],
			    		'College'=>$row['College'],'CollegeID'=>$row['CollegeID'],
			    		'ElectionTerm'=>$row['ElectionTerm'],'TermID'=>$row['TermID'],
			    		'Course'=>$row['Course'],'ProgramID'=>$row['ProgramID'],
			    		'TimeRegistered'=>$row['TimeRegistered'],'ValidatedBy'=>$row['ValidatedBy'],
			    		'ValidationDate'=>$row['ValidationDate'],'StudentID'=>$row['StudentID']);
			    array_push($data, $data2);
			}

			$paging = pagination($limit,$adjacent,$rows,$page);

			print json_encode(array('success' =>true,'candidates' =>$data,'pagination'=>$paging));
	}
}

function upload_photo($data){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$newimage = $data[0]['photo'];
		switch ($data[0]['image_type']) {
			case 'image/jpg':
				$newimage = str_replace('data:image/jpg;base64,','', $newimage);
				break;
			case 'image/jpeg':
				$newimage = str_replace('data:image/jpeg;base64,','', $newimage);
				break;
			case 'image/png':
				$newimage = str_replace('data:image/png;base64,','', $newimage);
				break;
			case 'image/gif':
				$newimage = str_replace('data:image/gif;base64,','', $newimage);
				break;
			default:
				print json_encode(array('success'=>false,'msg'=>'Invalid file type'));
				return;
				break;
		}
		$newimage = base64_decode($newimage);

		if ($stmt = $mysqli->prepare('UPDATE election_candidates SET Photo=?, ModifiedBy=?,ModifiedOn=NOW() WHERE CandidateID="'.$data[0]["candidate_id"].'" AND TermID="'.$data[0]["TermID"].'";')){
			$stmt->bind_param("ss", $newimage,$data[0]['user']);
			$stmt->execute();
			print json_encode(array('success' =>true,'msg' =>'Record successfully updated'));
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}
}


function Print_Candidates($TermID){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{

		$query="SELECT (CONCAT(C.LastName,', ',C.FirstName,' ',SUBSTR(C.MiddleName,1,1))) AS CandidateName,C.CandidateID,
		    (SELECT PositionName FROM election_positions WHERE PositionID=C.PositionID LIMIT 1) AS Position,C.PositionID,
		    (SELECT department_description FROM department_table WHERE department_id=C.CollegeID LIMIT 1) AS College,C.CollegeID,
		    (SELECT PartyName FROM election_partylist WHERE PartyID=C.PartyID LIMIT 1) AS Partylist,C.PartyID,
			(SELECT course_code  FROM course_table WHERE course_id=C.ProgramID LIMIT 1) AS Course,C.ProgramID,
			(SELECT CONCAT(SchoolYear,' - ',ElectionName) FROM election_configuration WHERE TermID=C.TermID LIMIT 1) AS ElectionTerm,C.TermID,
			C.Photo,DATE_FORMAT(C.ValidationDate,'%a %b-%d-%Y') AS ValidationDate,C.ValidatedBy, DATE_FORMAT(C.TimeRegistered,'%h:%i %p') AS TimeRegistered,C.StudentID
			FROM election_candidates C WHERE C.TermID ='$TermID' ORDER BY C.PositionID ASC;";

		$result = $mysqli->query($query);
		$data = array();
		$data2 = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$data2= array('CandidateID'=>$row['CandidateID'],
			    		'Photo'=> base64_encode($row['Photo']),
			    		'CandidateName'=>$row['CandidateName'],
			    		'Position'=>$row['Position'],'PositionID' =>$row['PositionID'],
			    		'Partylist'=>$row['Partylist'],'PartyID'=>$row['PartyID'],
			    		'College'=>$row['College'],'CollegeID'=>$row['CollegeID'],
			    		'ElectionTerm'=>$row['ElectionTerm'],'TermID'=>$row['TermID'],
			    		'Course'=>$row['Course'],'ProgramID'=>$row['ProgramID'],
			    		'TimeRegistered'=>$row['TimeRegistered'],'ValidatedBy'=>$row['ValidatedBy'],
			    		'ValidationDate'=>$row['ValidationDate'],'StudentID'=>$row['StudentID']);
			    array_push($data, $data2);
		}

		print json_encode(array('success' =>true,'candidates' =>$data));
	}
}

function checkCandidate($StudentID,$TermID){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$query ="SELECT * FROM election_candidates WHERE StudentID = '$StudentID' AND TermID='$TermID' LIMIT 1;";
		$result = $mysqli->query($query);
		if($row = $result->fetch_array(MYSQLI_ASSOC)){
			print json_encode(array('success' =>true));
		}else{
			print json_encode(array('success' =>false));
		}
	}
}

?>
