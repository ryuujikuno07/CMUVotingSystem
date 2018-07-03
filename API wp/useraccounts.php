<?php

function insert_user($data){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		if ($stmt = $mysqli->prepare('INSERT INTO election_useraccounts(UserName,Password,LastName,FirstName,MiddleName,GroupID,CreatedOn,CreatedBy) VALUES(?,?,?,?,?,?,NOW(),?)')){
			$stmt->bind_param("sssssss", $data[0]['User_Username'],$data[0]['User_Password'],$data[0]['Last_Name'],$data[0]['First_Name'],$data[0]['Middle_Name'],$data[0]['User_Group'],$data[0]['CreatedBy']);
			$stmt->execute();

			print json_encode(array('success' =>true,'msg' =>'Record successfully saved'));
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}
}

function update_user($UserAccountID,$data){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		if ($stmt = $mysqli->prepare('UPDATE election_useraccounts SET UserName=?,Password=?,LastName=?,FirstName=?,MiddleName=?,GroupID=?,ModifiedOn=NOW(),ModifiedBy=? WHERE UserAccountID= "'.$UserAccountID.'"')){
			$stmt->bind_param("sssssss", $data[0]['User_Username'],$data[0]['User_Password'],$data[0]['Last_Name'],$data[0]['First_Name'],$data[0]['Middle_Name'],$data[0]['User_Group'],$data[0]['ModifiedBy']);
			$stmt->execute();

			print json_encode(array('success' =>true,'msg' =>'Record successfully updated'));
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}
}

function delete_user($UserAccountID){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		if($stmt = $mysqli->prepare("DELETE FROM election_useraccounts WHERE UserAccountID =?")){
			$stmt->bind_param("s", $UserAccountID);
			$stmt->execute();
			$stmt->close();
			print json_encode(array('success' =>true,'msg' =>'Record successfully deleted'));
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}
}

function select_all_user($page){
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

		$query1="SELECT U.UserAccountID, U.UserName, U.Password,U.GroupID,CONCAT(U.LastName,', ',U.FirstName,' ',SUBSTR(U.MiddleName,1,1)) as FullName, G.GroupName
				FROM election_useraccounts U INNER JOIN election_usersgroup G ON U.GroupID = G.GroupID;";

		$result1 = $mysqli->query($query1);
		$rows = $result1->num_rows;

		$query="SELECT U.UserAccountID, U.UserName, U.Password,U.GroupID,CONCAT(U.LastName,', ',U.FirstName,' ',SUBSTR(U.MiddleName,1,1)) as FullName, G.GroupName
				FROM election_useraccounts U INNER JOIN election_usersgroup G ON U.GroupID = G.GroupID LIMIT $start, $limit;";

		$mysqli->set_charset("utf8");
		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data ,$row);
		}

		$paging = pagination($limit,$adjacent,$rows,$page);

		print json_encode(array('success' =>true,'users' =>$data,'pagination'=>$paging));
	}
}

function get_user($user_id){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$query = "SELECT U.UserAccountID, U.UserName, U.Password,U.GroupID,CONCAT(U.LastName,', ',U.FirstName,' ',SUBSTR(U.MiddleName,1,1)) as FullName, G.GroupName
				FROM election_useraccounts U INNER JOIN election_usersgroup G ON U.GroupID = G.GroupID WHERE U.UserAccountID='$user_id' LIMIT 1;";
		$result = $mysqli->query($query);
		if($row = $result->fetch_array(MYSQLI_ASSOC)){
			print json_encode(array('success' =>true,'user' =>$row));
		}else{
			print json_encode(array('success' =>false,'msg' =>"No record found!"));
		}
	}
}

function get_userForEdit($user_id){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$query = "SELECT * FROM election_useraccounts U INNER JOIN election_usersgroup G ON U.GroupID = G.GroupID WHERE U.UserAccountID='$user_id' LIMIT 1;";
		$result = $mysqli->query($query);
		if($row = $result->fetch_array(MYSQLI_ASSOC)){
			print json_encode(array('success' =>true,'user' =>$row));
		}else{
			print json_encode(array('success' =>false,'msg' =>"No record found!"));
		}
	}
}

function search_user($value){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$query ="SELECT U.UserAccountID, U.UserName, U.Password,U.GroupID,CONCAT(U.LastName,', ',U.FirstName,' ',SUBSTR(U.MiddleName,1,1)) as FullName, G.GroupName
			FROM election_useraccounts U INNER JOIN election_usersgroup G ON U.GroupID = G.GroupID WHERE U.UserName LIKE '%$value%' OR U.LastName LIKE '%$value%' OR U.FirstName LIKE '%$value%' ;";
		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data ,$row);
		}
		print json_encode(array('success' =>true,'users' =>$data));
	}
}

function checklogin($StudentID,$TermID) {
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success'=>false,'msg'=>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	}else{
		$query = "SELECT * FROM election_ballots WHERE StudentID ='$StudentID' AND TermID='$TermID' LIMIT 1;";
		if ($result = $mysqli->query($query)) {
		    if($row = $result->fetch_array(MYSQLI_ASSOC)){
		    	print json_encode(array('success'=>true,'msg'=>'Username is incorrect!'));
		    }else{
		    	print json_encode(array('success'=>false,'msg'=>''));
		    }
		}else{
			print json_encode(array('success'=>false,'msg'=>''));
		}
	}
}

function main_login($username,$password){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success'=>false,'msg'=>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	}else{


		$query = "SELECT U.UserAccountID, U.UserName, U.Password,U.GroupID,CONCAT(U.LastName,', ',U.FirstName,' ',SUBSTR(U.MiddleName,1,1)) as FullName, G.GroupName,UP.*
				FROM election_useraccounts U INNER JOIN election_usersgroup G ON U.GroupID = G.GroupID
				INNER JOIN election_usersgroup_privileges UP ON UP.GroupID = G.GroupID WHERE U.Username='$username' && U.Password='$password' LIMIT 1";
		$data = array();
		if ($result = $mysqli->query($query)) {
		    if($row = $result->fetch_array(MYSQLI_ASSOC)){
		    	print json_encode(array('success'=>true,'msg'=>'','user'=>$row));
		    }else{
		    	print json_encode(array('success'=>false,'msg'=>'Invalid Username and Password'));
		    }
		    $result->free();
		}else{
			print json_encode(array('success'=>false,'msg'=>'Invalid Username and Password'));
		}

	}
}

function adminlogin($password){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success'=>false,'msg'=>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	}else{


		$query = "SELECT U.UserAccountID, U.UserName, U.Password,U.GroupID,CONCAT(U.LastName,', ',U.FirstName,' ',SUBSTR(U.MiddleName,1,1)) as FullName, G.GroupName,UP.*
				FROM election_useraccounts U INNER JOIN election_usersgroup G ON U.GroupID = G.GroupID
				INNER JOIN election_usersgroup_privileges UP ON UP.GroupID = G.GroupID WHERE U.Password='$password' LIMIT 1";
		$data = array();
		if ($result = $mysqli->query($query)) {
		    if($row = $result->fetch_array(MYSQLI_ASSOC)){
		    	print json_encode(array('success'=>true,'msg'=>'','user'=>$row));
		    }else{
		    	print json_encode(array('success'=>false,'msg'=>'Invalid Password'));
		    }
		    $result->free();
		}else{
			print json_encode(array('success'=>false,'msg'=>'Invalid Password'));
		}

	}
}

function UserProfile($UserID){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$query ="SELECT * FROM election_useraccounts WHERE UserAccountID = '$UserID'";
		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data ,$row);
		}
		print json_encode(array('success' =>true,'users' =>$data));
	}
}

function Print_User(){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{

		$query="SELECT U.UserAccountID, U.UserName, U.Password,U.GroupID,CONCAT(U.LastName,', ',U.FirstName,' ',SUBSTR(U.MiddleName,1,1)) as FullName, G.GroupName
				FROM election_useraccounts U INNER JOIN election_usersgroup G ON U.GroupID = G.GroupID;";

		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data ,$row);
		}

		print json_encode(array('success' =>true,'users' =>$data));
	}
}

?>
