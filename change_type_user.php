<?php
include_once 'tools/db.php'; 

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $query = "SELECT * FROM users WHERE username ='$user_id'";

    $result= mysqli_query($conn, $query); 
    
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        $newType = $user['type'] == 1? 0: 1;
        
        $query = "UPDATE users SET type=$newType WHERE username ='$user_id'";
        mysqli_query($conn, $query);
    } 

    header('Location: user_list.php');
    exit;
}
?>
