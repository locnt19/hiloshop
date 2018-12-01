<?php
	// session_unset();
	session_start();
	include ("lib/connection.php");
	
	$cart = array();
	if(isset($_SESSION['gio_hang'])) {
		$cart = $_SESSION['gio_hang'];
	}
	else {
		$cart = null;
	}

	if(count($cart) == 0) {
		$tongSoLuong = 0;
	}
	else {
		$tongSoLuong = $_SESSION['tong_so_luong'];
	}

#thêm sản phẩm
	if(isset($_GET['them']) && isset($_GET['MaSP'])) {
		$maSP = $_GET['MaSP'];
		$soLuongThem = $_GET['them'];
			for ($i=0; $i < count($cart); $i++) { 
				if($cart[$i]['MaSP'] == $maSP) {
					if($soLuongThem != null) {
						$cart[$i]['SoLuong'] += $soLuongThem;
						$tongSoLuong += $soLuongThem;
					}
					break;
				}
			}
		if($i == count($cart)) {
			$sql = "select * from san_pham where MaSP = '".$maSP."'";
			$result = $conn->query($sql);
			if($result->num_rows > 0) {
				$san_pham = $result->fetch_assoc();
				$san_pham['SoLuong'] = $soLuongThem;
				$cart[] = $san_pham;
				$tongSoLuong += $soLuongThem;
			}
		}
	}
#trừ số lượng của 1 sản phẩm
	if(isset($_GET['xoa1']) && isset($_GET['MaSP'])) {
		$maSP = $_GET['MaSP'];
			for ($i=0; $i < count($cart); $i++) { 
				if($cart[$i]['MaSP'] == $maSP) {
					$cart[$i]['SoLuong'] -= 1;
					$tongSoLuong -= 1;
					if($cart[$i]['SoLuong'] == 0) {
						array_splice($cart, $i, 1);
					}
					break;
				}
			}
	}
#xóa 1 sản phẩm
	if(isset($_GET['xoaT']) && isset($_GET['MaSP'])) {
		$maSP = $_GET['MaSP'];
			for ($i=0; $i < count($cart); $i++) { 
				if($cart[$i]['MaSP'] == $maSP) {
					$tongSoLuong -= $cart[$i]['SoLuong'];
					array_splice($cart, $i, 1);
					break;
				}
			}
	}
	$_SESSION['gio_hang'] = $cart;
	$_SESSION['tong_so_luong'] = $tongSoLuong;
	?>
<!DOCTYPE html>
<html lang="en">
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
                    <div class="breadcrumbs d-flex flex-row align-items-center">
                        <ul>
                            <li><a href="index.php">Trang chủ</a></li>
                            <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Thanh toán</a></li>
                        </ul>
                    </div>
                </div>
            </div>
			<?php
				// echo "cart";
				// var_dump($cart);
				// echo "session 'gio_hang'";
				// var_dump($_SESSION['gio_hang']);
				// echo "session 'tong_so_luong'";
				// var_dump($_SESSION['tong_so_luong']);
				// echo "tongSoLuong";
				// var_dump($tongSoLuong);
			?>
			<div class="row">
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead class="thead-dark">
							<tr>
								<th scope="col">#</th>
								<th scope="col">Hình ảnh</th>
								<th scope="col">Sản phẩm</th>
								<th scope="col">NSX</th>
								<th scope="col">Bảo hành</th>
								<th scope="col">Đơn giá</th>
								<th scope="col">Số lượng</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$tongThanhToan = 0;
								if($cart != null) {
									foreach($cart as $sp){
										// var_dump([$sp]);
										$giaBan = number_format($sp['DonGia']);
										$tongThanhToan += $sp['DonGia'] * $sp['SoLuong'];
							?>
							<tr>
								<th class="align-middle">1</th>
								<td class="align-middle"><img style="max-width: 50px" src="<?=$sp['HinhAnh']?>" alt=""></td>
								<td class="align-middle"><?=$sp['TenSP']?></td>
								<td class="align-middle"><?=$sp['NSX']?></td>
								<td class="align-middle"><?=$sp['BaoHanh']?></td>
								<td class="align-middle"><?=$giaBan?></td>
								<td class="align-middle" style="max-width: 50px"><?=$sp['SoLuong']?></td>
								<td class="align-middle" style="text-align: center">
									<a href="?them=1&MaSP=<?=$sp['MaSP']?>"><i style="font-size: 24px; margin: 0 0.25rem" class="fa fa-plus"></i></a>
									<a href="?xoa1&MaSP=<?=$sp['MaSP']?>"><i style="font-size: 24px; margin: 0 0.25rem" class="fa fa-minus"></i></a>
									<a href="?xoaT&MaSP=<?=$sp['MaSP']?>"><i style="font-size: 24px; margin: 0 0.25rem" class="fa fa-times"></i></a>
								</td>
							</tr> 
							<?php
										
									}
								}
							?>
							
							<tr class="bg-primary" style="color: #fff">
								<th scope="row"></th>
								<td></td>
								<td></td>
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
		</div>
		<?php
			include ("lib/footer.master.php");
			include ("lib/js.single.php");
			?>
	</body>
</html>