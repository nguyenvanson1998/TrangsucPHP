<? session_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<? require_once('../inc/conn.php') ?>
<?  
   
   $cateID = $_REQUEST['MaLoaiSP'];
   $catename = $_REQUEST['TenLoaiSP'];
   $descript = $_REQUEST['MoTa'];
   $status = $_REQUEST['TrangThai'];
   $select = $_REQUEST['select'];
   
if($select == "edit")
 {   
   if($conn)
   {
     mysql_select_db($database_cnn, $conn);
	 $query = "UPDATE LoaiSP 
	               SET TenLoaiSP = '".$catename."',  
				        MoTa = '".$descript."',
						TrangThai = '".$status."'
				   WHERE MaLoaiSP = ".$cateID." ";			   			   			   				
	 mysql_query($query, $conn) or die (mysql_error());
	 echo ("<script> alert('Sửa loại sô cô la có mã là: ".$cateID." thành công')</script>");
	 include('LoaiSP_Form.php');
   }
   
   else
   {
     echo "Connect sever fail";
	 return false;
	 include('');
   }
 }
 
else if($select == "delete")
{            
       mysql_select_db($database_cnn, $conn);
	   //kiem tra loai sach co sach chua
	   $sqlcheck="SELECT MaSP FROM CTLSP WHERE MaloaiSP=".$cateID;
	   $resultcheck=mysql_query($sqlcheck);
	   $rowcheck=mysql_num_rows($resultcheck);
	   if($rowcheck==0){
	   $query = "DELETE FROM LoaiSP WHERE MaLoaiSP = ".$cateID."  ";
	   mysql_query($query, $conn);
	   echo ("<script> alert(' Đã xoá loại có mã là: ".$cateID."')</script>");
	   include('LoaiSP_Form.php');
	   }else{
	   echo ("<script> alert('Không thể xóa được loại này')</script>");
	   include('LoaiSP_Form.php');
}
}
else if($select == 'ok')
{
  if($conn)
  {
    mysql_select_db($database_cnn,$conn);
	$query = "INSERT INTO LoaiSP(TenLoaiSP,MoTa,TrangThai) VALUES('".$catename."','".$descript."','".$status."') ";
	mysql_query($query, $conn) or die(mysql_error());
	echo ("<script> alert(' Tạo mới thành công')</script>");
	include('LoaiSP_Form.php');
  }
  else
  {
    echo "Connect fail";
	include('');
  }
}

else
{
  include('LoaiSP_Form.php');
}
?>
</body>
</html>

