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

$query = "select * from users";
$result = mysqli_query($conn, $query);

?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">نام</th>
      <th scope="col">نام کاربری</th>
      <th scope="col">نوع کاربر</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td>' . $row["realname"] . '</td>';
        echo '<td>' . $row["username"] . '</td>';
        if ($row["type"] == 1) {
          echo '<td> مدیر سایت </td>';
          echo '<td> 
                    <a href="change_type_user.php?user_id=' . $row['username'] . '" class="btn btn-danger btn-sm">
                        تغییر به کاربر سایت
                    </a> 
                </td>';
        } else {
          echo '<td> کاربر سایت </td>';
          echo '<td> 
            <a href="change_type_user.php?user_id=' . $row['username'] . '" class="btn btn-warning btn-sm">
                تغییر به مدیر سایت
            </a> 
        </td>';
        }

        echo '</tr>';
      }
    }

    ?>
  </tbody>
</table>