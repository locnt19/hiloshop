<!DOCTYPE HTML>
<?php
session_start();
if(isset($_SESSION['user'])) {
	echo "<script>window.history.back()</script>";
}
?>
	
<html>
<head>
<title>Login - HiloShop</title>
<!-- Custom Theme files -->
<link href="styles/style1.css" rel="stylesheet" type="text/css" media="all"/>
<link href="styles/style2.css" rel="stylesheet" type="text/css" media="all"/>
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
		if(isset($_POST['username']) && isset($_POST['password'])) {
			require('lib/connection.php');

			# Buoc 2: Tao cau truy van SQL
			$sql = "SELECT * FROM `tai_khoan` WHERE `TenTK`='".$_POST['username']."' AND `MatKhau`='".md5(($_POST['password']))."' ";
			
			# Buoc 3: thuc thi SQL
			$result = $conn->query($sql);
			$n = $result->num_rows;
			if($n > 0) {
				$row = $result->fetch_assoc();
				if($row > 0) {
					$_SESSION['user'] = $row;
					echo "<script>
							alert('Đăng nhập thành công');
							window.history.back();
						</script>";
				}
			}
			else {
				echo "<script>alert('Sai tài khoản hoặc mật khẩu')</script>";
			}
			# Buoc 4: Dong ket noi
			$conn->close();
		}
	?>

	<form method="POST">
<!--header start here-->
		<div class="header">
				<div class="header-main">
				       <h1>Login</h1>
					<div class="header-bottom">
						<div class="header-right w3agile">
							
							<div class="header-left-bottom agileinfo">
								
							 <form action="#" method="post">
								<input type="text"  placeholder="Tài khoản" name="username"/>
							<input type="password"  placeholder="Mật khẩu" name="password" />
								<div class="remember">
					             <span class="checkbox1">
									   <label class="checkbox"><input type="checkbox" name="" checked=""><i> </i>Ghi nhớ đăng nhập</label>
								 </span>
								 <div class="forgot">
								 	<h6><a href="#">Quên mật khẩu?</a></h6>
								 </div>
								<div class="clear"> </div>
							  </div>
							   
								<input type="submit" value="Login" name="btn_login">
							</form>	
							<div class="header-left-top">
								<div class="sign-up"> <h2>hoặc</h2> </div>
							
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
<script src="js/jquery-3.2.1.min.js"></script>
</body>
</html>