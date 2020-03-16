<?php
	# code...
	$sql = mysqli_query($con, "SELECT * FROM accounts WHERE id='$UID' ");
	while ($row = mysqli_fetch_assoc($sql)) {
		# code...
		$username = $row['username'];
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$email = $row['email'];
		$phone = $row['phone'];
		$folder = $row['folder'];
		$position = $row['position'];
		$profile_pic = $row['profile_pic'];

	}

	#******* UPDATE LETTER ******
	if (isset($_POST['firstname'])) {
		// image
		$img_path = uniqid().'_'.$_FILES["chosenpic"]["name"];
		$folder = $UID.'-'.$firstname;
		$userImage = 'users/'.$folder.'/'.$img_path;
		$img_save_loc = './'.$userImage;
		// text
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$phone = mysqli_real_escape_string($con, $_POST['phone']);
		$position = mysqli_real_escape_string($con, $_POST['position']);

		// check and upload image
		if ((($_FILES["chosenpic"]["type"] == "image/gif")|| ($_FILES["chosenpic"]["type"] == "image/jpeg") || ($_FILES["chosenpic"]["type"] == "image/png")  || ($_FILES["chosenpic"]["type"] == "image/pjpeg")) && ($_FILES["chosenpic"]["size"] < (500 * 10000))){
	        if(file_exists($_FILES["chosenpic"]["name"])){
	        	// file exist
	        	echo "file exist";
	        	$sql = mysqli_query($con, "UPDATE accounts SET username='$username',  firstname='$firstname',  lastname='$lastname',  email='$email',  phone='$phone', folder='$folder', position='$position' WHERE id=$UID") or die("Ouch couldn't insert your data <br><br>".mysqli_error($con));
	        	if ($sql) {
	        		echo "<div class='app_error_msg app_msg_box magictime vanishIn'>done text only</div>";
	        	}else{
	        		echo "<div class='app_error_msg magictime vanishIn'>cudnt upload</div>";
	        	}
	        }else{
	        	$img_path = uniqid().'_'.$_FILES["chosenpic"]["name"];
				$userImage = 'users/'.$folder.'/'.$img_path;
				$img_save_loc = './'.$userImage;
	            if (move_uploaded_file($_FILES["chosenpic"]["tmp_name"], $img_save_loc)) {
	            	// upload image + text
	            	$sql = mysqli_query($con, "UPDATE accounts SET profile_pic='$userImage', username='$username',  firstname='$firstname',  lastname='$lastname',  email='$email',  phone='$phone', folder='$folder', position='$position' WHERE id=$UID") or die("Ouch couldn't insert your data <br><br>".mysqli_error($con));
		        	if ($sql) {
						echo "<div class='app_error_msg app_msg_box magictime vanishIn'>Nice Data Saved And Published!</div>";
					}
		        }
	        }
	    }else{
        	$sql = mysqli_query($con, "UPDATE accounts SET username='$username',  firstname='$firstname',  lastname='$lastname',  email='$email',  phone='$phone', folder='$folder', position='$position' WHERE id=$UID") or die("Ouch couldn't insert your data <br><br>".mysqli_error($con));
    		if ($sql) {
        		echo "<div class='app_error_msg app_msg_box magictime vanishIn'>Done Text Only</div>";
        	}else{
        		echo "<div class='app_error_msg magictime vanishIn'>Couldnt Update Profile, Please Check Connection</div>";
        	}
	    }
	}
?>
			<section class="centroid500 app_profile_holder"><form method="post" enctype="multipart/form-data">
				<!-- user profile pic -->
				<figure class="profile_user_pic imgfx <?php if(strtolower($gender)=='male'){print('male-d');}else{print('female-d');} ?>">
					<img id="imgPreview" src="<?php print($profile_pic) ?>" alt="">
					<!-- edit button -->
					<label class="app-edit-btn" title="Choose Image"><input type="file" id="imgfile" class="hidebx" name="chosenpic"></label>
				</figure>
				<!-- text elements -->
				<article class="profile_text_els">
					<section class="grid_container">
					<!-- username -->
					<div class="form_txtico grid-txt50 person">
						<input type="text" name="username" class="form_signtxt" required="required" placeholder="Username..." value="<?php print($username) ?>" title="Username...">
					</div>
					<!-- firstname -->
					<div class="form_txtico grid-txt50 person">
						<input type="text" name="firstname" class="form_signtxt" required="required" placeholder="Firstname..." value="<?php print($firstname) ?>" title="Firstname...">
					</div></section>
					<!-- lastname -->
					<div class="form_txtico person">
						<input type="text" name="lastname" class="form_signtxt" required="required" placeholder="Lastname..." value="<?php print($lastname) ?>" title="Lastname...">
					</div>
					<!-- mail -->
					<div class="form_txtico mail">
						<input type="text" name="email" class="form_signtxt" required="required" placeholder="Email Address..." value="<?php print($email) ?>" title="Email Address...">
					</div>
					
					<section class="grid_container remove_padding">
					<!-- phone -->
					<div class="form_txtico grid-txt50 phone">
						<input type="text" name="phone" class="form_signtxt" required="required" placeholder="Mobile Contact..." value="<?php print($phone) ?>" title="Mobile Contact...">
					</div>
					<!-- position -->
					<div class="form_txtico grid-txt50 position">
						<input type="text" name="position" class="form_signtxt" required="required" placeholder="Office Position..." value="<?php print($position) ?>" title="Your Current Position at The Office...">
					</div></section>
					<center>
						<!-- button -->
					<input type="submit" class="form_btn trans" name="btnSign" value="Update Profile">
					</center>
				</article>
			</form></section><br><br>

<script>
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
		    reader.onload = function(e) {
		      $('#imgPreview').attr('src', e.target.result);
		    }
		    reader.readAsDataURL(input.files[0]);
		}
	}

	$("#imgfile").change(function() {
	  readURL(this);
	});
</script>