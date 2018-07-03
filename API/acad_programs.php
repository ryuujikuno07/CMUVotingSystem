
<?php

function insert_acad_programs($data){
	$mysqli = new mysqli("localhost", "root", "", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{



		if ($stmt = $mysqli->prepare('INSERT INTO course_table(course_description,course_code) VALUES(?,?)')){
			$stmt->bind_param("ss", $data[0]['course_description'],$data[0]['course_code']);
			$stmt->execute();

			print json_encode(array('success' =>true,'msg' =>'Record successfully saved'));
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}
}

function update_acad_programs($course_id,$data){
		$mysqli = new mysqli("localhost", "root", "", "cmu_mis");
			if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		if ($stmt = $mysqli->prepare('UPDATE course_table SET course_description=?,course_code=? WHERE course_id="'.$course_id.'"')){
			$stmt->bind_param("ss", $data[0]['course_description'],$data[0]['course_code']);
			$stmt->execute();

			print json_encode(array('success' =>true,'msg' =>'Record successfully updated'));
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}
}

function delete_acad_programs($course_id){
		$mysqli = new mysqli("localhost", "root", "", "cmu_mis");
			if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		if($stmt = $mysqli->prepare("DELETE FROM course_table WHERE course_id =?")){
			$stmt->bind_param("s", $course_id);
			$stmt->execute();
			$stmt->close();
			print json_encode(array('success' =>true,'msg' =>'Record successfully deleted'));
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}
}

function select_all_acad_programs($page){
		$mysqli = new mysqli("localhost", "root", "", "cmu_mis");
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

		$query1 ="SELECT course_id,course_description,course_code,
		(SELECT department_description FROM department_table WHERE department_id=C.CollegeID LIMIT 1) AS College FROM course_table C";

		$result1 = $mysqli->query($query1);
		$rows = $result1->num_rows;

		$query ="SELECT course_id,course_description,course_code,
		(SELECT department_description FROM department_table WHERE department_id=C.CollegeID LIMIT 1) AS College
		FROM course_table C LIMIT $start, $limit";

		$mysqli->set_charset("utf8");
		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data,$row);
		}

		$paging = pagination($limit,$adjacent,$rows,$page);
		print json_encode(array('success' =>true,'programs' =>$data,'pagination'=>$paging));
	}
}

function select_For_ComboCourse(){
		$mysqli = new mysqli("localhost", "root", "", "cmu_mis");
			if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$query ="SELECT * FROM course_table";
		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data,$row);
		}
		print json_encode(array('success' =>true,'programs' =>$data));
	}
}

function select_For_ComboCourseforCandidates($candidate_id,$TermID){
		$mysqli = new mysqli("localhost", "root", "", "cmu_mis");
			if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$query ="SELECT course_description  FROM course_table WHERE course_id=C.ProgramID LIMIT 1 AS Course,C.ProgramID
	FROM election_candidates C WHERE CandidateID='$candidate_id' AND TermID='$TermID' LIMIT 1;";

			$data = array();

			$result = $mysqli->query($query);
			$data = array();
			$data2 = array();

			if($row = $result->fetch_array(MYSQLI_ASSOC)){

						$data2= array('CandidateID'=>$row['CandidateID'],
						'Course'=>$row['Course']);


				 array_push($data, $data2);

				print json_encode(array('success' =>true,'programs' =>$data2));

			}else{
				print json_encode(array('success' =>false,'msg' =>"No record found!"));
			}
	}
}

function get_acad_programs($course_id){
		$mysqli = new mysqli("localhost", "root", "", "cmu_mis");
			if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$query ="SELECT * FROM course_table WHERE course_id=$course_id";
		$result = $mysqli->query($query);
		if($row = $result->fetch_array(MYSQLI_ASSOC)){
			print json_encode(array('success' =>true,'program' =>$row));
		}else{
			print json_encode(array('success' =>false,'msg' =>"No record found!"));
		}
	}
}

function search_acad_programs($value,$page){
		$mysqli = new mysqli("localhost", "root", "", "cmu_mis");
			if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$query ="SELECT course_id,course_description,course_code,
		(SELECT department_description FROM department_table WHERE department_id=C.CollegeID LIMIT 1) AS College FROM course_table C WHERE course_description LIKE '%$value%' OR course_code LIKE '%$value%'";
		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data ,$row);
		}
		print json_encode(array('success' =>true,'programs' =>$data));
	}
}

function Print_Courses(){
		$mysqli = new mysqli("localhost", "root", "", "cmu_mis");
			if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{

		$query="SELECT course_id,course_description,course_code,
		(SELECT department_description FROM department_table WHERE department_id=C.CollegeID LIMIT 1) AS College FROM course_table C";

		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data ,$row);
		}

		print json_encode(array('success' =>true,'programs' =>$data));
	}
}

function checkCourses($course_description){
	$newval = ltrim($course_description);
		$mysqli = new mysqli("localhost", "root", "", "cmu_mis");
			if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$query ="Select * from course_table Where course_description = '$course_description'";
		$result = $mysqli->query($query);
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				if(count($row) > 1){
				print json_encode(array('success' =>true,'msg' =>"SUCCESS!"));
			}else{
				print json_encode(array('success' =>false));
			}
		}

	}
}

?>
