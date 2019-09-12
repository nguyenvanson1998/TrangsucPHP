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
   $fbid = $_REQUEST['MaYKPH'];
   $cusid = $_REQUEST['MaKhach'];
   $fbtitle = $_REQUEST['YKPHTieuDe'];
   $fbcontent = $_REQUEST['YKPHNoiDung'];
   $adminanswer = $_REQUEST['TraLoi'];
   $fbdate = $_REQUEST['YKPHdate'];
   $status = $_REQUEST['TrangThai'];
   
   $select = $_REQUEST['select'];
   
if($select == 'edit')
   {
      if($conn)
	  {
	  mysql_select_db($database_cnn, $conn);
	  $query = "UPDATE YKPH SET YKPHTieuDe = '".$fbtitle."',
									YKPHNoiDung = '".$fbcontent."',
									TraLoi = '".$adminanswer."',
									TrangThai = '".$status."'
								WHERE MaYKPH = ".$fbid." ";
	  mysql_query($query, $conn) or die(mysql_error());
	  echo ("<script> alert('Sửa phản hồi có mã = ".$fbid." thành công')</script>");
	  include('YKPH_Form.php');
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
	   $query = "DELETE FROM YKPH WHERE MaYKPH = ".$fbid." ";
	   mysql_query($query, $conn) or die(mysql_error());
	   echo ("<script> alert('Đã xóa Phản hồi có mã =".$fbid."')</script>");
	   include('YKPH_form.php');
	 }
	 else
	 {
	   echo "Connect fail";
	   return false;
	   include('');
	 }
   
   }
/*else if($select == 'ok')
{
  if($conn)
  {
    mysql_select_db($database_cnn, $conn);
	$query = "INSERT INTO feedback(Fbtitle,FbContent,AdminAnswer,FbDate,status) VALUES('".$fbtitle."','".$fbcontent."','".$adminanswer."','".$fbdate."','".$status."') ";
	mysql_query($query, $conn) or die(mysql_error());
	echo " Tạo mới thành công";
	include('YKPH_form.php'); 
  }
  else
  {
    echo "Connect fail";
	include('');
  }
}*/

else
 {
   include('YKPH_form.php');
   return false; 
 }
?>
</body>
</html>
