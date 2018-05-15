<?php $error; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/Meawer/Bundles/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/Meawer/Bundles/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/Meawer/Bundles/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/Meawer/Bundles/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/Meawer/Bundles/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/Meawer/Bundles/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/Meawer/Bundles/css/util.css">
	<link rel="stylesheet" type="text/css" href="/Meawer/Bundles/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
				<form action="/Meawer/PublishMeaw/saveMeaw"  class="login100-form validate-form" method="POST">
					<?php  
			 			if (isset($error)) { ?>
							<div class="wrap-input100 alter-validate ">
							<p><?= $error ?></span>
							</div>
					<?php } ?>
					<span class="login100-form-title">
						Welcome to Meawer!!
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text-box" name="message" placeholder="your message here">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button type="submit"  class="container-login100-form-btn"  style="background-color: #57b846;">
							Meaw!
						</button>
					</div>
				</form>
			</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="/Meawer/Bundles/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/Meawer/Bundles/vendor/bootstrap/js/popper.js"></script>
	<script src="/Meawer/Bundles/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/Meawer/Bundles/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/Meawer/Bundles/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
