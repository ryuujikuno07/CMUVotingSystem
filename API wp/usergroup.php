<?php

function insert_user_group($data){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{

		$query  = 'INSERT INTO election_usersgroup(GroupName,`Desc`) VALUES("'.$data[0]['Group_Name'].'","'.$data[0]['Group_Desc'].'");';
		$query .= 'INSERT INTO election_usersgroup_privileges(GroupID,_Dashboard,_UsersAccount,_Student,_PartyList,_Candidates,_ElectoralPosition,_AcademicProgram,_ElectionConfig) VALUES((SELECT GroupID from election_usersgroup ORDER BY GroupID DESC LIMIT 1),"'.$data[0]['DashBoard'].'","'.$data[0]['UserAcc'].'","'.$data[0]['Student'].'","'.$data[0]['Party'].'","'.$data[0]['Candidates'].'","'.$data[0]['Electoral'].'","'.$data[0]['Academic'].'","'.$data[0]['Election'].'");';

		$result = mysqli_multi_query($mysqli, $query);

		if ($result) {
			do {
			// grab the result of the next query
				if (($result = mysqli_store_result($mysqli)) === false && mysqli_error($mysqli) != '') {
				    // echo "Query failed: " . mysqli_error($mysqli);
					print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
				}else{
				}
			} while (mysqli_more_results($mysqli) && mysqli_next_result($mysqli)); // while there are more results
		} else {
			// echo "First query failed..." . mysqli_error($mysqli);
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
			print json_encode(array('success' =>true,'msg' =>'Record successfully saved'));

	}
}

function update_user_group($GroupID,$data){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$query = 'UPDATE election_usersgroup SET GroupName="'.$data[0]['Group_Name'].'",`Desc`="'.$data[0]['Group_Desc'].'" WHERE GroupID="'.$GroupID.'";';
		$query .= 'UPDATE election_usersgroup_privileges SET _Dashboard="'.$data[0]['DashBoard'].'",_UsersAccount="'.$data[0]['UserAcc'].'",_Student="'.$data[0]['Student'].'",_PartyList="'.$data[0]['Party'].'",_Candidates="'.$data[0]['Candidates'].'",_ElectoralPosition="'.$data[0]['Electoral'].'",_AcademicProgram="'.$data[0]['Academic'].'",_ElectionConfig="'.$data[0]['Election'].'" WHERE GroupID="'.$GroupID.'" ;';

		$result = mysqli_multi_query($mysqli, $query);

		if ($result) {
			do {
			// grab the result of the next query
				if (($result = mysqli_store_result($mysqli)) === false && mysqli_error($mysqli) != '') {
				    // echo "Query failed: " . mysqli_error($mysqli);
					print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
				}else{

				}
			} while (mysqli_more_results($mysqli) && mysqli_next_result($mysqli)); // while there are more results
		} else {
			// echo "First query failed..." . mysqli_error($mysqli);
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
		print json_encode(array('success' =>true,'msg' =>'Record successfully saved'));

		// if ($stmt = $mysqli->prepare('UPDATE election_usersgroup SET GroupName=?,`Desc`=? WHERE GroupID="'.$GroupID.'"')){
		// 	$stmt->bind_param("ss", $data[0]['Group_Name'],$data[0]['Group_Desc']);
		// 	$stmt->execute();
		// 	print json_encode(array('success' =>true,'msg' =>'Record successfully updated'));
		// }else{
		// 	print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		// }
	}
}

function delete_user_group($GroupID){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		if($stmt = $mysqli->prepare("DELETE FROM election_usersgroup WHERE GroupID =?")){
			$stmt->bind_param("s", $GroupID);
			$stmt->execute();
			$stmt->close();
			print json_encode(array('success' =>true,'msg' =>'Record successfully deleted'));
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}
}


function select_all_user_group($page){
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


		$query1 ="SELECT * FROM election_usersgroup tbl_U JOIN election_usersgroup_privileges tbl_UP ON tbl_U.GroupID = tbl_UP.GroupID;";

		$result1 = $mysqli->query($query1);
		$rows = $result1->num_rows;

		$query ="SELECT * FROM election_usersgroup tbl_U JOIN election_usersgroup_privileges tbl_UP ON tbl_U.GroupID = tbl_UP.GroupID LIMIT $start, $limit;";

		$mysqli->set_charset("utf8");
		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data ,$row);
		}

		$paging = pagination($limit,$adjacent,$rows,$page);

		print json_encode(array('success' =>true,'groups' =>$data,'pagination'=>$paging));
	}
}

function get_user_group($GroupID){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$query ="SELECT * FROM election_usersgroup tbl_U JOIN election_usersgroup_privileges tbl_UP ON tbl_U.GroupID = tbl_UP.GroupID WHERE tbl_U.GroupID=$GroupID;";
		$result = $mysqli->query($query);
		if($row = $result->fetch_array(MYSQLI_ASSOC)){
			print json_encode(array('success' =>true,'group' =>$row));
		}else{
			print json_encode(array('success' =>false,'msg' =>"No record found!"));
		}
	}
}

function search_user_group($value){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$query ="SELECT * FROM election_usersgroup WHERE GroupName LIKE '%$value%' OR `Desc` LIKE '%$value%' ;";
		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data,$row);
		}
		print json_encode(array('success' =>true,'groups' =>$data));
	}
}

function Print_UserGroup(){
	$mysqli = new mysqli("localhost", "root", "123123456", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{

		$query="SELECT * FROM election_usersgroup tbl_U JOIN election_usersgroup_privileges tbl_UP ON tbl_U.GroupID = tbl_UP.GroupID;";

		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data ,$row);
		}

		print json_encode(array('success' =>true,'userGroup' =>$data));
	}
}

?>
