<?php
include("header.php");

if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true && $_SESSION["user_type"] == "admin")) {
	?>
	<script type="text/javascript">
		location.replace("index.php");
	</script>
	<?php
}

include_once "tools/db.php";

$pro_code = 0;
if (isset($_GET['id']))
	$pro_code = $_GET['id'];

$query = "select * from products where pro_code='$pro_code'";
$result = mysqli_query($conn, $query);

if ($row = mysqli_fetch_array($result)) {
	?>

	<form name="edit_product" action="action_admin_product_edit.php" method="POST" enctype="multipart/form-data">
		<table>

			<tr>
				<td style="width: 22%;">کد کالا<span style="color:red;">*</span></td>
				<td style="width: 78%;"><input value="<?php echo ($row['pro_code']) ?>" type="text" name="pro_code"
						id="pro_code" /></td>
			</tr>

			<tr>
				<td>نام کالا<span style="color:red;">*</span></td>
				<td><input type="text" value="<?php echo ($row['pro_name']) ?>" style="text-align:right" id="pro_name"
						name="pro_name" /></td>
			</tr>
			<tr>
				<td>موجودی کالا<span style="color:red;">*</span></td>
				<td><input type="text" value="<?php echo ($row['pro_qty']) ?>" style="text-align: left;" id="pro_qty"
						name="pro_qty" /></td>
			</tr>
			<tr>
				<td>قیمت کالا<span style="color:red;">*</span></td>
				<td><input type="text" value="<?php echo ($row['pro_price']) ?>" style="text-align: left;" id="pro_price"
						name="pro_price" /></td>
			</tr>
			<tr>
				<td>اپلود تصویر کالا<span style="color:red;">*</span></td>
				<td>
					<img width="150px" height="150px" src="images/products/<?php echo ($row['pro_image']) ?>" />
					<input type="file" style="text-align: left;" id="pro_image" name="pro_image" />
				</td>
			</tr>
			<tr>
				<td>توضیحات تکمیلی کالا<span style="color:red;">*</span></td>
				<td><textarea id="pro_detail" name="pro_detail" cols="45" rows="10"
						wrap="virtual"> <?php echo ($row['pro_detail']) ?> </textarea></td>
			</tr>
			<tr>
				<td><br /><br /></td>
				<td>
					<button type="submit" class="btn btn-success"> ویرایش کالا </button>
				</td>
			</tr>
		</table>
	</form>

<?php
}
?>




<?php
include("footer.php");
?>