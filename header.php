<?php
	
session_start();
require 'dbh.inc.php';

include_once dirname(__FILE__).'/inc/config.php'; 
 
$q1 = app_db()->select('select * from transactions');

?>

<!DOCTYPE html>

<html lang = "en">
<head>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

	<!-- Using the links for the calendar >> start -->

	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="css/box_style_balance.css">
	<link rel="stylesheet" href="css/box_style_others.css">
	<script src="https://kit.fontawesome.com/4630ffd9fd.js" crossorigin="anonymous"></script>
	<!-- Using the links for the calendar >> end -->
	<link rel="stylesheet" href="css/header_buttons.css">

	<meta charset="UTF-8">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700i" rel="stylesheet">
  
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <link rel="stylesheet" type="text/css" href="css/side_nav.css">

  <style type="text/css">
  	.newbut{
  		font-size: 45px;
  		color:#0884ff; 
  		margin-left: 1095px; 
  		margin-top: -80px; 
  		margin-bottom: 10px;
  	}
  	.newbut:hover{
  		font-size: 50px;
  		color: #286afa;
  		transition: 0.5s;
  	}
  </style>


	<title></title>
</head>

<body style="background: #0c1317">
	<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
		<a class="navbar-brand" href="#" style="font-size: 25px;">
			 <i class="fas fa-coins" style="font-size: 30px;"></i>
			MyCapital
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#" style="font-size: 20px; margin-right: 370px; margin-top: 5px;">Home <span class="sr-only">(current)</span></a>
				</li>
				
				<a class="nav-link" style="color: MediumSpringGreen; margin-top: 6px; font-size: 20px;" href="#">
					<?php  if (isset($_SESSION['username'])) : ?> 
						<li>
							Welcome  
							<strong> 
								<?php echo $_SESSION['username'];?> 
							</strong>! 
						</li> 
					<?php endif ?> 
				</a>
			</ul>

			<?php
			if(isset($_SESSION['userID'])){
				echo '<form action="logout.inc.php" method="post">
				<button class="logoutbutton logoutbutton1" type="submit" name="logout-submit">Logout</button>
				</form>';
			}

			else{
				echo '<form action="login.inc.php" method="post"> 
				<input class="email" type="text" name="email" placeholder="  Email" required>
				<input class="email" type="password" name="pwd" placeholder="  Password" required>
				<button class="button button1" type="submit" name="login-submit" >Login</button>
				</form>
				<a class="signbut" href="signup.php">Signup</a>';
			}
			?>

		</div>
	</nav>

	 
  <script>

    $(function() {
     $(".navigation__icon").click(function() {
       $(".navigation").toggleClass('navigation-open');
     });
   });
	
	var i = 0;
    function nav_open(){
    	document.getElementsByClassName("navigation")[0].style.display = "block";
    	
    	
    	if(i%2 === 1)
    	{ 
    		var header = document.getElementById("header");
    			header.style.zIndex = "0";
    			document.getElementById("all").style.paddingLeft = "0px";
    			document.getElementById("all").style.transition = "all 1s 0.25s";
    	}
    	else
    	{
    		var header = document.getElementById("header");
    		header.style.zIndex= "2";
    		document.getElementById("all").style.paddingLeft = "260px";
    		document.getElementById("all").style.transition = "all 0.6s 0.2s";
    	}
    	i++;
    }

  </script>
 

	<?php
	$username = $_SESSION["username"];
	$query = mysqli_query ($conn, "select id from users where username='$username'");
	$row = mysqli_fetch_array($query);
	$user_id = $row["id"];
	?>
	         

<script type="text/javascript">

$(document).ready(function($)
{ 	 
	var user_id = <?php echo $user_id; ?>;


	function create_html_table (tbl_data)
	{

		//--->create data table > start
		var tbl = '';
		tbl +='<table class="table table-hover tbl_code_with_mark table-dark table-striped display" id="example" style="width:100%; margin-top: 0px;">'

		//add new table row
		tbl +='<div style="margin-bottom:0px;" class="text-center">';
			tbl +='<i class="fas fa-plus-circle newbut btn_new_row" title="Add New Row"></i>';
		tbl +='</div>';


			//--->create table header > start
			tbl += '<thead>';
				tbl += '<tr>';
				tbl += '<th>Date</th>';	
				tbl += '<th>Purpose</th>';	
				tbl += '<th>Category</th>';	
				tbl += '<th>Sum</th>';	
				tbl += '<th>Options</th>';
				tbl += '</tr>';
			tbl += '</thead>';
			//--->create table header > end
			
			//--->create table body > start
			tbl +='<tbody>';

				//--->create table body rows > start
				$.each(tbl_data, function(index, val) 
				{
					//you can replace with your database row id
					var row_id = val['row_id'];
					var user_id = <?php echo $user_id; ?>;

					var date = val['date'];
					
					var otherform= date.split("-",3);
					var dat= otherform[2];
					var month= otherform[1];
					var year= otherform[0];

					var date 	= dat +'-' +month+'-'+year;

					//loop through ajax row data
					tbl +='<tr row_id="'+row_id+'" , user_id="'+user_id+'">';
						tbl +='<td ><div class="row_data" edit_type="click" col_name="date">'+date+'</div></td>';
						tbl +='<td ><div class="row_data" edit_type="click" col_name="purpose">'+val['purpose']+'</div></td>';
						tbl +='<td ><div class="row_data" edit_type="click" col_name="category">'+val['category']+'</div></td>';
						tbl +='<td ><div style="float: left; margin-right: 7px;">'+"₹"+'</div><div class="row_data" edit_type="click" col_name="sum">'+val['sum']+'</div></td>';

						//--->edit options > start
						tbl +='<td>';						 
							tbl +='<span class="btn_edit" > <a href="#" style="color: #1b9de3;"class="btn btn-link " row_id="'+row_id+'" > Edit</a> </span>';
							//only show this button if edit button is clicked
							tbl +='<a href="#" style="color: #47d147;" class="btn_save btn btn-link"  row_id="'+row_id+'"> Save </a>';
							tbl +='<a href="#" style="color: #e8de1c;" class="btn_cancel btn btn-link" row_id="'+row_id+'"> Cancel </a>';
							tbl +='<a href="#" style="color: #e31717;" class="btn_delete btn btn-link1" row_id="'+row_id+'"> Delete</a>';
						tbl +='</td>';
						//--->edit options > end						
					tbl +='</tr>';
				});
				//--->create table body rows > end
			tbl +='</tbody>';
			//--->create table body > end

		tbl +='</table>';
		//--->create data table > end

		//out put table data
		$(document).find('.tbl_user_data').html(tbl);

		$(document).find('.btn_save').hide();
		$(document).find('.btn_cancel').hide(); 	
		$(document).find('.btn_delete').hide(); 
			
	}



	var ajax_url = "<?php echo APPURL;?>/ajax.php" ;
	var ajax_data = <?php echo json_encode($q1);?>;

	//create table on page load
	//create_html_table(ajax_data);

	//--->create table via ajax call > start
	$.getJSON(ajax_url,{call_type:'get'},function(data) 
	{
		create_html_table(data);
	});
	//--->create table via ajax call > end
	



	//--->make div editable > start
	$(document).on('click', '.row_data', function(event) 
	{
		event.preventDefault(); 

		if($(this).attr('edit_type') == 'button')
		{
			return false; 
		}

		//make div editable
		$(this).closest('div').attr('contenteditable', 'true');

		//add bg css
		$(this).addClass('editinfo').css('padding','5px');

		$(this).focus();

		$(this).attr('original_entry', $(this).html());

	})	
	//--->make div editable > end



	//--->save single field data > start
	$(document).on('focusout', '.row_data', function(event) 
	{
		event.preventDefault();

		if($(this).attr('edit_type') == 'button')
		{
			return false; 
		}

		//get the original entry
		var original_entry = $(this).attr('original_entry');

		var row_id = $(this).closest('tr').attr('row_id'); 
		var user_id = $(this).closest('tr').attr('user_id'); 

		
		var row_div = $(this)				
		.removeClass('editinfo') //removed css class
		.css('padding','')

		var col_name = row_div.attr('col_name'); 
		var col_val = row_div.html();

		if(col_name=="date"){

			var otherform= col_val.split("-",3);
			var dat= otherform[2];
			var month= otherform[1];
			var year= otherform[0];

			var col_val= dat +'-' +month+'-'+year;
		}

		
		var arr = {};
		//get the col name and value
		arr[col_name] = col_val; 
		//get row id value
		arr['row_id'] = row_id;

		arr['user_id'] = user_id;

		if(original_entry != col_val)
		{ 
			//remove the attr so that new entry can take place
			$(this).removeAttr('original_entry');

			//ajax api json data			 
			var data_obj = 
			{
				row_id: row_id,
				user_id: user_id,
				col_name: col_name,
				col_val:col_val,
				call_type: 'single_entry',				
			};
			
			//call ajax api to update the database record
			$.post(ajax_url, data_obj, function(data) 
			{
				var d1 = JSON.parse(data);
				if(d1.status == "error")
				{
					var msg = ''
					+ '<h3>There was an error while trying to update your entry</h3>'
					+'<pre class="bg-danger">'+JSON.stringify(arr, null, 2) +'</pre>'
					+'';

					$('.post_msg').html(msg);
				}
				else if(d1.status == "success")
				{
					var msg = ''
					+ '<h3>Successfully updated your entry</h3>'
					+'<pre class="bg-success">'+JSON.stringify(arr, null, 2) +'</pre>'
					+'';

					$('.post_msg').html(msg);
					window.location.reload(true);   //to reload the page 
				}
			});
		}
		else
		{
			$('.post_msg').html('');
		}
		
	})	
	//--->save single field data > end




	//--->button > edit > start	
	$(document).on('click', '.btn_edit', function(event) 
	{
		event.preventDefault();
		var tbl_row = $(this).closest('tr');

		var row_id = tbl_row.attr('row_id');

		tbl_row.find('.btn_save').show();
		tbl_row.find('.btn_cancel').show();
		tbl_row.find('.btn_delete').show();

		//hide edit button
		tbl_row.find('.btn_edit').hide(); 

		//make the whole row editable
		tbl_row.find('.row_data')
		.attr('contenteditable', 'true')
		.attr('edit_type', 'button')
		.addClass('editinfo')
		.css('padding','3px')

		//--->add the original entry > start
		tbl_row.find('.row_data').each(function(index, val) 
		{  
			//this will help in case user decided to click on cancel button
			$(this).attr('original_entry', $(this).html());
		}); 		
		//--->add the original entry > end

	});
	//--->button > edit > end





	//--->button > cancel > start	
	$(document).on('click', '.btn_cancel', function(event) 
	{
		event.preventDefault();

		var tbl_row = $(this).closest('tr');

		var row_id = tbl_row.attr('row_id');

		//hide save and cacel buttons
		tbl_row.find('.btn_save').hide();
		tbl_row.find('.btn_cancel').hide();
		tbl_row.find('.btn_delete').hide();

		//show edit button
		tbl_row.find('.btn_edit').show();

		//make the whole row editable
		tbl_row.find('.row_data')
		.attr('edit_type', 'click')
		.removeClass('editinfo')
		.css('padding','') 

		tbl_row.find('.row_data').each(function(index, val) 
		{   
			$(this).html( $(this).attr('original_entry') ); 
		});  
	});
	//--->button > cancel > end




	
	//--->save whole row entery > start	
	$(document).on('click', '.btn_save', function(event) 
	{
		event.preventDefault();
		var tbl_row = $(this).closest('tr');

		var row_id = tbl_row.attr('row_id');

		var user_id = tbl_row.attr('user_id');

		
		//hide save and cacel buttons
		tbl_row.find('.btn_save').hide();
		tbl_row.find('.btn_cancel').hide();
		tbl_row.find('.btn_delete').hide();

		//show edit button
		tbl_row.find('.btn_edit').show();


		//make the whole row editable
		tbl_row.find('.row_data')
		.attr('edit_type', 'click')
		.removeClass('editinfo')
		.css('padding','') 

		//--->get row data > start
		var arr = {}; 
		tbl_row.find('.row_data').each(function(index, val) 
		{   
			var col_name = $(this).attr('col_name');  
			var col_val  =  $(this).html();
			if(col_name=="date"){
				var otherform= col_val.split("-",3);
				var dat= otherform[2];
				var month= otherform[1];
				var year= otherform[0];

				var col_val= dat +'-' +month+'-'+year;
			}
			arr[col_name] = col_val;
		});
		//--->get row data > end

		//get row id value
		arr['row_id'] = row_id;

		arr['user_id'] = user_id;

		//out put to show
		$('.post_msg').html( '<pre class="bg-success">'+JSON.stringify(arr, null, 2) +'</pre>');

		//add call type for ajax call
		arr['call_type'] = 'row_entry';

		//call ajax api to update the database record
		$.post(ajax_url, arr, function(data) 
		{
			var d1 = JSON.parse(data);
			if(d1.status == "error")
			{
				var msg = ''
				+ '<h3>There was an error while trying to update your entry</h3>'
				+'<pre class="bg-danger">'+JSON.stringify(arr, null, 2) +'</pre>'
				+'';

				$('.post_msg').html(msg);
			}
			else if(d1.status == "success")
			{
				var msg = ''
				+ '<h3>Successfully updated your entry</h3>'
				+'<pre class="bg-success">'+JSON.stringify(arr, null, 2) +'</pre>'
				+'';

				$('.post_msg').html(msg);
				window.location.reload(true);   //to reload the page 
			}			
		});
	});
	//--->save whole row entery > end




	//Inserting new row
	$(document).on('click', '.btn_new_row', function(event) 
	{
		event.preventDefault();
		//create a random id
		var row_id = Math.random().toString(36).substr(2);

		var user_id = <?php echo $user_id; ?>
			
		//get table rows
		var tbl_row = $(document).find('.tbl_code_with_mark').find('tr');	 
		var tbl = '';
		tbl +='<tr row_id="'+row_id+'", user_id="'+user_id+'">';
			tbl +='<td><input type="date" id="currentdate" class="date new_row_data infodate" contenteditable="true" edit_type="click" col_name="date" required></td>';
			tbl +='<td ><div class="new_row_data purpose editinfo" contenteditable="true" edit_type="click" col_name="purpose"></div></td>';
			tbl +='<td ><select id="currentcategory" class="new_row_data category infodate"><option value="Food & Beverages">Food & Beverages</option><option value="Transport">Transport</option><option value="Stationary">Stationary</option><option value="Clothing">Clothing</option><option value="Cosmetics & Healthcare">Cosmetics & Healthcare</option><option value="Leisure">Leisure</option><option value="Electronics">Electronics</option><option value="Household">Household</option><option value="Other">Other</option></select></td>';
			tbl +='<td ><div class="new_row_data sum editinfo" contenteditable="true" edit_type="click" col_name="sum"></div></td>';

			//--->edit options > start
			tbl +='<td>';			 
				tbl +='  <a href="javascript:location.reload(true)" style="color: #47d147;" class="btn btn-link btn_new" row_id="'+row_id+'" > Add Entry</a>   | ';
				tbl +='  <a href="#" style="color: #e31717;" class="btn btn-link btn_remove_new_entry" row_id="'+row_id+'"> Remove</a> ';
			tbl +='</td>';
			//--->edit options > end	

		tbl +='</tr>';
		tbl_row.first().after(tbl);

		$(document).find('.tbl_code_with_mark').find('tr').first().find('.purpose').focus();

	});



	


	$(document).on('click', '.btn_remove_new_entry', function(event) 
	{
		event.preventDefault();

		$(this).closest('tr').remove();
	});




	function alert_msg (msg)
	{
		return '<span class="alert_msg text-danger">'+msg+'</span>';
	}




	//Saving new row
	$(document).on('click', '.btn_new', function(event) 
	{
		event.preventDefault();
		
		var ele_this = $(this);
		var ele = ele_this.closest('tr');
		
		//remove all old alerts
		ele.find('.alert_msg').remove();

		//get row id
		var row_id = $(this).attr('row_id');

		var user_id = <?php echo $user_id; ?>;

		//get field names
		var date = document.getElementById("currentdate").value;
		var purpose = ele.find('.purpose');
		var category = document.getElementById("currentcategory").value;
		var sum = ele.find('.sum');


		if(date =="")
		{
			currentdate.focus();
			currentdate.after(alert_msg('Enter the date'));
		}
		if(purpose.html() == "")
		{
			purpose.focus();
			purpose.after(alert_msg('Enter the purpose'));
		}
		else if(category == "")
		{
			currentcategory.focus();
			currentcategory.after(alert_msg('Enter the category'));
		}
		else if(sum.html() == "")
		{
			sum.focus();
			sum.after(alert_msg('Enter the sum'));
		}
		else
		{
			var data_obj=
			{
				call_type:'new_row_entry',
				row_id:row_id,
				user_id:user_id,
				date:date,
				purpose:purpose.html(),
				category:category,
				sum:sum.html(),
			};	
			
			ele_this.html('<p class="editinfo">Please wait.... adding your new row</p>');

			$.post(ajax_url, data_obj, function(data) 
			{
				var d1 = JSON.parse(data);
				var tbl = '';
				tbl +='<a href="#" class="btn btn-link btn_edit" row_id="'+row_id+'" > Edit</a>';
				tbl +='<a href="#" class="btn btn-link btn_save"  row_id="'+row_id+'" style="display:none;"> Save</a>';
				tbl +='<a href="#" class="btn btn-link btn_cancel" row_id="'+row_id+'" style="display:none;"> Cancel</a>';
				tbl +='<a href="#" class="btn btn-link text-warning btn_delete" row_id="'+row_id+'" style="display:none;" > Delete</a>';

				if(d1.status == "error")
				{
					var msg = ''
					+ '<h3>There was an error while trying to add your entry</h3>'
					+'<pre class="bg-danger">'+JSON.stringify(data_obj, null, 2) +'</pre>'
					+'';

					$('.post_msg').html(msg);
				}
				else if(d1.status == "success")
				{
					ele_this.closest('td').html(tbl);
					ele.find('.new_row_data').removeClass('editinfo');
					ele.find('.new_row_data').toggleClass('new_row_data row_data');
					window.location.reload(true);   //to reload the page 
				}
			});
		}
	});



	//Deleting a row
	$(document).on('click', '.btn_delete', function(event) 
	{
		event.preventDefault();

		var ele_this = $(this);
		var row_id = ele_this.attr('row_id');
		var data_obj=
		{
			call_type:'delete_row_entry',
			row_id:row_id,
		};	
		 		 
		ele_this.html('<p class="bg-warning">Please wait....deleting your entry</p>')
		$.post(ajax_url, data_obj, function(data) 
		{ 
			var d1 = JSON.parse(data); 
			if(d1.status == "error")
			{
				var msg = ''
				+ '<h3>There was an error while trying to add your entry</h3>'
				+'<pre class="bg-danger">'+JSON.stringify(data_obj, null, 2) +'</pre>'
				+'';

				$('.post_msg').html(msg);
			}
			else if(d1.status == "success")
			{
				ele_this.closest('tr').css('background','red').slideUp('slow');	
				window.location.reload(true);   //to reload the page 			 
			}
		});
	});
 
	
});
</script>


 <header id="header" class="header">

    <nav class="navigation">

      <section class="logo"></section>

      <section id="close_but" class="navigation__icon" onclick="nav_open();">
        <span class="topBar"></span>
        <span class="middleBar"></span>
        <span class="bottomBar"></span>
      </section>

      <ul class="navigation__ul">
        <li><a href="add_cash.php">ADD CASH</a></li>
        <li><a href="add_savings.php">ADD SAVINGS</a></li>
        <li><a href="contact.php">CONTACT US</a></li>
      </ul>

      <section class="navigation__social">
        <ul class="navigation__social-ul">
          <li>
            <a href="" class="social-icon"></a>
          </li>
          <li>
            <a href="" class="social-icon"></a>
          </li>
          <li>
            <a href="" class="social-icon"></a>
          </li>
          <li>
            <a href="" class="social-icon"></a>
          </li>
        </ul>
      </section>

    </nav>

  </header>




  <div id="all">
  	<div class="container1">
  		<div class="box">
  			<div class="icon"><i class="far fa-money-bill-alt"></i></div>
  			<div class="content">
  				<br>
  				<h1>Balance</h1>
  				<br>
  				<p style="font-size: 50px;">
  					<?php 

  					$username = $_SESSION["username"];
  					$query = mysqli_query ($conn, "SELECT id FROM users WHERE username ='$username'");
  					$row = mysqli_fetch_array($query);
  					$user_id = $row["id"];

  					$total   = "SELECT SUM(sum) AS 'TOTAL' FROM transactions WHERE (user_id='$user_id');";
  					$balance = "SELECT balance FROM users WHERE id='$user_id';";

  					$result  = mysqli_query($conn, $balance);
  					$sum  	 = mysqli_fetch_array($result);
  					$SUM     = $sum["balance"];

  					$result2  = mysqli_query($conn, $total);
  					$total_val= mysqli_fetch_array($result2);
  					$total_all= $total_val["TOTAL"];

  					$remaining= ($SUM)-($total_all);

  					if($remaining)
  					{
  						echo "₹ ". $remaining;
  					}
  					else
  					{
  						echo "₹ 0";
  					}


  					?>
  				</p>
  			</div>
  		</div>
  	</div>



  	<div class="containerother">
  		<div class="box">
  			<div class="icon"><i class="fas fa-utensils"></i></div>
  			<div class="content">
  				<h3>Food & Beverages</h3>
  				<p>
  					<?php 
  					$username = $_SESSION["username"];
  					$query = mysqli_query ($conn, "SELECT id FROM users WHERE username ='$username'");
  					$row = mysqli_fetch_array($query);
  					$user_id = $row["id"];

  					$total = "SELECT SUM(sum) AS 'TOTAL' FROM transactions WHERE (user_id='$user_id') AND ((category='Food &amp; Beverages') OR (category='Food & Beverages'));";
  					$result  = mysqli_query($conn, $total);
  					$total_val 	 = mysqli_fetch_array($result);
  					$SUM     = $total_val["TOTAL"];

  					if($SUM)
  					{
  						echo "₹ ". $SUM;
  					}
  					else
  					{
  						echo "₹ 0";
  					}

  					?>
  					
  				</p>
  			</div>
  		</div>

  		<div class="box">
  			<div class="icon"><i class="fas fa-subway"></i></div>
  			<div class="content">
  				<h3>Transport</h3>
  				<p>
  					<?php 
  					$username = $_SESSION["username"];
  					$query = mysqli_query ($conn, "SELECT id FROM users WHERE username ='$username'");
  					$row = mysqli_fetch_array($query);
  					$user_id = $row["id"];

  					$total = "SELECT SUM(sum) AS 'TOTAL' FROM transactions WHERE (user_id='$user_id') AND (category='Transport');";
  					$result  = mysqli_query($conn, $total);
  					$total_val 	 = mysqli_fetch_array($result);
  					$SUM     = $total_val["TOTAL"];

  					if($SUM)
  					{
  						echo "₹ ". $SUM;
  					}
  					else
  					{
  						echo "₹ 0";
  					}

  					?>
  				</p>
  			</div>
  		</div>

  		<div class="box">
  			<div class="icon"><i class="fas fa-pencil-ruler"></i></div>
  			<div class="content">
  				<h3>Stationary</h3>
  				<p>
  					<?php 
  					$username = $_SESSION["username"];
  					$query = mysqli_query ($conn, "SELECT id FROM users WHERE username ='$username'");
  					$row = mysqli_fetch_array($query);
  					$user_id = $row["id"];

  					$total = "SELECT SUM(sum) AS 'TOTAL' FROM transactions WHERE (user_id='$user_id') AND (category='Stationary');";
  					$result  = mysqli_query($conn, $total);
  					$total_val 	 = mysqli_fetch_array($result);
  					$SUM     = $total_val["TOTAL"];

  					if($SUM)
  					{
  						echo "₹ ". $SUM;
  					}
  					else
  					{
  						echo "₹ 0";
  					}

  					?>
  				</p>
  			</div>
  		</div>

  		<div class="box">
  			<div class="icon"><i class="fas fa-tshirt"></i></div>
  			<div class="content">
  				<h3>Clothing</h3>
  				<p>
  					<p>
  					<?php 
  					$username = $_SESSION["username"];
  					$query = mysqli_query ($conn, "SELECT id FROM users WHERE username ='$username'");
  					$row = mysqli_fetch_array($query);
  					$user_id = $row["id"];

  					$total = "SELECT SUM(sum) AS 'TOTAL' FROM transactions WHERE (user_id='$user_id') AND (category='Clothing');";
  					$result  = mysqli_query($conn, $total);
  					$total_val 	 = mysqli_fetch_array($result);
  					$SUM     = $total_val["TOTAL"];

  					if($SUM)
  					{
  						echo "₹ ". $SUM;
  					}
  					else
  					{
  						echo "₹ 0";
  					}

  					
  					?>
  				</p>
  			</div>
  		</div>

  		<div class="box">
  			<div class="icon"><i class="fas fa-smile-beam"></i></div>
  			<div class="content">
  				<h3 style="font-size: 15px;">Cosmetics & Healthcare</h3>
  				<p>
  					<p>
  					<?php 
  					$username = $_SESSION["username"];
  					$query = mysqli_query ($conn, "SELECT id FROM users WHERE username ='$username'");
  					$row = mysqli_fetch_array($query);
  					$user_id = $row["id"];

  					$total = "SELECT SUM(sum) AS 'TOTAL' FROM transactions WHERE (user_id='$user_id') AND ((category='Cosmetics &amp; Healthcare') OR (category='Cosmetics & Healthcare'));";
  					$result  = mysqli_query($conn, $total);
  					$total_val 	 = mysqli_fetch_array($result);
  					$SUM     = $total_val["TOTAL"];

  					if($SUM)
  					{
  						echo "₹ ". $SUM;
  					}
  					else
  					{
  						echo "₹ 0";
  					}

  					
  					?>
  				</p>
  			</div>
  		</div>

  		<div class="box">
  			<div class="icon"><i class="fas fa-home"></i></div>
  			<div class="content">
  				<h3 style="font-size: 15px;">Household</h3>
  				<p>
  					<p>
  					<?php 
  					$username = $_SESSION["username"];
  					$query = mysqli_query ($conn, "SELECT id FROM users WHERE username ='$username'");
  					$row = mysqli_fetch_array($query);
  					$user_id = $row["id"];

  					$total = "SELECT SUM(sum) AS 'TOTAL' FROM transactions WHERE (user_id='$user_id') AND (category='Household');";
  					$result  = mysqli_query($conn, $total);
  					$total_val 	 = mysqli_fetch_array($result);
  					$SUM     = $total_val["TOTAL"];

  					if($SUM)
  					{
  						echo "₹ ". $SUM;
  					}
  					else
  					{
  						echo "₹ 0";
  					}

  					
  					?>
  				</p>
  			</div>
  		</div>

  		<div class="box">
  			<div class="icon"><i class="fas fa-charging-station"></i></div>
  			<div class="content">
  				<h3 style="font-size: 15px;">Electronics</h3>
  				<p>
  					<p>
  					<?php 
  					$username = $_SESSION["username"];
  					$query = mysqli_query ($conn, "SELECT id FROM users WHERE username ='$username'");
  					$row = mysqli_fetch_array($query);
  					$user_id = $row["id"];

  					$total = "SELECT SUM(sum) AS 'TOTAL' FROM transactions WHERE (user_id='$user_id') AND (category='Electronics');";
  					$result  = mysqli_query($conn, $total);
  					$total_val 	 = mysqli_fetch_array($result);
  					$SUM     = $total_val["TOTAL"];

  					if($SUM)
  					{
  						echo "₹ ". $SUM;
  					}
  					else
  					{
  						echo "₹ 0";
  					}

  					
  					?>
  				</p>
  			</div>
  		</div>

  		<div class="box">
  			<div class="icon"><i class="fas fa-feather-alt"></i></i></div>
  			<div class="content">
  				<h3 style="font-size: 15px;">Other</h3>
  				<p>
  					<p>
  					<?php 
  					$username = $_SESSION["username"];
  					$query = mysqli_query ($conn, "SELECT id FROM users WHERE username ='$username'");
  					$row = mysqli_fetch_array($query);
  					$user_id = $row["id"];

  					$total = "SELECT SUM(sum) AS 'TOTAL' FROM transactions WHERE (user_id='$user_id') AND (category='Other');";
  					$result  = mysqli_query($conn, $total);
  					$total_val 	 = mysqli_fetch_array($result);
  					$SUM     = $total_val["TOTAL"];

  					if($SUM)
  					{
  						echo "₹ ". $SUM;
  					}
  					else
  					{
  						echo "₹ 0";
  					}

  					
  					?>
  				</p>
  			</div>
  		</div>
  	</div>


  	<div class="container" style="margin-left: 160px;">

  		<div style="padding:5px;"></div>

  		<div class="panel panel-default">
  			&nbsp;
  			<div class="panel-heading text-center"><h3 style="color: white;"> Recent Transactions </h3> </div>
  			&nbsp;

  			<div class="panel-body">

  				<div class="tbl_user_data"></div>

  			</div>

  		</div>



  		<!-- <div class="panel panel-default">
  			<div class="panel-heading"><b>HTML Table Edits/Upates</b> </div>

  			<div class="panel-body">

  				<p>All the changes will be displayed below</p>
  				<div class="post_msg"> </div>

  			</div>
  		</div> -->
  	</div>

  </div>


</body>
</html>