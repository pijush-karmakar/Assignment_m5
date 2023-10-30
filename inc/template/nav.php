<?php 

// $_SESSION['loggedin']=true;

?>

<div style="border-bottom: 1px solid; border-color:#eee; padding-bottom: 30px; margin-bottom:30px;">
    <div class="float-left">
        <p>Role Management System </p>
    </div>
    <div class="float-right">
		<?php
		if ( isset($_SESSION['loggedin']) &&  ! $_SESSION['loggedin'] ):
		?>
            <a href="/Assignment_m5/login.php">Log In</a>
		<?php
		else:
		?>
        <a href="/Assignment_m5/login.php?logout=true">Log Out(<?php echo $_SESSION['role']?>)</a>
		<?php
		endif;
		?>
    </div>
    <p></p>
</div>
