<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<form method="post">
<label>number of card to be generated</label>
<input type="text" name="cardno" autocomplete="off" placeholder="Enter the number of card you want to be produced"/><br/>
<label>denominations</label>
<input type="text" name="denominations" autocomplete="off" placeholder="Enter the denominations you want produced"/>
<br/>
<input type="submit" name="a" value-"Generate card"/>

</form>
<?php
$cardno=mysql_real_escape_string($_POST['cardno']);
$denominations=mysql_real_escape_string($_POST['denominations']);

include("connect.php");
if(isset($_POST['a'])){
for ($index = 0; $index < $cardno; $index++) {
$rand1 = rand(1000000, 9999999); $rand2 = rand(1000000, 9999999);

$rand3 = rand(9999999,1000000 ); $rand4 = rand(9999999, 1000000);

$pin = $rand1.$rand2;
$serial = $rand3.$rand4;

$check = mysql_query("SELECT * FROM pin WHERE pin='$pin' AND serial='$serial'");
if(mysql_num_rows($check)>0){
$index-=1;
}elseif 
(mysql_num_rows($check)==0) {
mysql_query("INSERT INTO pin (`serial`,`pin`,`amount`,`status`,`entry_date`) values ('$serial','$pin','$denominations','valid',NOW())");
$sn = mysql_query("SELECT `serial`,`pin`,`amount`,`entry_date` FROM `pin` WHERE `pin`='$pin' AND `serial`='$serial'");
while ($row1 =mysql_fetch_array($sn)) {
$pinSerial = $row1["serial"];
$amount = $row1["amount"];
$date = $row1["entry_date"];

}
echo"<br/>Pin: " .$pin ."<br/><br/> Serials: ".$pinSerial."<br/>Amount: ".$amount."<br/>Date Produced: ".$date."<br/>\n<br/>";
}
}
}else{
	
echo "<br/>No values have been given please fill the from above";	
	
}

?>
</body>
</html>