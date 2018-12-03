<?php
	session_start();
	include ("lib/connection.php");

#kiểm tra Session Giỏ hàng và khởi tạo biến Cart
	$cart = array();
	if(isset($_SESSION['gio_hang'])) {
		$cart = $_SESSION['gio_hang'];
	}
	else {
		$cart = null;
	}
#khởi tạo Session Tổng số lượng
	if(count($cart) == 0) {
		$tongSoLuong = 0;
		$_SESSION['tong_so_luong'] = 0;
	}
	else {
		$tongSoLuong = $_SESSION['tong_so_luong'];
	}
#khởi tạo Session Tổng thanh toán
	if(isset($tongThanhToan)) {
		$_SESSION['tong_thanh_toan'] = $tongThanhToan;
	}
	else {
		$_SESSION['tong_thanh_toan'] = 0;
	}

#thêm sản phẩm
	if(isset($_GET['them']) && isset($_GET['MaSP'])) {
		$maSP = $_GET['MaSP'];
		$soLuongThem = (int)$_GET['them'];
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
			// include ("lib/nav.header.php");
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
				<h2>Chi tiết giỏ hàng</h2>
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead class="thead-dark">
							<tr>
								<th class="align-middle" scope="col">#</th>
								<th class="align-middle" scope="col">Hình ảnh</th>
								<th class="align-middle" scope="col">Sản phẩm</th>
								<th class="align-middle" scope="col">NSX</th>
								<th class="align-middle" scope="col">Bảo hành</br>(tháng)</th>
								<th class="align-middle" scope="col">Đơn giá</br>(VNĐ)</th>
								<th class="align-middle" scope="col">Số lượng</th>
								<th class="align-middle" scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$tongThanhToan = 0;
								if($cart != null) {
									foreach($cart as $sp){
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
								<?php $ttt =  number_format($tongThanhToan); $_SESSION['tong_thanh_toan'] = $tongThanhToan;?>
								<td colspan="2"><?=$ttt?> VNĐ</td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div style="width: 100%; margin: 79px 0; border-bottom: solid 1px #ebebeb; margin-bottom: 79px;"></div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h2>Thông tin khách hàng</h2>
				</div>
				<div class="col-md-12">
					<form action="checkout.php" method="post">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleFormControlInput1">Họ tên <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="HoTen" id="exampleFormControlInput1" placeholder="Họ tên">
								</div>
								<div class="form-group">
									<label for="exampleFormControlInput2">Số điện thoại <span class="text-danger">*</span></label>
									<input type="number" class="form-control" name="SDT" id="exampleFormControlInput1" placeholder="Số điện thoại">
								</div>
								<div class="form-group">
									<label for="exampleFormControlInput3">Địa chỉ <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="DiaChi" id="exampleFormControlInput3" placeholder="Địa chỉ">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Ghi chú</label>
									<textarea class="form-control" name="GhiChu" id="exampleFormControlTextarea1" rows="6"></textarea>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary">Đặt hàng</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php
			#thanh toán
				if(isset($_POST['HoTen']) && isset($_POST['SDT']) && isset($_POST['DiaChi']) && isset($_POST['GhiChu'])) {
					if(isset($_SESSION['gio_hang'])) {
						$hoten = $_POST['HoTen'];
						$sdt = $_POST['SDT'];
						$diachi = $_POST['DiaChi'];
						$ghichu = $_POST['GhiChu'];
						$tsl = $_SESSION['tong_so_luong'];
						$tttt = $_SESSION['tong_thanh_toan'];
						$sql = "INSERT INTO `hoa_don`(`HoTen`, `SDT`, `DiaChi`, `GhiChu`, `TongSoLuong`, `TongThanhTien`) VALUES('$hoten', '$sdt', '$diachi', ' $ghichu','$tongSoLuong', '$tttt')";
						var_dump($sql);
						// $result = $conn->query($sql);
						// var_dump($result);
						if($conn->query($sql)) {
							$hd_id=$conn->insert_id;
							foreach ($cart as $sp) {
								$sp_MaSP = $sp['MaSP'];
								$sp_SoLuong =  $sp['SoLuong'];
								$sp_DonGia = $sp['DonGia'];
								$sql = "INSERT INTO `chi_tiet_hd`(`MaHD`, `MaSP`, `SoLuong`, `DonGia`) VALUES ('$hd_id','$sp_MaSP','$sp_SoLuong','$sp_DonGia')";
								$conn->query($sql);
                                $sql="UPDATE `san_pham` set `SoLuongTon`=`SoLuongTon`-'$sp_SoLuong' WHERE `MaSP`='$hd_id'";
                                $conn->query($sql);
							}
							unset($_SESSION['gio_hang']);
							unset($cart);
							echo "<script>
								alert('Thanh toán thành công, nhấn OK để chuyển tiếp tục mua hàng');
								window.location.href = 'index.php';
							</script>";
							
						}
						else {
							echo "<script>alert('Thanh toán thất bại')</script>";
						}
					}
					else {
						echo "<script>alert('Giỏ hàng còn trống')</script>";
					}
				}
			include ("lib/footer.master.php");
			include ("lib/js.single.php");
			?>
	</body>
</html>