<?php

include_once dirname(__FILE__).'/inc/config.php';


require 'dbh.inc.php';
session_start();

$username = $_SESSION["username"];
$query = mysqli_query ($conn, "select id from users where username='$username'");
$row = mysqli_fetch_array($query);
$user_id = $row["id"];

//--->get all users > start
if(isset($_GET['call_type']) && $_GET['call_type'] =="get")
{
	$q1 = app_db()->select("SELECT * FROM transactions WHERE user_id='$user_id' ORDER BY date DESC");
	echo json_encode($q1);
}
//--->get all users > end


//--->update single entry > start
if(isset($_POST['call_type']) && $_POST['call_type'] =="single_entry")
{	

	$row_id 	= app_db()->CleanDBData($_POST['row_id']);
	$user_id 	= app_db()->CleanDBData($_POST['user_id']);
	$col_name  	= app_db()->CleanDBData($_POST['col_name']); 
	$col_val  	= app_db()->CleanDBData($_POST['col_val']);

	
	$tbl_col_name = array("row_id", "user_id", "date", "purpose", "category", "sum");

	if (!in_array($col_name, $tbl_col_name))
	{
		echo json_encode(array(
			'status' => 'error', 
			'msg' => 'invalid col_name', 
		));
		die();
	}

	$q1 = app_db()->select("select * from transactions where row_id='$row_id'");
	if($q1 < 1) 
	{
		//no record found in the database
		echo json_encode(array(
			'status' => 'error', 
			'msg' => 'no entries were found', 
		));
		die();
	}
	else if($q1 > 0) 
	{
		//found record in the database
		 
		$strTableName = "transactions";

		$array_fields = array(
			$col_name => $col_val,
		);
		$array_where = array(    
		  'row_id' => $row_id,
		  'user_id' => $user_id,
		);
		//Call it like this:  
		app_db()->Update($strTableName, $array_fields, $array_where);


		echo json_encode(array(
			'status' => 'success', 
			'msg' => 'updated entry', 
		));
		die();
	}
}
//--->update single entry > end




//--->update a whole row  > start
if(isset($_POST['call_type']) && $_POST['call_type'] =="row_entry")
{	

	$row_id 	= app_db()->CleanDBData($_POST['row_id']);
	$user_id    = app_db()->CleanDBData($_POST['user_id']);
	$date  		= app_db()->CleanDBData($_POST['date']); 
	$purpose  	= app_db()->CleanDBData($_POST['purpose']); 
	$category	= app_db()->CleanDBData($_POST['category']); 	
	$sum		= app_db()->CleanDBData($_POST['sum']); 	
	
	$q1 = app_db()->select("select * from transactions where row_id='$row_id'");
	if($q1 < 1) 
	{
		//no record found in the database
		echo json_encode(array(
			'status' => 'error', 
			'msg' => 'no entries were found', 
		));
		die();
	}
	else if($q1 > 0) 
	{
		//found record in the database
		 
		$strTableName = "transactions";

		$array_fields = array(
			'date' => $date,
			'purpose' => $purpose,
			'category' => $category,
			'sum' => $sum,
		);
		$array_where = array(    
		  'row_id' => $row_id,
		  'user_id' => $user_id,
		);
		//Call it like this:  
		app_db()->Update($strTableName, $array_fields, $array_where);


		echo json_encode(array(
			'status' => 'success', 
			'msg' => 'updated row entry', 
		));
		die();
	}
}
//--->update a whole row > end




//--->new row entry  > start
if(isset($_POST['call_type']) && $_POST['call_type'] =="new_row_entry")
{	
	$row_id 	= app_db()->CleanDBData($_POST["row_id"]);
	$user_id 	= app_db()->CleanDBData($_POST["user_id"]);
	$date 		= app_db()->CleanDBData($_POST["date"]); 
	$purpose  	= app_db()->CleanDBData($_POST["purpose"]); 
	$category 	= app_db()->CleanDBData($_POST["category"]);
	$sum	 	= app_db()->CleanDBData($_POST["sum"]); 	
	
	$q1 = app_db()->select("select * from transactions where row_id='$row_id'");
	if($q1 < 1) 
	{
		//add new row
		$strTableName = "transactions";

		$insert_arrays = array
		(
			"row_id" => $row_id,
			"user_id" => $user_id,
			"date" => $date,
			"purpose" => $purpose,
			"category" => $category,
			"sum" => $sum,
		);

		//Call it like this:
		app_db()->Insert($strTableName, $insert_arrays);

		echo json_encode(array(
			'status' => 'success', 
			'msg' => 'added new entry', 
		));
		die();
	}	 
}
//--->new row entry  > end



//--->delete row entry  > start
if(isset($_POST['call_type']) && $_POST['call_type'] =="delete_row_entry")
{	

	$row_id 	= app_db()->CleanDBData($_POST['row_id']);	 
	
	$q1 = app_db()->select("select * from transactions where row_id='$row_id'");
	if($q1 > 0) 
	{
		//found a row to be deleted
		$strTableName = "transactions";

		$array_where = array('row_id' => $row_id);

		//Call it like this:
		app_db()->Delete($strTableName,$array_where);

		echo json_encode(array(
			'status' => 'success', 
			'msg' => 'deleted entry', 
		));
		die();
	}	 
}
//--->delete row entry  > end
?>
