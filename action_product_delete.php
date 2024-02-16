<?php

include_once "tools/db.php";

if (isset($_GET['pro_code'])) {
    $pro_code = $_GET['pro_code'];

    $query = "delete from products where pro_code='$pro_code'";
    $result = mysqli_query($conn, $query);

    header('Location: admin_product_list.php');

    exit;
}

?>