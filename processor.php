<?php
include("dbConfig.php");

function randomString($length = 6) {
	$str = "";
	$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	return $str;
}

 
	  
	  

$status = $_POST['status'];

 if($status =="shorten" )
 {
	 $url = mysqli_real_escape_string($con,$_POST['url']);
 
	 
 
	 $rand = randomString(2); //this will generate shorten character of length 2. You can change the value to others.
	 
	 
	 
	 $exists = 0;
	 
	 $checker = mysqli_query($con,"SELECT * FROM redirects");
	 while($rw = mysqli_fetch_array($checker))
	 {
		  if($rw['string'] == $rand)
		  {
			  
			  $exists=1;
		  }
		  
		 
	 }
	 
	 if($exists !=1)
	 {
	 
	 $ins = mysqli_query($con,"INSERT INTO redirects(`string`,`url`) VALUE('$rand','$url')");
      
	  echo $rand;
       	 
	}
	else
	{
		
		echo 99;
		
	}
	 
 }
 
 
  
?>