<div class="benefit">
	<div class="container">
		<div class="row benefit_row">
			<div class="col-lg-3 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
					<div class="benefit_content">
						<h6>giao hàng miễn phí</h6>
						<p>Tùy thuộc vào loại đơn hàng</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
					<div class="benefit_content">
						<h6>Thanh toán tiện lợi</h6>
						<p>Thanh toán khi nhận hàng</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
					<div class="benefit_content">
						<h6>45 ngày đổi trả</h6>
						<p>Đổi trả miễn phí</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
					<div class="benefit_content">
						<h6>mở cửa cả tuần</h6>
						<p>8AM - 09PM</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Blogs -->
<!-- Newsletter -->
<div class="newsletter">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
					<h4>Đăng ký nhận bản tin <span style="color: #fe4c50">HiLo</span></h4>
					<p>Đừng bỏ lỡ hàng ngàn sản phẩm và chương trình siêu hấp dẫn</p>
				</div>
			</div>
			<div class="col-lg-6">
				<form action="post">
					<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
						<input id="newsletter_email" type="email" placeholder="Email của bạn" required data-error="Valid email is required.">
						<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">đăng ký</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Footer -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Giỏ hàng</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<table class="table table-striped table-hover">
							<thead class="thead-dark">
								<tr>
									<th scope="col">#</th>
									<th scope="col">Hình ảnh</th>
									<th scope="col">Sản phẩm</th>
									<!-- <th scope="col">NSX</th>
									<th scope="col">Bảo hành</th> -->
									<th scope="col">Đơn giá</th>
									<th scope="col">Số lượng</th>
									<th scope="col"></th>
								</tr>
							</thead>
							<tbody>
								<?php
									$tongThanhToan = 0;
									if(isset($cart) && $cart!= null) {
										foreach($cart as $sp){
											$giaBan = number_format($sp['DonGia']);
											$tongThanhToan += $sp['DonGia'] * $sp['SoLuong'];
								?>
								<tr>
									<th class="align-middle">1</th>
									<td class="align-middle"><img style="max-width: 50px" src="<?=$sp['HinhAnh']?>" alt=""></td>
									<td class="align-middle"><?=$sp['TenSP']?></td>
									<td class="align-middle"><?=$giaBan?></td>
									<td class="align-middle" style="max-width: 50px"><?=$sp['SoLuong']?></td>
									<td class="align-middle" style="text-align: center">
									</td>
								</tr> 
								<?php
											
										}
									}
								?>
								
								<tr class="bg-primary" style="color: #fff">
									<th scope="row"></th>
									<td></td>
									<td style="text-align: right">Tổng cộng:</td>
									<?php $ttt =  number_format($tongThanhToan)?>
									<td colspan="2"><?=$ttt?> VNĐ</td>
									<td></td>
								</tr>
							</tbody>
						</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
				<button type="button" class="btn btn-primary">Thanh toán</button>
			</div>
		</div>
	</div>
</div>
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
					<ul class="footer_nav">
						<li><a href="categories.html">Sản phẩm</a></li>
						<li><a href="single.html">Giảm giá</a></li>
						<li><a href="contact.html">Liên hệ</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
					<ul style="font-size: 20px">
						<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="footer_nav_container">
					<div class="cr">©2018 All Rights Reserverd. Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">Colorlib</a> &amp; distributed by <a href="https://themewagon.com">ThemeWagon</a></div>
				</div>
			</div>
		</div>
	</div>
</footer>
</div>
<?php
	include ("js.master.php");
	?>