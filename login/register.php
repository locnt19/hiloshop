<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style2.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Classy Login form Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<?php
		if(isset($_POST['username']) 
		&& isset($_POST['password'])) {
			require_once("lib/connection.php");
			# Buoc 2: Tao cau truy van SQL
			$sql = "INSERT INTO `tai_khoan`(`username`, `password`) VALUES ('".$_POST['username']."','".$_POST['password']."')";

			# Buoc 3: thuc thi SQL
			if($conn->query($sql) === TRUE) {
				echo "Đăng ký thành viên thành công!";
			} else {
				echo "Đăng ký thành viên thất bại";
			}			

			# Buoc 4: Dong ket noi
			$conn->close();
		}
	?>


 <form action="register.php" method="POST">
		<div class="header">
			<div class="header-main">
			       <h1> Register Form</h1>
				<div class="header-bottom">
					<div class="header-right w3agile">					
						<div class="header-left-bottom agileinfo">						
							<form action="#" method="post">
								<input type="text" id="txtEmail" name="username"/>
								<input type="password" id="txtPassword" name="password"/>
							<input type="submit" value="Register" name="btn_submit">
						</form>	
						<div class="header-left-top">
							<div class="sign-up"> <h2>or</h2> </div>				
						</div>
						<div class="header-social wthree">
								<a href="#" class="face"><h5>Facebook</h5></a>
								<a href="#" class="twitt"><h5>Twitter</h5></a>
						</div>					
						</div>
					</div>
				</div>
			</div>
		</div>
</form>
</body>
</html>