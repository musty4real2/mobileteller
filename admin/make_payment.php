<?php
ob_start();
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include("../connect.php");
include("class.php");
$object=new mobile();

//fetch staff record
$set=$object->fetchRecord($_GET['id'], "users");
$yd=$_GET['id'];
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
                            <li><?php echo "<a tabindex='-1' href='myaccount.php?id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief''>My Account</a>"; ?></li>
                            <li><?php echo "<a href='admin_menu.php?id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief'>Home</a>"; ?></li>
                            <li class="divider"></li>
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="sign-in.html">Logout</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="index.html"><span class="first">Mobile</span> <span class="second">Teller</span></a>
        </div>
    </div>
    

        
        <div class="header">
            
            <h1 class="page-title">UPDATE PAYMENT</h1>
        </div>
        
      
             <ul class="breadcrumb">
            <li><?php echo "<a href='admin_menu.php?id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief'>Home</a> "; ?><span class='divider'>/</span></li>
          
            <li class="active"></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <button class="btn btn-primary"><i class="icon-save"></i></button>
  <div class="btn-group">
  
  </div>
</div>
<div class="well">
<h1>Update Payment</h1>
<p>&nbsp;</p>
<p>&nbsp;</p>

<?php
if(isset($_POST['pay'])){
	$date=getdate();
	$currentmonth=strtoupper($date['month']);
	$currentyear=$date['year'];
	
	$nar="SWEEP TO BANK ";
	
	$setall=$object->fetchRecordAll("suscriber");
$yd=$_GET['id'];
while($stall=mysql_fetch_array($setall)){
	$pid=$stall['id'];
	$amount=$stall['balance'];
	
	$add="INSERT INTO `withdraw` (
`pid` ,
`amount_removed` ,
`date`,`time`,`narration`,`staff_id`)
VALUES ('$pid', '$amount', NOW(),NOW(),'$nar','{$_GET['id']}')";

$addin=mysql_query($add) or die("INSERT ERROR".mysql_error());

	if($amount>=500){
	$bal=-250;

	}
		if($amount>=10000){
	$bal=-300;

	}
		if($amount>=21000){
	$bal=-350;

	}

		if($amount>=31000){
	$bal=-400;

	}
		if($amount>=50000){
	$bal=-500;

	}
	
	$update="UPDATE `suscriber` SET `balance`='$bal' WHERE `id`='$pid'";
	$query=mysql_query($update) or die("UPDATE ERROR:".mysql_error());

}

		
					header("location:admin_menu.php?id={$_GET['id']}&noble=noble&thief=thief&confirmid={$_GET['deposite']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&msg=Sweep completed ");
	}
?>
	
	
	
	
	<?php 
			$date=getdate();
			$currentday=$date['mday'];
			$currentmonth=strtoupper($date['month']);
			?>
    
    <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
    <center>
    <input type="submit" style="height:70px; width:550px; font-size:20px; font-weight:bold; cursor:pointer;" name="pay" value="PERFORM SWEEP" onclick="return confirm('have you generated bank payment list?')" />
    </center>
    </form>
    

  <p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

</div>

</div>


                    
                    <footer>
                        <hr>
                             <p class="pull-right"><a href="#" target="_blank">powered by</a> by <a href="#" target="_blank">mustymeena</a></p>
                        

                        <p>&copy; 2014 <a href="http://www.jobconnectng.org" target="_blank">jobconnect nigeria</a></p>
                    </footer>
                    
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