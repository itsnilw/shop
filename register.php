<?php
include("header.php");
if(isset($_SESSION["state_login"])&&$_SESSION["state_login"]==true){
	?>
<script type="text/javascript">
<!--
location.replace("index.php");
	-->

</script>
<?php
}
?>

<script type="text/javascript">
<!--
function check_empty()
{
	var username=";
  username=document.getElementById("username").value;
  if(username=="") 
	alert('وارد کردن نام کاربری الزامی است.');
   else
{
	var r=confirm("از صحت اطلاعات وارد شده اظمینان دارید؟");
	if(r==true){
		document.register.submit();
	}
}
}
-->
</script>
<br></br>
<form name="register" action="action-register.php" method="get">
<table style="width:50%;" border="0" style="margin-left:auto; margin-right:auto;">

<tr>
<td style="width:40%;">نام واقعی<span style="color:red;">*</span></td>
<td style="width:60%;"><input type="text" id="realname" name="realname"/></td>
</tr>

<tr>
<td style="width:40%;">نام کاربری<span style="color:red;">*</span></td>
<td style="width:60%;"><input type="text" id="username" name="username"/></td>
</tr>


<tr>
<td style="width:40%;">گلمه عبور<span style="color:red;">*</span></td>
<td style="width:60%;"><input type="password" id="password" name="password"/></td>
</tr>


<tr>
<td style="width:40%;">تکرار کلمه عبور<span style="color:red;">*</span></td>
<td style="width:60%;"><input type="password" id="repassword" name="repassword"/></td>
</tr>


<tr>
<td style="width:40%;">پست الکترونیکی<span style="color:red;">*</span></td>
<td style="width:60%;"><input type="text" id="email" name="email"/></td>
</tr>


<tr>
<td><br></br></td>
<td><input type="submit" value="ثبت نام"/>
&nbsp;&nbsp;&nbsp;
<input type="reset" value="جدید"/>
</td>
</tr>
</table>





<?php
include("footer.php");

?>