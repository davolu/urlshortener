  
<?php 
 

include("dbConfig.php");

 

$id = $_GET['id'];
 

  
$query =  mysqli_query($con,"SELECT * FROM redirects   ");

 $page404 = 0;
 
 $rdpage="";
 
 while($row = mysqli_fetch_array($query) )
 {
	 
	 if($row['string'] =="$id")
	 {
		 
	
   	 $page404++;
	 
	 $rdpage=$row['url'];
 
	 break;
	 
	      
	 }
	 
	 
 }
 
 
 
 if($page404 >0)
 {
	 //redirects
  header("Location: $rdpage");
	  
 }
 
 
 else
 {
	 //move to 404 error page404
 header("Location:error.html");
 }










?>