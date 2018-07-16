<?php

function insert_position($data){
	require 'connection.php';
	{
		if ($stmt = $mysqli->prepare('INSERT INTO election_positions(PositionCode,PositionName,ShortName,Allowed,AllowPerCourses,AllowPerCollege,AllowPerParty,Qualified,SortOrder,TermID,VoteForAll,VoteForCollege,VoteForCourses) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)')){
			$stmt->bind_param("sssssssssssss", $data[0]['Position_Code'],$data[0]['Position_Name'],$data[0]['Short_Name'],$data[0]['Allowed'],$data[0]['AllowPerCourse'],$data[0]['AllowPerCollege'],$data[0]['AllowPerParty'],$data[0]['Qualified'],$data[0]['SortOrder'],$data[0]['ElectionID'],$data[0]['VoteForAll'],$data[0]['VoteForCollege'],$data[0]['VoteForCourse']);
			$stmt->execute();
			print json_encode(array('success' =>true,'msg' =>'Record successfully saved'));
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}
}

function update_position($position_id,$data){
	require 'connection.php';
	{
		if ($stmt = $mysqli->prepare('UPDATE election_positions SET PositionCode=?,PositionName=?,ShortName=?,Allowed=?,AllowPerCourses=?,AllowPerCollege=?,AllowPerParty=?,Qualified=?,SortOrder=?,TermID=?,VoteForAll=? ,VoteForCollege=? ,VoteForCourses=? WHERE PositionID="'.$position_id.'"')){
			$stmt->bind_param("sssssssssssss", $data[0]['Position_Code'],$data[0]['Position_Name'],$data[0]['Short_Name'],$data[0]['Allowed'],$data[0]['AllowPerCourse'],$data[0]['AllowPerCollege'],$data[0]['AllowPerParty'],$data[0]['Qualified'],$data[0]['SortOrder'],$data[0]['ElectionID'],$data[0]['VoteForAll'],$data[0]['VoteForCollege'],$data[0]['VoteForCourse']);
			$stmt->execute();
			print json_encode(array('success' =>true,'msg' =>'Record successfully updated'));
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}
}

function delete_position($position_id){
	require 'connection.php';
	{
		if($stmt = $mysqli->prepare("DELETE FROM election_positions WHERE PositionID =?")){
			$stmt->bind_param("s", $position_id);
			$stmt->execute();
			$stmt->close();
			print json_encode(array('success' =>true,'msg' =>'Record successfully deleted'));
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}
}

function archieve_position($position_id){
	require 'connection.php';
	{
		if($stmt = $mysqli->prepare("UPDATE election_positions SET InActive=1 WHERE PositionID =?")){
			$stmt->bind_param("s", $position_id);
			$stmt->execute();
			$stmt->close();
			print json_encode(array('success' =>true,'msg' =>'Record successfully archieve'));
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}
}

function select_all_position($TermID,$page){
	require 'connection.php';
	{

		$limit = 10;
		$adjacent = 3;

		if($page==1){
		   $start = 0;
		}else{
		  $start = ($page-1)*$limit;
		}

		$query1 ="SELECT (SELECT CONCAT(SchoolYear,' - ',ElectionName) FROM election_configuration WHERE TermID=P.TermID LIMIT 1) AS ElectionTerm,(SELECT department_description FROM department_table WHERE department_id = P.CollegeID) AS College, P.* FROM election_positions P WHERE P.TermID='$TermID';";

		$result1 = $mysqli->query($query1);
		$rows = $result1->num_rows;

		$query ="SELECT (SELECT CONCAT(SchoolYear,' - ',ElectionName) FROM election_configuration WHERE TermID=P.TermID LIMIT 1) AS ElectionTerm,(SELECT department_description FROM department_table WHERE department_id = P.CollegeID) AS College, P.* FROM election_positions P WHERE P.TermID='$TermID' LIMIT $start, $limit;";

		$mysqli->set_charset("utf8");
		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data ,$row);
		}

		$paging = pagination($limit,$adjacent,$rows,$page);
		print json_encode(array('success' =>true,'positions' =>$data,'pagination'=>$paging));
	}
}

function select_ForComboPosition($TermID){
	require 'connection.php';
	{
		$query ="SELECT (SELECT CONCAT(SchoolYear,' - ',ElectionName) FROM election_configuration WHERE TermID=P.TermID LIMIT 1) AS ElectionTerm,P.* FROM election_positions P WHERE P.TermID='$TermID';";
		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data ,$row);
		}
		print json_encode(array('success' =>true,'positions' =>$data));
	}
}

function get_position($position_id){
	require 'connection.php';
	{
		$query ="SELECT * FROM election_positions WHERE PositionID=$position_id;";
		$result = $mysqli->query($query);
		if($row = $result->fetch_array(MYSQLI_ASSOC)){
			print json_encode(array('success' =>true,'position' =>$row));
		}else{
			print json_encode(array('success' =>false,'msg' =>"No record found!"));
		}
	}
}

function search_position($value,$TermID,$page){
	require 'connection.php';
	{
		$limit = 10;
		$adjacent = 3;

		if($page==1){
		   $start = 0;
		}else{
		  $start = ($page-1)*$limit;
		}

		$query1 ="SELECT (SELECT CONCAT(SchoolYear,' - ',ElectionName) FROM election_configuration WHERE TermID=P.TermID  LIMIT 1) AS ElectionTerm,(SELECT department_description FROM department_table WHERE department_id = P.CollegeID) AS College,P.* FROM election_positions P WHERE PositionName LIKE '%$value%' AND P.TermID='$TermID';";

		$result1 = $mysqli->query($query1);
		$rows = $result1->num_rows;

		$query ="SELECT (SELECT CONCAT(SchoolYear,' - ',ElectionName) FROM election_configuration WHERE TermID=P.TermID LIMIT 1) AS ElectionTerm,(SELECT department_description FROM department_table WHERE department_id = P.CollegeID) AS College,P.* FROM election_positions P WHERE PositionName LIKE '%$value%' AND P.TermID='$TermID' LIMIT $start, $limit;";

		$mysqli->set_charset("utf8");
		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data ,$row);
		}

		$paging = pagination($limit,$adjacent,$rows,$page);
		print json_encode(array('success' =>true,'positions' =>$data,'pagination'=>$paging));
	}
}

function Print_Position($TermID){
	require 'connection.php';
	{

		$query="SELECT (SELECT CONCAT(SchoolYear,' - ',ElectionName) FROM election_configuration WHERE TermID=P.TermID LIMIT 1) AS ElectionTerm,P.* FROM election_positions P WHERE P.TermID='$TermID';";

		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data ,$row);
		}

		print json_encode(array('success' =>true,'positions' =>$data));
	}
}

function CheckIfExistPositionName($value){
	require 'connection.php';
	{
		$query ="SELECT PositionName FROM election_positions WHERE PositionName LIKE '%$value';";
		$result = $mysqli->query($query);
		if($row = $result->fetch_array(MYSQLI_ASSOC)){
			print json_encode(array('success' =>true));
		}else{
			print json_encode(array('success' =>false));
		}
	}
}

function CheckIfExistPositionCode($value){
	require 'connection.php';
	{
		$query ="SELECT * FROM election_positions WHERE PositionCode LIKE '%$value';";
		$result = $mysqli->query($query);
		if($row = $result->fetch_array(MYSQLI_ASSOC)){
			print json_encode(array('success' =>true));
		}else{
			print json_encode(array('success' =>false));
		}
	}
}

?>
