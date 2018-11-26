<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<?php
session_start();
// Kiểm tra đã đăng nhập chưa?
if(isset($_SESSION['dang_nhap'])) {
	header("Location:index.php");
}
	
?>
	
<html>
<head>
<title>Login - HiloShop</title>
<script src="js2/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css2/style1.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css2/style2.css" rel="stylesheet" type="text/css" media="all"/>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="keywords" content="Classy Login form Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
</head>
<body>

		<?php
		if(isset($_POST['username']) 
		&& isset($_POST['password'])) {
			require('lib/connection.php');
			# Buoc 2: Tao cau truy van SQL
			$sql = "SELECT * FROM `tai_khoan` WHERE `username`='".$_POST['username']."' AND `password`='".($_POST['password'])."' ";
			
			# Buoc 3: thuc thi SQL
			$result = $conn->query($sql);
			$n = $result->num_rows;
			if($n > 0) {
				$user = $result->fetch_assoc();
			}
			# Buoc 4: Dong ket noi
			$conn->close();
			
			if($n > 0) {
				// Đưa thông tin của người đăng nhập vào session
				$_SESSION['dang_nhap'] = $user;
				header("Location:index.php");
			} else {
				echo "Tên đăng nhập hoặc mật khẩu chưa đúng";
			}
		}
	?>

	<form method="POST" action="login.php">
<!--header start here-->
		<div class="header">
				<div class="header-main">
				       <h1>Login Form</h1>
					<div class="header-bottom">
						<div class="header-right w3agile">
							
							<div class="header-left-bottom agileinfo">
								
							 <form action="#" method="post">
								<input type="text"  placeholder="User name" name="username"/>
							<input type="password"  placeholder="Password" name="password" />
								<div class="remember">
					             <span class="checkbox1">
									   <label class="checkbox"><input type="checkbox" name="" checked=""><i> </i>Remember me</label>
								 </span>
								 <div class="forgot">
								 	<h6><a href="#">Forgot Password?</a></h6>
								 </div>
								<div class="clear"> </div>
							  </div>
							   
								<input type="submit" value="Login" name="btn_login">
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
<!--header end here-->
<!--footer end here-->
</body>
</html>