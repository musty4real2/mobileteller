<?php
class mobile{
	public $photo;
public $fetch;
public $cardamount;
/**************************************Quuery method*****************************************************************************/
public function query($string){
	$this->string=$string;
	$l=@mysql_query($this->string) or die(mysql_error());
	return $l;
	
}

/*============================================================FUNCION======================================================================================*/
	
		public function fetchRecord($id, $table){
			
		$this->id=$id;
		$this->table=$table;
			
		$fetch=@mysql_query("SELECT * FROM `{$this->table}` WHERE `id`='{$this->id}'") or die(mysql_error());
			
		return $fetch;
		
		}//fucntion FetchRecord

public function fetchRecordAll($table){
			
		$this->table=$table;
			
		$fetch=@mysql_query("SELECT * FROM `{$this->table}`") or die(mysql_error());
			
		return $fetch;
		
		}//fucntion FetchRecord
		
			public function fetchCardid($id, $table){
			
		$this->id=$id;
		$this->table=$table;
			
		$fetch=@mysql_query("SELECT * FROM `{$this->table}` WHERE `pin`='{$this->id}'") or die(mysql_error());
			
		return $fetch;
		
		}//fucntion FetchRecord
		
	
/*============================================================FUNCION======================================================================================*/		
	/******************************imageResize*********************************************************************/

		
	public function imageResize($width, $height, $target){
		
		//takes the larger size of the width and height and applies the formular accordingly.. this is so this script will work dynamically with any size
		
		if($width>$height){
			$percentage = ($target/$width);
			}else {
				$percentage=($target / $height);
			}
			//gets the new value and applies the percentage, then rounds the values
			$width=round($width*$percentage);
			$height=round($height*$percentage);
			//returns the new sizes in html tag format... this is so you can plug this function inside an image tag and just get the 
			return "width=\"$width\" height=\"$height\"";
		
		}
	/******************************END*********************************************************************/


//==============================================================================================================================/
//==============================================================================================================================/

	public function displayPhoto($photo, $folder, $scale){
		$this->photo=$photo;
		$this->folder=$folder;

		$this->scale=$scale;
	$pic=getimagesize("{$this->folder}/{$this->photo}");
	?>
  <img style="border:1px solid #999; padding:1px;"  class="pic" src="<?php echo "{$this->folder}/{$this->photo}";?>" 
   <?php echo $this->imageResize($pic[0], $pic[1], $this->scale);?> />
		
        <?php }
		
		
		
			public function countStaff(){
				$count=$this->query("SELECT COUNT(*) AS `total` FROM `users`");
				
				while ($row=mysql_fetch_array($count)){
				echo $row['total'];
				}
				
				}
					public function countSus(){
				$count=$this->query("SELECT COUNT(*) AS `total` FROM `suscriber`");
				
				while ($row=mysql_fetch_array($count)){
				echo $row['total'];
				}
				
				}
						public function countInv(){
				$count=$this->query("SELECT COUNT(*) AS `total` FROM `pin` WHERE `status`='0'");
				
				while ($row=mysql_fetch_array($count)){
				echo $row['total'];
				}
				
				}
				
						public function countVa(){
				$count=$this->query("SELECT COUNT(*) AS `total` FROM `pin` WHERE `status`='1'");
				
				while ($row=mysql_fetch_array($count)){
				echo $row['total'];
				}
				}
				
										public function count1(){
				$count=$this->query("SELECT COUNT(*) AS `total` FROM `pin` WHERE `status`='1' AND `card_type`='smart save'");
				
				while ($row=mysql_fetch_array($count)){
				echo $row['total'];
				}
				}
											public function count2(){
				$count=$this->query("SELECT COUNT(*) AS `total` FROM `pin` WHERE `status`='1' AND `card_type`='speed pay'");
				
				while ($row=mysql_fetch_array($count)){
				echo $row['total'];
				}
				}
											public function count3(){
				$count=$this->query("SELECT COUNT(*) AS `total` FROM `pin` WHERE `status`='1' AND `card_type`='utility pay'");
				
				while ($row=mysql_fetch_array($count)){
				echo $row['total'];
				}
				}
				public function currentDate(){
		echo date('F j, Y g:i A');;
		}
		public function getBank(){
		
		$select="SELECT * FROM `bank` ORDER BY `name` ASC";
		$get=@mysql_query($select) or die(mysql_error());
		return $get;
		}//getBank
		public function generateSummaryByBank($bank){
		$this->bank=$bank;
		$query1="SELECT SUM(balance) FROM `suscriber` WHERE `bank_name`='{$this->bank}'";
		$result1=mysql_query($query1) or die(mysql_error());

		while($row=mysql_fetch_array($result1)){
		$tot=$row['SUM(balance)'];
		if($tot==0){$tot="0.00";}
	
		echo "<span style='text-decoration:line-through; font-weight:bold;'>N</span>".$tot;

		}//while
		
		}//generateSummaryByBank
		
		public function generatemobileSumTotal(){
		$this->bank=$bank;
		$query1="SELECT SUM(balance) FROM `suscriber`";
		$result1=mysql_query($query1) or die(mysql_error());

		while($row=mysql_fetch_array($result1)){
		$tot=$row['SUM(balance)'];
		if($tot==0){$tot="0.00";}
	
		echo "<span style='text-decoration:line-through; font-weight:bold;'>N</span>".$tot;

		}//while
		
		}//generateSummaryByBank

							public function totalMoney(){
				$count1=$this->query("SELECT * FROM `suscriber`");
				
				while ($row=mysql_fetch_array($count1)){
				$a+=$row['balance'];
			
				
				}
							echo 'N'.$a;
							}
		
			public function fetchCard($pin, $table){
			
		$this->pin=$pin;
		$this->table=$table;
		$fetchcard=@mysql_query("SELECT * FROM `{$this->table}` WHERE `pin`='{$this->id}' AND `status`='1'") or die(mysql_error());
			if($fetchcard){
				echo "Card Pin is Valid <br/> ";
				
			$set=$this->fetchCardid($this->pin,"pin");
				while($st=mysql_fetch_array($set)){
				$cardamount=$st['amount'];
				echo "Card Amount: N".$st['amount'];
				
				}
				
			}	
			
			
		return $fetchcard;
		
		}
		
	
			public function fetchDepositorSelect($id,$table){
			
			$this->id=$id;
		$this->table=$table;
	
				$set11=@mysql_query("SELECT * FROM `{$this->table}` WHERE `id`='{$this->id}'") or die(mysql_error());;
				while($d=mysql_fetch_array($set11)){
					
				
					echo "<br/>" ." <br/>The Depositors Balance= N". $d['balance'];
					
				}
				return $set11;
		}
		
		
									public function getName($tid){
	$this->tid=$tid;
	$fetchub=$this->query("SElECT * FROM `suscriber` WHERE `id`='{$this->tid}'");
	while($row=mysql_fetch_array($fetchub)){
		return $row['title'].' '.$row['surname'].' '.$row['first_name'].' '.$row['middle_name'];
		}//while
							}
							
							
							
							////////////////////////////////////////////////////////////////////////////////////////////////
				
		}//end of mobile

?>