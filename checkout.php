<?php
	// session_unset();
	session_start();
	include ("lib/connection.php");
	
	$cart = array();
	if(isset($_SESSION['gio_hang'])) {
		$cart = $_SESSION['gio_hang'];
	}
	
	if(isset($_GET['them']) && isset($_GET['MaSP'])) {
		$maSP = $_GET['MaSP'];
		$soLuong = $_GET['them'];
			for ($i=0; $i < count($cart); $i++) { 
					if($cart[$i]['MaSP'] == $maSP) {
						$cart[$i]['SoLuong'] += $soLuong;
						break;
					}
			}
		
			if($i == count($cart)) {
				$sql = "select * from san_pham where MaSP = '".$maSP."'";
				$result = $conn->query($sql);
				if($result->num_rows > 0) {
					$san_pham = $result->fetch_assoc();
					$san_pham['SoLuong'] = $soLuong;
					$cart[] = $san_pham;
				}
			}
			$_SESSION['gio_hang'] = $cart;
	}
	
	
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
			// echo "<pre>";
			// print_r($san_pham);
			// echo "</pre>";
			// echo "<pre>";
			// print_r($maSP);
			// echo "</pre>";
			// echo "<pre>";
			// print_r($cart);
			// echo "</pre>";
			 ?>
			<div class="row">
				<table class="table table-striped table-hover">
					<thead class="thead-dark">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Sản phẩm</th>
							<th scope="col">Đơn giá</th>
							<th scope="col">Số lượng</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($cart as $sp){
						?>
						<tr>
							<th scope="row">1</th>
							<td><?=$sp['TenSP']?></td>
							<td><?=$sp['DonGia']?></td>
							<td><?=$sp['SoLuong']?></td>
						</tr> 
						<?php
							}
						?>
						
						<tr class="bg-primary" style="color: #fff">
							<th scope="row"></th>
							<td></td>
							<td style="text-align: right">Tổng cộng:</td>
							<td>999.999.999 VNĐ</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<?php
			include ("lib/footer.master.php");
			include ("lib/js.single.php");
			?>
	</body>
</html>