<?php require_once('inc/conn.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?
   $title = $_POST["YKPHTieuDe"];
   $content = $_POST["YKPHNoiDung"];
   
   $query = "INSERT INTO YKPH(MaKhach,YKPHTieuDe,YKPHNoiDung,YKPHDate) values('".$_SESSION['MaKhach']."','".$title."','".$content."',Date(Now()))";
   
   if(empty($content)||empty($title))
   {
     echo "<script> alert('Bạn cần nhập đầy đủ tiêu đề va nội dung');</script>";
	 include "YKPH_Form.php";
	 return false;
   }
   
   if($conn)
   {
     mysql_select_db($database_cnn,$conn);
	 mysql_query($query,$conn);
	 echo "<script> alert('Gửi phản hồi thành công');</script>";
	 echo("<script>window.location='index.php'</script>");
	 }
   else
   {
     echo "<script> alert('send fail');</script>";
}
   
?>
  </body>


