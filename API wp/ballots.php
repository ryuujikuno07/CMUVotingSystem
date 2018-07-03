<?php

function Insert_To_Ballot($data){
		$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
			if ($mysqli->connect_errno) {
	    print json_encode(array('success'=>false,'msg'=>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	}else{	

		$Ecode = $mysqli->query("SELECT *
               FROM election_ballotcode
               ORDER BY ID DESC
               LIMIT 1");
			$fill = 4;
 			$row1 = $Ecode->fetch_array(MYSQLI_ASSOC);
          	$code =  $row1['Code'];
          	$code = $code + 1;

        $SY = $mysqli->query("SELECT ElectionCode
               FROM election_configuration WHERE IsActive = 1 
               LIMIT 1");
 		$row2 = $SY->fetch_array(MYSQLI_ASSOC);
        $SYcode =  $row2['ElectionCode'];
        $Bcode = $SYcode.' - '.str_pad($code, $fill, '0', STR_PAD_LEFT);

		$query2 = $mysqli->query("insert into election_ballotcode
                                (Code) 
                                        values 
                                            ('$code')");
		$sql = array();
		foreach($data as $row){
			 $sql[] = '("'.$Bcode.'","'.$row['StudentID'].'","'.$row['CandidateID'].'","'.$row['TermID'].'")';
		}

		$query = 'INSERT INTO election_ballots(ElectionCode,StudentID,CandidateID,TermID) VALUES '.implode(',', $sql);

		if ($result = $mysqli->query($query)) { 
			print json_encode(array('success'=>true,'msg'=>'Thank you for participating the election'));
		
	}else{
		   	print json_encode(array('success'=>false,'msg'=>'Error while submitting your ballot. Please try again!'));
		}
	}
}



function login($username,$TermID){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
		if ($mysqli->connect_errno) {
	    print json_encode(array('success'=>false,'msg'=>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	}else{
		$query = "SELECT S.person_id,CONCAT(IFNULL(S.last_name,''),', ',IFNULL(S.first_name,''),' ',IFNULL(S.middle_name,'')) AS Fullname,P.course_description,P.course_id,D.department_description,D.department_id,K.curriculum_id,S.TermID,S.Password,
			(SELECT student_number FROM student_numbering WHERE person_id = S.person_id) AS StudentID,S.person_id
				FROM person_table S INNER JOIN student_numbering N ON N.person_id=S.person_id  INNER JOIN student_curriculum K on K.student_number = N.student_number INNER JOIN curriculum C ON K.curriculum_id = C.curriculum_id INNER JOIN course_table P ON C.course_id = P.course_id INNER JOIN department_curriculum U ON K.curriculum_id = U.curriculum_id LEFT JOIN department_table D ON U.department_id = D.department_id INNER JOIN student_status T on N.student_number = T.student_number AND T.enrolled_status = 0 WHERE N.student_number='$username' AND S.Password='1' AND S.TermID='$TermID' LIMIT 1;";
		$data = array();
		if ($result = $mysqli->query($query)) {
		    if($row = $result->fetch_array(MYSQLI_ASSOC)){
		    	print json_encode(array('success'=>true,'msg'=>'','student'=>$row));
		    }else{
		    	print json_encode(array('success'=>false,'msg'=>'Invalid Username or Student ID is currently not enrolled during this semester'));
		    }
		    $result->free();
		}else{
			print json_encode(array('success'=>false,'msg'=>'Invalid Username or Student ID '));
		}
	}
}


function checkloginballot($StudentID,$TermID) {
		$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
			if ($mysqli->connect_errno) {
	    print json_encode(array('success'=>false,'msg'=>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	}else{
		$query = "SELECT * FROM election_ballots WHERE StudentID ='$StudentID' AND TermID='$TermID' LIMIT 1;";
		if ($result = $mysqli->query($query)) {
		    if($row = $result->fetch_array(MYSQLI_ASSOC)){
		    	print json_encode(array('success'=>true,'msg'=>'Sorry You Voted Already!'));
		    }else{
		    	print json_encode(array('success'=>false,'msg'=>''));
		    }
		}else{
			print json_encode(array('success'=>false,'msg'=>''));
		}
	}
}

function Print_Ballot($StudentID,$TermID,$page){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
			if ($mysqli->connect_errno) {
					print json_encode(array('success'=>false,'msg'=>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
			}else{

						$limit = 10000;
						$adjacent = 3;

						if($page==1){
						   $start = 0;
						}else{
						  $start = ($page-1)*$limit;
						}

						$query1="SELECT C.*,
						(SELECT PositionName from election_positions WHERE PositionID = (SELECT PositionID FROM election_candidates WHERE CandidateID = C.CandidateID)) AS PositionName,
           				(SELECT PartyName FROM election_partylist WHERE PartyID = (SELECT PartyID FROM election_candidates WHERE CandidateID = C.CandidateID)) AS PartyName,
            			(CONCAT(A.LastName,', ',A.FirstName,' ',SUBSTR(A.MiddleName,1,1))) AS CandidateName,
            			CONCAT(IFNULL(S.last_name,''),', ',IFNULL(S.first_name,''),' ',IFNULL(S.middle_name,''),'.') AS StudentName,
          				DATE_FORMAT(DateTimeVoted,'%a %b-%d-%Y , %h:%i %p') AS DateTimeVoted 
            			FROM election_ballots C INNER JOIN student_numbering N on C.StudentID = N.student_number INNER JOIN election_candidates A on C.CandidateID = A.CandidateID INNER JOIN person_table S on N.person_id = S.person_id INNER JOIN election_positions P on A.PositionID = P.PositionID WHERE C.StudentID = '$StudentID' AND C.TermID = '$TermID' ORDER BY P.PositionID";

						$result1 = $mysqli->query($query1);
						$rows = $result1->num_rows;

						$query="SELECT C.*,
						(SELECT PositionName from election_positions WHERE PositionID = (SELECT PositionID FROM election_candidates WHERE CandidateID = C.CandidateID)) AS PositionName,
           				(SELECT PartyName FROM election_partylist WHERE PartyID = (SELECT PartyID FROM election_candidates WHERE CandidateID = C.CandidateID)) AS PartyName,
            			(CONCAT(A.LastName,', ',A.FirstName,' ',SUBSTR(A.MiddleName,1,1))) AS CandidateName,
            			CONCAT(IFNULL(S.last_name,''),', ',IFNULL(S.first_name,''),' ',IFNULL(S.middle_name,''),'.') AS StudentName,
			           DATE_FORMAT(DateTimeVoted,'%a %b-%d-%Y , %h:%i %p') AS DateTimeVoted 
            			FROM election_ballots C INNER JOIN student_numbering N on C.StudentID = N.student_number INNER JOIN election_candidates A on C.CandidateID = A.CandidateID INNER JOIN person_table S on N.person_id = S.person_id INNER JOIN election_positions P on A.PositionID = P.PositionID WHERE C.StudentID = '$StudentID' AND C.TermID = '$TermID' ORDER BY P.PositionID";

						$mysqli->set_charset("utf8");
						$result = $mysqli->query($query);
						$data = array();
						while($row = $result->fetch_array(MYSQLI_ASSOC)){
							array_push($data ,$row);
						}

						$paging = pagination($limit,$adjacent,$rows,$page);

						print json_encode(array('success'=>true,'msg'=>'','candidates'=>$data,'pagination'=>$paging));
			}
		}

function checklogindate(){
		$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
			if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$today = date("Y-m-d");
		$query ="SELECT * FROM election_configuration WHERE IsActive=1 LIMIT 1;";
		$result = $mysqli->query($query);
		if($row = $result->fetch_array(MYSQLI_ASSOC)){
			$configDate = date("Y-m-d",strtotime($row['ElectionDate']));
			if($today == $configDate){
				print json_encode(array('success' =>true));
			}else{
				print json_encode(array('success' =>false));
			}
		}else{
			print json_encode(array('success' =>false));
		}
	}
}

function getCandidatesByPositionID($positionID,$TermID){
		$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
			if ($mysqli->connect_errno) {
	    print json_encode(array('success'=>false,'msg'=>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	}else{
		// $query = "SELECT fnCandidateName(CandidateID) AS CandidateName,CandidateID,fnPositionName(PositionID) AS Position,PositionID,fnCollegeCode(CollegeID) AS College,CollegeID,fnPartyName(PartyID) AS Partylist,PartyID, Photo FROM candidates WHERE PositionID='$positionID' AND AcademicYear='$TermID' ORDER BY fnCandidateName(CandidateID);";
		$query = "SELECT CONCAT(IFNULL(C.LastName,''),', ',IFNULL(C.FirstName,''),' ',IFNULL(C.MiddleName,'')) AS CandidateName,C.CandidateID,
		    (SELECT PositionName FROM election_positions WHERE PositionID=C.PositionID LIMIT 1) AS Position,C.PositionID,
            (SELECT department_description FROM department_table WHERE department_id=C.CollegeID LIMIT 1) AS College,C.CollegeID,
		    (SELECT PartyName FROM election_partylist WHERE PartyID=C.PartyID LIMIT 1) AS Partylist,C.PartyID,
			(SELECT course_description  FROM course_table WHERE course_id=C.ProgramID LIMIT 1) AS Course,C.ProgramID,C.Photo
			FROM election_candidates C WHERE PositionID='$positionID' AND TermID='$TermID' ORDER BY C.LastName;";
		$data = array();
		$data2 = array();
		if ($result = $mysqli->query($query)) {
		    while($row = $result->fetch_array(MYSQLI_ASSOC)){

		    	$data2= array('CandidateID'=>$row['CandidateID'],
		    		'Photo'=> base64_encode($row['Photo']),
		    		'CandidateName'=>$row['CandidateName'],
		    		'Position'=>$row['Position'],
		    		'PositionID' =>$row['PositionID'],
		    		'Partylist'=>$row['Partylist'],
		    		'PartyID'=>$row['PartyID'],
		    		'College'=>$row['College'],
		    		'CollegeID'=>$row['CollegeID']);

		    	array_push($data, $data2);
		    }
		    print json_encode(array('success'=>true,'msg'=>'','candidates'=>$data));
		    $result->free();
		}
	}
}

function getCandidatesByPositionIDByCollegeID($positionID,$CollegeID,$TermID){
		$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
			if ($mysqli->connect_errno) {
	    print json_encode(array('success'=>false,'msg'=>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	}else{
		$query = "SELECT CONCAT(IFNULL(C.LastName,''),', ',IFNULL(C.FirstName,''),' ',IFNULL(C.MiddleName,''))  AS CandidateName,C.CandidateID,
		    (SELECT PositionName FROM election_positions WHERE PositionID=C.PositionID LIMIT 1) AS Position,C.PositionID,
            (SELECT department_description FROM department_table WHERE department_id=C.CollegeID LIMIT 1) AS College,C.CollegeID,
		    (SELECT PartyName FROM election_partylist WHERE PartyID=C.PartyID LIMIT 1) AS Partylist,C.PartyID,
			(SELECT course_description  FROM course_table WHERE course_id=C.ProgramID LIMIT 1) AS Course,C.ProgramID,C.Photo
			FROM election_candidates C WHERE PositionID='$positionID' AND C.CollegeID='$CollegeID' AND TermID='$TermID' ORDER BY C.LastName;";
		$data = array();
		$data2 = array();
		if ($result = $mysqli->query($query)) {
		    while($row = $result->fetch_array(MYSQLI_ASSOC)){

		    	$data2= array('CandidateID'=>$row['CandidateID'],
		    		'Photo'=> base64_encode($row['Photo']),
		    		'CandidateName'=>$row['CandidateName'],
		    		'Position'=>$row['Position'],
		    		'PositionID' =>$row['PositionID'],
		    		'Partylist'=>$row['Partylist'],
		    		'PartyID'=>$row['PartyID'],
		    		'College'=>$row['College'],
		    		'CollegeID'=>$row['CollegeID']);

		    	array_push($data, $data2);
		    }
		    print json_encode(array('success'=>true,'msg'=>'','candidates'=>$data));
		    $result->free();
		}
	}
}

function getCandidatesByPositionIDByCourseID($positionID,$ProgramID,$TermID){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success'=>false,'msg'=>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	}else{
		$query = "SELECT CONCAT(IFNULL(C.LastName,''),', ',IFNULL(C.FirstName,''),' ',IFNULL(C.MiddleName,''))  AS CandidateName,C.CandidateID,
		    (SELECT PositionName FROM election_positions WHERE PositionID=C.PositionID LIMIT 1) AS Position,C.PositionID,
		    (SELECT department_description FROM department_table WHERE department_id=C.CollegeID LIMIT 1) AS College,C.CollegeID,
		    (SELECT PartyName FROM election_partylist WHERE PartyID=C.PartyID LIMIT 1) AS Partylist,C.PartyID,
			(SELECT course_description  FROM course_table WHERE course_id=C.ProgramID LIMIT 1) AS Course,C.ProgramID,C.Photo
			FROM election_candidates C WHERE PositionID='$positionID' AND C.ProgramID='$ProgramID' AND TermID='$TermID' ORDER BY C.LastName;";
		$data = array();
		$data2 = array();
		if ($result = $mysqli->query($query)) {
		    while($row = $result->fetch_array(MYSQLI_ASSOC)){

		    	$data2= array('CandidateID'=>$row['CandidateID'],
		    		'Photo'=> base64_encode($row['Photo']),
		    		'CandidateName'=>$row['CandidateName'],
		    		'Position'=>$row['Position'],
		    		'PositionID' =>$row['PositionID'],
		    		'Partylist'=>$row['Partylist'],
		    		'PartyID'=>$row['PartyID'],
		    		'College'=>$row['College'],
		    		'CollegeID'=>$row['CollegeID']);

		    	array_push($data, $data2);
		    }
		    print json_encode(array('success'=>true,'msg'=>'','candidates'=>$data));
		    $result->free();
		}
	}
}

function getCandidacyPosition($TermID){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success'=>false,'msg'=>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	}else{
		$query = "SELECT * FROM election_positions WHERE TermID = '$TermID';";
		$data = array();
		if ($result = $mysqli->query($query)) {
		    while($row = $result->fetch_array(MYSQLI_ASSOC)){
		    	array_push($data, $row);
		    }
		    print json_encode(array('success'=>true,'msg'=>'','positions'=>$data));
		    $result->free();
		}
	}
}
?>
