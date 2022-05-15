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
            
            <h1 class="page-title">SEARCH THROUGH USING INTRODUCERS PHONE NUMBER</h1>
        </div>
        
      
             <ul class="breadcrumb">
            <li><?php echo "<a href='admin_menu.php?id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief'>Home</a> "; ?><span class='divider'>/</span></li>
          
            <li class="active">View bank list</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
  <div class="btn-group">
  
  </div>
</div>
<div class="well">   

    <legend>Generate Bank list of suscribers</legend>
    <?php
if($_POST['enter']){
	include("connect.php");
	

$bank=$_POST['bank'];
$date=strtolower($bank);

			//VALIDATE
			if($date==""){$error[]="Select bank to generate records for";}
									
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


header("location:bank_list.php?bank=$date&bill=oops&id={$_GET['id']}&dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief");

										}//END of IF NO VALIDATION ERROR EXIST
	}
	
?>
<br/>
<br/>
<p>&nbsp;</p>

<table width="70%" border="0" style="margin:auto;">
<form method="post"  action="<?php $_SERVER['PHP_SELF']; ?>" />
  <tr>
    <td align="center" width="52%"><b>SELECT A BANK:</b><br/>
      <select name="bank" id="bank" class="input-text">
        <option value="">select</option>
        <option value="">---------</option>
        <?php
			include("connect.php");
	  $ask="SELECT * FROM `bank` ORDER BY `name` ASC";
	  if(!$ask=mysql_query($ask)){
		  echo "<option value=''>No Banks available".mysql_error()."</option>";
		  }
		
		  while($row=mysql_fetch_array($ask)){
			  echo "<option value='{$row['name']}'>{$row['name']}</option>";
			  }
	  
	  ?>
        <?php if($_POST['name']){echo "<option  value='{$_POST['name']}' selected='selected'>{$_POST['name']}</option>"; }?>
      </select>      <br/></td>
    <td width="48%"><br/>
      <input  type="submit" name="enter" value="GENERATE LIST " onclick="return confirm('Go ahead to Generate Records?');"/></td>
  </tr>
  <tr>
    <td><br/></td>
    <td>&nbsp;</td>
  </tr>
    <tr>
 <td height="48">&nbsp;</td>

    <td>&nbsp;</td>



  </tr>
    </table>


</center>









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