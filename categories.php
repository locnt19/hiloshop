<?php
	session_start();
	   ?>
<!DOCTYPE html>
<html lang="vi">
	<head>
		<?php
			include ("lib/header.master.php");
			include ("lib/css.categories.php");
			?>
	</head>
	<body>
		<?php
			include ("lib/nav.header.php");
			?>
		<div class="container product_section_container">
			<div class="row">
				<div class="col product_section clearfix">
					<!-- Breadcrumbs -->
					<div class="breadcrumbs d-flex flex-row align-items-center">
						<ul>
							<li><a href="index.php">Trang chủ</a></li>
							<li class="active"><a href="index.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Tất cả</a></li>
						</ul>
					</div>
					<!-- Sidebar -->
					<div class="sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">
								<h5>Danh mục sản phẩm</h5>
							</div>
							<ul class="sidebar_categories">
								<li class="active"><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Tất cả</a></li>
								<li><a href="#">Apple</a></li>
								<li><a href="#">SamSung</a></li>
								<li><a href="#">Oppo</a></li>
								<li><a href="#">Xiaomi</a></li>
								<li><a href="#">Sạc dự phòng</a></li>
								<li><a href="#">Head phone</a></li>
							</ul>
						</div>
						<!-- Price Range Filtering -->
						<div class="sidebar_section">
							<div class="sidebar_title">
								<h5>Lọc theo giá</h5>
							</div>
							<p>
								<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
							</p>
							<div id="slider-range"></div>
							<div class="filter_button"><span>Lọc</span></div>
						</div>
						<!-- Color -->
						<div class="sidebar_section">
							<div class="sidebar_title">
								<h5>Màu sắc</h5>
							</div>
							<ul class="checkboxes">
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Đen</span></li>
								<li class="active"><i class="fa fa-square" aria-hidden="true"></i><span>Hồng</span></li>
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Trắng</span></li>
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Xanh</span></li>
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Cam</span></li>
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Đỏ</span></li>
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Vàng</span></li>
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Lục</span></li>
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Lam</span></li>
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Chàm</span></li>
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Tím</span></li>
							</ul>
							<div class="show_more">
								<span><span>+</span>Hiển thị thêm</span>
							</div>
						</div>
					</div>
					<!-- Main Content -->
					<div class="main_content">
						<!-- Products -->
						<div class="products_iso">
							<div class="row">
								<div class="col">
									<!-- Product Sorting -->
									<div class="product_sorting_container product_sorting_container_top">
										<ul class="product_sorting">
											<li>
												<span class="type_sorting_text">Sắp xếp mặc định</span>
												<i class="fa fa-angle-down"></i>
												<ul class="sorting_type">
													<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Sắp xếp mặc định</span></li>
													<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Giá</span></li>
													<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Tên sản phẩm</span></li>
												</ul>
											</li>
											<li>
												<span>Hiển thị</span>
												<span class="num_sorting_text" style="margin-left: 48px">Tất cả</span>
												<i class="fa fa-angle-down"></i>
												<ul class="sorting_num">
													<li class="num_sorting_btn"><span>Tất cả</span></li>
													<li class="num_sorting_btn"><span>6</span></li>
													<li class="num_sorting_btn"><span>12</span></li>
													<li class="num_sorting_btn"><span>24</span></li>
												</ul>
											</li>
										</ul>
										<div class="pages d-flex flex-row align-items-center">
											<div class="page_current">
												<span>1</span>
												<ul class="page_selection">
													<li><a href="#">1</a></li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
												</ul>
											</div>
											<div class="page_total"><span>trong</span> 3</div>
											<div id="next_page" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
										</div>
									</div>
									<!-- Product Grid -->
									<div class="product-grid">
										<?php 
											include ("lib/connection.php");
											$sql = "select * from san_pham where stt=1";
											$result = $conn->query($sql);
											if($result->num_rows > 0) {
												while($row = $result->fetch_assoc()) {
													?>
										<a href="single.php?MaSP=<?=$row["MaSP"]?>">
											<div class="product-item apple">
												<div class="product discount product_filter">
													<div class="product_image">
														<img src="<?=$row["HinhAnh"]?>" alt="">
													</div>
													<div class="favorite favorite_left"></div>
													<!-- <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-20%</span></div> -->
													<div class="product_info">
														<h6 class="product_name">
										<a href="single.php"><?=$row["TenSP"]?></a></h6>
										<div class="product_price"><?=$row["DonGia"]?> VNĐ</div>
										</div>
										</div>
										<div class="red_button add_to_cart_button"><a href="checkout.php?them=1&MaSP=<?=$row["MaSP"]?>">Thêm vào giỏ</a></div>
										</div>
										</a>
										<?php 
											}
											}
											?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal fade" id="thongBao" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalCenterTitle">Thông báo</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								...
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary">Save changes</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			include ("lib/footer.master.php");
			include ("lib/js.categories.php");
			?>
	</body>
</html>