<!DOCTYPE html>
<html lang="vi">
	<head>
		<?php
			include ("lib/header.master.php");
			include ("lib/css.single.php");
			?>
	</head>
	<body>
		<?php
			include ("lib/nav.header.php");
			?>
		<div class="container single_product_container">
			<div class="row">
				<div class="col">
					<!-- Breadcrumbs -->
					<div class="breadcrumbs d-flex flex-row align-items-center">
						<ul>
							<li><a href="index.php">Trang chủ</a></li>
							<?php 
								if(isset($_GET["MaSP"])) {
									$maSP = $_GET["MaSP"];
									include ("lib/connection.php");
									// $sql = "SELECT * FROM san_pham WHERE MaSP=$maSP";
									$sql = "select * from san_pham where MaSP='$maSP'";
									$result = $conn->query($sql);
									if($result->num_rows > 0) {
										$row = $result->fetch_assoc();
								?>
							<li><a href="categories.php"><i class="fa fa-angle-right" aria-hidden="true"></i><?=$row["NSX"]?></a></li>
							<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i><?=$row["TenSP"]?></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-7">
					<div class="single_product_pics">
						<div class="row">
							<div class="col-lg-3 thumbnails_col order-lg-1 order-2">
								<div class="single_product_thumbnails">
									<ul>
										<li class="active"><img src="<?=$row["HinhAnh"]?>" alt="" data-image="<?=$row["HinhAnh"]?>"></li>
										<li><img src="<?=$row["HinhAnh"]?>" alt="" data-image="<?=$row["HinhAnh"]?>"></li>
										<li><img src="<?=$row["HinhAnh"]?>" alt="" data-image="<?=$row["HinhAnh"]?>"></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-9 image_col order-lg-2 order-1">
								<div class="single_product_image">
									<div class="single_product_image_background" style="background-image:url(<?=$row["HinhAnh"]?>)"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="product_details">
						<div class="product_details_title">
							<h2><?=$row["TenSP"]?></h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio itaque, amet soluta alias dicta nemo ratione quam voluptatum accusantium quaerat vitae natus dolorum voluptates quos perspiciatis cupiditate aliquid porro dignissimos?</p>
						</div>
						<div class="free_delivery d-flex flex-row align-items-center justify-content-center">
							<span class="ti-truck"></span><span>giao hàng miễn phí</span>
						</div>
						<!-- <div class="original_price">$629.99</div> -->
						<div class="product_price"><?=$row["DonGia"]?> VNĐ</div>
						<ul class="star_rating">
							<li><i class="fa fa-star" aria-hidden="true"></i></li>
							<li><i class="fa fa-star" aria-hidden="true"></i></li>
							<li><i class="fa fa-star" aria-hidden="true"></i></li>
							<li><i class="fa fa-star" aria-hidden="true"></i></li>
							<li><i class="fa fa-star" aria-hidden="true"></i></li>
						</ul>
						<div class="product_color">
							<span>Chọn màu sắc:</span>
							<ul>
								<li style="background: #e54e5d"></li>
								<li style="background: #252525"></li>
								<li style="background: #60b3f3"></li>
							</ul>
						</div>
						<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
							<span>Số lượng:</span>
							<div class="quantity_selector">
								<span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
								<span id="quantity_value">1</span>
								<span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
							</div>
							<div class="red_button add_to_cart_button"><a href="#">Thêm vào giỏ hàng</a></div>
							<div class="product_favorite d-flex flex-column align-items-center justify-content-center"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Tabs -->
		<div class="tabs_section_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="tabs_container">
							<ul class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">
								<li class="tab active" data-active-tab="tab_1"><span>Mô tả</span></li>
								<li class="tab" data-active-tab="tab_2"><span>Thông tin chi tiết</span></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<!-- Tab Description -->
						<div id="tab_1" class="tab_container active">
							<div class="row">
								<div class="col-lg-5 desc_col">
									<div class="tab_title">
										<h4>Mô tả</h4>
									</div>
									<div class="tab_text_block">
										<h2><?=$row["TenSP"]?></h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit quasi magni officiis ut laboriosam, laborum quisquam voluptates reiciendis earum. Voluptatum libero, architecto dignissimos iure ipsam tenetur accusantium suscipit similique, est dolor voluptate necessitatibus autem. Illo dignissimos est, ducimus, aliquid dolorem ea quo asperiores maxime nobis, tempora facilis laboriosam totam, iste!</p>
									</div>
									<div class="tab_image">
										<img src="<?=$row["HinhAnh"]?>" alt="">
									</div>
									<div class="tab_text_block">
										<h2><?=$row["TenSP"]?></h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt cum dolorum sunt magni enim, quaerat voluptatem aperiam, eveniet natus consectetur itaque dolores nemo nisi sequi! Dignissimos, odit provident repellendus eligendi perferendis omnis ut autem. Aliquam, ipsa culpa accusantium nemo et suscipit, sint dicta vel perferendis soluta pariatur, quam in quia.</p>
									</div>
								</div>
								<div class="col-lg-5 offset-lg-2 desc_col">
									<div class="tab_image">
										<img src="<?=$row["HinhAnh"]?>" alt="">
									</div>
									<div class="tab_text_block">
										<h2><?=$row["TenSP"]?></h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam sapiente odio odit mollitia saepe cupiditate debitis pariatur consequuntur doloremque blanditiis praesentium incidunt natus, magni itaque laudantium ipsa eum quisquam amet, veniam dolorem. Modi non impedit unde assumenda asperiores repellat illo pariatur, necessitatibus sint blanditiis eveniet at cumque nobis magnam nemo.</p>
									</div>
									<div class="tab_image desc_last">
										<img src="<?=$row["HinhAnh"]?>" alt="">
									</div>
								</div>
							</div>
						</div>
						<?php
							}
							}
							?>
						<!-- Tab Additional Info -->
						<div id="tab_2" class="tab_container">
							<div class="row">
								<div class="col additional_info_col">
									<div class="tab_title additional_info_title">
										<h4>Thông tin chi tiết</h4>
									</div>
									<p>Màu sắc:<span>Gold, Red</span></p>
									<p>Kích thước:<span>L,M,XL</span></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			include ("lib/footer.master.php");
			include ("lib/js.single.php");
			?>
	</body>
</html>