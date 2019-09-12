<? session_start()?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<? require_once('../inc/conn.php')?>
<?
   $newscaid =$_REQUEST['MaLTT'];
   $newscaname = $_REQUEST['TenLTT'];
   $descript = $_REQUEST['MoTa'];
   $status = $_REQUEST['TrangThai'];
   $select = $_REQUEST['select'];
   
if($select == 'edit')
   {
      if($conn)
	  {
	     mysql_select_db($database_cnn, $conn);
		 $query = "UPDATE LoaiTT 
		              SET TenLTT = '".$newscaname."',
						  MoTa = '".$descript."',
						  TrangThai = '".$status."'
					  WHERE MaLTT = ".$newscaid." ";
		 mysql_query($query, $conn) or die(mysql_error());
		 echo ("<script> alert('Sửa loại tin có mã = ".$newscaid." thành công');</script>") ;
		 include('LoaiTT_Form.php');		    
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
	   //kiem tra trong bang tin tuc
	   $sql="SELECT * FROM TinTuc Where MaLTT=$newscaid";
	   $kq=mysql_query($sql) or die(mysql_error());
	   $num=mysql_num_rows($kq);
	   if($num){
	   	echo("<script> alert('Không thể xóa loại tin này !');</script>");
		include('LoaiTT_Form.php');
		}else{
	   $query = "DELETE FROM LoaiTT WHERE MaLTT = ".$newscaid." ";
	   mysql_query($query, $conn) or die(mysql_error());
	   echo ("<script> alert('Đã xoá loại tin có mã = ".$newscaid."!');</script>") ;
	   include('LoaiTT_Form.php'); 
	   }
	 }
	 else
	 {
	   echo "Connect fail";
	   return false;
	   include('');
	 }
   
   }
else if($select=='ok')
{
  if($conn)
  {
    mysql_select_db($database_cnn,$conn);
	$query = "INSERT INTO LoaiTT(TenLTT,MoTa,TrangThai) VALUES('".$newscaname."','".$descript."','".$status."') ";
	mysql_query($query, $conn) or die(mysql_error());
	echo ("<script> alert(Tạo mới thành công); <script>");
	include('LoaiTT_Form.php');
  }
  else
  {
    echo "Connect fail";
	include('');
  }
}
 else
 {
	include('LoaiTT_Form.php');
 }
?>
</body>
</html>

