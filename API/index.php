<?php
session_start();
include('connect.php');
include('config.php');
include('acad_programs.php');
include('college.php');
include('partylist.php');
include('positions.php');
include('ballots.php');
include('student.php');
include('useraccounts.php');
include('usergroup.php');
include('canvassing.php');
include('candidate.php');



header("Content-Type: application/json");


switch ($_POST['command']) {

	/* --------------------- VOTING ------------------------*/
	case "login":
		login($_POST['username'],$_POST['TermID']);
		break;
	case "login2":
			login2($_POST['username'],$_POST['CollegeID'],$_POST['TermID']);
			break;
	case "checkloginballot":
		checkloginballot($_POST['username'],$_POST['TermID']);
		break;
	case "checkloginballot2":
		checkloginballot2($_POST['username'],$_POST['CollegeID'],$_POST['TermID']);
		break;
	case "getCandidacyPosition":
		getCandidacyPosition($_POST['TermID']);
		break;
	case "getCandidatesByPositionID":
		getCandidatesByPositionID($_POST['positionID'],$_POST['TermID']);
		break;
	case "getCandidatesByPositionIDByCollegeID":
        getCandidatesByPositionIDByCollegeID($_POST['positionID'],$_POST['CollegeID'],$_POST['TermID']);
		break;
	case "getCandidatesByPositionIDByCourseID":
		getCandidatesByPositionIDByCourseID($_POST['positionID'],$_POST['ProgramID'],$_POST['TermID']);
		break;
	case "Insert_To_Ballot":
		Insert_To_Ballot($_POST['data'],$_POST['student_id'],$_POST['TermID']);
		break;
	case 'checklogindate':
		checklogindate();
		break;
	case 'Print_Ballot':
		Print_Ballot($_POST['username'],$_POST['TermID'],$_POST['page']);
		break;


	/* --------------------- CANVASSING ------------------------*/
	case "getStatisticsOverview":
		getStatisticsOverview($_POST['TermID']);
		break;
	case "getCandidatesCanvassingByPositionID":
		getCandidatesCanvassingByPositionID($_POST['positionID'],$_POST['TermID']);
		break;
	case "getCandidatesFinalCanvassing":
		getCandidatesFinalCanvassing($_POST['TermID']);
		break;
	case 'getVotersActuallyVoted':
		getVotersActuallyVoted($_POST['TermID'],$_POST['page']);
		break;
	case 'getVotersNotVoted':
		getVotersNotVoted($_POST['TermID'],$_POST['page']);
		break;
	case 'getCandidateWinners':
		getCandidateWinners($_POST['TermID']);
			break;


	/* --------------------- CONFIGURATION ------------------------*/
	case "get_active_config":
		get_active_config();
		break;
	case "get_config":
		get_config($_POST['TermID']);
		break;
	case "select_all_config":
		select_all_config($_POST['page']);
		break;
	case "delete_config":
		delete_config($_POST['TermID']);
		break;
	case "search_config":
		search_config($_POST['value'],$_POST['page']);
		break;
	case "update_config":
		update_config($_POST['TermID'],$_POST['data']);
		break;
	case "insert_config":
		insert_config($_POST['data']);
		break;
	case "activate_configuration":
		activate_configuration($_POST['TermID']);
		break;
	case "select2_config":
		select2_config();
		break;
	case "select_For_ComboConfig";
 		select_For_ComboConfig();
		break;
 	case "Print_Config":
 		Print_Config();
 		break;

	/* --------------------- COURSE ------------------------*/
	case "insert_acad_programs":
		insert_acad_programs($_POST['data']);
		break;
	case "update_acad_programs":
		update_acad_programs($_POST['course_id'],$_POST['data']);
		break;
	case "delete_acad_programs":
		delete_acad_programs($_POST['course_id']);
		break;
	case "select_all_acad_programs":
		select_all_acad_programs($_POST['page']);
		break;
	case "get_acad_programs":
		get_acad_programs($_POST['course_id']);
		break;
	case "search_acad_programs":
		search_acad_programs($_POST['value'],$_POST['page']);
		break;
	case "select_For_ComboCourse":
			select_For_ComboCourse();
			break;
	case "select_For_ComboCourseforCandidates":
			select_For_ComboCourseforCandidates($_POST['candidateID'],$_POST['TermID']);
			break;
	case "Print_Courses":
		Print_Courses();
		break;
	case "checkCourses":
		checkCourses($_POST['course_description']);
		break;

	/* --------------------- COLLEGE ------------------------*/
	case "insert_college":
		insert_college($_POST['data']);
		break;
	case "update_college":
		update_college($_POST['college_id'],$_POST['data']);
		break;
	case "delete_college":
		delete_college($_POST['college_id']);
		break;
	case "archieve_college":
		archieve_college($_POST['college_id']);
		break;
	case "select_all_college":
		select_all_college($_POST['page']);
		break;
	case "get_college":
		get_college($_POST['college_id']);
		break;
	case "search_college":
		search_college($_POST['value']);
		break;
	case "select_For_ComboCollege":
		select_For_ComboCollege();
			break;
	case "Print_College":
		Print_College();
		break;


	/* --------------------- PARTYLIST ------------------------*/

	case "insert_partylist":
		insert_partylist($_POST['data']);
		break;
	case "update_party":
		update_party($_POST['party_id'],$_POST['data']);
		break;
	case "delete_party":
		delete_party($_POST['party_id']);
		break;
	case "select_all_party":
		select_all_party($_POST['page']);
		break;
	case "get_party":
		get_party($_POST['party_id']);
		break;
	case "get_party_by_term":
		get_party_by_term($_POST['party_id'],$_POST['term_id']);
		break;
	case "search_party":
		search_party($_POST['value'],$_POST['page']);
		break;
	case "Select_For_ComboParty":
		Select_For_ComboParty();
		break;
	case "Print_ParatyList":
		Print_ParatyList();
		break;


	/* --------------------- POSITION ------------------------*/
	case "insert_position":
		insert_position($_POST['data']);
		break;
	case "update_position":
		update_position($_POST['position_id'],$_POST['data']);
		break;
	case "delete_position":
		delete_position($_POST['position_id']);
		break;
	case "select_all_position":
		select_all_position($_POST['TermID'],$_POST['page']);
		break;
	case "get_position":
		get_position($_POST['position_id']);
		break;
	case "search_position":
		search_position($_POST['value'],$_POST['TermID'],$_POST['page']);
		break;
	case "select_ForComboPosition";
		select_ForComboPosition($_POST['TermID']);
		break;
	case "Print_Position":
		Print_Position($_POST['Term']);
		break;
	case 'CheckIfExistPositionCode':
		CheckIfExistPositionCode($_POST['value']);
		break;
	case 'CheckIfExistPositionName':
		CheckIfExistPositionName($_POST['value']);
		break;


	/* --------------------- STUDENT ------------------------*/
	case "insert_student":
		insert_student($_POST['data']);
		break;
	case "update_student":
		update_student($_POST['student_id'],$_POST['data']);
		break;
	case "checkactivate":
		checkactivate($_POST['student_id'],$_POST['TermID']);
		break;
	case "activate_student":
		activate_student($_POST['student_id'],$_POST['TermID']);
		break;
	case "deactivate_student":
		deactivate_student($_POST['student_id'],$_POST['TermID']);
		break;
	case "select_all_student":
		select_all_student($_POST['TermID'],$_POST['page']);
		break;
	case "get_student":
		get_student($_POST['student_id'],$_POST['TermID']);
		break;
	case "search_student":
		search_student($_POST['value'],$_POST['TermID'],$_POST['page']);
		break;
	case "search_student2":
		search_student2($_POST['value'],$_POST['TermID']);
		break;
	case "generate_password":
		generate_password();
		break;
	case "generate_password2":
		generate_password2($_POST['TermID']);
		break;
	case "Print_Student":
		Print_Student($_POST['TermID'],$_POST['page']);
		break;
	case "checkStudent" :
		checkStudent($_POST['Fullname']);
		break;
	case 'fetch_student':
		fetch_student($_POST['TermID']);
		break;
	case 'import_student':
		import_student($_POST['data']);
		break;
	case 'getSelect2Student':
		getSelect2Student();
		break;
	case "checkStudentID" :
		checkStudentID($_POST['StudentID']);
		break;

	/* --------------------- CANDIDATE ------------------------*/
	case "insert_candidate":
		insert_candidate($_POST['data']);
		break;
	case "update_candidate":
		update_candidate($_POST['candidate_id'],$_POST['data']);
		break;
	case "delete_candidate":
		delete_candidate($_POST['candidate_id']);
		break;
	case "select_all_candidate":
		select_all_candidate($_POST['TermID'],$_POST['page']);
		break;
	case "get_candidate":
		get_candidate($_POST['candidate_id'],$_POST['TermID']);
		break;
	case "search_candidate":
		search_candidate($_POST['value'],$_POST['TermID'],$_POST['page']);
		break;
	case "upload_photo_candidate":
		upload_photo($_POST['data']);
		break;
	case "Print_Candidates":
		Print_Candidates($_POST['Term']);
		break;
	case 'checkCandidate':
		checkCandidate($_POST['StudentID'],$_POST['TermID']);
		break;


	/* --------------------- USER ACCOUNTS ------------------------*/
	case "insert_user":
		insert_user($_POST['data']);
		break;
	case "update_user":
		update_user($_POST['UserAccountID'],$_POST['data']);
		break;
	case "delete_user":
		delete_user($_POST['UserAccountID']);
		break;
	case "select_all_user":
		select_all_user($_POST['page']);
		break;
	case "get_user":
		get_user($_POST['user_id']);
		break;
	case "get_userForEdit":
		get_userForEdit($_POST['user_id']);
		break;
	case "search_user":
		search_user($_POST['value']);
		break;
	case "main_login":
		main_login($_POST['username'],$_POST['password']);
		break;
	case "checklogin":
		checklogin($_POST['username'],$_POST['TermID']);
		break;
	case "adminlogin":
		adminlogin($_POST['password']);
		break;
	case "UserProfile":
		UserProfile($_POST['UserID']);
		break;
	case "Print_User":
		Print_User();
		break;


	/* --------------------- USER GROUP ------------------------*/

	case "insert_user_group":
		insert_user_group($_POST['data']);
		break;
	case "update_user_group":
		update_user_group($_POST['GroupID'],$_POST['data']);
		break;
	case "delete_user_group":
		delete_user_group($_POST['GroupID']);
		break;
	case "select_all_user_group":
		select_all_user_group($_POST['page']);
		break;
	case "get_user_group":
		get_user_group($_POST['GroupID']);
		break;
	case "search_user_group":
		search_user_group($_POST['value']);
		break;
	case "Print_UserGroup";
		Print_UserGroup();
		break;

	/* --------------------- DEFAULT ------------------------*/
	default:
		echo 'CMU VOTING SYSTEM developed by: (Programmer: Shawn Michael F. Penaflorida, Jimboy G. Santos and Rica Jane Bongcaras)';
		break;
}
exit();
?>
