<?php
include("header.php");

if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true && $_SESSION["user_type"] == "admin")) {
	?>
	<script type="text/javascript">
		location.replace("index.php");
	</script>
	<?php
}
?>
<?php
var_dump($_FILES);
if (
	isset($_POST['pro_code']) &&
	isset($_POST['pro_name']) &&
	isset($_POST['pro_qty']) &&
	isset($_POST['pro_price']) &&
	isset($_POST['pro_detail'])
) {

	$pro_code = $_POST['pro_code'];
	$pro_name = $_POST['pro_name'];
	$pro_qty = $_POST['pro_qty'];
	$pro_price = $_POST['pro_price'];

	$pro_detail = $_POST['pro_detail'];

} else {
	exit("برخی از فیلد ها مقداردهی نشده است");
}

if (isset($_FILES['pro_image']) && $_FILES['pro_image']['error'] != UPLOAD_ERR_NO_FILE) {
	$target_dir = "images/products/";
	$target_file = $target_dir . $_FILES["pro_image"]["name"];
	$uploadOk = 1;
	$imageFILEType = pathinfo($target_file, PATHINFO_EXTENSION);
	$check = getimagesize($_FILES["pro_image"]["tmp_name"]);
	if ($check !== false) {
		echo "پرونده انتخابی یک تصویر از نوع-" . $check["mime"] . "است<br/>";
		$uploadOk = 1;
	} else {
		echo "پرونده انتخاب شده یک تصویر نیست <br/>";
		$uploadOk = 0;

	}
	if (file_exists($target_file)) {
		echo "پرونده ای با همین نام در سرویس دهنده میزبان وجود دارد<br/>";
		$uploadOk = 0;

	}
	if ($_FILES["pro_image"]["size"] > (500 * 1024)) {
		echo "اندازه پرونده انتخابی بیشتر از 500کیلوبایت است<br/>";
		$uploadOk = 0;
	}
	$imageFILEType != strtolower($imageFILEType);
	if ($imageFILEType != "jpg" && $imageFILEType != "png" && $imageFILEType != "jpeg" && $imageFILEType != "gif") {

		echo "فقط پسوند های jpg,jpen,png & gif برای پرونده مجاز هستند<br/>";
		$uploadOk = 0;
	}
	if ($uploadOk == 0) {
		echo "پرونده انتخابی به سرویس دهنده میزبان ارسال نشد<br/>";
	} else {
		if (move_uploaded_file($_FILES["pro_image"]["tmp_name"], $target_file)) {
			echo "پرونده" . $_FILES["pro_image"]["name"] .
				"با موفقیت به سرویس دهنده میزبان انتقلا یافت<br/>";
		} else {
			echo "خطا در ارسال پیام به سرویس دهنده میزبان رخ داده است<br/>";

		}
	}

	$pro_image = $_FILES["pro_image"]["name"];
}

include_once "tools/db.php";

$updateImage = "";
if ($uploadOk == 1)
	$updateImage = "$query  pro_image = '$pro_image', ";

$query = "UPDATE products
					 SET 
					 pro_name = '$pro_name',
					 pro_qty = '$pro_qty',
					 $updateImage
					 pro_price = '$pro_price',
					 pro_detail = '$pro_detail'
					 where pro_code='$pro_code'";

if (mysqli_query($conn, $query) === true)
	header('Location: admin_product_list.php');
else
	echo ("<p style='color:red;'><b>خطا در ثبت مشخصات کالا در انبار</b></p>");

mysqli_close($conn);
include("footer.php");

?>