<?php
	require 'php/heart.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="theme-color" content="#1A262B">
	<meta name="msapplication-navbutton-color" content="#1A262B">
	<meta name="apple-mobile-web-app-status-bar-style" content="#1A262B">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Top Engineering Ghana Limited ERP</title>
	<link rel="shortcut icon" type="image/png" href="ico/favicon.png" />
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/frontuiux.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/magic.min.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.ui.js"></script>
	<script type="text/javascript" src="js/dashboard.js"></script>
</head>
<body>
	<?php
		$view = "";
		if (isset($_GET['view'])) {
			$view = $_GET['view'];
		}

		switch ($view) {
			case 'signup':
				include 'views/signup.php';
				break;
			case 'signin':
				include 'views/signin.php';
				break;
			case 'forgotpass':
				include 'views/forgotpass.php';
				break;
			case 'home':
				include 'views/home.php';
				break;
			case 'logout':
				include 'views/logout.php';
				break;
			default:
				include 'views/home.php';
				break;
		}
	?>

	<!-- app copy -->
	<footer class="app_copy">
		Powered by Limitless Apps
	</footer>
</body>
</html>