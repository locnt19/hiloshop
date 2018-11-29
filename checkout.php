<?php
	session_start();
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
                            <li class="active"><a href="index.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Thanh toán</a></li>
                        </ul>
                    </div>
                </div>
            </div>
			<div class="row">
				<table class="table table-striped">
					<thead class="thead-dark">
						<tr>
							<th scope="col">#</th>
							<th scope="col">First</th>
							<th scope="col">Last</th>
							<th scope="col">Handle</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">1</th>
							<td>Mark</td>
							<td>Otto</td>
							<td>@mdo</td>
						</tr>
						<tr>
							<th scope="row">2</th>
							<td>Jacob</td>
							<td>Thornton</td>
							<td>@fat</td>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td>Larry</td>
							<td>the Bird</td>
							<td>@twitter</td>
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