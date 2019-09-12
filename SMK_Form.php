<?
session_start();
include('inc/conn.php');
if(!isset($submit)){
?>
<script language="javascript">
function checkform(form){
with(form){
	if(oldpass.value==''){
		alert('Nhập mật khẩu cũ');
		oldpass.focus()
		return false;
	}
	regpass=/\d{6}/
	if(!regpass.test(newpass.value)){
		alert('Mật khẩu tối thiểu 6 ký tự');
		newpass.select()
		newpass.focus()
		return false;
	}
	if(newpass.value!=cnewpass.value){
	 alert('Mật khẩu xác nhận không đúng!');
	 cnewpass.select()
	 cnewpass.focus()
	 return false;
	 }
	 return true;
}
}
</script>
<div align="center" style="color:#FF3300; font-size:18px">Sửa mật khẩu đăng nhập</div>
<form name="form1" method="post" action="">
  <table width="440" border="0" align="center">
    <tr>
      <td width="35%" align="right">Mật khẩu cũ:</td>
      <td width="65%"><label>
        <input type="password" name="oldpass" id="oldpass">
      </label></td>
    </tr>
    <tr>
      <td align="right">Mật khẩu mới:</td>
      <td><label>
        <input type="password" name="newpass" id="newpass">
      </label></td>
    </tr>
    <tr>
      <td align="right">Xác nhận mật khẩu mới:</td>
      <td><label>
        <input type="password" name="cnewpass" id="cnewpass">
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit"  class="button_left" name="submit" id="submit" value="Đồng ý" onClick="return checkform(this.form);" >
      </label></td>
    </tr>
  </table>
</form>
<?
}else{
$oldpass=$_REQUEST['oldpass'];
$newpass=$_REQUEST['newpass'];
$cnewpass=$_REQUEST['cnewpass'];
//kiem tra mat khau cu
mysql_select_db($database_cnn,$conn);
$sql="SELECT MatKhau FROM KhachHang WHERE TaiKhoan='".$_SESSION["TaiKhoan"]."'";
$kq=mysql_query($sql) or die(mysql_error());
$row=mysql_fetch_array($kq);
if($row['MatKhau']!=md5($oldpass)){
	echo "Mật khẩu cũ không đúng";
	unset($submit);
	include('SMK_Form.php');
}else{
	$sql="UPDATE KhachHang SET MatKhau='".md5($newpass)."'";
	mysql_query($sql) or die(mysql_error());
	echo ("<script>alert('Sửa mật khẩu thành công')</script>");
	echo("<script>window.location='index.php'</script>");
}
}
?>
