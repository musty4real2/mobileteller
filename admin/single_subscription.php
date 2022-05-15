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
  <h1 style='color:#F00; text-decoration:blink;"
    
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
            
           <center> <h1 class="page-title">You are viewing a suscriber's detail</h1></center>
        </div>
      <div class="container-fluid">
        <?Php
$set1=$object->fetchRecord($_GET['confirmid'], "suscriber");
while($st2=mysql_fetch_array($set1)){
	?>
        <div class="row-fluid">
                    
<div class="btn-toolbar">

  <div class="btn-group">
  </div>
</div>
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#" data-toggle="tab">You are viewing <?php echo $st2['title'].' '.$st2['surname'].' '. $st2['first_name'].' '. $st2['middle_name']."'s";?> Profile which has been created <?php echo $st2['entry_date']; ?> </a></li>
      <li></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
    <table class="table">
    <tr><td><label>Passport:</label><?php
$object->displayPhoto($st2['passport'], "../photo/", "200");
?></td><td colspan="2">
        <label></label><?php echo '<h1>'.$st2['title'].' '.$st2['surname'].' '. $st2['first_name'].' '. $st2['middle_name'].'</h1>';?><?php echo "<br/><b style='color:#F00;'>Mobile Teller Account Balance</b>  =<b>N</b>".number_format($st2['balance']);?>
      <br/> <?php if(isset($_GET['msg'])){
		  
		  $msg=$_GET['msg'];
		  echo $msg;
		 echo " <a href=' http://www.edusoft.co/api/?user=mobile_teller&pass=28833&sender=Mobile Teller&recipients={$st2['phone_number']}&message=Dear+{$st2['surname']}+{$st2['first_name']}+{$st2['middle_name']}+your+Mobile+Teller+account+$msg.+Your+current+account+balance+is+{$st2['balance']}' target='_blank'>Send sms</a>";
	  }
	  ?><br/>
	  <a  title="add to the balance in your account" onclick="return confirm('do you really want to deposite?')" href="<?php echo "deposite.php?id={$_GET['id']}&noble=noble&thief=thief&deposite={$_GET['confirmid']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief";?>">Deposit</a>

      
      <br/> <a  title="withdraw from the balance in your account" onclick="return confirm('do you really want to withdraw?')" href="<?php echo "withdraw.php?id={$_GET['id']}&noble=noble&thief=thief&deposite={$_GET['confirmid']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief";?>">Withdraw</a>
      <br/><a href="<?php echo "statement.php?id={$_GET['id']}&noble=noble&thief=thief&deposite={$_GET['confirmid']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief";?>">Transaction History</a> </td>
        </tr>
        <tr><td>        <label>Name:</label><?php echo $st2['title'].' ';?> <?php echo $st2['surname'].' ';?><?php echo $st2['first_name'].' ';?><?php echo $st2['middle_name'];?>
</td></tr>

        
               <tr><td> 
        <label>Date of Birth:</label>  <?php echo $st2['dob'];?>        </td>
        <td>
        <label>Gender:</label>
<?php echo $st2['sex'];?> </td></tr>
        
        
        <tr><td> <label>State of origin:</label> <?php echo $st2['state_of_origin'];?> </td><td>
        <label>Marital Status:</label>
<?php echo $st2['marital_status'];?> </td></tr>
        <tr><td>
        <label>phone Number:</label>
        <?php echo $st2['phone_number'];?> </td><td>
        <label>Residential Address:</label>
<?php echo $st2['residential_address'];?>         </td></tr>
        <tr>
        <td>
        <label>Business Address:</label>
<?php echo $st2['business_address'];?>         </td><td>
        <label>Business Type:</label>
      <?php echo $st2['business_type'];?> </td></tr>
        
        <tr><td colspan="2"><center><strong style="color:#F00;">Subscribers Bank Details</strong></center></td></tr>
        <tr>
        <td>
        <label>Savings Target Per Day:</label>
    <?php echo $st2['saving_target'];?> </td><td>
        <label>Bank:</label>
        <?php echo $st2['bank_name'];?> </td></tr>
        
        
           <tr>
        <td>
        <label>Account Name:</label>
     <?php echo $st2['account_name'];?> </td><td>
        <label>Account No:</label>
        <?php echo $st2['account_number'];?> </td></tr>  
        
        
                   <tr>
        <td>
        <label>Introduced By:</label>
      <?php echo $st2['introducedby'];?> </td><td>
        <label>Introducer's Phone No:</label>
       <?php echo $st2['introducers_phone'];?> </td></tr>
        <tr>
        <td>&nbsp;</td>
        <td><label>Suscriber's Signature/Date:</label><?php
$object->displayPhoto($st2['signature'], "../photo/", "100");
?><?php echo '<br/>'. $st2['entry_date'];?></td></tr>
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