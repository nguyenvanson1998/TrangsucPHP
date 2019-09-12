<? session_start() ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<? require_once('../inc/conn.php')?>
<?
   $payid = $_REQUEST['MaPTTT'];
   $payname = $_REQUEST['TenPTTT'];
   $status = $_REQUEST['TrangThai'];
   $select = $_REQUEST['select'];
   
if($select == 'edit')
   {
     if($conn)
	 {
	   mysql_select_db($database_cnn, $conn);
	   $query = "UPDATE PTTT
	                SET TenPTTT = '".$payname."',
					     TrangThai = '".$status."'
					WHERE MaPTTT = ".$payid." ";
	   mysql_query($query, $conn) or die(mysql_error());
	   echo ("<script> alert('Sửa phương thức thanh toán có mã = ".$payid." thành công')</script>");
	   include('Thanhtoan_Form.php');
	 }
	 else
	 {
	   echo "Connect fail";
	   return false;
	   include('');
	 }
   }
   
else if($select == 'delete')
   {
     if($conn)
	 {
	   mysql_select_db($database_cnn, $conn);
	   //kiem tra trong bang hoa don
	   $sqlcheck ="SELECT MaPTTT FROM DonDat where MaPTTT=".$payid;
		$kq=mysql_query($sqlcheck) or die(mysql_error());
		$num=mysql_num_rows($kq);
		if($num){
		echo ("<script> alert('Không thể xóa phương thức thanh toán này')</script>");
		include('ThanhToan_form.php');
		}else{
	   $query = "DELETE FROM PTTT WHERE MaPTTT = ".$payid;
	   mysql_query($query, $conn) or die(mysql_error());
	   echo ("<script> alert('Đã xoá phương thức thanh toán có ID = ".$payid."')</script>");
	   include('Thanhtoan_form.php');
	   }
	 }
	 else
	 {
	   echo "Connect fail";
	   include('');
	 }
   }
else if($select == 'ok')
{
  if($conn)
  {
    mysql_select_db($database_cnn,$conn);
	$query = "INSERT INTO PTTT(TenPTTT,TrangThai) VALUES('".$payname."','".$status."') ";
	mysql_query($query, $conn) or die(mysql_error());
	echo ("<script> alert('Tạo mới thành công')</script>");
	include('Thanhtoan_Form.php');
  }
  else
  {
    echo "Connect fail";
	include('');
  }
}
else
{
   include('Thanhtoan_Form.php');
}
?>
</body>
</html>
