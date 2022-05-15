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
    

  
      
             <ul class="breadcrumb">
            <li><?php echo "<a href='admin_menu.php?id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief'>Home</a> "; ?><span class='divider'>/</span></li>
          
            <li class="active"></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar"></div>
<div class="well">
<?php

  $display = 50;
  // Determine how many pages there are...
  if (isset($_GET['p']) && is_numeric($_GET
  ['p'])) { // Already been determined.
  
  $pages = $_GET['p'];
  } else { // Need to determine.
  
  // Count the number of records:
  $q = "SELECT * FROM `speedpay_history` WHERE `entry_date`=CURDATE()";
  $r = mysql_query ($q);
  $records=mysql_num_rows($r);
  if(!$r){echo  "SYSTEM ERROR: Server cannot execute query.".mysql_error();}
  if(empty($r)){echo "SYSTEM ERROR: Server cannot execute query.".mysql_error();}
  
  
  // Calculate the number of pages...
  if ($records > $display) { // More than
  $pages = ceil ($records/$display);
  } else {
  $pages = 1;
  }
  }
  if (isset($_GET['s']) && is_numeric
  ($_GET['s'])) {
  $start = $_GET['s'];
  } else {
  $start = 0;
  }
?>
<?php
$select="SELECT * FROM `speedpay_history` WHERE `entry_date`=CURDATE() ORDER BY `id` DESC LIMIT $start, $display ";
$q=mysql_query($select);

if(mysql_num_rows($q)==0){ echo "<p class='msg warning'>Sorry, No Match found!</p>";}

elseif(mysql_num_rows($q)>0){
?>

<p>&nbsp;</p>

<fieldset style="height:auto; margin:0px 0px 30px 0px;">
<legend><?php echo mysql_num_rows($q);?> Result(s)   <br/><b>LIST OF ALL SPEED PAY TRANSACTIONS AS AT <?php echo date("d").'   '; ?><?php echo date("M").'   '; ?><?php echo date("Y");?></b>
</legend>
    <table class="table">
      <thead>
        <tr>
        <th>&nbsp;</th>
          <th>#</th>
          <th>Pin</th>
          <th>Serial Number</th>
          <th>Amount</th>
                    <th>Sender's Phone number</th>

                    <th>Card Created</th>
                    <th>Use Date</th>
                     <th>Time</th>
          <th>Recipient Account Number</th>
           <th>Recipient Account Name</th>
             <th>Recipient Bank</th>
             <th>Sender's Phone Number</th>
        </tr>
      </thead>
      <tbody>
       <?php
$s=1;
 while($l=mysql_fetch_array($q)){
	 $rid=$l['id'];
$bg = ($bg=='#eeeeee' ? '#ffffff' :
'#eeeeee'); // Switch the background

 echo "<tr bgcolor='$bg' class='row'>";  ?>
    <td><?php echo $s++; ?></td>
    <td><?php echo $l['card_pin'];?></td>
<td><?php echo $l['card_serial'];?></td>
   <td><?php echo "N".$l['card_amount'];?></td>
   <td><?php echo $l['senders_phone'];?></td>
      <td><?php echo $l['card_creation_date'];?></td>

       <td><?php echo $l['entry_date'];?></td>  
       <td><?php echo $l['time'];?></td>                            

           <td><?php echo $l['recipient_number'];?></td>
            <td><?php echo $l['recipient_name'];?></td>
            <td><?php echo $l['recipient_bank'];?></td>
            <td><?php echo $l['senders_phone'];?></td>
            
        </tr>
	<?php } ?>
</table>
</fieldset>
<?php } ?>
<?php 
	$aw=$rid;
  //paginate result set
if ($pages > 1) {
echo '<center>';
$current_page = ($start/$display) + 1;

if ($current_page != 1) {
 echo '<center><a href="todays_speed+pay.php?s=' .
($start - $display) . '&p=' . $pages .
'&id='.$yd.'">Previous</a></center> ';
 }

for ($i = 1; $i <= $pages; $i++) {
 if ($i != $current_page) {
 echo '<a href="todays_speed+pay.php?s=' .
(($display * ($i - 1))) . '&p=' .
$pages . '&id='.$yd.'">' . $i . '</a> ';
 } else {
 echo $i . ' ';
}
 }

if ($current_page != $pages) {
 echo '<center><a href="todays_speed+pay.php?s=' .
($start + $display) . '&p=' . $pages .
'&id='.$yd.'">Next</a></center>';
 }

 echo '</center>';// Close the paragraph.
 
}
 ?>
     </tbody>
    </table>     

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