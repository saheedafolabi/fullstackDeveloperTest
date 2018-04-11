<header>
	<ul>
		<li><a href="index.php">Home</a></li>
		<?php
		if(loggedin()){
			?>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="logout.php">Logout</a></li>
			<?php
		}else{
			?>
			<li><a href="register.php">Register</a></li>
			<li><a href="login.php">Login</a></li>			
			<?php
		}
		?>
	</ul>
</header>