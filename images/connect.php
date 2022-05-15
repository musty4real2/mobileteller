<?php
		$connection=@mysql_connect("localhost", "quickacq", "m849SwJn4r");
		if(!$connection){
		die("<p class=\"error\">could not connect to the local server".mysql_error()."</p>");
		}
		
		$dbcnx=@mysql_select_db("quickacq_mteller", $connection);
		if(!$dbcnx){
		die("<p class=\"error\">Sorry could not connect to alovera database at this time:".mysql_error()."</p>");
		}
		
		
		
?>