<?php
include('header.php');
$link = mysqli_connect("localhost", "root", "", "shop_db");
if (mysqli_connect_errno())
	exit("خطایی با شرح زیر رخ داده است:" . mysqli_connect_error());
$query = "select * from products";
$result = mysqli_query($link, $query);
?>

<div class="container mt-5">
	<h3 class="mb-4">لیست محصولات</h3>
	<div class="row">

		<?php
		$counter = 0;
		while ($row = mysqli_fetch_array($result)) {
			$counter++;
			?>

			<div class="col-md-4 mb-4">
				<div class="card">
					<img class="card-img-top" src="images/products/<?php echo ($row['pro_image']) ?>" width="250px"
						height="150px" />
					<div class="card-body">
						<h5 class="card-title">
							<?php echo ($row['pro_name']) ?>
						</h5>
						<p class="card-text">
							قیمت:
							<?php echo ($row['pro_price']) ?>&nbsp;ریال </br>
							توضیحات:<span style="color:green;">
								<?php echo (substr($row['pro_detail'], 0, 120)) ?>
							</span> </br>
							تعداد موجودی:<span style="color: red;">
								<?php echo ($row['pro_qty']) ?>
							</span>
						</p>
						<a href="product_detail.php?id=<?php echo ($row['pro_code']) ?>" class="btn btn-primary">توضیحات
							تکمیلی و خرید</a>
					</div>
				</div>
			</div>
			<?php


		}

		?>
	</div>
</div>


<?php
include('footer.php');

?>