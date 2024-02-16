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
	isset($_POST['email']) &&
	isset($_POST['mobile']) &&
	isset($_POST['address']) &&
	isset($_POST['pro_qty']) &&
	isset($_POST['pro_code'])
) {
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$address = $_POST['address'];
	$pro_qty = $_POST['pro_qty'];
	$pro_code = $_POST['pro_code'];
} else {
	exit("برخی از فیلد ها مقداردهی نشده است");
}

include_once "tools/db.php";

$realname = $_SESSION["realname"];

$query = "INSERT INTO `order`(`phoneNumber`, `address`, `userName`, `qty`, `pro_code`) VALUES 
('$mobile','$address','$realname','$pro_qty','$pro_code')";

if (mysqli_query($conn, $query) === true)
	header('Location: index.php');
else
	echo ("<p style='color:red;'><b>خطا در ثبت اطلاعات</b></p>");

mysqli_close($conn);
include("footer.php");

?>