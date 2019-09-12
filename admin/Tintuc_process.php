<? session_start() ?>
<? require_once('../inc/conn.php') ?>

<?   
    $MaTT = $_REQUEST['MaTT'];
	$TieuDe = $_REQUEST['TieuDe'];
	$TrichDan = $_REQUEST['TrichDan'];
	$Noidung = $_REQUEST['NoiDung'];
	$MaLTT = $_REQUEST['MaLTT'];
	$TrangThai = $_REQUEST['TrangThai'];
	$fame=$_REQUEST['fame'];
	$select = $_REQUEST['select'];
	$anh=$_REQUEST['anh'];
if($fame == 'edit')	
{	
		$dir=$_SERVER['DOCUMENT_ROOT']."/Trangsuc/Images/Tintuc/";
		$file_name=$_FILES['anh']['name'];
	if($file_name!=''){
		$file= $dir.basename($_FILES['anh']['name']);
		if(move_uploaded_file($_FILES['anh']['tmp_name'],$file)){
		  $query = "UPDATE TinTuc 
						SET MaLTT = ".$MaLTT.", 
							TieuDe = '".$TieuDe."', 
							AnhTT = '".$file_name."', 
							TrichDan = '".$TrichDan."',
							NoiDung = '".$NoiDung."', 
							TrangThai=".$TrangThai." 						
						WHERE MaTT = ".$MaTT;				  
		  mysql_query($query, $conn) or die(mysql_error());
		  echo ("<script>alert('Sửa tin tức có mã là ".$MaTT." thành công')</script>");
		  include('Tintuc_Form.php');
		  mysql_close($conn);	  
		}else{ echo "upload ảnh tin lỗi!";
		}
	}else {
		 $query = "UPDATE TinTuc 
						SET MaLTT = ".$MaLTT.", 
							TieuDe = '".$TieuDe."', 
							TrichDan = '".$TrichDan."', 
							NoiDung = '".$NoiDung."',
							TrangThai=".$TrangThai." 						
						WHERE MaTT = ".$MaTT;				  
		  mysql_query($query, $conn) or die(mysql_error());
		  echo ("<script>alert('Sửa tin tức có mã là ".$MaTT." thành công')</script>");
		  include('Tintuc_Form.php');
		  mysql_close($conn);	  
	}
} else if($func == 'xoa'){
  mysql_select_db($database_cnn, $conn);
    $query = "DELETE FROM TinTuc WHERE MaTT = ".$MaTT." ";
    mysql_query($query, $conn) or die(mysql_error());
    echo ("<script>alert('Đã xoá tin tức có mã = ".$MaTT."')</script>");
    include('Tintuc_Form.php');
}  
else if($select == 'ok')
{
  $dir=$_SERVER['DOCUMENT_ROOT']."/Trangsuc/Images/Tintuc/";
	$file_name=$_FILES['anh']['name'];
    $file= $dir.basename($_FILES['anh']['name']);
    if (move_uploaded_file($_FILES['anh']['tmp_name'],$file)){
     mysql_select_db($database_cnn,$conn);
	 $query = "INSERT INTO TinTuc(MaLTT,TieuDe,TrichDan,NoiDung,AnhTT,NgayViet,TrangThai) VALUES('".$MaLTT."','".$TieuDe."','".$TrichDan."','".$NoiDung."','".$file_name."',Date(Now()),'".$TrangThai."') ";
	 mysql_query($query, $conn)or die(mysql_error());
	 echo ("<script> alert(' Tạo mới thành công')</script>");
	 include('Tintuc_Form.php');
	 mysql_close($conn);
  }
}
else
{
  include('Tintuc_Form.php');
}
?>
