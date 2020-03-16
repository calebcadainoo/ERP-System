<?php
	// Check if user is logged in using the session variable
	if ( @$_SESSION['logged_in'] != 1 ) {
	 	$_SESSION['message'] = "You must log in before viewing your profile page!";
	 	echo '<script>window.location.href="./?view=signin";</script>';  
	}else {
	    // Makes it easier to read
	    $ID = $_SESSION['id'];
	    $firstname = $_SESSION['firstname'];
	    $lastname = $_SESSION['lastname'];
	    $FULLNAME = $firstname.' '.$lastname;
	    $email = $_SESSION['email'];
	    $active = $_SESSION['active'];
	    // include 'php/connect.php';
	    $sql = mysqli_query($con, "SELECT * FROM accounts WHERE id='$ID' LIMIT 1");
		while ($row = mysqli_fetch_assoc($sql)){
			$UID = $row['id'];
			$username = $row['username'];
			$email = $row['email'];
	    	$profile_pic = $row['profile_pic'];
	    	$phone = $row['phone'];
	    	$position = $row['position'];
	    	if ($position == "") { $position = "User Rank Here"; }
	    	$gender = $row['gender'];
			$rank = $row['rank'];
	    }
	}
?>
<link rel="stylesheet" type="text/css" href="css/home.css">

<!-- utility menu -->
<aside class="app_utility trans">
	<!-- utils header -->
	<header class="app_utils_header">
		<div class="header_utils_name">Top Engineering Ghana Limited</div>
		<div class="header_utils_type">ERP Software</div>
	</header>
	<!-- utils user -->
	<article class="app_utils_user">
		<!-- profile pic -->
		<figure class="user_utils_profile_pic imgfx app_theme"><img src="<?php print($profile_pic) ?>" alt=""></figure>
		<!-- rank -->
		<div class="user_utils_userRank"><?php print($position); ?></div>
		<!-- user fullname -->
		<article class="user_utils_fullname"><?php print($FULLNAME); ?></article>
	</article>
	<!-- utils body -->
	<section class="app_utils_body ui-parent">
		<!-- custom scrollbar -->
		<div class="ui-scrollbar"></div>
		<!-- custom scroll view -->
		<div class="ui-scrollable">
			<div class="utils_menu_tag">Utilities Menu</div>
			<!-- home --><a href="./">
			<div class="body_utils_menu_link trans dashboard">
				Home
			</div></a><br><br>
			<div class="utils_menu_tag utils_tag3">Dashboard Menu</div>
			<!-- default menus -->
			<article class="body_utils_default_menu">
				<!-- account --><a href="?view=account-receivables">
				<div class="body_utils_menu_link trans menu_account">
					Account Receivables
				</div></a>
				<!-- payables --><a href="?view=account-payables">
				<div class="body_utils_menu_link trans menu_payables">
					Account Payables
				</div></a>
				<!-- ledger --><a href="?view=general-ledger">
				<div class="body_utils_menu_link trans menu_ledger">
					General Ledger
				</div></a>
				<!-- billing --><a href="?view=billing">
				<div class="body_utils_menu_link trans menu_billing">
					Billing
				</div></a>
				<!-- stock --><a href="?view=stock-inventory">
				<div class="body_utils_menu_link trans menu_stock">
					Stocks/Inventory
				</div></a>
				<!-- purchase --><a href="?view=purchase-order">
				<div class="body_utils_menu_link trans menu_purchase">
					Purchase Order
				</div></a>
				<!-- sales --><a href="?view=sales-order">
				<div class="body_utils_menu_link trans menu_sales">
					Sales Order
				</div></a>
				<!-- book --><a href="?view=book-keeping">
				<div class="body_utils_menu_link trans menu_book">
					Book Keeping
				</div></a>
				<!-- book --><a href="?view=performance-records">
				<div class="body_utils_menu_link trans menu_performance">
					Performance Records
				</div></a>
				<!-- calendar --><a href="?view=work-event-calendar">
				<div class="body_utils_menu_link trans menu_calendar">
					Work Event Calendar
				</div></a>
			</article>

			<!-- utils menu -->
			<aside class="body_utils_menu">
				<div class="utils_menu_tag utils_tag2">Utilities Menu</div>
				<!-- profile --><a href="?view=profile">
				<div class="body_utils_menu_link trans <?php if(strtolower($gender)=='male'){print('male');}else{print('female');} ?>">
					Profile
				</div></a>
				<!-- users --><a href="?view=users">
				<div class="body_utils_menu_link trans users">
					Users
				</div></a>
				<!-- settings --><a href="?view=settings">
				<div class="body_utils_menu_link trans settings">
					Settings
				</div></a>
				<!-- logout --><a href="?view=logout">
				<div class="body_utils_menu_link trans logout">
					Logout
				</div></a>
			</aside>

			<!-- <a href="?view=options"><div class="app_utility_menu dashboard"><p>Dashboard</p></div></a> -->
			<!-- <a href="?view=logout"><div class="app_utility_menu logout"><p>Logout</p></div></a> -->
			<br><br>
		</div>
	</section>
</aside>
<!-- end of utility menu -->

<section class="app_holder trans">
	<!-- first nav bar -->
	<header class="app_navbarA trans">
		<!-- menu icon	 -->
		<div class="app_menu_nav trans" title="Slide Menu"></div>
		<!-- name and app box -->
		<section class="app_group_left">
			<!-- company name -->
			<!-- <article class="company_name">Top Engineering Ghana Ltd.</article> -->
			<!-- app type -->
			<!-- <article class="app_type app_text">ERP Software</article> -->
		</section>

		<aside class="app_group_right">
			<!-- user image -->
			<figure class="app_user_pic imgfx app_theme trans"><img src="<?php print($profile_pic) ?>" alt=""></figure>
			<!-- welcome text -->
			<div class="app_badge_text trans">
				<!-- hello -->
				<article class="app_hello trans">Hello <span class="captitalize"><?php print($firstname) ?></span></article>
				<!-- greeting -->
				<article class="app_greeting trans"></article>
			</div>
		</aside>
	</header>
	<!-- end of first nav bar -->

	<!-- second nav bar -->
	<header class="app_navbarB trans">
		<!-- back arrow	 -->
		<div class="app_back_nav trans" title="Back"></div>
		<!-- left -->
		<section class="app_group_left">
			<!-- page name display -->
			<div class="app_page_name">Dashboard</div>
		</section>
		<!-- right -->
		<aside class="app_group_right push_down">
			<!-- time -->
			<div class="app_time trans"></div>
			<!-- date -->
			<div class="app_date trans"><?php print(date('D jS M, Y')); ?></div>
		</aside>
	</header>
	<!-- end of second nav bar -->

	<!-- app workarea -->
	<div class="app_workarea trans"><br><br><br><aside class="app_scrollable">
		<!-- app tabs -->
			<div class="app_tab_box">
				<!-- home -->
				<a href="./"><div class="grid-5 app_tab_opt home_tab">Home</div></a>
				<div class="widtherA"></div>
				<!-- notification -->
				<a href="?view=notification"><div class="grid-5 app_tab_opt notify_tab">Notification</div></a>
			</div><br>
			<!-- end of app tabs -->
		<article class="centroid app_worksheet">
			<!-- notification count -->
			<a href="?view=notification"><div class="app_notify_count magictimeB puffIn" title="You have 15 unread notifications">15</div></a>
			
			<?php
				$view = "";
				if (isset($_GET['view'])) {
					$view = $_GET['view'];
				}

				switch ($view) {
					case 'notification':
						include 'views/notification.php';
						echo "<script>$(function() { $('.app_page_name').text('Notification'); $('.notify_tab').addClass('tab-selected'); $('.home_tab').removeClass('tab-selected'); });</script>";
						break;
					case 'profile':
						include 'views/profile.php';
						echo "<script>$(function() { $('.app_page_name').text('Your Profile'); $('.app_tab_box').hide(); $('.app_notify_count').hide(); });</script>";
						break;
					case 'users':
						include 'views/users.php';
						echo "<script>$(function() { $('.app_page_name').text('All Platform Users'); $('.app_tab_box').hide(); $('.app_notify_count').hide(); });</script>";
						break;
					case 'account-receivables':
						include 'views/account-receivables.php';
						echo "<script>$(function() { $('.app_page_name').text('Account Receivables'); $('.app_tab_box').hide(); $('.app_notify_count').hide(); });</script>";
						break;
					case 'account-payables':
						include 'views/account-payables.php';
						echo "<script>$(function() { $('.app_page_name').text('Account Payables'); $('.app_tab_box').hide(); $('.app_notify_count').hide(); });</script>";
						break;
					case 'general-ledger':
						include 'views/general-ledger.php';
						echo "<script>$(function() { $('.app_page_name').text('General Ledger'); $('.app_tab_box').hide(); $('.app_notify_count').hide(); });</script>";
						break;
					case 'billing':
						include 'views/billing.php';
						echo "<script>$(function() { $('.app_page_name').text('Billing'); $('.app_tab_box').hide(); $('.app_notify_count').hide(); });</script>";
						break;
					case 'stock-inventory':
						include 'views/stock-inventory.php';
						echo "<script>$(function() { $('.app_page_name').text('Stock/Inventory'); $('.app_tab_box').hide(); $('.app_notify_count').hide(); });</script>";
						break;
					case 'purchase-order':
						include 'views/purchase-order.php';
						echo "<script>$(function() { $('.app_page_name').text('Purchase Order'); $('.app_tab_box').hide(); $('.app_notify_count').hide(); });</script>";
						break;
					case 'sales-order':
						include 'views/sales-order.php';
						echo "<script>$(function() { $('.app_page_name').text('Sales Order'); $('.app_tab_box').hide(); $('.app_notify_count').hide(); });</script>";
						break;
					case 'book-keeping':
						include 'views/book-keeping.php';
						echo "<script>$(function() { $('.app_page_name').text('Book Keeping'); $('.app_tab_box').hide(); $('.app_notify_count').hide(); });</script>";
						break;
					case 'performance-records':
						include 'views/performance-records.php';
						echo "<script>$(function() { $('.app_page_name').text('Performance Records'); $('.app_tab_box').hide(); $('.app_notify_count').hide(); });</script>";
						break;
					case 'work-event-calendar':
						include 'views/work-event-calendar.php';
						echo "<script>$(function() { $('.app_page_name').text('Work Event Calendar'); $('.app_tab_box').hide(); $('.app_notify_count').hide(); });</script>";
						break;
					default:
						include 'views/home-base.php';
						echo "<style>.app_back_nav{display: none;}</style>";
						echo "<script>$(function() { $('.home_tab').addClass('tab-selected'); });</script>";
						break;
				}
			?>
		</article>
	</aside><br><div class="spacerA"></div><br></div>
	<!-- end of app workarea -->
</section>