<div class="super_container">
<!-- Header -->
<header class="header trans_300">
	<!-- Top Navigation -->
	<!-- Main Navigation -->
	<div class="main_nav_container">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-right">
					<div class="logo_container">
						<a href="#">hilo<span>shop</span></a>
					</div>
					<nav class="navbar">
						<ul class="navbar_menu">
							<li><a href="index.php">trang chủ</a></li>
							<li><a href="categories.php">sản phẩm</a></li>
							<li>
								<a href="checkout.php">
								<span>thanh toán</span>
								</a>
							</li>
							<li><a href="contact.php">liên hệ</a></li>
						</ul>
						<ul class="navbar_user">
							<!-- <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li> -->
							<li class="checkout">
								<a data-toggle="modal" data-target="#cart" style="cursor: pointer">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i>
								<?php 
									if(isset($_SESSION['tong_so_luong'])) {
									?>
								<span id="checkout_items" class="checkout_items"><?=$_SESSION['tong_so_luong']?></span>
								<?php 
									}
									?>
								</a>
							</li>
							<li><a href="login.php"><i class="fa fa-user" aria-hidden="true"></i></a></li>
							<?php
								if(isset($_SESSION['user'])) {
								?>
							<li style="margin: 0 1rem">
								<a href="#"><?=$_SESSION['user']['TenTK']?></a>
							</li>
							<li>
								<a href="login.php">Logout</a>
							</li>
							<?php
								}
								else {
									?>
									<a href="login.php">Đăng nhập</a>
							<?php
								}
								?>
							
							</li>
						</ul>
						<!-- Menu responsive -->
						<div class="hamburger_container">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>
<div class="fs_menu_overlay"></div>
<!-- Hamburger Menu -->
<div class="hamburger_menu">
	<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
	<div class="hamburger_menu_content text-right">
		<ul class="menu_top_nav">
			<li class="menu_item has-children">
				<a href="#">Tài khoản<i class="fa fa-angle-down"></i></a>
				<ul class="menu_selection">
				<?php
					if(!isset($_SESSION['user'])) {
					?>
					<li><a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;đăng nhập</a></li>
					<li><a href="register.php"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;đăng ký</a></li>
				<?php
					} else {
					?>
					<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?=$_SESSION['user']['TenTK']?></a></li>
					<li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;đăng xuất</a></li>
				<?php
					} 
					?>
				</ul>
			</li>
			<li class="menu_item"><a href="index.php">trang chủ</a></li>
			<li class="menu_item"><a href="categories.php">sản phẩm</a></li>
			<li class="menu_item">
				<a href="single.php">
				<span>giảm giá<sup class="text-danger"><strong>hot</strong></sup></span>
				</a>
			</li>
			<li class="menu_item"><a href="contact.php">liên hệ</a></li>
		</ul>
	</div>
</div>