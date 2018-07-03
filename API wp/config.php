<?php

function insert_config($data){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		if ($mysqli->query('INSERT INTO election_configuration(SchoolYear,ElectionName,ElectionCode,ElectionDate,TimeStart,TimeEnd,IsActive,CreatedOn,CreatedBy)VALUES("'.$data[0]['SchoolYear'].'","'.$data[0]['ElectionName'].'","'.$data[0]['ElectionCode'].'","'.$data[0]['ElectionDate'].'","'.$data[0]['ElectionStart'].'","'.$data[0]['ElectionEnd'].'","'.$data[0]['InActive'].'",NOW(),"'. $data[0]['CreatedBy'] .'")')){
			print json_encode(array('success' =>true,'msg' =>'Record successfully saved'));
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}
}

function update_config($TermID,$data){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		if ($mysqli->query('UPDATE election_configuration SET SchoolYear="'.$data[0]['SchoolYear'].'",ElectionName="'.$data[0]['ElectionName'].'",ElectionCode="'.$data[0]['ElectionCode'].'",ElectionDate="'.$data[0]['ElectionDate'].'",TimeStart="'.$data[0]['ElectionStart'].'",TimeEnd="'.$data[0]['ElectionEnd'].'" WHERE TermID="'.$TermID.'"')){
			print json_encode(array('success' =>true,'msg' =>'Record successfully updated'));
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}
}



function delete_config($TermID){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		if($stmt = $mysqli->prepare("DELETE FROM election_configuration WHERE TermID =?")){
			$stmt->bind_param("s", $TermID);
			$stmt->execute();
			$stmt->close();
			print json_encode(array('success' =>true,'msg' =>'Record successfully deleted'));
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}
}

function select_all_config($page){
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

		$query1 ="SELECT TermID,SchoolYear,ElectionName,ElectionCode,DATE_FORMAT(ElectionDate,'%a %b-%d-%Y') AS ElectionDate,DATE_FORMAT(TimeEnd,'%h:%i %p') AS TimeEnd,DATE_FORMAT(TimeStart,'%h:%i %p') AS TimeStart FROM election_configuration T ;";

		$result1 = $mysqli->query($query1);
		$rows = $result1->num_rows;

		$query ="SELECT TermID,SchoolYear,ElectionName,ElectionCode,DATE_FORMAT(ElectionDate,'%a %b-%d-%Y') AS ElectionDate,DATE_FORMAT(TimeStart,'%h:%i %p') AS TimeStart,DATE_FORMAT(TimeEnd,'%h:%i %p') AS TimeEnd FROM election_configuration T LIMIT $start, $limit;";

		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data ,$row);
		}

		$paging = pagination($limit,$adjacent,$rows,$page);
		print json_encode(array('success' =>true,'configs' =>$data,'pagination'=>$paging));
	}
}

function search_config($value,$page){
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

		$query1 ="SELECT TermID,SchoolYear,ElectionName,ElectionCode,DATE_FORMAT(ElectionDate,'%a %b-%d-%Y') AS ElectionDate,DATE_FORMAT(TimeEnd,'%h:%i %p') AS TimeEnd,DATE_FORMAT(TimeStart,'%h:%i %p') AS TimeStart FROM election_configuration T WHERE ElectionName LIKE '%$value%';";

		$result1 = $mysqli->query($query1);
		$rows = $result1->num_rows;

		$query ="SELECT TermID,SchoolYear,ElectionName,ElectionCode,DATE_FORMAT(ElectionDate,'%a %b-%d-%Y') AS ElectionDate,DATE_FORMAT(TimeEnd,'%h:%i %p') AS TimeEnd,DATE_FORMAT(TimeStart,'%h:%i %p') AS TimeStart FROM election_configuration T WHERE ElectionName LIKE '%$value%' LIMIT $start, $limit;";

		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data ,$row);
		}

		$paging = pagination($limit,$adjacent,$rows,$page);
		print json_encode(array('success' =>true,'configs' =>$data,'pagination'=>$paging));
	}
}

function get_config($TermID){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$query ="SELECT * FROM election_configuration WHERE TermID=$TermID LIMIT 1;";
		$result = $mysqli->query($query);
		if($row = $result->fetch_array(MYSQLI_ASSOC)){
			print json_encode(array('success' =>true,'config' =>$row));
		}else{
			print json_encode(array('success' =>false,'msg' =>"No record found!"));
		}
	}
}

function get_active_config(){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$query ="SELECT * FROM election_configuration WHERE IsActive=1 LIMIT 1;";
		$result = $mysqli->query($query);
		if($row = $result->fetch_array(MYSQLI_ASSOC)){
			print json_encode(array('success' =>true,'config' =>$row));
		}else{
			print json_encode(array('success' =>false,'msg' =>"No record found!"));
		}
	}
}

function activate_configuration($TermID){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$result = $mysqli->query("UPDATE election_configuration SET IsActive=0;");
		if($result){
			if($mysqli->query("UPDATE election_configuration SET IsActive=1 WHERE TermID=$TermID;"))
			{

				print json_encode(array('success' =>true,'msg' =>"Successfully Activated"));

			}else{
				print json_encode(array('success' =>false,'msg' =>"An error occur while activating configuration"));
			}
		}else{
			print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
		}
	}
}

function select2_config(){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");

	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$query ="SELECT CONCAT(SchoolYear,' - ',ElectionName) AS `Config`,TermID FROM election_configuration;";
		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data ,$row);
		}
		print json_encode(array('success' =>true,'configs' =>$data));
	}
}

function select_For_ComboConfig(){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$query ="SELECT CONCAT(SchoolYear,' - ',ElectionName) AS `Config`,TermID FROM election_configuration;";
		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data ,$row);
		}
		print json_encode(array('success' =>true,'configs' =>$data));
	}
}

function Print_Config(){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{

		$query="SELECT TermID,SchoolYear,ElectionName,ElectionCode,DATE_FORMAT(ElectionDate,'%a %b-%d-%Y') AS ElectionDate,DATE_FORMAT(TimeEnd,'%h:%i %p') AS TimeEnd,DATE_FORMAT(TimeStart,'%h:%i %p') AS TimeStart FROM election_configuration T;";

		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data ,$row);
		}

		print json_encode(array('success' =>true,'configs' =>$data));
	}
}

?>
