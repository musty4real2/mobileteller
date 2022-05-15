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
        </ul>
    </div>
    
    <div class="content">
        
        <div class="header">
            <div class="stats">
    <p class="stat"><span class="number">53</span>tickets</p>
    <p class="stat"><span class="number">27</span>tasks</p>
    <p class="stat"><span class="number">15</span>waiting</p>
</div>

            <h1 class="page-title">Mobile Teller :Admin Menu</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><?php echo "<a href='admin_menu.php?id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief'>Home</a>"; ?> <span class="divider">/</span></li>
            <li class="active"></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                            

<div class="row-fluid">

<center><form method="post">
<label>Enter pin</label>
<input type="text" name="cardno" autocomplete="off"/><br/>
<input type="hidden" name="deposite" value="<?php echo $_GET['deposite']; ?>"
<br/>
<input type="submit" name="a" value="Deposite"/>

</form></center>
<?php
include("connect.php");
if(isset($_POST['a'])){
$cardno=mysql_real_escape_string($_POST['cardno']);

if($cardno==""){
		$error[]="Select Enter a card pin";
		}
		

	if(!empty($error)){
		echo "<h1 class='warning'>ERROR:Please complete the missing item</h1><br/>";
		
		foreach($error as $err){
			
			echo "<p class='warning'>$err</p><br/>";
					header("location:single_subscription.php?id={$_GET['id']}&noble=noble&thief=thief&confirmid={$_GET['deposite']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&msg=your didnt enter a pin");

			}
		}
	
	if(empty($error)){

	$fetchcard=@mysql_query("SELECT * FROM `pin` WHERE `pin`='$cardno' AND `status`='1'") or die(mysql_error());
			if($fetchcard){
				echo "<br/> Card Pin is Valid <br/> ";
		
				while($st=mysql_fetch_array($fetchcard)){
				$cardamount=$st['amount'];
				$cardpinno=$st['pin'];
				$cardserialno=$st['serial'];
				
				echo "Card Amount: N".$st['amount'];
				
				}
		
		
			
			$s1=@mysql_query("SELECT * FROM `suscriber` WHERE `id`='{$_GET['deposite']}'") or die(mysql_error());;
				while($d=mysql_fetch_array($s1)){
					$phone_number=$d['phone_number'];
					$name=$d['first_name'].' '.$d['surname'];
					$oldbal=$d['balance'];
					
				$bal=$d['balance']+$cardamount;
					echo "<br/>" ." <br/>The Depositors Balance= N". $d['balance'];
					echo "<br/><br/>The Depositors New Balance= N". $bal;


				}	
				if($cardpinno!=""){
					$update="UPDATE `suscriber` SET `balance`='$bal' WHERE `id`='{$_GET['deposite']}'";
	$query=mysql_query($update) or die("UPDATE ERROR:".mysql_error());
				
				if($update){
//extract data from the post
extract($_POST);

//set POST variables
$url = 'http://www.edusoft.co/sms/apiware/sendmw.php';
$fields = array(
'uname' => urlencode("mobile_teller"),
            'userpass' => urlencode("28833"),
            'data' => urlencode("
			<sms>
			<auth>
			<username>uname</username>
			<password>userpass</password>
			</auth>
			<record>
			<sender>Mobile Teller Nigeria</sender>
			<recipient>$phone_number</recipient>
			<message>Dear $name your Mobile Teller account has been credited with the sum of $cardamount. Your current account balance is $bal.</message>
			</record>


</sms>")
        );

//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);
					
				}
				}
				if($cardpinno!=""){
				$cardhistory="INSERT INTO `cardhistory` (`name`, `phone_number`, `pin`, `serial`, `cardamount`, `entry_date`, `time`, `client_id`, `staff_id`) VALUES ('$name', '$phone_number', '$cardpinno', '$cardserialno', '$cardamount',NOW(), NOW(), '{$_GET['deposite']}', '{$_GET['id']}')";
				$historyquery=mysql_query($cardhistory) or die("Could not insert info into the card history table".mysql_error());
				
				
					$add="INSERT INTO `deposite` (
`pid` ,`amount_add`,`oldbalance`,`balance` ,`date`,`staff_id`
)
VALUES ('{$_GET['deposite']}', '$cardamount','$oldbal','$bal', NOW(),'{$_GET['id']}')";

$addin=mysql_query($add) or die("INSERT ERROR".mysql_error());

			$update2="UPDATE `pin` SET `status`='0' WHERE `pin`='$cardpinno' AND `status`='1'";
	$query2=mysql_query($update2) or die("UPDATE2 ERROR:".mysql_error());
												header("location:single_subscription.php?id={$_GET['id']}&noble=noble&thief=thief&confirmid={$_GET['deposite']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&msg=You have just been credited with the sum of N$cardamount");

}
						
		
	else{
				
						header("location:single_subscription.php?id={$_GET['id']}&noble=noble&thief=thief&confirmid={$_GET['deposite']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&msg=the card you just entered is invalid / has been used by another customer");
				
			}											
}	

	}
?>

</div>



                    
                    <footer>
                        <hr>
                        <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
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
}
ob_flush();


?>