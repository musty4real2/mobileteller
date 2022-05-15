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
            
            <h1 class="page-title">SEARCH FOR SPEED PAY PIN</h1>
        </div>
        
      
             <ul class="breadcrumb">
            <li><?php echo "<a href='admin_menu.php?id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief'>Home</a> "; ?><span class='divider'>/</span></li>
          
            <li class="active">View introducer(s)  Details using phone number</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
  <div class="btn-group">
  
  </div>
</div>
<div class="well">
    <?php if(isset($_GET['msg'])){
		
$msg=$_GET['msg'];
echo "<center><b 'style=color:#F00;'>". $msg ."</b></center>";
	}
	?>
   
<?php

	if(isset($_GET['deleteid3'])){
echo 'Do You Really Want To Delete these if you do it would not be available ? <a href="viewsuscriptions.php?yesdelete3='.$_GET['deleteid3'].'&id='.$_GET['id'].'">Yes </a>| <a href="viewsuscriptions.php?id='.$_GET['id'].'">No</a>';
exit();

}

if(isset($_GET['yesdelete3'])){
	$id_to_delete=$_GET['yesdelete3'];
	$sql=mysql_query("DELETE FROM `suscriber` WHERE `id`='$id_to_delete' limit 1") or die(mysql_error());
	
	header("location:viewsuscriptions.php?id={$_GET['id']}");
	exit();
}
?>
    <legend>Search for speed pay pin</legend>

<center><form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get"/>
<table width="714" border="0" >
<input type="hidden" value="<?php echo "{$_GET['id']}"; ?>" name="id"/>
<tr>
  <td>
<input style=" padding-left:20px; font-size:20px; font-weight:bold; background-image:url(../images/search_field.jpg); width:582px; height:47px; background-repeat:no-repeat; border:none;" type="text" name="wname" id="wname" maxlength="30" autosuggest="off" size="40" value="<?php if(isset($_GET['wname'])){echo $_GET['wname'];} ?>"  placeholder="Enter speed pay pin"/></td>
<td>
<input style="border:none; background-image:url(../images/search_butt.jpg); width:132px; height:49px; background-repeat:no-repeat; cursor:pointer;" type="submit" name="search" id="button2" value=" "  />
</td>
</tr>
</table>
</form></center>
</center>








<?php

if(isset($_GET['search'])){
	include("connect.php");
$name=addslashes($_GET['wname']);
$name.=addslashes($_GET['id']);

	if(empty($name)){$error[]="Please enter a speed pay pin  to search with";}

	if(!empty($error)){
		echo "<p class='msg warning'><b>Oops! ERROR:</b></p>";
		foreach($error as $oops){
			echo "<p class='msg error'>$oops</p>";
			}//foreach loop
		}//if !empty error

		//if $error variable is empty, continue with the script
		elseif(empty($error)){

/*********************** *****************************************************************************************************************
************************************************************************************************************************************************************/

$select="SELECT * FROM `pin` WHERE `pin`='{$_GET['wname']}' AND `status`='1'";
$q=mysql_query($select);

if(mysql_num_rows($q)==0){ echo "<p class='msg warning'>Sorry, No Match found!</p>";}

elseif(mysql_num_rows($q)>0){
?>

<p>&nbsp;</p>

<fieldset style="height:auto; margin:0px 0px 30px 0px;">
<legend><?php echo mysql_num_rows($q);?> Result(s) found</legend>
    <table class="table">
      <thead>
        <tr>
        <th>&nbsp;</th>
          <th>#</th>
          <th>Pin</th>
          <th>Serial Number</th>
          <th>Card Amount</th>
                    <th>Status</th>

                    <th>Date Card was Created</th>
                    <th>Card Type</th>

          <th style="width: 26px;"></th>
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
    <td><?php echo $l['pin'];?></td>
<td><?php echo $l['serial'];?></td>
   <td><?php echo $l['amount'];?></td>
   <td><?php echo $l['status'];?></td>
      <td><?php echo $l['entry_date'];?></td>

       <td><?php echo $l['card_type'];?></td>
      <td>
                             
	 <a  onclick="return confirm('do you really want to deactivate?')" href="<?php echo "single_card.php?confirmid=$rid&id={$_GET['id']}&noble=noble&thief=thief&deposite={$_GET['confirmid']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief";?>">Click to Deactivate</a>


          </td>
        </tr>
	<?php } ?>
</table>
</fieldset>
<?php } } }?>

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