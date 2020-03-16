<?php
	/* User login process, checks if user exists and password is correct */
	$msg = "";
	$_SESSION['logged_in'] = false;
	include_once './php/heart.php';
	if ($_SESSION['logged_in'] == 1) {
		echo '<script>window.location="./"</script>';
	}
	if (isset($_POST['username'])) {
		// Escape email to protect against SQL injections
		$username = mysqli_escape_string($con, $_POST['username']);
		$sql = mysqli_query($con, "SELECT * FROM accounts WHERE username='$username' OR email='$username' LIMIT 1");

		if ( mysqli_num_rows($sql) == 0 ){ // User doesn't exist
		    echo "<div class='app_error_msg magictime vanishIn'>User with that username doesn't exist!</div>";
		}else { // User exists
		    $user = mysqli_fetch_assoc($sql);
		    
		    if ( password_verify($_POST['password'], $user['password']) ) {
		        
		        $_SESSION['id'] = $user['id'];
		        $_SESSION['email'] = $user['email'];
		        $_SESSION['firstname'] = $user['firstname'];
		        $_SESSION['lastname'] = $user['lastname'];
		        $_SESSION['userpic'] = $user['profile_pic'];
		        $_SESSION['active'] = $user['active'];

		        if (isset($_POST['remember'])) {
		        	# code...
		        }
		        
		        // This is how we'll know the user is logged in
		        $_SESSION['logged_in'] = true;

		        echo '<script>window.location="./"</script>';
		    }else {
		        echo "<div class='app_error_msg magictime vanishIn'>You have entered wrong password, try again</div>";
		    }
		}
	}

?>	

	<!-- sign in up holder -->
	<section class="sign_box"><br><br>
		<header class="company_head">
			<h1 class="trans">Top Engineering Ghana Limited</h1>
			<h3 class="trans">Enterprise Resource Planner(ERP) Software</h3>
		</header>
		<!-- sign in up -->
		<article class="sign_form trans">
			<h2>Welcome</h2>
			<br><br>
			<form method="post" action="">
				<!-- username -->
				<div class="form_txtico person">
					<input type="text" name="username" class="form_signtxt" required="required" placeholder="Username...">
				</div>
				<!-- passowrd -->
				<div class="form_txtico lock">
					<input type="password" name="password" class="form_signtxt" required="required" placeholder="Password...">
				</div>
				<br><br>
				<!-- button -->
				<input type="submit" class="form_btn" name="btnSign" value="Sign In">
				<!-- new user -->
				<a href="?view=signup">
					<div class="sign_link">New User? Create Account</div>
				</a><br>
				<!-- forgot password -->
				<a href="?view=forgotpass">
					<div class="sign_link orange_me">Forgot Password?</div>
				</a>
			</form>
		</article>
	</section>