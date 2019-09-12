<?php
//session_start();
?>
<? if($_SESSION["flag1"]!="true"){ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
.title {
	color:#734633;
	font-size:16px;
}
.title_icon {
	float:left;
	padding:0 5px 0 0;
	}
/*.Dang_Nhap {
	background:url(Images/border.gif) center bottom no-repeat;
	padding:0 0 35px 0;
	width:200px;
}*/
.Dang_Nhap td {
	font-weight:bold;
}
.Dang_Nhap a:hover{
	color:#000000;
}
/*.button {
	width:71px;
	height:25px;
	border:none;
	cursor:pointer;
	text-align:center;
	float:right;
	color:#FFFFFF;
	background:url(Images/button.gif) no-repeat center;
	margin-top:3px;
}*/
input.text {
	width:140px;
}
.style1 {
	color: #FFFFFF;
	font-size: 13px;
}
.style2 {color: #FFFFFF}
</style>
<title>login</title>
</head>

<body>
<div class="Dang_Nhap">
			
			<table border="0" width="190" id="table304" cellpadding="0" style="border-collapse: collapse">				
			<tr>
			<td width="100%" height="24" background="Images/Tool_bar1.jpg" style="background-repeat:no-repeat">
									
					<div class="title">
					  <div align="center" class="style1">	<font>Đăng nhập</font></div>
					</div>
			</td>
			</tr>
			</table>
		
	<form name="frmlogin" method="post"  action="index.php?mnu=dangnhap">
	  <table align="center" border="0">
        <tr>
          <td class="stylewhite"><div align="center" class="style2">
            <div align="center">Tên đăng nhập</div>
          </div></td>
        </tr>
        <tr>
          <td><div align="center">
            <input type="text" name="uname" class="text" />
          </div></td>
        </tr>
        <tr>
          <td class="stylewhite"><div align="center" class="style2">
            <div align="center">Mật khẩu</div>
          </div></td>
        </tr>
        <tr>
          <td><div align="center">
            <input type="password" name="pass" class="text" />
          </div></td>
        </tr>
        <tr>
          <td>            
            
            <div align="left">
              <input class="button_" type="submit" name="login" value="Đăng nhập" />
            </div></td>
        </tr>
      </table>
	</form>
</div>
<? }else{ ?>
<div class="Dang_Nhap">
<div class="title"><span class="title_icon"></span><font color="#FF0000">Chào:<font color="#FF0000">&nbsp;<? echo $_SESSION["Ten"] ?></font></div>
	<form name="frmlogin" method="post" action="logout.php">
	  <table align="center" border="0" class="stylewhite">
        <tr>
          <td><a href="index.php?mnu=YKPH">Gửi phản hồi</a></td>
        </tr>
        <tr>
          <td><a href="index.php?mnu=YKPH&action=view">Xem trả lời</a></td>
        </tr>
        <tr>
          <td><a href="index.php?mnu=viewOrder">Xem hóa đơn</a></td>
        </tr>
        <tr>
          <td><a href="index.php?mnu=STTCN">Sửa thông tin cá nhân</a></td>
        </tr>
        <tr>
          <td><input class="button_" type="submit" value="Thoát" />
          </td>
        </tr>
      </table>
	</form>
</div>
<? }?>
</body>
</html>
