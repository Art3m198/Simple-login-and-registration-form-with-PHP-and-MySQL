<?php 
	require 'db.php';
?>

<?php if ( isset ($_SESSION['logged_user']) ) : ?>
	You are logged in! <br/>
	Hi!<br/>

	<a href="logout.php">Exit</a>

<?php else : 
header('Location: login.php');?>




<?php endif; ?>



