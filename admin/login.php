<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
*{margin:0;padding:0;}body{padding-top:30px;font:11px "Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif;}form{margin-left:8px;padding:16px 16px 40px 16px;font-weight:normal;-moz-border-radius:11px;-khtml-border-radius:11px;-webkit-border-radius:11px;border-radius:5px;background:#fff;border:1px solid #e5e5e5;-moz-box-shadow:rgba(200,200,200,1) 0 4px 18px;-webkit-box-shadow:rgba(200,200,200,1) 0 4px 18px;-khtml-box-shadow:rgba(200,200,200,1) 0 4px 18px;box-shadow:rgba(200,200,200,1) 0 4px 18px;}form .forgetmenot{font-weight:normal;float:left;margin-bottom:0;}.button-primary{font-family:"Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif;padding:3px 10px;border:none;font-size:12px;border-width:1px;border-style:solid;-moz-border-radius:11px;-khtml-border-radius:11px;-webkit-border-radius:11px;border-radius:11px;cursor:pointer;text-decoration:none;margin-top:-3px;}#login form p{margin-bottom:0;}label{color:#777;font-size:13px;}form .forgetmenot label{font-size:11px;line-height:19px;}form .submit,.alignright{float:right;}form p{margin-bottom:24px;}h1 a{background:url(../images/logo-login.gif) no-repeat top center;width:326px;height:67px;text-indent:-9999px;overflow:hidden;padding-bottom:15px;display:block;}#nav{text-shadow:rgba(255,255,255,1) 0 1px 0;}#backtoblog{position:absolute;top:0;left:0;border-bottom:#c6c6c6 1px solid;background:#d9d9d9;background:-moz-linear-gradient(bottom,#d7d7d7,#e4e4e4);background:-webkit-gradient(linear,left bottom,left top,from(#d7d7d7),to(#e4e4e4));height:30px;width:100%;}#backtoblog a{text-decoration:none;display:block;padding:8px 0 0 15px;}#login{width:320px;margin:7em auto;}#login_error,.message{margin:0 0 16px 8px;border-width:1px;border-style:solid;padding:12px;-moz-border-radius:3px;-khtml-border-radius:3px;-webkit-border-radius:3px;border-radius:3px;}#nav{margin:0 0 0 8px;padding:16px;}#user_pass,#user_login,#user_email{font-size:24px;width:97%;padding:3px;margin-top:2px;margin-right:6px;margin-bottom:16px;border:1px solid #e5e5e5;background:#fbfbfb;}input{color:#555;}.clear{clear:both;} input.button-primary:active, button.button-primary:active, a.button-primary:active{
-moz-background-clip:border;
-moz-background-inline-policy:continuous;
-moz-background-origin:padding;
background:#21759B url(../images/button-grad-active.png) repeat-x scroll left top;
color:#EAF2FA;
}
input.button-primary,button.button-primary,a.button-primary{border-color:#298cba;font-weight:bold;color:#fff;background:#21759B url(../images/button-grad.png) repeat-x scroll left top;text-shadow:rgba(0,0,0,0.3) 0 -1px 0;}
</style>
<title>Đăng nhập ban quản trị</title>

<script language="javascript" type="text/javascript">
function checkform(form){
	with(form){
		ok=0;
		if(adminname.value==""){
			document.getElementById("tdadminname").innerText="Nhập tên đăng nhập admin";
			document.getElementById("tdadminname").style.visibility="visible"
			ok++
		}
		if(passwordadmin.value==""){
			document.getElementById("tdadminpass").innerText="Nhập mật khẩu đăng nhập admin";
			document.getElementById("tdadminpass").style.visibility="visible"
			ok++
		}
	if(ok!=0) return false
		//else return true;	
	}
	return true	
}
</script>
</head>

<body class="login">
<div id="login">

	<img src="../images/logo.jpg" border="0" />
	
	  <form name="loginform" id="form" action="login_admin_process.php" method="post">
	<p>
		<label>Username<br />
		<input type="text" name="adminname" id="user_login" class="input" value="" size="20" tabindex="10" /></label>
	</p>
	<p>
		<label>Password<br />

		<input type="password" name="passwordadmin" id="user_pass" class="input" value="" size="20" tabindex="20" /></label>
	</p>
	
	<p class="submit">
		<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Log In" tabindex="100" />
		
	</p>

</form>

</div>
</body>
</html>
