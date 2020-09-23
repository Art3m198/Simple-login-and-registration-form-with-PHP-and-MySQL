<!DOCTYPE html>
<html lang="en">
	<head>
<title>Registration & Login system</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	</head>
<body>
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                    <h3 class="panel-title" align="center">Welcome</h3>
                    </div>      
                    <div style="padding-top:10px" class="panel-body" >  
<p align="center">Thanks! You are successfully registered in the system! You will be automatically redirected to the login page in 5 seconds.</p>
<p align="center">If you want, go to the page manually:
<h3 align="center"><a href = "login.php">Login</a></h3>
<script type="text/javascript" align="center">
var count = 6;
var redirect = "login.php";  
function countDown(){
    var timer = document.getElementById("timer");
    if(count > 0){
        count--;
        timer.innerHTML = "This page will redirect in "+count+" seconds.";
        setTimeout("countDown()", 1000);
    }else{
        window.location.href = redirect;
    }
}
</script>
<br>
<span id="timer">
<script type="text/javascript">countDown();</script>
</span>
                        </div>                     
                    </div>  
        </div>
    </div>
</body>
</html>