<?php
	$msg = "";
	include_once './php/heart.php';
	if ($_SESSION['logged_in'] == true) {
		echo '<script>window.location="../"</script>';
	}
	if (isset($_POST['email'])) {
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['firstname'] = $_POST['firstname'];
		$_SESSION['lastname'] = $_POST['lastname'];
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['phone'] = $_POST['phone'];
		$_SESSION['gender'] = $_POST['gender'];
			// else{
				// securing the data
				// $username = preg_replace("#[^0-9a-z]#i", "", $username);
				// $fname = preg_replace("#[^0-9a-z]#i", "", $fname);
				// $lname = preg_replace("#[^0-9a-z]#i", "", $lname);
				// $pass1 = sha1($pass1);
				// $email = mysql_real_escape_string($email);

		// Escape all $_POST variables to protect against SQL injections
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$phone = mysqli_real_escape_string($con, $_POST['phone']);
		$gender = mysqli_real_escape_string($con, $_POST['gender']);
		$password = mysqli_real_escape_string($con, password_hash($_POST['password'], PASSWORD_BCRYPT));
		$hash = mysqli_real_escape_string($con, md5( rand(0,1000) ) );

		// check for duplicates
		$user_query = mysqli_query($con, "SELECT username FROM accounts WHERE username='$username' LIMIT 1") or die("Could not check Username");
		$count_username = mysqli_num_rows($user_query);
		$email_query = mysqli_query($con, "SELECT email FROM accounts WHERE email='$email' LIMIT 1") or die("Could not check Username");
		$count_email = mysqli_num_rows($email_query);

		if ($count_username > 0) {
			echo "<div class='app_error_msg magictime vanishIn'>Your username is already in use</div>";
		}else if ($count_email > 0) {
			echo "<div class='app_error_msg magictime vanishIn'>Your email is already in use</div>";
		}else{
			// insert members
			$ip_address = $_SERVER['REMOTE_ADDR'];
			$sql = mysqli_query($con, "INSERT INTO accounts (username, firstname,  lastname, email, phone, gender, password, hash, ip_address, sign_up_date)
									VALUES ('$username', '$firstname', '$lastname', '$email', '$phone', '$gender', '$password', '$hash', '$ip_address', CURRENT_TIMESTAMP())") 
									or die("Ouch couldn't insert your data <br><br>".$con->error);
			// user folder
			$member_id = mysqli_insert_id($con);
			$folder = "users/".$member_id."-".$firstname;
			echo $folder."<br>";
			$sql_folder = mysqli_query($con, "INSERT INTO accounts (folder) VALUES '$folder' WHERE id='$member_id'");
			
			if ($sql){
		    	if ($sql_folder) {
		    		mkdir("./".$folder, 0755);
		    	}else{
		    		// die("Failed");
		    	}
				// $msg = "You have now been signed up";

		        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
		        $_SESSION['logged_in'] = true; // So we know the user has logged in
		        $_SESSION['message'] =
		                
		                "Confirmation link has been sent to $email, please verify
		                 your account by clicking on the link in the message!";

		        // Send registration confirmation link (verify.php)
             	ini_set('smtp_port',25);
             	$headers =  'MIME-Version: 1.0' . "\r\n"; 
				$headers .= 'From: Your name <info@address.com>' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		        $to      = $email;
		        $subject = 'Account Verification ( IAO Platform )';
		        $message_body = '
			        Hello '.$firstname.',

			        Thank you for signing up!

			        Please click this link to activate your account:

			        '.$_SERVER['SERVER_NAME'].'?view=verify&email='.$email.'&hash='.$hash;  

			    print('<script>window.location.href="./?view=signin"</script>');
		        mail( $to, $subject, $message_body, $headers );

		    }else {
		        echo "<div class='app_error_msg magictime vanishIn'>Registration failed!</div>";
		    }
		}
	}

	echo $msg;
?>	
	<!-- sign in up holder -->
	<section class="sign_box"><br><br>
		<header class="company_head">
			<h1 class="trans">Top Engineering Ghana Limited</h1>
			<h3 class="trans">Enterprise Resource Planner(ERP) Software</h3>
		</header>
		<!-- sign in up -->
		<article class="sign_form trans">
			<h2>Create Account</h2>
			<br><br>
			<form method="post" action="">
				<!-- username -->
				<div class="form_txtico person">
					<input type="text" name="username" class="form_signtxt" required="required" placeholder="Username...">
				</div>
				<!-- firstname -->
				<div class="form_txtico person">
					<input type="text" name="firstname" class="form_signtxt" required="required" placeholder="Firstname...">
				</div>
				<!-- lastname -->
				<div class="form_txtico person">
					<input type="text" name="lastname" class="form_signtxt" required="required" placeholder="Lastname...">
				</div>
				<!-- email -->
				<div class="form_txtico mail">
					<input type="text" name="email" class="form_signtxt" required="required" placeholder="Email Address...">
				</div>
				<!-- phone -->
				<div class="form_txtico phone">
					<input type="text" name="phone" class="form_signtxt" required="required" placeholder="Phone Number...">
				</div>
				<!-- passowrd -->
				<div class="form_txtico lock">
					<input type="password" name="password" class="form_signtxt" required="required" placeholder="Confirm Password...">
				</div>
				<!-- gender -->
				<label class="form_lbl">Male <input type="radio" name="gender" required="required" value="Male"></label>
				<label class="form_lbl">Female <input type="radio" name="gender" required="required" value="Female"></label>
				<br><br>
				<!-- button -->
				<input type="submit" class="form_btn" name="btnSign" value="Sign Up">
				<!-- new user -->
				<a href="?view=signin">
					<div class="sign_link">Already Have Account? Sign In</div>
				</a>
			</form>
		</article>
	</section>
	<!-- end of sign in up holder -->