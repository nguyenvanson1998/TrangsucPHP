<?
include("../inc/conn.php");
if($_REQUEST['func']==xoa){
	mysql_select_db($database_cnn, $conn);
	$sql="SELECT MaDD FROM DonDat WHERE MaKhach=".$_REQUEST['cid'];
	$result=mysql_query($sql,$conn);
	$num=mysql_num_rows($result);
	if($num){
	echo "<span style=color:#FF0000>Không thể xóa khách hành này!</span>";
	 include('Khachhang_form.php');
	}else{
	$query = "DELETE FROM KhachHang WHERE MaKhach = ".$_REQUEST['cid'];
	mysql_query($query, $conn) or die(mysql_error());
	echo "Xoá khách hàng có mã:".$_REQUEST['cid'] ;
	include('KhachHang_form.php');
		}
}
?>
