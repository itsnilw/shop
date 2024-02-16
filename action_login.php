<?php
include("header.php");
if (isset($_GET['username'])&& ! empty($_GET['username'])&& 
	 isset($_GET['password'])&& !empty($_GET['password']))
	
	{
	
	$username=$_GET['username'];
    $password=$_GET['password'];	
	}
    else
		exit("برخی از فیلد ها مقدار دهی نشده است");
	
		$link=mysqli_connect("localhost","root","","shop_db");
		if(mysqli_connect_errno())
		
		 exit("است داده رخ زیر با شرح با خطای".mysqli_connect_error());
		
		$query="select * from users where username='$username' and password='$password'";
		$result=mysqli_query($link,$query);
		$row=mysqli_fetch_array($result);
		var_dump($row);
		if($row){
			$_SESSION["state_login"]=true;
			$_SESSION["realname"]=$row['realname'];
			$_SESSION["username"]=$row['username'];
			if($row['type']==0)
			$_SESSION["user_type"]="public";
			
			
			elseif($row['type']==1){
				$_SESSION["user_type"]="admin";
				?>
				<script type="text/javascript">
                <!--
                 location.replace("admin_products.php");
                 -->

                </script>
                <?php
                 }
				
				
			echo("<p style='color:qreen;'><b>{$row['realname']}به فروشگاه ایرانیان خوش  امدید</b></p>");
		}else
			echo("<p style='color:red;'><b>نام کاربری یا کلمه عبور یافت نشد</b></p>");
			
		
	
mysqli_close($link);
include("footer.php")

?>
