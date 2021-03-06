<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Website Modules</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<!-- Load jQuery -->
		<script async src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<!-- bx-slider CSS -->
		<link href="bx-slider/lib/jquery.bxslider.css" rel="stylesheet" />
		<!-- reCAPTCHA js -->
		<script async src='https://www.google.com/recaptcha/api.js'></script>

		<style media="screen">
			#map {
				height: 400px;
				width: 100%;
			}
		</style>
	</head>
	<body>
		<?php include 'bx-slider/index.php'; ?>

		<div class="container col-md-6 col-md-offset-3">
			<br>
			<?php include 'fuzzy-finder/index.php'; ?>
			<br>
			<hr>
			<br>
			<?php include 'google-maps/index.php'; ?>
			<br>
			<hr>
			<?php include 'contact-form/index.php'; ?>
		</div>

		<!-- Bootstrap JS Libs -->
		<script ansyc src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script defer src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	</body>
</html>
