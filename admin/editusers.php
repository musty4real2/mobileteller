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
            
            <h1 class="page-title">Edit  User Detail (s)</h1>
        </div>
                     <ul class="breadcrumb">
            <li><?php echo "<a href='admin_menu.php?id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief'>Home</a> "; ?><span class='divider'>/</span></li>
            <li><?php echo "<a href='viewusers.php?id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief'>View Users</a>"; ?> </li>
        </ul>

 

        <div class="container-fluid">
        <?php

if(isset($_POST['a'])){
	
$name=mysql_real_escape_string($_POST['name']);	
$address=mysql_real_escape_string($_POST['address']);	
$phone_number=mysql_real_escape_string($_POST['phone_number']);	
$username=mysql_real_escape_string($_POST['username']);	
$password=mysql_real_escape_string($_POST['password']);	
$confirmpass=mysql_real_escape_string($_POST['confirmpass']);	
$dept=mysql_real_escape_string($_POST['dept']);	

if($name==""){$error[]="Please specify name";}
if($address==""){$error[]="Please specify address";}
if($phone_number==""){$error[]="Please specify Phone number";}
if($dept==""){$error[]="Please specify staff department";}
if($username==""){$error[]="Please specify username, it is required and cannot be empty";}
if($password==""){$error[]="Please specify password, it is required and cannot be empty";}
if($confirmpass!=$password){$error[]="the two passwords do not match each other";}

	if(!empty($error)){
		echo "<div class='alert alert-info'><strong>Oops! ERROR:</strong></div>";
		foreach($error as $oops){
			echo "<div class='alert alert-info'><strong>$oops</strong></div>";
			}//foreach loop
		}//if !empty error

		//if $error variable is empty, continue with the script
		elseif(empty($error)){
			
			$sql=mysql_query("UPDATE `users` SET `name`='$name', `address`='$address', `phone_number`='$phone_number', `username`='$username', `password`='$password', `dept`='$dept' WHERE `id`='{$_GET['editid']}' LIMIT 1");

			if($sql){
			
		header("location:viewusers.php?msg=User Record has been succesfully edited&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief");
			}
			else{
				
				echo "There was a proble inserting or creating these user please check";
				
			}
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
      <li class="active"><a href="#home" data-toggle="tab">You are about to edit a new user profile</a></li>
      <li></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
      
      <?php
	  $selectedit=$object->fetchRecord($_GET['editid'], "users");
while($row=mysql_fetch_array($selectedit)){

	  
	  ?>
    <form id="tab" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
        <label>Name</label>
        <input type="text" class="input-xlarge" name="name" value="<?php if($row['name']){echo $row['name']; } ?>" autocomplete="off">
        <label>Address</label>
       <textarea name="address" value=""><?php if($row['address']){echo $row['address']; } ?></textarea>
        <label>phone Number</label>
        <input type="text" class="input-xlarge" name="phone_number" autocomplete="off" value="<?php if($row['phone_number']){echo $row['phone_number']; } ?>">
        <label>Username</label>
        <input type="text"  class="input-xlarge" name="username" autocomplete="off" value="<?php if($row['username']){echo $row['username']; } ?>">
        <label>Employee Department</label>
        <input type="text" class="input-xlarge"  autocomplete="off" name="dept" value="<?php if($row['dept']){echo $row['dept']; } ?>">
<label>Password</label>
        <input type="text"  autocomplete="off" class="input-xlarge" name="password" value="<?php if($row['password']){echo $row['password']; } ?>">
        <label>Confirm Password</label>
        <input type="text" autocomplete="off" class="input-xlarge" name="confirmpass" value="<?php if($row['password']){echo $row['password']; } ?>">
        <br/>
        <br/>
        <input type="submit"  class="btn btn-primary" value="SAVE" name="a"/>
    </form>
    <?php } ?>
      </div>

      </div>
  </div>

</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Confirmation</h3>
  </div>
  <div class="modal-body">
    
    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-danger" data-dismiss="modal">Delete</button>
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

}
ob_flush();


?>