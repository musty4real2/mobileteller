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
            <li><a href="#">Home</a></li>
            <li ><a href="#">Logout</a></li>            
        </ul>

        <a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Account<span class="label label-info">+3</span></a>
        <ul id="accounts-menu" class="nav nav-list collapse">
            <li ><a href="sign-in.html">Sign In</a></li>
            <li ><a href="sign-up.html">Register a Client/Sign Up</a></li>
        </ul><br/>
       <b style="color:#FFF;"> <center>Pin Analysis</center></b><br/>
        <table width="259" height="477" border="1" bordercolor="#FF0000" class="table-bordered" style="color:#000; background:#FFF;">
        <tr>
        <td width="8" height="60">#</td>
        <td width="142">Card type</td>
        <td width="87">Number of cards</td>
        </tr>
          <tr>
          <td height="68">1</td>
        <td>Smart save</td><td><?php echo $object->count1(); ?></td>
        </tr>
          <tr>
          
          <td height="62">2</td>
        <td>Speed pay</td><td><?php echo $object->count2(); ?></td>
        </tr>
           <tr>
          <td>3</td>
        <td>Utility pay</td><td><?php echo $object->count3(); ?></td>
        </tr>
        <tr>
        <td height="102"></td>
        <td>Total Amount of speed pay Card Deactivated today</td><td><?php echo $object->totalSpeedMoney1(); ?>
        
        </tr>
        
         <tr>
        <td height="79"></td>
        <td>Total Amount made of speed pay Card fee today</td><td><?php echo $object->totalSpeedMoney11(); ?>
        
        </tr>
           <tr>
        <td></td>
        <td>Total Amount made by PAGA of Mobile Teller today</td><td><?php echo $object->totalSpeedMoney12(); ?>
        
        </tr>
      </table>
  
        <?php echo "<center><a style='color:#FFF;' tabindex='-1' href='generate_excel.php?bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief' >Generate Excel</a></center>"; ?>
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
        <a href="#page-stats" class="block-heading" data-toggle="collapse">Latest Stats</a>
        <?php
		
		if(isset($_GET['id'])){
			
				$id=$_GET['id'];

		}
		
		
		
		
		?>
        
        
        <div id="page-stats" class="block-body collapse in">

            <div class="stat-widget-container">
                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php $object->countStaff(); ?></p>
                        <p class="detail">Staff Accounts</p>
                    </div>
                </div>

                <div class="stat-widget"></div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php $object->countVa(); ?></p>
                        <p class="detail">Number of valid pins</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php $object->countSus(); ?></p>
                        <p class="detail">Members</p>
                    </div>
                </div>
            <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php $object->countInv(); ?></p>
                        <p class="detail">Number of invalidated pins</p>
                    </div>
                </div>
                

            </div>
        </div>
    </div>
</div>


<div class="row-fluid">
<table class="table">
<tr>
<td>
<?php echo "<a tabindex='-1' href='createusers.php?bill=oops&id=dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief'><img src='../images/add1.gif'><br/>Create User</a>"; ?>
</td>
<td>&nbsp;</td>
<td>

<?php echo "<a tabindex='-1' href='viewusers.php?bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief'><img src='../images/images.jpg' width='82' height='70'><br/>View all Users</a>"; ?>

</td>
<td>&nbsp;</td>
<td>

<?php echo "<center><a tabindex='-1' href='quick+save+subcription+form.php?bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief'><img src='../images/hf.jpg' width='82' height='70'><br/>Smart Save Subcription Form</a></center>"; ?>

</td>

<td>&nbsp;</td>
<td>

<?php echo "<center><a tabindex='-1' href='viewsuscriptions.php?bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief'><img src='../images/k.jpg' width='82' height='70'><br/>View all Suscriptions</a></center>"; ?>

</td>
<td>&nbsp;</td>
<td>

<?php echo "<a tabindex='-1' href='searchsuscriptions.php?bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief'><img src='../images/jk.jpg' width='82' height='70'><br/>Seach for Suscriber</a>"; ?>

</td>
</tr>
<tr>
<td>

<?php echo "<a tabindex='-1' href='generate_card_pins.php?bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief'><img src='../images/5.jpg' width='82' height='70'><br/>Generate Card Pin</a>"; ?>

</td>
<td>&nbsp;</td>

<td>

<?php echo "<a tabindex='-1' href='viewall+cards+generated+today.php?bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief'><img src='../images/u.jpg' width='82' height='70'><br/>View all Cards Generated Today</a>"; ?>

</td>
<td>&nbsp;</td>
<td>

<?php echo "<center><a tabindex='-1' href='summary.php?bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief' title='Here you would see the total amount your are expected to pay to each bank'><img src='../images/result.gif' width='82' height='70'><br/>Bank Summary</a></center>"; ?>

</td>
<td>&nbsp;</td>
<td>

<?php echo "<center><a tabindex='-1' href='search+introducer.php?bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief' title='Here you would see the total amount your are expected to pay to each bank'><img src='../images/list.gif' width='82' height='70'><br/>Search using introducers phone number</a></center>"; ?>

</td>
<td>&nbsp;</td>

<td>

<?php echo "<center><a tabindex='-1' href='generate+phonenumber.php?bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief' title='Here you would see the total amount your are expected to pay to each bank'><img src='../images/call.jpg' width='82' height='70'><br/>Generate all phone number</a></center>"; ?>

</td>
</tr>
<tr>
<td>

<?php echo "<a tabindex='-1' href='printsmartsave_front.php?bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief'><img src='../images/printer.png' width='82' height='70'><br/>Print Smart Save Cards</a>"; ?>

</td>
<td>&nbsp;</td>

<td>

<?php echo "<a tabindex='-1' href='printspeedpay_front.php?bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief'><img src='../images/payment.png' width='82' height='70'><br/>Print Speed Pay Cards</a>"; ?>

</td>
<td>&nbsp;</td>
<td>

<?php echo "<center><a tabindex='-1' href='printutilitypay_front.php?bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief' title='Here you would see the total amount your are expected to pay to each bank'><img src='../images/pay.png' width='82' height='70'><br/>Print Utility Pay Cards</a></center>"; ?>

</td>
<td>&nbsp;</td>
<td>

<?php echo "<center><a tabindex='-1' href='generatithdrawe_bank_list.php?bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief' title='Here you would see the total amount your are expected to pay to each bank'><img src='../images/settings.png' width='82' height='70'><br/>Generate Bank List</a></center>"; ?>

</td>
<td>&nbsp;</td>
<td>

<?php echo "<center><a tabindex='-1' href='todays_deposit.php?bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief' title='Here you would see the total amount your are expected to pay to each bank'><img src='../images/allowance-icon.png'  width='82' height='70'><br/>View todays Deposit(s)</a></center>"; ?>

</td>



</tr>
<tr>
<td>

<?php echo "<a tabindex='-1' href='todays_withdraw.php?bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief' title='Here you would see the total amount your are expected to pay to each bank'><img src='../images/blogg.jpg'  width='82' height='70'><br/>View todays Withdrawals(s)</a>"; ?>

</td>

<td>&nbsp;</td>
<td>

<?php echo "<a tabindex='-1' href='search+speed+pay.php?bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief' title='Here you would see the total amount your are expected to pay to each bank'><img src='../images/blogg.jpg'  width='82' height='70'><br/>Perform Quick Pay Transaction</a>"; ?>

</td>

<td>&nbsp;</td>
<td>

<?php echo "<center><a tabindex='-1' href='card_history.php?bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief' title='Here you would see the total amount your are expected to pay to each bank'><img src='../images/allowance-icon.png'  width='82' height='70'><br/>Search Card History</a></center>"; ?>

</td>
<td>&nbsp;</td>
<td>

<?php echo "<center><a tabindex='-1' href='createdistributors.php?bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief' title='Here you would see the total amount your are expected to pay to each bank'><img src='../images/allowance-icon.png'  width='82' height='70'><br/>Create Distributor</a></center>"; ?>

</td>
<td>&nbsp;</td>
<td>

<?php echo "<center><a tabindex='-1' href='viewdistributors.php?bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief' title='Here you would see the total amount your are expected to pay to each bank'><img src='../images/allowance-icon.png'  width='82' height='70'><br/>View Distributor</a></center>"; ?>

</td>
</tr>
<tr><td>
<?php echo "<a tabindex='-1' href='printsmartsave_back.php?bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief'><img src='../images/printer.png' width='82' height='70'><br/>Print Smart Save Cards Back</a>"; ?></td>


<td>&nbsp;</td>

<td>

<?php echo "<a tabindex='-1' href='printspeedpay_back.php?bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief'><img src='../images/payment.png' width='82' height='70'><br/>Print Speed Pay Cards Back</a>"; ?>

</td>
<td>&nbsp;</td>
<td>

<?php echo "<center><a tabindex='-1' href='printutilitypay_back.php?bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief' title='Here you would see the total amount your are expected to pay to each bank'><img src='../images/pay.png' width='82' height='70'><br/>Print Utility Pay Cards Back</a></center>"; ?>

</td>
<td>&nbsp;</td>

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