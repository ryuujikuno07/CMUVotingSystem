<?php

	if(isset($_POST['btn_delete']))
	{
	    if(isset($_POST['chk_delete']))
	    {
	        foreach($_POST['chk_delete'] as $value)
	        {
	            $delete_query = mysqli_query($mysqli,"DELETE from person_table where id = '$value' ") or die('Error: ' . mysqli_error($mysqli));

	            if($delete_query == true)
	            {
	                $_SESSION['delete'] = 1;
	                header("location:../../templates/admin/student_list.php");
	            }
	        }
	    }
	}

?>
