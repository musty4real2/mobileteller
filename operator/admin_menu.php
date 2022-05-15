<?php
if($_GET['id']==""){
					header("location:../index.php?id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief");

	
}
ob_start();
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include("../connect.php");
include("../admin/class.php");
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

    <link rel="stylesheet" type="text/css" href="../admin/lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="../admin/stylesheets/theme.css">
    <link rel="stylesheet" href="../admin/lib/font-awesome/css/font-awesome.css">

    <script src="../admin/lib/jquery-1.7.2.min.js" type="text/javascript"></script>

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
                            <li><?php echo "<a tabindex='-1' href='myaccount.php?bill=oops&id=dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief'>My Account</a>"; ?></li>
                            <li class="divider"></li>
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="sign-in.html">Logout</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="#"><span class="first">Mobile</span> <span class="second">Teller</span></a>
        </div>
    </div>
    


    
    <div class="sidebar-nav">

        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Menu/Dashboard</a>
        <ul id="dashboard-menu" class="nav nav-list collapse in">
            <li ><a href="../logout.php">Logout</a></li>            
        </ul><br/>
        
    </div>
    
    <div class="content">
        
        <div class="header">
            <div class="stats">
</div>

            <h1 class="page-title">Mobile Teller :Admin Menu</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="#">Home</a> <span class="divider">/</span></li>
            <li class="active">Menu</li>
            <li class="active"></li>
            <li class="active"><a href="#">&nbsp;&nbsp;&nbsp;Total Amount in Mobile Teller:::&nbsp;<?php $object->totalMoney(); ?></a></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <?php if(isset($_GET['msg'])){
		
$msg=$_GET['msg'];
echo $msg;
	}
	?>

    <div class="block">
        <?php
		
		if(isset($_GET['id'])){
			
				$id=$_GET['id'];

		}
		
		
		
		
		?>
        

<div class="row-fluid">
<table class="table">
<tr>
<td>&nbsp;</td>

<td>

<?php echo "<center><a tabindex='-1' href='todays_pin_order.php?bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief'><img src='../images/hf.jpg' width='200' height='200'><br/>Pin deactivation Orders</a></center>"; ?>

</td>
<td>

<?php echo "<center><a tabindex='-1' href='view_treated_order.php?bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief'><img src='../images/images.jpg' width='200' height='200'><br/>View treated Orders</a></center>"; ?>

</td>
</tr>
</table>
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