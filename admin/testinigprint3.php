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
		background-image:url(../images/card.png);
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
	$query="SELECT * FROM `pin`  WHERE `entry_date`=CURDATE()AND `card_type`='utility pay' AND `status`='1' ORDER BY `id`";
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
            <table>
                <tr valign="top">

 <td> 
           
       <div id="card">  
<center><table  height="216">
    <tr>
    <td>&nbsp;</td>
    </tr>
      <tr>
    <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="397" height="54">Instruction:</td></tr>
      <tr>
      <td>Card Amount:&nbsp;<b style="color:#000;"><?php echo strtoupper($row['amount']);?></b></td></tr>
      <tr>
      <td width="122"><b style="color:#000;"><?php echo strtoupper($row['pin']);?></b></td></tr><tr>
      <td width="192">Serial no:<b style="color:#000;"><?php echo $row['serial']."  "."</b>Card type:". $row['card_type'];?></td>
  </tr>
      <tr>
        <td>  <center><img src="<?php echo "../barcodegen.1d-php5.v5.0.1/test.php?code=0000{$row['id']}00909878";?>" alt="barcode" height="60" /></center></td>

        </tr></table></center></div>
<br />
                    </td>
                    <td width="0">&nbsp;</td>	<!-- Create gap between columns -->
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