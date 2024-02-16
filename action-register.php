<?php
include("header.php");

if (isset($_GET['realname']) && !empty($_GET['realname']) &&
	isset($_GET['username']) && !empty($_GET['username']) &&
	isset($_GET['password']) && !empty($_GET['password']) &&
    isset($_GET['repassword']) && !empty($_GET['repassword']) &&
    isset($_GET['email']) && !empty($_GET['email']))
		
		
	   {
	
		   
		   $realname=$_GET['realname'];
		   $username=$_GET['username'];
		   $password=$_GET['password'];
		   $repassword=$_GET['repassword'];
		   $email=$_GET['email'];
	   }
		
   else{
	   var_dump($_GET);
	   exit("برخی از فیلد ها مقدار دهی نشده است.");
	   }

 if($password!=$repassword)
	 exit('تکرار عبور و کلمه ان مشابه نیست');


if (filter_var($email,FILTER_VALIDATE_EMAIL)===false)
	exit("پست الکترونیک وارد شده صحیح نیست.");
   ?>
    <div dir="ltr" style="text-align: left;">
		
		<?php
		echo("realname=".$realname."<br/>");
		echo("username=".$username."<br/>");
		echo("password=".$password."<br/>");
		echo("repassword=".$repassword."<br/>");
		echo("email=".$email."<br/>");
		
		$link=mysqli_connect("localhost","root","","shop_db");
		if(mysqli_connect_errno())
			exit("خطایی باشرح زیر رخ داده است:".mysqli_connect_error());
		$query="INSERT INTO `users` (`realname`, `username`, `password`, `email`, `type`) VALUES ('$realname', '$username', '$password', '$email', '0')";
		if(mysqli_query($link,$query)===true)
			echo("<p style='color:green;'><b>".$realname.
				"گرامی عضویت شما با نام کاربری".$username.
				 "در فروشگاه با موفقیت انجام شد"."</b></p>");
		else
			echo("<p style='color:red;'><b>عضویت شما در فروشگاه انجام نشد</b></p>");
		mysqli_close($link);

		?>
</div>

<?php
include("footer.php");

?>