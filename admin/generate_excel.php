<?php
$connection=@mysql_connect("localhost","root","");
 if(!$connection){
	  die("<p>Access denied".mysql_error()."</p>"); }

$dbcnx=@mysql_select_db("mobile_teller", $connection);
 if(!$dbcnx){
	 die("<p>Access Denied".mysql_error()."</p>");
 }
//create query to select as data from your table
$select = "SELECT * FROM `pin` WHERE `entry_date`=CURDATE()";

//run mysql query and then count number of fields
$export = mysql_query ( $select ) 
       or die ( "Sql error : " . mysql_error( ) );
$fields = mysql_num_fields ( $export );

//create csv header row, to contain table headers 
//with database field names
for ( $i = 0; $i < $fields; $i++ ) {
	$header .= mysql_field_name( $export , $i ) . ",";
}

//this is where most of the work is done. 
//Loop through the query results, and create 
//a row for each
while( $row = mysql_fetch_row( $export ) ) {
	$line = '';
	//for each field in the row
	foreach( $row as $value ) {
		//if null, create blank field
		if ( ( !isset( $value ) ) || ( $value == "" ) ){
			$value = ",";
		}
		//else, assign field value to our data
		else {
			$value = str_replace( '"' , '""' , $value );
			$value = '"' . $value . '"' . ",";
		}
		//add this field value to our row
		$line .= $value;
	}
	//trim whitespace from each row
	$data .= trim( $line ) . "\n";
}
//remove all carriage returns from the data
$data = str_replace( "\r" , "" , $data );

$file_name=strtotime("now")."_pins";
//create a file and send to browser for user to download
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$file_name.".csv");
print "$header\n$data";
exit;
?>
<?php echo "<a href='admin_menu.php?id={$_GET['id']}&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief&noble=noble&thief=thief'>Home</a>"; ?>