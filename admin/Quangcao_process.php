<? session_start()?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<? require_once('../inc/conn.php')?>
<?
   $adsid = $_REQUEST['QCId'];
   $adsname = $_REQUEST['TenCT'];
   $image = $_REQUEST['anh'];
   $url = $_REQUEST['link'];
   $status = $_REQUEST['TrangThai'];
   $loai=$_REQUEST['loai'];
   $select = $_REQUEST['select'];
   
if($select == 'edit')
{
  if($conn)
  {
    mysql_select_db($database_cnn,$conn);
	$query = "UPDATE QC SET TenCT = '".$adsname."',
	                         Anh = '".$image."',
							 Link = '".$url."',
							 TrangThai = '".$status."'
			  WHERE QCId = ".$adsid." ";
	mysql_query($query, $conn)or die(mysql_error());
	echo ("<script> alert('Sửa Quảng cáo có mã=".$adsid." thành công');</script>");
	include('Quangcao_Form.php');
    
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
    mysql_select_db($database_cnn,$conn);
	//kiem tra quang cao con hoat dong khong
	$sqlcheck="SELECT TrangThai FROM QC WHERE QCId = ".$adsid;
	$kq=mysql_query($sqlcheck) or die(mysql_error());
	$row =mysql_fetch_array($kq);
	if($row['TrangThai']==1){
		echo ("<script> alert('Quảng cáo đang hoạt động');</script>");
		include('Quangcao_form.php');
	
	}else{
	$query = "DELETE FROM QC WHERE QCId = ".$adsid." ";
	mysql_query($query, $conn)or die(mysql_error());		  
	echo ("<script> alert('Xoá Quảng cáo có mã=".$adsid." thành công');</script>");
	include('Quangcao_form.php');   
	}
  }
  else
  {
    echo "Connect fail";
	return false;
	include('');
  }
}
else if($select == 'ok')
{
  if($conn)
  {
    mysql_select_db($database_cnn, $conn);
	$dir=$_SERVER['DOCUMENT_ROOT']."/Trangsuc/Images/Quangcao/";
	$file_name=$_FILES['anh']['name'];
    $file= $dir.basename($_FILES['anh']['name']);
	echo $file;
    if(move_uploaded_file($_FILES['anh']['tmp_name'],$file)){
	$query = "INSERT INTO QC(TenCT,Anh,Link,TrangThai) VALUES('".$adsname.$loai."','".$file_name."','".$url."',".$status.")";
	mysql_query($query, $conn) or die(mysql_error());		  
	echo ("<script> alert('Tạo mới thành công');</script>");
	include('Quangcao_form.php');
	}else{
	echo ("<script> alert('upload ảnh không thành công!')</script>");
	include('Quangcao_form.php');
	}   
  }
  else
  {
    echo "Connect fail";
	return false;
	include('');
  }
}

else
{
  include('Quangcao_form.php');
}
?>
</body>
</html>
