<?
	session_start();
	require_once('inc/conn.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?
		mysql_select_db($database_cnn,$conn);
		
		$usr = $_REQUEST["uname"];
		$pwd = $_REQUEST["pass"];
		$flag = false;
		$sql = "SELECT * FROM KhachHang WHERE taikhoan='".$usr."' AND MatKhau='".md5($pwd)."'";
		//Kiem tra xem username da ton tai trong CSDL chua
		$result = mysql_query($sql,$conn);
		while($row = mysql_fetch_array($result)){
			$flag = true;
			$_SESSION["flag1"] = "true";
			$_SESSION["TaiKhoan"]=$row['TaiKhoan'];
			$_SESSION["Ten"]=$row["Ten"];
			$_SESSION["MaKhach"]=$row["MaKhach"];
			$_SESSION["Ho"]=$row["Ho"];
			$_SESSION["Ten"]=$row["Ten"];
			$_SESSION["NgaySinh"]=$row["NgaySinh"];
			$_SESSION["Email"]=$row["Email"];
			$_SESSION["SoDT"]=$row["SoDT"];
			$_SESSION["SoFax"]=$row["SoFax"];
			$_SESSION["CongTy"]=$row["CongTy"];
			$_SESSION["ThanhPho"]=$row["ThanhPho"];
			$_SESSION["DiaChi"]=$row["DiaChi"];
			$_SESSION["GioTinh"]=$row["GioTinh"];
		}
		if($flag){
			echo("<script>alert('Đăng nhập thành công!')</script>");
			echo("<script>window.location='index.php'</script>");
			//echo $_REQUEST["custname"];
			//header("location:index.php");
		}else{
			echo("<script>alert('Tên đăng nhập không tồn tại hoặc mật khẩu sai')</script>");
			echo("<script>window.location='index.php'</script>");
			
	}
?>
        
