<?php 
ob_start();
include("connect.php");
include("head.php"); 
include("class.php");
$object=new cash();
			$date=getdate();
	$currentmonth=strtoupper($date['month']);
	$currentyear=$date['year'];
	$key="$currentmonth $currentyear";
?>

<header><b class="return"><?php echo "<center><a href='menu.php?a=nonsense thing&bank={$_GET['bank']}&account={$_GET['account']}&accountn={$_GET['accountn']}&a=nonsense thinga=nonsense thinga=nonsense thinga=nonsense thinga=nonsense thinga=nonsense thinga=nonsense thinga=nonsense thing'>Back to menu</a>&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;<a href='logout.php'>logout</a>
</center>"; ?>
</b></header></b></header>



<table width="100%" border="0" >
<tr>
<td width="50%" align="left" valign="top"><h1>Dr</h1></td>
<td width="50%" align="right" valign="top"><h1>Cr</h1></td>

</tr>
<tr>
<!---BIG TABLE------------------------------------------------------------***************************************************-->

<!---DIVIDE big table into two columns-----------------***************************************************-->

<td align="right" valign="top"><!---FIRST column***************************************-----------------***************************************************-->


<!---FETCH FROM DATABASE***************************************-----------------***************************************************-->
<?php
include("connect.php");
$getcredit="SELECT * FROM `dr` WHERE `senders_account_number`='{$_GET['account']}'  AND `key`='$key' AND `closed`='1'";
$query=mysql_query($getcredit);

?>


  <table width='100%' border='0' style='margin:auto;' class="table">
<tr style="background-color:#09F; color:#FFF;" height="45px">
<th>Date.</th>
<th>Tre. Rec</th>
<th>Recieved From</th>
<th>Head</th>
<th>Sub-Head</th>
<th>Sender's Acc No.</th>
<th>Sender Bank</th>
<th>Amount</th>

<th>Bank C. Slip</th>
<th>Revenue Debit </th>
  </tr>
  
<!---FETCH RESULT SET FROM DATABASE***************************************-************************************-->
<?php 
while($row=mysql_fetch_array($query)){
 $bg = ($bg=='#eeeeee' ? '#ffffff' :
'#eeeeee'); // Switch the background 
?>
<!---FETCH RESULT SET FROM DATABASE***************************************-************************************-->

<tr bgcolor="<?php echo $bg;?>">
  <td><?php echo $row['date'];?></td>
  <td><?php echo $row['treasury_reciept_no'];?></td>
  <td><?php echo $row['recieved_from'];?></td>
  <td><?php echo $row['head'];?></td>
  <td><?php echo $row['sub_head'];?></td>
  <td><?php echo $row['senders_account_number'];?></td>
  <td><?php echo $row['senders_bank'];?></td>
  <td><?php echo $row['amount'];?></td>
 
     <td><?php echo $row['bank_credit_slip'];?></td>
     <td><?php echo $row['revenue_debit']; ?></td>

</tr>

<?php }?>

<!--- END OF  RESULT SET FROM DATABASE***************************************-************************************-->

 </table>


 </td> <!---END FIRST column********************************************************************************************-->
  
  
<!---OPEN SECOND column***************************************************************************-->
 <td align="left" valign="top">
  <table width='100%' border='0' style='margin:auto;' class="table">
  <!---FETCH FROM DATABASE***************************************-----------------***************************************************-->

<?php
include("connect.php");
$getcredit="SELECT * FROM `cr`  WHERE `senders_account_number`='{$_GET['account']}' AND `status`='1'  AND `key`='$key'  AND `closed`='1' ";
$query=mysql_query($getcredit);

?>
<tr style="background-color:#09F; color:#FFF;">
<th>Date.</th>
<th>Dept V.No</th>
<th>Whom Paid</th>
<th>Treasury Receipt</th>
<th>TPV No</th>
<th>Revenue Debit</th>
<th>Head</th>
<th>Sub-Head</th>
<th>Amount</th>

  </tr>
  

<!---FETCH RESULT SET FROM DATABASE***************************************-************************************-->
<?php 
while($row=mysql_fetch_array($query)){
	$id=$row['id'];
	$sender=$row['senders_bank'];
 $bg = ($bg=='#FF9' ? '#ffffff' :
'#eeeeee'); // Switch the background 
?>
<!---FETCH RESULT SET FROM DATABASE***************************************-************************************-->

<tr bgcolor="<?php echo $bg;?>">
  <td><?php echo $row['date'];?></td>
 <td><?php echo $row['debit_voucher'];?></td>
  <td><?php echo $row['beneficiary_name'];?></td> 
  <td><?php echo $row['treasury_receipt_no'];?></td>
  
  <td><?php echo $row['tpv_no'];?></td>
  <td><?php echo $row['revenue_debit'];?></td>
  <td><?php echo $row['head'];?></td>
  <td><?php echo $row['sub_head'];?></td>
   <td><?php echo $row['amount'];?></td>

  </tr>
  
  <?php }?>


</table><!---CLOSE TABLE IN SECOND column****************************************************************************************-->
 
 
 
 
 </td>
 <!---END SECOND column***************************************-----------------***************************************************-->



</tr><!---CLOSE ROW IN BIIG TABLE****************************************************************************************-->




















<?php include("footer.php"); ?>