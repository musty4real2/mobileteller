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

  $display = 10;
  // Determine how many pages there are...
  if (isset($_GET['p']) && is_numeric($_GET
  ['p'])) { // Already been determined.
  
  $pages = $_GET['p'];
  } else { // Need to determine.
  
  // Count the number of records:
  $q = "SELECT * FROM `pin`  WHERE `entry_date`=CURDATE()AND `card_type`='smart save' AND `status`='1' ";
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
	$query="SELECT * FROM `pin`  WHERE `entry_date`=CURDATE()AND `card_type`='smart save' AND `status`='1' ORDER BY `id` LIMIT $start, $display ";
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
    <td>&nbsp;<b style="font-size:20px; color:#00C;">Mobile</b>-<i style="color:#F00;">Teller</i>&nbsp;(Smart Save Card)</td>
   <td>Value:&nbsp;<b style="color:#000;  font-family:Arial, Helvetica, sans-serif;"><?php echo 'N'. number_format($row['amount']);?> </b></td>
    </tr>
      <tr>
   <td width="366" height="54"><b style="font-size:11px; font-family:Arial, Helvetica, sans-serif;">HOW TO USE THIS CARD.<br/>
Your phone number and bank account must be registered with Mobile-Teller 
</b><br/>
</td><td><img src="../images/naira-notes.jpg" width="100"/></td>
    </tr>
      <tr>
      <td width="366" height="20" align="center"><b style="color:#000;  font-family:Arial, Helvetica, sans-serif;" ><?php echo "SMART SAVE PIN:". strtoupper($row['pin']);?></b></td><td width="84">&nbsp;</td></tr>
 
             <tr>
               <td>
        
       <b style="font-size:10px;  font-family:Arial, Helvetica, sans-serif;">Use only your mobile-Teller registered phone number to Send PIN as  SMS  to:</b><b style="font-size:14px;">080-999-052-33</b>
        
        </td></tr> <tr>
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
	$aw=$rid;
  //paginate result set
if ($pages > 1) {
echo '<center>';
$current_page = ($start/$display) + 1;

if ($current_page != 1) {
 echo '<center><a href="printsmartsave_front_with_pagination.php?s=' .
($start - $display) . '&p=' . $pages .
'&id='.$yd.'">Previous</a></center> ';
 }

for ($i = 1; $i <= $pages; $i++) {
 if ($i != $current_page) {
 echo '<a href="printsmartsave_front_with_pagination.php?s=' .
(($display * ($i - 1))) . '&p=' .
$pages . '&id='.$yd.'">' . $i . '</a> ';
 } else {
 echo $i . ' ';
}
 }

if ($current_page != $pages) {
 echo '<center><a href="printsmartsave_front_with_pagination.php?s=' .
($start + $display) . '&p=' . $pages .
'&id='.$yd.'">Next</a></center>';
 }

 echo '</center>';// Close the paragraph.
 
}
 ?>
  <center><SCRIPT LANGUAGE="JavaScript">
<!-- Begin
if (window.print) {
document.write('<form>'
+ '<input type="button" name="print" value="  Print  " '
+ 'onClick="javascript:window.print()"></form>');
}
// End -->
</SCRIPT>
<?php
}
ob_flush();
?>
</body>
</html>