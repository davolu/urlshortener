<?php
 
 include("dbConfig.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $website_title; ?> </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

 

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 
	
</head>

<body>

     <?php
 
 
  include("header.php");
 ?>

 
 
        <div class="container-fluid" style="background: url(img/bg.jpg); height:600px;  padding-top:200px;">

        <div class="row">
        <div class="col-md-3">	</div>
				
        <div class="col-md-6"  >
				
        <div class=" text-center">
        <h4 style="color:white;">Enter Url</h4>
                      
				<h3>
				<input type="text" id="url" class="input-lg form-control " placeholder="Paste Url here" style="color:black;"/>   
				<br/>						
				</h3> 
						
	   <button   onclick="shorten()" class="btn btn-success btn-lg"><i class="fa   fa-fw"></i> <span class="network-name">Trim It!</span></button>
                <br/>
                <br/>
				
 
        </div>
					
					
					<!--The shorterned Url result div-->
			        <div id="rslt" style="background:white; display:none;" >	
					
		<img src="img/spinner.gif" id="loader" style="display:none; width:40px !important; height:40px !important;"/>
					
		<div class="row" style="background:white; padding:10px;">
		 
		<div class="col-md-6">
		<a id="result_url"    style="color:dodgerblue;" target="_blank"> </a>           
		</div>
		<div class="col-md-6">
		<button class="btn btn-default" onclick="copyToClipboard('#result_url')">Copy </button>
		</div>
		
		</div>
					</div>
		       <!--./The shorterned Url result div-->
			   
			   
			   
                </div>
				
				 <div class="col-md-3"></div>
				 
				 
				 
            </div>

        </div>
        <!-- /.container -->

 

 

 
 
 

   <?php

    
   
include("footer.php");
?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<script>
	
	<!--The function that makes the call to shorten-->
	function shorten()
	{
 
		
		var url = document.getElementById("url");
	 
		 
		 
		 
		
		var result_url = document.getElementById("result_url");
 
		var loader = document.getElementById("loader");
		var rslt = document.getElementById("rslt");
		
		loader.style.display="block";
		
		$.ajax({
			
			url: "processor.php",
			type:"post",
			
			data:{
				
				status:"shorten",
				url: url.value,
		  
			},
			
			success: function(r)
			{
				
		 
				if(r == 99)
				{
					
				 
			      //make sure each string is unique
					shorten();
				}
				 
					 
				else
					
					
					{
						rslt.style.display="block";
						result_url.style.display="block";
						result_url.href= ""+r;
						result_url.innerHTML= "<?php echo $website_name; ?>"+r;
					    loader.style.display="none";
					}
					
					
			}
			
		});
		 
		
	}
	
	
	//The copy function
	function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}

	
	</script>
</body>

</html>
