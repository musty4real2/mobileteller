<?php
class mobile{

/**************************************Quuery method*****************************************************************************/
public function query($string){
	$this->string=$string;
	$l=@mysql_query($this->string) or die(mysql_error());
	return $l;
	
}

		
		}//end of mobile

?>