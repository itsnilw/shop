<?php
session_start();
?>

<!doctype html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8">
  <title>Untitled Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
    integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <style type="text/css">
    <!--
    .set-style-link {

      text-decoration: none;
      font-weight: bold;
    }
    -->
  </style>
</head>

<body class="body">

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">لوگوی شاپ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

        <!-- user list  -->
        <?php
        if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true && $_SESSION['user_type'] === 'admin') {
          ?>
          <li class="nav-item">
            <a class="nav-link" href="user_list.php">لیست کاربران</a>
          </li>
          <?php
        }
        ?>
        <!-- end user list  -->


        <!-- product list  -->
        <?php
        if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true && $_SESSION['user_type'] === 'admin') {
          ?>
          <li class="nav-item">
            <a class="nav-link" href="admin_product_list.php">لیست کالاها</a>
          </li>
          <?php
        }
        ?>
        <!-- end product list  -->

        <!-- order list  -->
        <?php
        if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true && $_SESSION['user_type'] === 'admin') {
          ?>
          <li class="nav-item">
            <a class="nav-link" href="admin_order_list.php">لیست سفارشات</a>
          </li>
          <?php
        }
        ?>
        <!-- end order list  -->




        <!-- register  -->
        <?php
        if (isset($_SESSION["state_login"]) === false) {
          ?>
          <li class="nav-item">
            <a class="nav-link" href="register.php">عضویت در سایت</a>
          </li>
        <?php
        } ?>
        <!--  end register -->


        <!--  login -->
        <li class="nav-item">
          <?php
          if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) {
            ?>
            <a class="nav-link" href="logout.php">خروج از سایت
              <?php echo ("({$_SESSION["realname"]})") ?>
            </a>
          <?php
          } else {
            ?>
            <a class="nav-link" href="login.php">ورود به سایت</a>
          <?php
          }
          ?>
        </li>
        <!--  end login -->

        

      </ul>

    </div>
  </nav>

  <div class="container" mt-2>