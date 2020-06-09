<?php 
	require 'db.php';
	$data = $_POST;
	
	if ( isset($data['signup']) )
	{		
			$user = R::dispense('users');
			$user->lastname = $data['lastname'];
			$user->firstname = $data['firstname'];
			$user->group = $data['group'];
			$user->email = $data['email'];
			$user->password = $data['password'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT); 
			R::store($user);
			sleep(3);
			header('Location: welcome.php');
			exit;
	}

	if ( isset($data['login']) )
	{
		$user = R::findOne('users', 'email = ?', array($data['email']));
		if ( $user )
		{
		
			if ( password_verify($data['password'], $user->password) )
			{
			
				$_SESSION['logged_user'] = $user;
			}else
			{
				$errors[] = 'Invalid password!';
			}

		}else
		{
			$errors[] = 'The user with this username was not found!';
		}
		
		if ( ! empty($errors) )
		{
			echo '<div id="errors" style="color:red;">' .array_shift($errors). '</div><hr>';
		}

	}
?>
<?php if ( isset ($_SESSION['logged_user']) ) : 
header('Location: index.php');?>
<?php else : ?>
<!DOCTYPE html>
<html lang="en">
	<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	</head>
<body>
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
                    <li><a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">Sign up</a></li>
                  </ul>
                    </div>      

                    <div style="padding-top:30px" class="panel-body" >  
                        <form id="loginform" class="form-horizontal" role="form" action="login.php" method="post">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" autocomplete="off" type="email" class="form-control" name="email" value="" placeholder="email" required>                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" autocomplete="off" type="password" class="form-control" name="password" placeholder="password" required>
                                    </div>

                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <button type="submit" name="login" class="btn btn-success">Login</button>
                                    </div>
                                </div>  
                            </form>     



                        </div>                     
                    </div>  
        </div>
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                                       <ul class="nav nav-tabs">
                    <li><a href="#" onClick="$('#loginbox').show(); $('#signupbox').hide()">Login</a></li>
                     <li class="active"><a href="#signup" data-toggle="tab">Sign up</a></li>
                  </ul>
                            
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" role="form" action="login.php" method="post">        
								<div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" autocomplete="off" class="form-control" name="lastname" placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">First Name</label>
                                    <div class="col-md-9">
                                        <input type="text" autocomplete="off" class="form-control" name="firstname" placeholder="First Name"required>
                                    </div>
                                </div>
								                                <div class="form-group">
                                    <label for="group" class="col-md-3 control-label">Group</label>
                                    <div class="col-md-9">
                                        <input type="text" autocomplete="off" class="form-control" name="group" placeholder="Group" required >
                                    </div>
                                </div>
								<div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" autocomplete="off" class="form-control" name="email" placeholder="Email Address" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" autocomplete="off" class="form-control" name="password" placeholder="Password" required>
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <!-- Button -->                         
                                    <div class="col-md-offset-3 col-md-9">
                                      <button type="submit" name="signup" class="btn btn-success">Sign Up</button>
                                    </div>
                                </div>
                            </form>
                         </div>
                    </div>  
         </div> 
    </div>
</body>
</html>
<?php endif; ?>