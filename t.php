<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<legend>Generate Card Pins</legend>
<center><form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<label>Number of card to be generated</label>
<input type="text" name="cardno2" autocomplete="off" placeholder="Enter the number of card you want to be produced"/><br/>
<label>Denominations</label>
<input type="text" name="denominations2" autocomplete="off" placeholder="Enter the denominations you want produced"/>
<br/>

<label>Card type</label>
<select name="cardtype2">
<option value="smart save">Smart Save</option>
<option value="utility pay">Utility pay</option>

</select><br/>
<input type="submit" name="blow" value="Generate card"/>

</form></center>
<?php
$cardno2=mysql_real_escape_string($_POST['cardno2']);
$denominations2=mysql_real_escape_string($_POST['denominations2']);
$cardtype2=mysql_real_escape_string($_POST['cardtype2']);
include("connect.php");
if(isset($_POST['blow'])){
for ($index2 = 0; $index2 < $cardno; $index2++) {
$rand6 = rand(1000000, 9999999); $rand7 = rand(1000000, 9999999);

$rand8 = rand(9999999,1000000 ); $rand9 = rand(9999999, 1000000);

$pin2 = $rand6.$rand7;
$serial2 = $rand8.$rand9;

$check2 = mysql_query("SELECT * FROM `pin` WHERE `pin`='$pin2' AND `serial`='$serial2'");
if(mysql_num_rows($check2)>0){
$index2-=1;
}elseif 
(mysql_num_rows($check2)==0) {
mysql_query("INSERT INTO `pin` (`serial`,`pin`,`amount`,`status`,`entry_date`,`card_type`) values ('$serial2','$pin2','$denominations2','1',NOW(),'$cardtype2')");
$sn2 = mysql_query("SELECT `serial`,`pin`,`amount`,`entry_date`,`card_type` FROM `pin` WHERE `pin`='$pin2' AND `serial`='$serial2'");
while ($row2 =mysql_fetch_array($sn2)) {
$pinSerial2 = $row2["serial"];
$amount2 = $row2["amount"];
$date2 = $row2["entry_date"];
$cardt2 = $row2["card_type"];
}
echo"<br/>Pin: " .$pin2 ."<br/><br/> Serials: ".$pinSerial2."<br/>Amount: ".$amount2."<br/>Card type: ".$cardt2."<br/>Date Produced: ".$date2."<br/>\n<br/>";
}
}
header("location:admin_menu.php?bill=oops&id=dooggodi&wildcat=empty&noble=noble&thief=thief&id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&&noble=noble&thief=thief");
}else{
	
echo "<br/>No values have been given please fill the from above";	
	
}

?>

</body>
</html>