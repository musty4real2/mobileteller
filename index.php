<?php
ob_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
session_start();
include("class.php");
include("connect.php");
$object=new mobile();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Mobile Teller</title>
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
                    
                </ul>
                <a class="brand" href="index.html"><span class="first">Mobile</span> <span class="second">Teller</span></a>
        </div>
    </div>
    


    

    
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">Sign in as an administrator</p>
            <div class="block-body">
           <?php   
          if ($_POST['submit']){
			  
		  $username=$_POST['username'];
		  $password=$_POST['password'];
		  
		  $fetch=$object->query("SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'");
		  
		  //if user exist
		  if(mysql_num_rows($fetch)!=0){
			
			//inside this block means user exists
			
			//fetch user details from dbase query
			while($row=mysql_fetch_array($fetch)){
				$di=$row['id'];
				$uname=$row['username'];
				$pword=$row['password'];
				$dept=$row['dept'];
			
			
			
//***********************************************************************************************************************				
			//Now check using username and department to redirect this user
			if($dept=='admin'){
				//create session
				$_SESSION['admin']=1;
				//redirect

										header("location:admin/admin_menu.php?bill=oops&id=$di&wildcat=empty&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief");

				
			}
			//IF department
					if($dept=='subadmin1'){
				//create session
				$_SESSION['admin']=1;
				//redirect

										header("location:subadmin1/admin_menu.php?bill=oops&id=$di&wildcat=empty&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief");

				
			}
					if($dept=='operator'){
				//create session
				$_SESSION['admin']=1;
				//redirect

										header("location:operator/admin_menu.php?bill=oops&id=$di&wildcat=empty&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief");

				
			}//IF department
			
				if($dept=='cashier'){
				//create session
				$_SESSION['cashier']=1;
				//redirect
				header("location:cashier/menu.php");
					

			}//IF department
			
					
				if($dept=='cashier'){
				//create session
				$_SESSION['cashier']=1;
				//redirect
				header("location:customercare/menu.php");
					

			}//IF department
			}
		  }
		  }
		  ?>
                <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
                    <label>Username</label>
                    <input type="text" name="username" class="span12" autocomplete="off" maxlength="20" size="20">
                    <label>Password</label>
                    <input type="password" name="password" class="span12" maxlength="20" size="20">
               
                    <input type="submit" name="submit" value="Sign In" class="btn btn-primary pull-right">
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
        <p class="pull-right" style=""><a href="jobconnectng.org" target="blank">jobconnectng.org & mustymeena</a></p>
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


<?php ob_flush(); ?>