<? session_start() ?>
<? require_once('../inc/conn.php')?>

<?
   $shipid = $_REQUEST['MaVC'];
   $shipname = $_REQUEST['TenVC'];
   $shipinfo = $_REQUEST['MoTa'];
   $status = $_REQUEST['TrangThai'];
   $select = $_REQUEST['select'];
   
if($select == 'edit')
   {
     if($conn)
	 {
	    mysql_select_db($database_cnn, $conn);
		$query = "UPDATE PTVC 
		            SET MaVC = '".$shipid."',
					    TenVC = '".$shipname."',
						MoTa = '".$shipinfo."',
						TrangThai = '".$status."'
					WHERE MaVC = ".$shipid." ";
		mysql_query($query, $conn) or die(mysql_error());
		
		echo ("<script> alert('Sửa phương thức vận chuyển có Mã=".$shipid." thành công!');</script>");
		include('Vanchuyen_Form.php');
						
	 }
     else
	 {
	   echo "Connect fail";
	   include('');
	 }
   }
else if($select == 'delete')
   {
     if($conn)
	 {
	 	mysql_select_db($database_cnn, $conn);
	 	//kiem tra trong bang hoa don
		$sqlcheck ="SELECT MaVC FROM DonDat where MaVC=".$shipid;
		$kq=mysql_query($sqlcheck) or die(mysql_error());
		$num=mysql_num_rows($kq);
		if($num){
		echo ("<script> alert('Không thể xóa loại vận chuyển này!')</script>");
		include('Vanchuyen_Form.php');
		}else{
	  	$query = "DELETE FROM PTVC WHERE MaVC = ".$shipid;
	   mysql_query($query, $conn) or die(mysql_error());
	   echo ("<script> alert('Đã xoá vân chuyển có ID=".$shipid."')</script>");
	   include('Vanchuyen_Form.php');
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
     mysql_select_db($database_cnn, $conn);
	 $query = "INSERT INTO PTVC(TenVC,MoTa,TrangThai) VALUES('".$shipname."','".$shipinfo."','".$status."')";
	 mysql_query($query, $conn) or die(mysql_error());
	 echo ("<script> alert('Tạo mới thành công')</script>");
	 include('Vanchuyen_Form.php');
   }
   else
   {
     echo "Connect fail";
   }
}
else
{
 include('Vanchuyen_Form.php');
}
?>

