<?php
ob_start();
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include("../connect.php");
include("class.php");
$object=new mobile();

//fetch staff record
$set=$object->fetchRecord($_GET['id'], "users");
while($st=mysql_fetch_array($set)){

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Mobile Teller Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>

    <!-- Demo page code -->

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
  <!--<![endif]-->
    
    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> <?php echo $st['name'];?>
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><?php echo "<a tabindex='-1' href='myaccount.php?id={$_GET['id']}'>My Account</a>"; ?></li>
                            <li class="divider"></li>
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="sign-in.html">Logout</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="index.html"><span class="first">Mobile</span> <span class="second">Teller</span></a>
        </div>
    </div>
    


    
    <div class="sidebar-nav">

        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Menu/Dashboard</a>
        <ul id="dashboard-menu" class="nav nav-list collapse in">
            <li><?php echo "<a href='admin_menu.php?id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief'>Home</a>"; ?> </li>
            <li ><a href="#">Logout</a></li>            
        </ul>

        <a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Account<span class="label label-info">+3</span></a>
        <ul id="accounts-menu" class="nav nav-list collapse">
            <li ><a href="sign-in.html">Sign In</a></li>
            <li ><a href="sign-up.html">Register a Client/Sign Up</a></li>
        </ul>
    </div>
    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Smart Save Subcription Form</h1>
        </div>
        
  <ul class="breadcrumb">
            <li><?php echo "<a href='admin_menu.php?id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief'>Home</a>"; ?><span class="divider">/</span></li>
            <li class="active">Admin Menu</li>
        </ul>

        <div class="container-fluid">
        <?php
if(isset($_POST['a'])){

	
$title=mysql_real_escape_string($_POST['title']);	
$surname=mysql_real_escape_string($_POST['surname']);	
$firstname=mysql_real_escape_string($_POST['firstname']);
$middle_name=mysql_real_escape_string($_POST['middlename']);
$sex=mysql_real_escape_string($_POST['sex']);
$tribe=mysql_real_escape_string($_POST['tribe']);
$stateoforigin=mysql_real_escape_string($_POST['stateoforigin']);
$maritalstatus=mysql_real_escape_string($_POST['maritalstatus']);
$phone_number=mysql_real_escape_string($_POST['phone_number']);
$address=mysql_real_escape_string($_POST['address']);
$bizaddress=mysql_real_escape_string($_POST['bizaddress']);	
$biztype=mysql_real_escape_string($_POST['biztype']);
$target=mysql_real_escape_string($_POST['target']);
$bank=mysql_real_escape_string($_POST['bank']);
$accno=mysql_real_escape_string($_POST['accno']);
$introducedby=mysql_real_escape_string($_POST['introducedby']);
$introducerphone=mysql_real_escape_string($_POST['introducerphone']);
$accname=mysql_real_escape_string($_POST['accname']);

$staffid=mysql_real_escape_string($_POST['staffid']);
$p=$_FILES['passport']['name'];
$p2=$_FILES['sign']['name'];
$day=$_POST['day'];
$year=$_POST['year'];
$month=$_POST['month'];

$surname=strtolower($surname);
$firstname=strtolower($firstname);
$middle_name=strtolower($middle_name);
$address=strtolower($address);
$accname=strtolower($accname);
$introducedby=strtolower($introducedby);
$bank=strtolower($bank);
$stateoforigin=strtolower($stateoforigin);
$bizaddress=strtolower($bizaddress);
$tribe=strtolower($tribe);
$title=strtolower($title);
$biztype=strtolower($biztype);
		if(empty($surname)){$error[]="Surname is required";}
		if(empty($firstname)){$error[]="Firstname is required";}
		if(empty($stateoforigin)){$error[]="State of Origin is required";}
		if(empty($title)){$error[]="Title is required";}
		if(empty($address)){$error[]="Address is required";}
		if(empty($bank)){$error[]="Bank name is required";}
		if(empty($accno)){$error[]="Account number is required";}
		if(empty($target)){$error[]="Daily Target is required";}
		if(empty($introducerphone)){$error[]="introducers phone number is required";}
		if(empty($introducedby)){$error[]="introduced by is required";}
		if(empty($maritalstatus)){$error[]="Marital status is required";}
		if(empty($sex)){$error[]="Sex is required";}
		if(empty($phone_number)){$error[]="Phone Number is required";}

		if(empty($tribe)){$error[]="Tribe is required";}
		if(empty($bizaddress)){$error[]="Business Address is required";}
		if(empty($biztype)){$error[]="Business type is required";}
		
		if(empty($day)){$error[]="Day is required  for suscribers Date of Birth";}
		if(empty($month)){$error[]="Month is required  for suscribers Date of Birth";}
		if(empty($year)){$error[]="Year is required for suscribers Date of Birth";}

		if(!empty($accno) and strlen($accno)!=10){$error[]="Account number must be ten (10) digits.";}
		
	

$dob="$year-$month-$day";


		
	if(!empty($error)){
		echo "<div class='alert alert-info'><strong>Oops! ERROR:</strong></div>";
		foreach($error as $oops){
			echo "<div class='alert alert-info'><strong>$oops</strong></div>";
			}//foreach loop
		}//if !empty error

		//if $error variable is empty, continue with the script
		elseif(empty($error)){
			
			$sql=mysql_query("INSERT INTO `suscriber` (`staff_id`, `title`, `surname`, `first_name`, `middle_name`, `dob`, `sex`, `tribe`, `state_of_origin`, `marital_status`, `phone_number`, `residential_address`, `business_address`, `business_type`, `saving_target`, `bank_name`, `account_name`, `account_number`, `introducedby`, `introducers_phone`, `passport`, `signature`, `entry_date`,`balance`) VALUES ('$staffid', '$title', '$surname', '$firstname', '$middle_name', '$dob', '$sex', '$tribe', '$stateoforigin', '$maritalstatus', '$phone_number', '$address', '$bizaddress', '$biztype', '$target', '$bank', '$accname', '$accno', '$introducedby', '$introducerphone', '', '', NOW(),'0')");
$id=mysql_insert_id($connection);
			if($sql){
			
		header("location:added+confirm.php?msg=User has been succesfully created&id={$_GET['id']}&noble=noble&thief=thief&confirmid=$id&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief");
			}
			else{
				
				echo "There was a proble inserting or creating these user please check";
				
			}
			

$path = "../photo/";

	$valid_formats = array("jpg", "png", "gif", "bmp");
			$name1 = $_FILES['passport']['name'];
			$size1 = $_FILES['passport']['size'];
			
	
	
	
			if(strlen($name1))
				{
					list($txt, $ext) = explode(".", $name1);
					if(in_array($ext,$valid_formats))
					{
					if($size1<(1024*1024))
						{
							$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							$tmp = $_FILES['passport']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
									
		$object->query("UPDATE  `suscriber` SET  `passport`='$actual_image_name' WHERE `id`='$id'");
								}
							else
								header("location:quick+save+subscription+form.php?id={$_GET['id']}&status=Failed to Upload Image");
						}
						else
						header("location:quick+save+subscription+form.php?id={$_GET['id']}&status=Image file size too large:  maximum size 1 MB");					
						}
						else
						header("location:quick+save+subscription+form.php?id={$_GET['id']}&status=Invalid file format. Please Upload a jpg, gif or png image");	
				}
				
			else{
				header("location:quick+save+subscription+form.php?id={$_GET['id']}&status=Please select image to upload!");
			}
		
//++++++++++++++++++++=========================UPLOAD LOGO +============================================
//++++++++++++++++++++=========================UPLOAD LOGO +============================================
//++++++++++++++++++++=========================UPLOAD LOGO +============================================
//++++++++++++++++++++=========================UPLOAD LOGO +============================================



//redirec

			$name2 = $_FILES['sign']['name'];
			$size2 = $_FILES['sign']['size'];
			
	
	
	
			if(strlen($name2))
				{
					list($txt, $ext) = explode(".", $name2);
					if(in_array($ext,$valid_formats))
					{
					if($size2<(1024*1024))
						{
							$actual_image_name2 = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							$tmp = $_FILES['sign']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_image_name2))
								{
									
		$object->query("UPDATE  `suscriber` SET  `signature`='$actual_image_name2' WHERE `id`='$id'");
								}
							else
								header("location:quick+save+subscription+form.php?id={$_GET['id']}&status=Failed to Upload Image");
						}
						else
						header("location:quick+save+subscription+form.php?id={$_GET['id']}&status=Image file size too large:  maximum size 1 MB");					
						}
						else
						header("location:quick+save+subscription+form.php?id={$_GET['id']}&status=Invalid file format. Please Upload a jpg, gif or png image");	
				}
				
			else{
				header("location:quick+save+subscription+form.php?id={$_GET['id']}&status=Please select image to upload!");
			}
		
//++++++++++++++++++++=========================UPLOAD LOGO +============================================
//++++++++++++++++++++=========================UPLOAD LOGO +============================================
//++++++++++++++++++++=========================UPLOAD LOGO +============================================
//++++++++++++++++++++=========================UPLOAD LOGO +============================================



//redirec
		
					}
}
?>

            <div class="row-fluid">
                    
<div class="btn-toolbar">

  <div class="btn-group">
  </div>
</div>
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">You are about to create a new account for a new subscriber to mobile teller </a></li>
      <li></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
    <form id="tab" action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
    <table class="table">
    <input type="hidden" name="staffid" value="<?php echo $_GET['id']; ?>"/>
    <tr><td>
        <label>Title:</label>
        <input type="text" class="input-xlarge" name="title" value="<?php if($_POST['title']){echo $_POST['title']; } ?>" autocomplete="off"></td><td><label>Passport:</label><input type="file" name="passport"/></td></tr>
        
       <tr><td>
        <label>Surname:</label>
        <input type="text" class="input-xlarge" name="surname" value="<?php if($_POST['surname']){echo $_POST['surname']; } ?>" autocomplete="off"></td><td> <label>Firstname:</label>  <input type="text" class="input-xlarge" name="firstname" value="<?php if($_POST['firstname']){echo $_POST['firstname']; } ?>" autocomplete="off"></td></tr>
        
               <tr><td>
        <label>Middle name:</label>
        <input type="text" class="input-xlarge" name="middlename" value="<?php if($_POST['middlename']){echo $_POST['middlename']; } ?>" autocomplete="off"></td><td> 
        <label>Date of Birth:</label>  <select name="day" class="input-xlarge" id="DropDownTimezone" >
          <option value="" selected="selected">Day</option>
          <option  value="">-------</option>
          
          <?php
	  $days=range(1, 31);
	  foreach($days as $d){
		  echo "<option value='$d'>$d</option>";
		  
		  }
	  ?>
          <?php if($_POST['day']){echo "<option value='{$_POST['day']}' selected='selected'>{$_POST['day']}</option>";}
	  ?>
          </select>
      
        <select name="month" class="input-xlarge" id="DropDownTimezone" >
          <option value="" selected="selected">Month</option>
          <option  value="">-------</option>
          <?php
	  $mon=array("1"=>"January", "2"=>"Febraury", "3"=>"March", "4"=>"April", "5"=>"May", "6"=>"June", "7"=>"July", "8"=>"August", "9"=>"September", "10"=>"October", "11"=>"November", "12"=>"December");
	  foreach($mon as $key=>$value){
		  echo "<option value='$key'>$value</option>";
		  
		  }
	  ?>     
          <?php if($_POST['month']){echo "<option value='{$_POST['month']}' selected='selected'>{$_POST['month']}</option>";}
	  ?>
          
          </select>
     
        <select name="year" id="DropDownTimezone"  class="input-xlarge">
          <option value="" selected="selected">Year</option>
          <option  value="">-------</option>
          <?php
	  $days=range(1900, 2050);
	  foreach($days as $d){
		  echo "<option value='$d'>$d</option>";
		  
		  }
	  ?>
          <?php if($_POST['year']){echo "<option value='{$_POST['year']}' selected='selected'>{$_POST['year']}</option>";}
	  ?>
          
          </select>
        </td></tr>
        
        
               <tr><td>
        <label>Gender:</label>
        Male:<input type="radio" class="input-xlarge" name="sex" value="male" <?php if($_POST['sex']=="male"){echo "checked='checked'"; } ?>/>&nbsp;&nbsp;&nbsp;&nbsp;Female:<input type="radio" class="input-xlarge" name="sex" value="female" <?php if($_POST['maritalstatus']=="female"){echo "checked='checked'"; } ?>></td><td> <label>Tribe:</label>  <input type="text" class="input-xlarge" name="tribe" value="<?php if($_POST['tribe']){echo $_POST['tribe']; } ?>" autocomplete="off"></td></tr>
        
        
        <tr><td> <label>State of origin:</label>  <select class="smallInput" name="stateoforigin">
        <option value="">select</option>
        <option value="">..................</option>
        <?php
      $states=array('Abia', 'Adamawa',  'Adamawa','Akwa-Ibom', 'Anambra',
					' Bauchi',' Bayelsa', 'Benue','Borno', 'Cross River', 
					'Delta', 'Ebonyi', 'Edo','Ekiti','Enugu',  'Gombe', 
					'Imo','Jigawa','Kaduna', 'Kano', 'Katsina','Kebbi','Kogi','Kwara',
					'Lagos','Nasarawa','Niger','Ogun','Ondo','Osun','Oyo', 'Plateau','Rivers',
					'Sokoto','Taraba','Yobe','Zamfara', 'Abuja');
	  foreach($states as $key => $stat){
		  echo "<option value='$stat'>$stat</option>";
		  }
  

	
      
      ?>
        <?php if($_POST['stateoforigin']){echo "<option  value='{$_POST['stateoforigin']}' selected='selected'>{$_POST['stateoforigin']}</option>"; }?>
        </select></td><td>
        <label>Marital Status:</label>
        Single:<input type="radio" class="input-xlarge" name="maritalstatus" value="single" <?php if($_POST['maritalstatus']=="single"){echo "checked='checked'"; } ?>/>&nbsp;&nbsp;&nbsp;&nbsp;Married:<input type="radio" class="input-xlarge" name="maritalstatus" value="married" <?php if($_POST['maritalstatus']=="married"){echo "checked='checked'"; } ?>/>&nbsp;&nbsp;&nbsp;&nbsp;Divorced:<input type="radio" class="input-xlarge" name="maritalstatus" value="divorced" <?php if($_POST['maritalstatus']=="divorced"){echo "checked='checked'"; } ?>/></td></tr>
        <tr><td>
        <label>phone Number:</label>
        <input type="text" class="input-xlarge" name="phone_number" autocomplete="off" value="<?php if($_POST['phone_number']){echo $_POST['phone_number']; } ?>"></td><td>
        <label>Residential Address:</label>
       <textarea name="address" value=""><?php if($_POST['address']){echo $_POST['address']; } ?></textarea>
        </td></tr>
        <tr>
        <td>
        <label>Business Address:</label>
       <textarea name="bizaddress" value=""><?php if($_POST['bizaddress']){echo $_POST['bizaddress']; } ?></textarea>
        </td><td>
        <label>Business Type:</label>
        <input type="text" class="input-xlarge" name="biztype" autocomplete="off" value="<?php if($_POST['biztype']){echo $_POST['biztype']; } ?>"></td></tr>
        
        <tr><td colspan="2"><center><strong style="color:#F00;">Subscribers Bank Details</strong></center></td></tr>
        <tr>
        <td>
        <label>Savings Target Per Day:</label>
        <input type="text" class="input-xlarge" name="target" autocomplete="off" value="<?php if($_POST['target']){echo $_POST['target']; } ?>"></td><td>
        <label>Bank:</label>
        <select name="bank" id="bank" class="input-text">
        <option value="">select</option>
        <option value="">---------</option>
        <?php
			include("connect.php");
	  $ask="SELECT * FROM `bank` ORDER BY `name` ASC";
	  if(!$ask=mysql_query($ask)){
		  echo "<option value=''>No Banks available".mysql_error()."</option>";
		  }
		
		  while($row=mysql_fetch_array($ask)){
			  echo "<option value='{$row['name']}'>{$row['name']}</option>";
			  }
	  
	  ?>
        <?php if($_POST['name']){echo "<option  value='{$_POST['name']}' selected='selected'>{$_POST['name']}</option>"; }?>
      </select></td></tr>
        
        
           <tr>
        <td>
        <label>Account Name:</label>
        <input type="text" class="input-xlarge" name="accname" autocomplete="off" value="<?php if($_POST['accname']){echo $_POST['accname']; } ?>"></td><td>
        <label>Account No:</label>
        <input type="text"  class="input-xlarge" name="accno" autocomplete="off" value="<?php if($_POST['accno']){echo $_POST['accno']; } ?>"></td></tr>  
        
        
                   <tr>
        <td>
        <label>Introduced By:</label>
        <input type="text" class="input-xlarge" name="introducedby" autocomplete="off" value="<?php if($_POST['introducedby']){echo $_POST['introducedby']; } ?>"></td><td>
        <label>Introducer's Phone No:</label>
        <input type="text"  class="input-xlarge" name="introducerphone" autocomplete="off" value="<?php if($_POST['introducerphone']){echo $_POST['introducerphone']; } ?>"></td></tr>
        <tr>
        <td>&nbsp;</td>
        <td><label>Suscriber's Signature/Date:</label><input type="file" name="sign"/></td></tr>
        
       
        <br/>
       <tr><td colspan="2">  <input type="submit"  class="btn btn-primary" value="Create User" name="a"/>
</td>
    </table></form>
      </div>

      </div>
  </div>

</div>
                    <footer>
                        <hr>
                         <p class="pull-right"><a href="#" target="_blank">powered by</a> by <a href="#" target="_blank">mustymeena</a></p>
                        

                        <p>&copy; 2014 <a href="http://www.jobconnectng.org" target="_blank">jobconnect nigeria</a></p>
                    </footer>
                    
            </div>
        </div>
    </div>
    


    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  </body>
</html>


<?php

		

}//if form submitted

ob_flush();


?>