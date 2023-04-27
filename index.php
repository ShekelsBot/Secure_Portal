<?php
/*
Andrew Bruckbauer
4/26/2023
CIS 411
Secure Portal Final
*/
spl_autoload_register(function ($class){
    include 'classes/'. $class . '.class.php';
});
echo (new portal())->loginheader("CIS411 Portal");

echo '
    <div class="col-lg-4"><p>&nbsp;</p></div> 
    <div class="col-lg-4"><h1>CIS411 Bruckbauer</h1><br>
';

if(isset($_GET['error'])){
    echo '<p class"text-danger">'.$_GET['error'].'</p>';
}

echo '
    <form action="process.php" method="post" enctype="multipart/form-data">				
        <input class="form-control" type="email" name="email" placeholder="Email" required autofocus /><br>

        <input class="form-control" type="password" name="password" placeholder="Password" /><br>

        <button type="submit" name="login" value="Submit" class="btn btn-primary">Login</button>					
        <button type="reset" name="reset" value="Clear" class="btn btn-warning">Clear</button>	
    </form><br><br>	
</div> 

<div class="col-lg-4"><p>&nbsp;</p></div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> 
';

echo (new portal())->loginfooter();
?>
