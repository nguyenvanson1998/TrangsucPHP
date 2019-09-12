<?
include('../inc/conn.php');
if($_REQUEST['func']==xoa){
$MaDD=$_REQUEST['MaDD'];
mysql_select_db($database_cnn,$conn);
//kiem tra trang thai hoa don
$sqlkt="SELECT TrangThai FROM DonDat WHERE MaDD=".$MaDD;
$resultkt=mysql_query($sqlkt,$conn);
$rowkt=mysql_fetch_array($resultkt);
if(($rowkt['TrangThai']==1)||($rowkt['TrangThai']==2)){
 echo ("<script> alert('Không thể xóa hóa đơn này')</script>");
 include('order_Form.php');
}else{ 
//xoa trong bang order
$sql_order="DELETE FROM DonDat WHERE MaDD=".$MaDD;
mysql_query($sql_order,$conn) or die(mysql_error());
//xoa trong bang CTDD
$sql_CTDD="DELETE FROM CTDD WHERE MaDD=".$MaDD;
mysql_query($sql_CTDD,$conn) or die(mysql_error());
echo "Đã xóa thành công hóa đơn mã:".$odid."<br/>";
echo "<a herf='' onClick='history.go(-1)' class=menu2>Quay lại</a>";
}
}
if($_REQUEST['func']==process){
$MaDD=$_REQUEST['MaDD'];
$status=$_REQUEST['status'];
mysql_select_db($database_cnn,$conn);
$sql="UPDATE DonDat SET TrangThai='".$status."' WHERE MaDD=".$MaDD;
mysql_query($sql) or die(mysql_error());
echo ("<script>alert('Đã cập nhật thành công hóa đơn mã số:".$MaDD."')</script>");
include('order_Form.php');
}
mysql_close($conn);
?>