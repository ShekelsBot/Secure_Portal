<?php
class portal{

	//------------------------------ function ------------------------------//	
	function myheader($title){
		return '
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>'.$title.'</title>
    <link rel="icon" href="https://ron.viseh.com/CIS411/Examples/assets/images/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	  
	  
  </head>
  <body>
  

   <div class="container">	  
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="index.html" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <span class="fs-4"><img src="https://ron.viseh.com/CIS411/Examples/assets/images/csu-pueblo-logo.png" alt="Colorado State University – Pueblo" /></span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="index.html" class="nav-link active" aria-current="page">Dashboard</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Logout</a></li>
      </ul>
    </header>
  </div>
  
	<p>&nbsp;</p> 
	<div class="container text-start"> 
		<div class="row row-cols-1 row-cols-md-2 mb-4">    
    
             <div class="col-lg-12">
  <!--*************************************************************** Page Start Here ***************************************************************-->';
		
	}//function

	//------------------------------ function ------------------------------//	
	function myfooter(){
		return '</div></div></div>	
	
  <!--*************************************************************** Page End Here ***************************************************************-->
	<div class="container">
	  <footer class="py-5">
		<div class="row">
			<div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
			  <p><strong>&copy; <script src="https://ron.viseh.com/CIS411/Examples/assets/JS/year.js"></script> Colorado State University – Pueblo</strong>, All rights reserved.</p>
			</div>
		</div>
	  </footer>
	</div>	
	  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>	

  </body>
</html>';		
		
	}//function	


	//------------------------------ function ------------------------------//	
	function loginheader($title){
		return '
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>'.$title.'</title>
    <link rel="icon" href="https://ron.viseh.com/CIS411/Examples/assets/images/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	  
	  
  </head>
  <body>
  

   <div class="container">	  
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="index.html" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <span class="fs-4"><img src="https://ron.viseh.com/CIS411/Examples/assets/images/csu-pueblo-logo.png" alt="Colorado State University – Pueblo" /></span>
      </a>

      <ul class="nav nav-pills">
	  <!--
        <li class="nav-item"><a href="index.html" class="nav-link active" aria-current="page">Dashboard</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Logout</a></li>
	  -->
      </ul>
    </header>
  </div>
  
	<p>&nbsp;</p> 
	<div class="container text-start"> 
		<div class="row row-cols-1 row-cols-md-2 mb-4">    

  <!--*************************************************************** Page Start Here ***************************************************************-->';
		
	}//function

	//------------------------------ function ------------------------------//	
	function loginfooter(){
		return '</div></div>	
	
  <!--*************************************************************** Page End Here ***************************************************************-->
	<div class="container">
	  <footer class="py-5">
		<div class="row">
			<div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
			  <p><strong>&copy; <script src="https://ron.viseh.com/CIS411/Examples/assets/JS/year.js"></script> Colorado State University – Pueblo</strong>, All rights reserved.</p>
			</div>
		</div>
	  </footer>
	</div>	
	  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>	

  </body>
</html>';		
		
	}//function		
	
	
	
}//class










?>