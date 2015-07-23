<?php
	header("content-type:text/html");
	if( isset($_REQUEST['authcode']) ){
		session_start();
		
		if( strtolower( $_REQUEST['authcode'] ) == $_SESSION['authcode'] ){
			echo '<p color="#0000CC">输入正确</p>';
		}else{
			echo '<p color="#CC0000">输入错误</p>';
		}
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″>
		<title>确认验证码</title>
	</head>
	<body>
		<form method="post" action="./form.php">
			<p>验证码图片：<img border="1" src="./captcha.php?r=<?php echo rand();?>" border="1" width="100" ></p>
			<p>请输入图片中的内容:
				<input type="text" name="authcode" value="" />
			</p>
			<p><input type="submit" value="提交" style="padding:6px 20px;" /></p>
		</form>
	</body>
</html>
