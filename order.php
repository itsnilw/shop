<?php
include('header.php');
$link = mysqli_connect("localhost", "root", "", "shop_db");
if (mysqli_connect_errno())
	exit("خطایی با شرح زیر رخ داده است:" . mysqli_connect_error());
$pro_code = 0;
if (isset($_GET['id']))
	$pro_code = $_GET['id'];
if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"]) === true) {
	?>
	<br />
	<span style="color: red;"><b>برای خرید محصول پستی وارد شده باید وارد سایت شوید</b></span>

	<br /><br />
	در صورتی که عضو فروشگاه هستید برای ورود
	<a href="login.php" style="text-decoration: none;"><span style="color: green">اینجا</span></a>
	کلیک کنید
	<br /><br />


	<?php
	exit();
}
$query = "select * from products where pro_code='$pro_code'";
$result = mysqli_query($link, $query);
?>
<form name="order" action="action_order.php" method="post">
	<table style="width: 100%;" border="1px">
		<tr>
			<td style="width: 60%;">
				<?php
				if ($row = mysqli_fetch_array($result)) {
					?>
					<br />
					<table style="width:100%;" border="0" strle="margin-left:auto; margin-right:auto;">
						<tr>
							<td style="width: 22%;">تعداد یا مقدار درخواستیا<span style="color: red">*</span></td>
							<td style="width: 78%;">
								<input type="text" required="true" style="text-align:left;" id="pro_qty" name="pro_qty"
									onchange="calc_price(<?php echo ($row['pro_price']); ?>);" />
							</td>
						<tr>
							<td style="width: 22%;">مبلغ قابل پرداخت<span style="color: red">*</span></td>
							<td style="width: 78%;"><input type="text" style="text-align:left; background-color:lightgray;"
									id="total_price" name="total_price" value="0" readonly />ریال</td>

						</tr>
			</tr>
			<script type="text/javascript">
										<!--
										function cals_price()
										{
											var pro_qty=<?php echo ($row['pro_qty']); ?>;
				var price = document.getElementById('pro_price').value;
				var count = document.getElementById('pro_qty').value;
				var total_price;
				if (count > pro_qty) {
					alert('تعداد موجودی انبار کمتر از در خواست شماست!!');
					document.getElementById('pro_qty').value = 0;
					count = 0;
				}
				if (count == 0 || count == '')
					total_price = 0;
				else
					total_price = count * price;
				document.getElementById('total_price').value = total_price;
				
				
										}
				-- >
			</script>




									<?php
									$query = "SELECT * FROM users WHERE username='{$_SESSION['username']}'";

									$result = mysqli_query($link, $query);
									$user_row = mysqli_fetch_array($result);
									?>
									<tr>
										<td><br /><br /><br /></td>
										<td></td>
									</tr>
									<input type="hidden" name="pro_code" value="<?php echo ($row['pro_code']); ?>" />
									<tr>
										<td style="width: 40%;">نام خریدار<span style="color: red">*</span></td>
										<td style="width: 60%;">
											<input type="text"  id="realname" name="realname" value="<?php echo ($user_row['realname']); ?>"
												style="background-color: lightgray;" readonly />
										</td>
									</tr>
									<tr>
										<td>پست الکتریکی<span style="color: red">*</span></td>
										<td>
											<input type="text" style="text-align:left; background-color:lightgray;" id="email" name="email"
												value="<?php echo ($user_row['email']); ?>" readonly />
										</td>
									</tr>
									<tr>
										<td>شماره تلفن همراه<span style="color: red">*</span></td>
										<td>
											<input type="text" required="true" style="text-align:left;" id="mobile" name="mobile" value="09" />
										</td>
									</tr>
									<tr>
										<td>ادرس دقیق پستی جهت دریافت محصول<span style="color: red">*</span></td>
										<td><textarea style="text-align: right;font-family: tahoma;" required="true" name="address" id="address" cols="address" rows="3"
												wrap="virtual"></textarea>
									</tr>
									<tr>
										<td><br /><br /><br /><br /></td>
										<td><button type="submit" class="btn btn-success"  > خرید محصول</button></td>
										<td></td>
									</tr>
								</table>
								</td>
								<td>
									<script type="text/javascript">
											function calc_price(price) {
												var qty = document.getElementById('pro_qty').value;
												document.getElementById('total_price').value = (price * qty);
											}
									</script>
									<table>
										<tr>
											<td style="border-style: dotted dashed; vertical-align: top; width: 33%;">
												<h4 style="color: brown;">
													<?php echo ($row['pro_name']) ?>
												</h4>
												<img src="images/products/<?php echo ($row['pro_image']) ?>" width="250px" height="120px" />
												<br />
												قیمت واحد:
												<?php echo ($row['pro_price']) ?>&nbsp;ریال
												<br />
												مقدار موجودی:<span style="color: red;">
													<?php echo ($row['pro_qty']) ?>
												</span>
												<br />
												توضیحات:<span style="color: green;">
													<?php
													$count = strlen($row['pro_detail']);
													echo (substr($row['pro_detail'], 0, (int) ($count / 4)));
													?>


													...
												</span>
												<br /><br />
											</td>
										</tr>
									</table>
									</tr>
									</table>
							</form>
							<?php
				}

				include('footer.php');
				?>