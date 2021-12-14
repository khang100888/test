<?php
ob_start();
session_start();
include_once './ketnoi.php';

if(isset($_POST["submit"]))
{
	$email=$_POST["Email"];
    $mk=$_POST["mk"];

	if(isset($email) &&isset($mk))
	{
		$sql="SELECT  *FROM nhanvien WHERE Email ='$email' AND mk ='$mk'";
		$query=mysqli_query($conn,$sql);
		$rows=mysqli_num_rows($query);
		if($rows>0)
		{
			$_SESSION["Email"]=$email;
			$_SESSION["mk"]=$mk;
			header('location: Trangchu.php');
		}
		else{
			echo '<center>Nguyen pham cong Khang</center>';
		}
	}
		
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8" />
	<title>K&V Admin</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style3.css" />
	<link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">
</head>
<body >
			<?php
			if(!isset($_SESSION['Email'])){
			?>
	<form method="post">
	<div id="form-login">
		<h2>Đăng nhập </h2>
	    <ul>
	        
			<div class="form-login">
                <input  class="form-control" placeholder="Tài khoản email"  type="mail" name="Email" >
              </div>
	      <br>
			<div class="form-login">
                <input  class="form-control" placeholder="Mật khẩu"   type="password" name="mk" >
              </div>
			  <br>
			  <div class="form-login">
				  <label>ghi nhớ</label>&nbsp;<input type="checkbox" name="check" checked="checked" />
              </div>
			  <br>
			  <div class="form-login" >	
				  <button  type="submit" name="submit"  value="Đăng nhập" >Đăng nhập</button> <input type="reset" name="resset" value="Cập nhật" />
              </div>
			  <br>
			  <div class="form-login">
				  <label>Không có tài khoản ? <a href="dangky.php"> Đăng Ký</label>
              </div>			  
	    </ul>
	</div>	
	</form>	
	<?php
			}else{
				header('location:Trangchu.php');
			}
	?>
</body>
</html>









