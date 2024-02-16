<?php
include('header.php');
$link = mysqli_connect("localhost", "root", "", "shop_db");
if (mysqli_connect_errno())
	exit("خطایی با شرح زیر رخ داده است:" . mysqli_connect_error());
$pro_code = 0;
if (isset($_GET['id']))
	$pro_code = $_GET['id'];
$query = "select * from products where pro_code='$pro_code'";
$result = mysqli_query($link, $query);
?>

<?php
if ($row = mysqli_fetch_array($result)) {
	?>
	<div class="row">
		<div class="col-md-6">
			<img width="500px" height="300px" class="img-fluid" src="images/products/<?php echo ($row['pro_image']) ?>" />
		</div>
		<div class="col-md-6">
			<h2>
				<?php echo ($row['pro_name']) ?>
			</h2>
			<p>توضیحات:<span style="color: green;">
					<?php echo ($row['pro_detail']); ?>
				</span></p>
			<p>تعداد موجودی: <span style="color: red;">
					<?php echo ($row['pro_qty']) ?>
				</span></p>
			<p>قیمت:
				<?php echo ($row['pro_price']) ?>&nbsp;ریال
			</p>
			<!-- <button class="btn btn-primary" onclick="addToCart()">Add to Cart</button> -->
			<a class="btn btn-primary" href="order.php?id=<?php echo ($row['pro_code']) ?>">سفارش و خرید پستی </a>
		</div>
	</div>

	<?php
}
?>

<?php
include('footer.php');

?>