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
	$query="SELECT * FROM `pin`  WHERE `entry_date`=CURDATE()AND `card_type`='speed pay' AND `status`='1' ORDER BY `id`";
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
<table width="462"  height="207" cellpadding="1">
    <tr>
    <td>&nbsp;<b style="font-size:20px; color:#FC0;">M</b>obile-Teller</td>
    <td width="84">Fee:&nbsp;<b style="color:#000;"><?php echo 'N200'; ?> </b></td>
    </tr>
      <tr>
   <td width="366" height="54"><b style="font-size:9px;">&nbsp;&nbsp;Instruction:</b><br/>
      <b style="font-size:9px;">&nbsp;&nbsp;Send SMS with the following details to: 08012345678</b><br/>
 <b style="font-size:9px;">&nbsp;&nbsp;Account No. E.g. 0034567367</b><br/>
 <b style="font-size:9px;">&nbsp;&nbsp;Account Name E.g. Adamu Femi Okoro</b><br/>
 <b style="font-size:9px;">&nbsp;&nbsp;Bank Name E.g. Gtbank</b><br/>
 <b style="font-size:9px;">&nbsp;&nbsp;Depositor Name: E.g. Toyin Ngozi</b><br/>
 <b style="font-size:9px;">&nbsp;&nbsp;Speed Pay Pin No. E.g. 12345678901234 &nbsp; SCRATCH BELOW</b><br/>
</td><td><img src="../images/naira-notes.jpg" width="100"/></td>
    </tr>
      <tr>
      <td width="366" height="20" align="center"><b style="color:#000;" ><?php echo "PIN:". strtoupper($row['pin']);?></b></td><td width="84">Value:&nbsp;<b style="color:#000;"><?php echo 'N'. strtoupper($row['amount']);?> </b></td></tr>
 
      <tr>
        <td height="35">  <center><img src="<?php echo "../barcodegen.1d-php5.v5.0.1/test.php?code={$row['serial']}";?>" alt="barcode" height="33" /></center></td>    


        </tr>
        <tr><td align="center"><b style="font-size:9px" ><i>&nbsp;&nbsp;Note: Please allow a processing time of 10-15mins, SMS notification will be sent to Depositor and Account holder.
Transaction Hours: 8am-8pm Daily  
</i></b></td></tr>
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