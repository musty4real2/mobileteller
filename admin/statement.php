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
                            <li><?php echo "<a tabindex='-1' href='myaccount.php?id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief'>My Account</a>"; ?></li>
                            <il><?php echo "<a href='admin_menu.php?id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief'>Home</a>"; ?></li>
                   
                            <li class="divider"></li>
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="sign-in.html">Logout</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="../index.php"><span class="first">Mobile</span> <span class="second">Teller</span></a>
        </div>
    </div>

      <div class="container-fluid">
        <?Php
$set1=$object->fetchRecord($_GET['deposite'], "suscriber");
while($st2=mysql_fetch_array($set1)){
$a=$st2['first_name'].' '.$st2['surname'];
}
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
   <?php echo" <a href='single_subscription.php?id={$_GET['id']}&noble=noble&thief=thief&confirmid={$_GET['deposite']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief'>Back</a>";?>
<fieldset style="margin-top:50px;">

<?php 
include_once("../conn.php");
$id=$_GET['id'];



?>
<h1 style="font-family:Georgia, 'Times New Roman', Times, serif; color:#0e9dcc;"> <?php echo strtoupper($a);?> &nbsp;Statement OF ACCOUNT</h1>
<fieldset>
<legend>
<h1>DEPOSIT(S) </h1></legend>

        <?Php
$set1=$object->fetchRecord($_GET['deposite'], "suscriber");
while($st2=mysql_fetch_array($set1)){
	
	echo "<h3>Current Account balance</h3>=<b>N</b>".number_format($st2['balance']);
}
	?>

<?php
$query="SELECT * FROM `deposite` WHERE `pid`='{$_GET['deposite']}' ORDER BY `id` DESC";
$answer=mysql_query($query) or die("ERROR:".mysql_error());

if(mysql_num_rows($answer)==0){
	echo "<br/>No deposit statement avalaible"; 
	}


if(mysql_num_rows($answer)>0){//if table is not empty?>
	
            <table class="table" border="0" style="text-align:center;"  width="80%">
        <tr style="background-color:#0e9dcc; color:#FFF; font-family:Tahoma, Geneva, sans-serif;"> 
   
    <th>Account Opening Balance</th>
     <th>Amount Deposited</th>
    <th>Current Account balance</th>
    <td>Date/time of deposit</td>
    </tr>
    
	<?php 
	$bg = '#eeeeee';
while($row=mysql_fetch_array($answer)){//while loop to fetch from the database
?>	
<?php 
  $name=$row['name'];
$bg = ($bg=='#eeeeee' ? '#ffffff' :
'#eeeeee'); // Switch the background


 echo '<tr bgcolor="' . $bg . '">';  ?>
<td><?php echo 'N'.number_format($row['oldbalance']);?></td>
<td><?php echo 'N'.number_format($row['amount_add']);?></td>

<td><?php echo 'N'.number_format($row['balance']);?></td>
<td><?php echo $row['date'];?></td>
	</tr>
	<?php
	}//end of WHILE
	}//end of IF
?>
</table>
</fieldset>



<fieldset><br/>
<legend><h1>ACCOUNT WITHDRAWALS </h1></legend>
<br/>
<?php
$query="SELECT * FROM `withdraw` WHERE `pid`='{$_GET['deposite']}' ORDER BY `id` DESC";
$answer=mysql_query($query) or die("ERROR:".mysql_error());

if(mysql_num_rows($answer)==0){
	echo "No withdrawal(s) statement avalaible"; 
	}


if(mysql_num_rows($answer)>0){//if table is not empty?>
	
            <table class="table" border="0" style="text-align:center;"  width="80%" >
        <tr style="background-color:#0e9dcc; color:#FFF; font-family:Tahoma, Geneva, sans-serif;"> 
      <th>Amount Withdrawn</th>
    <th>Narration</th>
    <td>Date</td>
     <td>Time</td>
    </tr>
	<?php 
	$bg = '#eeeeee';
while($row=mysql_fetch_array($answer)){//while loop to fetch from the database
?>	
<?php 
$bg = ($bg=='#eeeeee' ? '#ffffff' :
'#eeeeee'); // Switch the background


 echo '<tr bgcolor="' . $bg . '">';  ?>
<td><?php echo 'N'.number_format($row['amount_removed']);?></td>
<td><?php echo $row['narration'];?></td>
<td><?php echo $row['date'];?></td>
<td><?php echo $row['time'];?></td>
	</tr>
	<?php
	}//end of WHILE
	}//end of IF
?>
</table>
</fieldset>

<center><SCRIPT LANGUAGE="JavaScript">
<!-- Begin
if (window.print) {
document.write('<form>'
+ '<input type="button" name="print" value="Print This Page" '
+ 'onClick="javascript:window.print()"></form>');
}
// End -->
</SCRIPT></center>
</fieldset>

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