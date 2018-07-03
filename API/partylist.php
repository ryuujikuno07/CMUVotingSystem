<?php

function insert_partylist($data){
	try{$mysqli = new mysqli("localhost", "root", "", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		if ($stmt = $mysqli->prepare('INSERT INTO election_partylist(PartyName,ShortName,PartyLogo,Goals,Projects,DateSubmitted,CreationDate,CreatedBy,ModifiedDate,ModifiedBy,TermID) VALUES(?,?,?,?,?,?,NOW(),?,NOW(),?,?)')){
			$stmt->bind_param("sssssssss", $data[0]['party_name'],$data[0]['party_SName'],$data[0]['party_logo'],$data[0]['party_goals'],$data[0]['party_projects'],$data[0]['party_submission'],$data[0]['created_by'],$data[0]['modify_by'],$data[0]['party_TermID']);
			$stmt->execute();

			print json_encode(array('success' =>true,'msg' =>'Record successfully saved'));
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}

	}catch(exception $e){
		print $e;
	}
}

function update_party($party_id,$data){
	$mysqli = new mysqli("localhost", "root", "", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		if ($stmt = $mysqli->prepare('UPDATE election_partylist SET PartyName=?,ShortName=?,PartyLogo=?,Goals=?,Projects=?,DateSubmitted=?,ModifiedDate=NOW(),ModifiedBy=?,TermID=? WHERE PartyID="'.$party_id.'"')){
			$stmt->bind_param("ssssssss", $data[0]['party_name'],$data[0]['party_SName'],$data[0]['party_logo'],$data[0]['party_goals'],$data[0]['party_projects'],$data[0]['party_submission'],$data[0]['modify_by'],$data[0]['party_TermID']);
			$stmt->execute();
			print json_encode(array('success' =>true,'msg' =>'Record successfully updated'));
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}
}

function delete_party($party_id){
	$mysqli = new mysqli("localhost", "root", "", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		if($stmt = $mysqli->prepare("DELETE FROM election_partylist WHERE PartyID =?")){
			$stmt->bind_param("s", $party_id);
			$stmt->execute();
			$stmt->close();
			print json_encode(array('success' =>true,'msg' =>'Record successfully deleted'));
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}
}

function archieve_party($party_id){
	$mysqli = new mysqli("localhost", "root", "", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		if($stmt = $mysqli->prepare("UPDATE election_partylist SET InActive=1 WHERE PartyID =?")){
			$stmt->bind_param("s", $party_id);
			$stmt->execute();
			$stmt->close();
			print json_encode(array('success' =>true,'msg' =>'Record successfully archieve'));
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error));
		}
	}
}

function select_all_party($page){
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

		$query1 ="SELECT *,CONCAT(SchoolYear,' - ',ElectionName) AS `Config`, DATE_FORMAT(DateSubmitted,'%a %b-%d-%Y') AS DateSubmitted, DATE_FORMAT(CreationDate,'%h:%i %p') AS CreationDate FROM election_partylist tblP LEFT JOIN election_configuration tblC ON tblC.TermID = tblP.TermID;";
		$result1 = $mysqli->query($query1);
		$rows = $result1->num_rows;

		$query ="SELECT *,CONCAT(SchoolYear,' - ',ElectionName) AS `Config`, DATE_FORMAT(DateSubmitted,'%a %b-%d-%Y') AS DateSubmitted, DATE_FORMAT(CreationDate,'%h:%i %p') AS CreationDate FROM election_partylist tblP LEFT JOIN election_configuration tblC ON tblC.TermID = tblP.TermID LIMIT $start, $limit;";

		$mysqli->set_charset("utf8");
		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data,$row);
		}
		$paging = pagination($limit,$adjacent,$rows,$page);

		print json_encode(array('success' =>true,'partylist' =>$data,'pagination'=>$paging));
	}
}

function Select_For_ComboParty(){
	$mysqli = new mysqli("localhost", "root", "", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$query ="SELECT *,CONCAT(SchoolYear,' - ',ElectionName) AS `Config` FROM election_partylist tblP LEFT JOIN election_configuration tblC ON tblC.TermID = tblP.TermID;";
		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data,$row);
		}
		print json_encode(array('success' =>true,'partylist' =>$data));
	}
}

function get_party($party_id){
	$mysqli = new mysqli("localhost", "root", "", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$query ="SELECT * FROM election_partylist WHERE PartyID=$party_id;";
		$result = $mysqli->query($query);
		if($row = $result->fetch_array(MYSQLI_ASSOC)){
			print json_encode(array('success' =>true,'party' =>$row));
		}else{
			print json_encode(array('success' =>false,'msg' =>"No record found!"));
		}
	}
}


function get_party_by_term($party_id,$term_id){
	$mysqli = new mysqli("localhost", "root", "", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{
		$query ="SELECT * FROM election_partylist WHERE PartyID=$party_id AND TermID =$term_id;";
		$result = $mysqli->query($query);
		if($row = $result->fetch_array(MYSQLI_ASSOC)){
			print json_encode(array('success' =>true,'party' =>$row));
		}else{
			print json_encode(array('success' =>false,'msg' =>"No record found!"));
		}
	}
}

function search_party($value,$page){
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

		$query1 ="SELECT *,CONCAT(SchoolYear,' - ',ElectionName) AS `Config`, DATE_FORMAT(DateSubmitted,'%a %b-%d-%Y') AS DateSubmitted, DATE_FORMAT(CreationDate,'%h:%i %p') AS CreationDate FROM election_partylist tblP LEFT JOIN election_configuration tblC ON tblC.TermID = tblP.TermID WHERE PartyName LIKE '%$value%' OR ShortName LIKE '%$value%';";

		$result1 = $mysqli->query($query1);
		$rows = $result1->num_rows;

		$query ="SELECT *,CONCAT(SchoolYear,' - ',ElectionName) AS `Config`, DATE_FORMAT(DateSubmitted,'%a %b-%d-%Y') AS DateSubmitted, DATE_FORMAT(CreationDate,'%h:%i %p') AS CreationDate FROM election_partylist tblP LEFT JOIN election_configuration tblC ON tblC.TermID = tblP.TermID WHERE PartyName LIKE '%$value%' OR ShortName LIKE '%$value%' LIMIT $start, $limit;";

		$mysqli->set_charset("utf8");
		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data ,$row);
		}

		$paging = pagination($limit,$adjacent,$rows,$page);

		print json_encode(array('success' =>true,'partylist' =>$data,'pagination'=>$paging));
	}
}

function Print_ParatyList(){
	$mysqli = new mysqli("localhost", "root", "", "cmu_mis");
	if ($mysqli->connect_errno) {
	    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
	    return;
	}else{

		$query="SELECT *,CONCAT(SchoolYear,' - ',ElectionName) AS `Config`, DATE_FORMAT(DateSubmitted,'%a %b-%d-%Y') AS DateSubmitted, DATE_FORMAT(CreationDate,'%h:%i %p') AS CreationDate FROM election_partylist tblP LEFT JOIN election_configuration tblC ON tblC.TermID = tblP.TermID;";

		$result = $mysqli->query($query);
		$data = array();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			array_push($data ,$row);
		}

		print json_encode(array('success' =>true,'partylist' =>$data));
	}
}

?>
