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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
#card{
		background-image:url(../images/newcard.jpg);
		background-repeat:no-repeat;
		
	
}
		
		#card h2{
			margin:0;
			color:#000;
			}


</style>
</head>

<body>
<?php echo "<a href='admin_menu.php?id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief'>Home</a>"; ?><br/>

<?php
	$query="SELECT * FROM `pin`  WHERE `entry_date`=CURDATE()AND `card_type`='smart save' AND `status`='1' ORDER BY `id`";
	$result=mysql_query($query);
 
	$cols=2;		
	echo "<center><table>";	
	do{
		echo "<tr>";
		for($i=1;$i<=$cols;$i++){	
									
			$row=mysql_fetch_assoc($result);
			if($row){
 ?>
        <td>
            <table width="478">
                <tr valign="top">

 <td width="481"> 
           
       <div id="card">  
<table width="462"  height="231" cellpadding="1">
    <tr>
    <td>&nbsp;<b style="font-size:20px; color:#00C;">Mobile</b>-<i style="color:#F00;">Teller</i>&nbsp;(Smart Save Card)</td>
    <td width="84">Value:&nbsp;<b style="color:#000;"><?php echo 'N'. number_format($row['amount']);?><br />&nbsp;&nbsp;&nbsp;</td>
    </tr>
      <tr>
   <td height="43"><img src="../images/naira-notes.jpg" width="100" height="41"/></td> 
    </tr>
      <tr>
      <td width="366" height="20"><b style="font-size:10px; font-family:Arial, Helvetica, sans-serif;">This Card Pays your Mobile-Teller Account with the Value Above.
Total Savings for the week will be moved to your registered Bank Account  number and you will be sent an SMS.
<br/>Please Note: A weekly fee applies.
<br/>
Distributor: <?php echo strtoupper($row['distributor']);?> 
</b></td></tr>
 
      <tr>
        <td height="53"><b style="font-size:9px; ">Mobile-Teller Cards are a product of <b style="color:#F00;">Q</b>uick A<b style=" color:#F00;">Q</b>uire Nigeria .  <br/> &nbsp;&nbsp;<b style="color:#E37A1C;">P</b><b style=" color:#E37A1C;">AGA . &nbsp;</b>|| <b style=" color:#F00;">POCKET MONI</b> &nbsp;Authorised Agent<br/>
Customer Care: 090-946-472-49</b>
 </td>

        </tr>
        <tr><td align="center"><b style="font-size:9px" >&nbsp;</b></td></tr>
        </table></div>
<br />
                    </td>
                    <td width="230">&nbsp;</td>	<!-- Create gap between columns -->
                </tr>
           </table>
        </td>
<?php
			}
			
		}
	} while($row);
	echo "</table></center>";
 ?>    
<?php
}
ob_flush();
?>
</body>
</html>