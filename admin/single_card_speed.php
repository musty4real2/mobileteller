<?php

ob_start();
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include("../connect.php");
include("class.php");
$object=new mobile();

//redirect to setup if system not setup!!!!
$getit="SELECT * FROM `pin_confirm` WHERE `pin_id`='{$_GET['confirmid']}' AND `status`='0'";

$q=mysql_query($getit);

if(mysql_num_rows($q)>1){

				header("location:admin_menu.php?id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief");
	
	}
	elseif(mysql_num_rows($q)==0){


//SELECT `pin_id` FROM `pin_confirm` WHERE  `pin_id`='{$_GET['confirmid']}'

	if(isset($_GET['confirmid'])){
		$update="UPDATE `pin` SET `status`='0' WHERE `id`='{$_GET['confirmid']}'";
	$query=mysql_query($update) or die("UPDATE ERROR:".mysql_error());
	if($update){
		$c1=$object->fetchRecord($_GET['confirmid'], "pin");
while($c=mysql_fetch_array($c1)){
	$a=$c['pin'];
	$b=$c['serial'];
	$d=$c['amount'];
	$e=$c['status'];
	$f=$c['card_type'];
	$insert=mysql_query("INSERT INTO `pin_confirm` (`serial`, `pin`, `amount`, `status`, `entry_date`, `card_type`,`confirm`,`pin_id`) VALUES ( '$b', '$a', '$d', '$e', NOW(), '$f','','{$_GET['confirmid']}')");

}
	}
	}
	}

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
                            <li><?php echo "<a tabindex='-1' href='myaccount.php?id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief'>My Account</a>"; ?></li>
                            <il><?php echo "<a href='admin_menu.php?id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief'>Home</a>"; ?></li>
                   
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
            
           <center> <h1 class="page-title">You are viewing a Speed Pay Card Detail</h1></center>
        </div>
      <div class="container-fluid">
        <?Php
$set1=$object->fetchRecord($_GET['confirmid'], "pin");
while($st2=mysql_fetch_array($set1)){
	?>
        <div class="row-fluid">
                    
<div class="btn-toolbar">

  <div class="btn-group">
  </div>
</div>
<div class="well">
    <ul class="nav nav-tabs">
      <li></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
    <table class="table">
        
               <tr><td> 
        <label>Pin: </label>  <?php echo $st2['pin'];?>        </td>
        <td>
        <label>Serial Number:</label>
<?php echo $st2['serial'];?> </td></tr>
        
        
        <tr><td> <label>Date of Card Creation: </label> <?php echo $st2['entry_date'];?> </td><td>
        <label>Card Amount:</label>
<?php echo $st2['amount'];?> </td></tr>
        <tr><td>
        <label>Card status:</label>
        <?php echo $st2['status'];?> </td><td>
        <label>Card Type:</label>
<?php echo $st2['card_type'];?>         </td></tr>
        <tr>
        <td colspan="2">
        <center><SCRIPT LANGUAGE="JavaScript">
<!-- Begin
if (window.print) {
document.write('<form>'
+ '<input type="button" name="print" value="  Print  " '
+ 'onClick="javascript:window.print()"></form>');
}
// End -->
</SCRIPT><?php echo "<a href='admin_menu.php?id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief'>Home</a>"; ?></center></td></tr>
       
        <br/>
    </table></form>
    <?php
}
    ?>
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