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

$query = "SELECT * FROM `order` as o INNER JOIN products as p on o.pro_code=p.pro_code";
$result = mysqli_query($conn, $query);

?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">نام محصول</th>
      <th scope="col">شماره موبایل </th>
      <th scope="col">آدرس </th>
      <th scope="col">نام کاربری خریدار</th>
      <th scope="col">تعداد</th>
      <th scope="col">کد محصول</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td>' . $row["pro_name"] . '</td>';
        echo '<td>' . $row["phoneNumber"] . '</td>';
        echo '<td>' . $row["address"] . '</td>';
        echo '<td>' . $row["userName"] . '</td>';
        echo '<td>' . $row["qty"] . '</td>';
        echo '<td>' . $row["pro_code"] . '</td>';
        echo '</tr>';
      }
    }

    ?>
  </tbody>
</table>