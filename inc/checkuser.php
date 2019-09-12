<?php
include("../inc/conn.php");
mysql_select_db($database_cnn, $conn);
$usr = $_REQUEST["q"];
$result = mysql_query("SELECT * FROM KhachHang where TaiKhoan='$usr'");

while($row = mysql_fetch_array($result))
  {
 		$a = true;
  }
if($a) {
	echo "Tên đăng nhập này đã tồn tại";
}else echo "Bạn có thể sử dụng tên đăng nhập này!";
mysql_close($conn);
?>