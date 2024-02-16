<?php

include('header.php');

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

$is_admin = ($_SESSION['user_type'] === 'admin');
if (!$is_admin) {
  header("Location: login.php");
  exit();
}

include_once "tools/db.php";

$query = "select * from products";
$result = mysqli_query($conn, $query);

?>

<a class="btn btn-success" href="admin_products.php">افزودن کالا</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">تصویر</th>
      <th scope="col">کد</th>
      <th scope="col">نام </th>
      <th scope="col">تعداد</th>
      <th scope="col">قیمت</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td> <img width="50px" height="50px" src="images/products/' . $row["pro_image"] . '"</td>';
        echo '<td>' . $row["pro_code"] . '</td>';
        echo '<td>' . $row["pro_name"] . '</td>';
        echo '<td>' . $row["pro_qty"] . '</td>';
        echo '<td>' . $row["pro_price"] . '</td>';
        echo '<td> 
                  <a class="btn btn-warning" href="admin_product_edit.php?id=' . $row["pro_code"] . '"> ویرایش </a> 
                  <a class="btn btn-danger" onclick="return confirm(\'آیا می خواهید حذف شود?\')" href="action_product_delete.php?pro_code=' . $row["pro_code"] . '"> حذف </a>
              </td>';
        echo '</tr>';
      }
    }

    ?>
  </tbody>
</table>