<?php 
session_start();
include("inc/session_reg.php");
include("inc/conn.php");
	 $email = $_POST["email"];
     $username = $_POST["username"];
     $password = $_POST["pass"];
     $firstname = $_POST["firstname"];
	 $lastname = $_POST["lastname"];
	 $birthday = $_POST["birthday"];
	 $company = $_POST["company"];
	 $city = $_POST["city"];
	 $phone = $_POST["phone"];
	 $fax = $_POST["fax"];
	 $address = $_POST["address"];
	 $gender = $_POST["gender"];
	 $_SESSION['reg_username']= $_POST["username"];
	 $_SESSION['reg_email']= $_POST["email"];
	 $_SESSION['reg_ho']= $_POST["firstname"];
	 $_SESSION['reg_ten']= $_POST["lastname"];
	 $_SESSION['reg_ngaysinh']= $_POST["birthday"];
	 $_SESSION['reg_dienthoai']= $_POST["phone"];
	 $_SESSION['reg_fax']= $_POST["fax"];
	 $_SESSION['reg_congty']= $_POST["company"];
	 $_SESSION['reg_city']= $_POST["city"];
	 $_SESSION['reg_diachi']= $_POST["address"];

   if($_SESSION['security_code'] == $_POST['securitycode'] && !empty($_SESSION['security_code'])) {
		// Insert you code for processing the form here, e.g emailing the submission, entering it into a database. 
	unset($_SESSION['security_code']);
		//kiem tra voi csdl va them nguoi dung moi
	 mysql_select_db($database_cnn, $conn);
	 $sql_check = "SELECT * FROM KhachHang WHERE TaiKhoan = '".$username."'";
	 $result = mysql_query($sql_check);
	 $row = mysql_num_rows($result);
	 if ($row)
     	{
           $msg = "Tai Khoan da ton tai vui long dang ki tai khoan khac!";
           header("location:index.php?mnu=dangky&msg=".$msg);
      	}else{
           $sql_insert = "INSERT INTO Khachhang(NgayDK,TaiKhoan,MatKhau,Email,Ho,Ten,NgaySinh,CongTy,SoDT,SoFax,ThanhPho,DiaChi,GioiTinh,TrangThai) VALUES(Date(Now()),'".$username."','".md5($password)."','".$email."','".$firstname."','".$lastname."','".$birthday."','".$company."','".$phone."','".$fax."','".$city."','".$address."',".$gender.",1)";
		  mysql_query($sql_insert,$conn);
		  //echo "B&#7841;n &#273;&atilde; &#273;&#259;ng k&yacute; th&agrave;nh c&ocirc;ng!<br/>";
		  //echo "<a href = index.php class=menu2>V&#7873; trang ch&#7911;</a>";
		  	unset($_SESSION['reg_username']);
			unset($_SESSION['reg_email']);
			unset($_SESSION['reg_ho']);
			unset($_SESSION['reg_ten']);
			unset($_SESSION['reg_ngaysinh']);
			unset($_SESSION['reg_dienthoai']);
			unset($_SESSION['reg_fax']);
			unset($_SESSION['reg_congty']);
			unset($_SESSION['reg_city']);
			unset($_SESSION['reg_diachi']);
?>
<style type="text/css">
<!--
.style1 {
	font-size: 36px;
	font-weight: bold;
	color:#993300;
}
-->
</style>

  <table width="440" border="0" align="center">
  <tr>
    <td align="center"><span class="style1">&#272;&#259;ng k&yacute; th&agrave;nh c&ocirc;ng!</span></td>
  </tr>
  <tr>
    <td align="center">H&atilde;y &#273;&#259;ng nh&#7853;p v&#7899;i nh&#7919;ng th&ocirc;ng tin b&#7841;n &#273;&atilde; &#273;&#259;ng k&yacute; v&#7899;i h&#7879; th&#7889;ng &#273;&#7875; s&#7917; d&#7909;ng c&aacute;c t&iacute;nh n&#259;ng cao c&#7845;p kh&aacute;c!</td>
  </tr>
  <tr>
    <td align="center"><a href="index.php">V&#7873; trang ch&#7911;</a></td>
  </tr>
</table>
<?
 	} 
} else {
		// Insert your code for showing an error message here
		$msgcode= 'Xin lỗi mã an toàn bạn nhập không chính xác';
		header("location:index.php?mnu=dangky&msgcode=".$msgcode);
   }

?>