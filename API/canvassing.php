<?php
	function getCandidatesCanvassingByPositionID($positionID,$TermID){
		require 'connection.php';
		{
			$query = "SELECT CONCAT(LastName,', ',FirstName,' ',MiddleName) AS CandidateName,C.CandidateID,
			(SELECT PositionName FROM election_positions WHERE PositionID = C.PositionID LIMIT 1) AS Position,C.PositionID,
			(SELECT department_description FROM department_table WHERE department_id =C.CollegeID LIMIT 1) AS College,C.CollegeID,
			(SELECT PartyName FROM election_partylist WHERE PartyID=C.PartyID LIMIT 1) AS Partylist,C.PartyID,
			(SELECT course_description FROM course_table WHERE course_id=C.ProgramID LIMIT 1) AS Program,C.ProgramID,
			C.Photo,
			(SELECT CONCAT('[',ElectionName,'  -  ',SchoolYear,']') FROM election_configuration WHERE TermID=C.TermID LIMIT 1) AS ElectionName,C.TermID,
			(SELECT COUNT(*) FROM election_ballots WHERE CandidateID=C.CandidateID AND TermID=C.TermID) AS VoteCount
			FROM election_candidates C WHERE C.PositionID='$positionID' AND C.TermID='$TermID'
			ORDER BY C.LastName";

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
			    		'CollegeID'=>$row['CollegeID'],
			    		'Program'=>$row['Program'],
			    		'ProgramID'=>$row['ProgramID'],
			    		'ElectionName'=>$row['ElectionName'],
			    		'VoteCount'=>$row['VoteCount']);

			    	array_push($data, $data2);
			    }
			    print json_encode(array('success'=>true,'msg'=>'','candidates'=>$data));
			    $result->free();
			}
		}
	}

	function getStatisticsOverview($TermID){
		require 'connection.php';
		{
			$totalVoters = 0;
			$totalNotVoted = 0;
			$totalVoted = 0;

			if ($result = $mysqli->query("SELECT COUNT(*) AS totalVoters FROM person_table WHERE TermID=$TermID;")) {
			    if($row = $result->fetch_array(MYSQLI_ASSOC)){
			    	$totalVoters= $row['totalVoters'];
			    }else{
			    	$totalVoters= 0;
			    }
			    $result->free();
			}

			if ($result1 = $mysqli->query("SELECT COUNT(*) AS totalVoted FROM (SELECT DISTINCT StudentID FROM election_ballots WHERE TermID=$TermID) election_ballots;")) {
			    if($row1 = $result1->fetch_array(MYSQLI_ASSOC)){
			    	$totalVoted= $row1['totalVoted'];
			    }else{
			    	$totalVoters= 0;
			    }
			    $result1->free();
			}

			$totalNotVoted = $totalVoters - $totalVoted;

			print json_encode(array('success'=>true,
				'totalVoters'=>$totalVoters,
				'totalNotVoted'=>$totalNotVoted,
				'totalVoted'=>$totalVoted));
		}
	}

	function getCandidatesFinalCanvassing($TermID){
		require 'connection.php';
		{
			$query = "SELECT CONCAT(LastName,', ',FirstName,' ',MiddleName) AS CandidateName,C.CandidateID,
			P.PositionName AS Position,P.PositionID,
			(SELECT department_description FROM department_table WHERE department_id =C.CollegeID LIMIT 1) AS College,C.CollegeID,
			(SELECT PartyName FROM election_partylist WHERE PartyID=C.PartyID LIMIT 1) AS Partylist,C.PartyID,
			(SELECT course_description FROM course_table WHERE course_id=C.ProgramID LIMIT 1) AS Program,C.ProgramID,
			C.Photo,
			(SELECT CONCAT('[', ElectionName,'  -  ',SchoolYear,']') FROM election_configuration WHERE TermID=C.TermID LIMIT 1) AS ElectionName,C.TermID,
			(SELECT COUNT(*) FROM election_ballots WHERE CandidateID=C.CandidateID AND TermID=C.TermID) AS VoteCount
			FROM election_candidates C INNER JOIN election_positions P ON C.PositionID = P.PositionID
			WHERE C.TermID='$TermID' ORDER BY  P.SortOrder,VoteCount DESC;";

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
			    		'CollegeID'=>$row['CollegeID'],
			    		'Program'=>$row['Program'],
			    		'ProgramID'=>$row['ProgramID'],
			    		'ElectionName'=>$row['ElectionName'],
			    		'VoteCount'=>$row['VoteCount']);

			    	array_push($data, $data2);
			    }
			    print json_encode(array('success'=>true,'msg'=>'','candidates'=>$data));
			    $result->free();
			}else{
				print json_encode(array('success'=>false,'msg'=>'Error while retrieving Final Canvassing','candidates'=>$data));
			}
		}
	}

	function getCandidateWinners($TermID){
		require 'connection.php';
		{
			$query = "SELECT CandidateName,CandidateID,Position,PositionID,SortOrder,College,CollegeID,Program,ProgramID,MAX(VoteCount) AS VoteCount
							FROM (SELECT CONCAT(LastName,', ',FirstName,' ',MiddleName) AS CandidateName,C.CandidateID,
							P.PositionName AS Position,P.PositionID,P.SortOrder,
			                 (SELECT department_description FROM department_table WHERE department_id =C.CollegeID LIMIT 1) AS College,C.CollegeID,
							(SELECT course_description FROM course_table WHERE course_id=C.ProgramID LIMIT 1) AS Program,C.ProgramID,
							C.Photo,
							(SELECT CONCAT('[', ElectionName,'  -  ',SchoolYear,']') FROM election_configuration WHERE TermID=C.TermID LIMIT 1) AS ElectionName,C.TermID,
							(SELECT COUNT(*) FROM election_ballots WHERE CandidateID=C.CandidateID AND TermID=C.TermID) AS VoteCount
							FROM election_candidates C INNER JOIN election_positions P ON C.PositionID = P.PositionID INNER JOIN election_ballots B ON C.CandidateID = B.CandidateID
							WHERE C.TermID='$TermID' ORDER BY  P.SortOrder,VoteCount DESC
							) AS tbl
						Group By PositionID,ProgramID;";

				/*$query2 = "SELECT CandidateName,CandidateID,Position,PositionID,College,CollegeID,Partylist,PartyID,Program,ProgramID,MAX(VoteCount) AS VoteCount
					FROM (
						SELECT CONCAT(C.LastName,', ',C.FirstName,' ',C.MiddleName) AS CandidateName,C.CandidateID,
						P.PositionName AS Position,P.PositionID,
						(SELECT CollegeName FROM tbl_college WHERE CollegeID=C.CollegeID LIMIT 1) AS College,C.CollegeID,
						(SELECT PartyName FROM election_partylist WHERE PartyID=C.PartyID LIMIT 1) AS Partylist,C.PartyID,
						(SELECT course_description FROM course_table WHERE course_id=C.ProgramID LIMIT 1) AS Program,C.ProgramID,
						C.Photo,
						(SELECT COUNT(*) FROM election_ballots WHERE CandidateID=C.CandidateID AND TermID=C.TermID) AS VoteCount
						FROM election_candidates C INNER JOIN election_positions P ON C.PositionID = P.PositionID
						WHERE C.TermID='$TermID'
						AND
						(
							lcase(replace(P.PositionName, ' ','')) = 'governor'
						OR
							(
							lcase(replace(P.PositionName, ' ','')) = 'vicegovernor' OR
							lcase(replace(P.PositionName, ' ','')) = 'vice-governor'
							)
						)
						ORDER BY  SortOrder,VoteCount DESC
						) AS tbl
					Group By PositionID,ProgramID";*/

					$query2 = "SELECT CandidateName,CandidateID,Position,PositionID,SortOrder,Program,ProgramID,College,CollegeID,
								MAX(VoteCount) AS VoteCount
								FROM (
									SELECT CONCAT(C.LastName,', ',C.FirstName,' ',C.MiddleName) AS CandidateName,C.CandidateID,
									P.PositionName AS Position,P.PositionID,P.SortOrder,
                                    (SELECT department_description FROM department_table WHERE department_id =C.CollegeID LIMIT 1) AS College,C.CollegeID,
									(SELECT course_description FROM course_table WHERE course_id=C.ProgramID LIMIT 1) AS Program,C.ProgramID,
									C.Photo,
									(SELECT COUNT(*) FROM election_ballots WHERE CandidateID=C.CandidateID AND TermID=C.TermID) AS VoteCount
									FROM election_candidates C INNER JOIN election_positions P ON C.PositionID = P.PositionID
									WHERE C.TermID='$TermID' ORDER BY P.SortOrder,VoteCount DESC
									) AS tbl
								Group By PositionID,ProgramID;";

			// print_r($query);die();

			$data = array();
			$data2 = array();

			$data3 = array();
			$data4 = array();

			$result = $mysqli->query($query);

			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$data2= array('CandidateID'=>$row['CandidateID'],
					// 'Photo'=> base64_encode($row['Photo']),
					'CandidateName'=>$row['CandidateName'],
					'Position'=>$row['Position'],
					'PositionID' =>$row['PositionID'],
					'College'=>$row['College'],
					'CollegeID'=>$row['CollegeID'],
					'Program'=>$row['Program'],
					'ProgramID'=>$row['ProgramID'],
					'VoteCount'=>$row['VoteCount']);

				array_push($data, $data2);
			}


			print json_encode(array('success'=>true,'msg'=>'','candidates'=>$data,'candidates2'=>$data4));

						$result->free();
		}
	}

function getVotersActuallyVoted($TermID,$page){
	require 'connection.php';
	{

						$limit = 10000;
						$adjacent = 3;

						if($page==1){
						   $start = 0;
						}else{
						  $start = ($page-1)*$limit;
						}

						$query1="SELECT S.person_id,CONCAT(IFNULL(S.last_name,''),', ',IFNULL(S.first_name,''),' ',IFNULL(S.middle_name,''),'.') AS Fullname,S.last_name,S.first_name,S.middle_name,
								(SELECT course_description FROM course_table WHERE course_id=(SELECT course_id FROM curriculum WHERE curriculum_id = K.curriculum_id) LIMIT 1) AS Course,C.course_id,
								(SELECT curriculum_id FROM student_curriculum WHERE student_number = N.student_number LIMIT 1) AS CourseID,K.curriculum_id,
								(SELECT student_number  FROM student_numbering WHERE person_id=S.person_id LIMIT 1) AS StudentID,S.person_id,
								(SELECT CONCAT(ElectionName,' (',SchoolYear,')')  FROM election_configuration WHERE TermID =S.TermID LIMIT 1) AS ElectionTerm,S.TermID,
								(SELECT DATE_FORMAT(DateTimeVoted,'%a %b-%d-%Y , %h:%i %p') FROM election_ballots WHERE StudentID=N.student_number LIMIT 1) AS DateTimeVoted
								FROM person_table S INNER JOIN student_numbering N ON N.person_id=S.person_id INNER JOIN student_curriculum K on K.student_number = N.student_number INNER JOIN student_status T on N.student_number = T.student_number AND T.enrolled_status = 0 INNER JOIN curriculum C ON K.curriculum_id = C.curriculum_id WHERE N.student_number IN(SELECT DISTINCT StudentID FROM election_ballots WHERE TermID = '$TermID') ORDER BY DateTimeVoted;";

						$result1 = $mysqli->query($query1);
						$rows = $result1->num_rows;

						$query="SELECT S.person_id,CONCAT(IFNULL(S.last_name,''),', ',IFNULL(S.first_name,''),' ',IFNULL(S.middle_name,''),'.') AS Fullname,S.last_name,S.first_name,S.middle_name,
								(SELECT course_description FROM course_table WHERE course_id=(SELECT course_id FROM curriculum WHERE curriculum_id = K.curriculum_id) LIMIT 1) AS Course,C.course_id,
								(SELECT curriculum_id FROM student_curriculum WHERE student_number = N.student_number LIMIT 1) AS CourseID,K.curriculum_id,
								(SELECT student_number  FROM student_numbering  WHERE person_id=S.person_id LIMIT 1) AS StudentID,S.person_id,
								(SELECT CONCAT(ElectionName,' (',SchoolYear,')')  FROM election_configuration WHERE TermID =S.TermID LIMIT 1) AS ElectionTerm,S.TermID,
								(SELECT DATE_FORMAT(DateTimeVoted,'%a %b-%d-%Y , %h:%i %p') FROM election_ballots WHERE StudentID=N.student_number AND TermID = S.TermID LIMIT 1) AS DateTimeVoted
								FROM person_table S INNER JOIN student_numbering N ON N.person_id=S.person_id INNER JOIN student_curriculum K on N.student_number = K.student_number INNER JOIN student_status T on N.student_number = T.student_number AND T.enrolled_status = 0 INNER JOIN curriculum C ON K.curriculum_id = C.curriculum_id WHERE N.student_number IN(SELECT DISTINCT StudentID FROM election_ballots WHERE TermID = '$TermID') ORDER BY DateTimeVoted LIMIT $start, $limit;";

						$mysqli->set_charset("utf8");
						$result = $mysqli->query($query);
						$data = array();
						while($row = $result->fetch_array(MYSQLI_ASSOC)){
							array_push($data ,$row);
						}

						$paging = pagination($limit,$adjacent,$rows,$page);

						print json_encode(array('success'=>true,'msg'=>'','students'=>$data,'pagination'=>$paging));
			}
		}


	function getVotersNotVoted($TermID,$page){
		require 'connection.php';
		{

					$limit = 10000;
					$adjacent = 3;

					if($page==1){
					   $start = 0;
					}else{
					  $start = ($page-1)*$limit;
					}

					$query1="SELECT S.person_id,CONCAT(IFNULL(S.last_name,''),', ',IFNULL(S.first_name,''),' ',IFNULL(S.middle_name,''),'.') AS Fullname,S.last_name,S.first_name,S.middle_name,
							(SELECT course_description FROM course_table WHERE course_id=(SELECT course_id FROM curriculum WHERE curriculum_id = K.curriculum_id) LIMIT 1) AS Course,C.course_id,
							(SELECT curriculum_id FROM student_curriculum WHERE student_number = N.student_number LIMIT 1) AS CourseID,K.curriculum_id,
							(SELECT student_number  FROM student_numbering WHERE person_id=S.person_id LIMIT 1) AS StudentID,S.person_id,
							(SELECT CONCAT(ElectionName,' (',SchoolYear,')')  FROM election_configuration WHERE TermID =S.TermID LIMIT 1) AS ElectionTerm,S.TermID
							FROM person_table S INNER JOIN student_numbering N ON N.person_id=S.person_id INNER JOIN student_curriculum K on K.student_number = N.student_number INNER JOIN student_status T on N.student_number = T.student_number AND T.enrolled_status = 0 INNER JOIN curriculum C ON K.curriculum_id = C.curriculum_id WHERE N.student_number NOT IN(SELECT DISTINCT StudentID FROM election_ballots WHERE TermID = '$TermID') ORDER BY Fullname;";

					$result1 = $mysqli->query($query1);
					$rows = $result1->num_rows;

					$query="SELECT S.person_id,CONCAT(IFNULL(S.last_name,''),', ',IFNULL(S.first_name,''),' ',IFNULL(S.middle_name,''),'.') AS Fullname,S.last_name,S.first_name,S.middle_name,
							(SELECT course_description FROM course_table WHERE course_id=(SELECT course_id FROM curriculum WHERE curriculum_id = K.curriculum_id) LIMIT 1) AS Course,C.course_id,
							(SELECT curriculum_id FROM student_curriculum WHERE student_number = N.student_number LIMIT 1) AS CourseID,K.curriculum_id,
							(SELECT student_number  FROM student_numbering  WHERE person_id=S.person_id LIMIT 1) AS StudentID,S.person_id,
							(SELECT CONCAT(ElectionName,' (',SchoolYear,')')  FROM election_configuration WHERE TermID =S.TermID LIMIT 1) AS ElectionTerm,S.TermID
							FROM person_table S INNER JOIN student_numbering N ON N.person_id=S.person_id INNER JOIN student_curriculum K on N.student_number = K.student_number INNER JOIN student_status T on N.student_number = T.student_number AND T.enrolled_status = 0 INNER JOIN curriculum C ON K.curriculum_id = C.curriculum_id WHERE N.student_number NOT IN(SELECT DISTINCT StudentID FROM election_ballots WHERE TermID = '$TermID') ORDER BY Fullname LIMIT $start, $limit;";

					$mysqli->set_charset("utf8");
					$result = $mysqli->query($query);
					$data = array();
					while($row = $result->fetch_array(MYSQLI_ASSOC)){
						array_push($data ,$row);
					}

					$paging = pagination($limit,$adjacent,$rows,$page);

					print json_encode(array('success'=>true,'msg'=>'','students'=>$data,'pagination'=>$paging));
		}
	}

?>
