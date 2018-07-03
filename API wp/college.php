<?php
function insert_college($data){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		if ($stmt = $mysqli->prepare('INSERT INTO tbl_college(CollegeCode,CollegeName,CollegeDean,InActive) VALUES(?,?,?,?)')){
			$stmt->bind_param("ssss", $data[0]['college_name'],$data[0]['college_code'],$data[0]['college_dean'],$data[0]['inactive']);
			$stmt->execute();

			print json_encode(array('success' =>true,'msg' =>'Record successfully saved'));
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}
}

function update_college($college_id,$data){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		if ($stmt = $mysqli->prepare('UPDATE tbl_college SET CollegeCode=?,CollegeName=?,CollegeDean=?,InActive=? WHERE CollegeID= "'.$college_id.'"')){
			$stmt->bind_param("ssss", $data[0]['college_code'], $data[0]['college_name'],$data[0]['college_dean'],$data[0]['inactive']);
			$stmt->execute();
			print json_encode(array('success' =>true,'msg' =>'Record successfully updated'));
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}
}

function delete_college($prog_id){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		if($stmt = $mysqli->prepare("DELETE FROM tbl_college WHERE CollegeID =?")){
			$stmt->bind_param("s", $prog_id);
			$stmt->execute();
			$stmt->close();
			print json_encode(array('success' =>true,'msg' =>'Record successfully deleted'));
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}
}

function archieve_college($prog_id){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		if($stmt = $mysqli->prepare("UPDATE tbl_college SET InActive=1 WHERE CollegeID =?")){
			$stmt->bind_param("s", $prog_id);
			$stmt->execute();
			$stmt->close();
			print json_encode(array('success' =>true,'msg' =>'Record successfully archieve'));
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}
}

function select_all_college($page){
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

		$query1 ="SELECT * FROM tbl_college WHERE InActive <> 1;";
		$result1 = $mysqli->query($query1);
		$rows = $result1->num_rows;

		$query ="SELECT * FROM tbl_college WHERE InActive <> 1  LIMIT $start, $limit;";
		// echo $query;
		$mysqli->set_charset("utf8");
		$result = $mysqli->query($query);
		$data = array();

		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data ,$row);
		}

		$paging = pagination($limit,$adjacent,$rows,$page);

		print json_encode(array('success' =>true,'colleges' =>$data,'rows'=>$rows,'pagination'=>$paging));
	}
}

function select_For_ComboCollege(){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$query ="SELECT * FROM department_table;";
		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data,$row);
		}
		print json_encode(array('success' =>true,'colleges' =>$data));
	}
}


function get_college($college_id){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$query ="SELECT * FROM tbl_college WHERE CollegeID=$college_id";
		$result = $mysqli->query($query);
		if($row = $result->fetch_array(MYSQLI_ASSOC)){
			print json_encode(array('success' =>true,'college' =>$row));
		}else{
			print json_encode(array('success' =>false,'msg' =>"No record found!"));
		}
	}
}

function search_college($value){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$query ="SELECT * FROM tbl_college WHERE CollegeCode LIKE '%$value%' OR CollegeName LIKE '%$value%' AND InActive <> 1;";
		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data ,$row);
		}
		print json_encode(array('success' =>true,'colleges' =>$data));
	}
}

function Print_College(){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{

		$query="SELECT * FROM tbl_college WHERE InActive <> 1;";

		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data ,$row);
		}

		print json_encode(array('success' =>true,'colleges' =>$data));
	}
}

?>
