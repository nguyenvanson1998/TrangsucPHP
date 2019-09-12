<?
include('../inc/conn.php');
if($_REQUEST['func']==xoa){
	mysql_select_db($database_cnn, $conn);
	//kiem tra da ton tai trong hoa don chua
	$sqlcheck="SELECT MaDD FROM CTDD WHERE MaSP=".$_REQUEST['MaSP'];
	$resultcheck=mysql_query($sqlcheck,$conn) or die(mysql_error());
	$num=mysql_num_rows($resultcheck);
	if($num){
		echo ("<script> alert('Không xóa được sản phẩm này')</script>");
		include('SP_Form.php');
		}else{
		//xoa trong bang sp
	$query = "DELETE FROM SanPham WHERE MaSP = ".$_REQUEST['MaSP']." ";
	mysql_query($query, $conn) or die(mysql_error());
	//xoa trong bang ctlsp
	$sql="DELETE FROM CTLSP WHERE MaSP=".$_REQUEST['MaSP'];
	mysql_query($sql,$conn) or die(mysql_error());
	//thong bao thanh cong
	echo ("<script> alert('Xoá thành công sản phẩm có mã:".$_REQUEST['MaSP']."')</script>");
	include('SP_Form.php');
	}

}else if($_REQUEST['func']==process){
	$dir=$_SERVER['DOCUMENT_ROOT']."/Trangsuc/Images/SanPham/";
	$file_name=$_FILES['anh']['name'];
    $file= $dir.basename($_FILES['anh']['name']);
    if (move_uploaded_file($_FILES['anh']['tmp_name'],$file))
   {
		$TenSP=$_REQUEST['TenSP'];
		$NSX=$_REQUEST['NSX'];
		$NgaySX=$_REQUEST['NgaySX'];
		$Soluong=$_REQUEST['SoLuong'];
		$giaban=$_REQUEST['gia'];
		$HamLuong=$_REQUEST['HamLuong'];
		$trongluong=$_REQUEST['TrongLuong'];
		$MoTa=$_REQUEST['MoTa'];
		$trangthai=$_REQUEST['TrangThai'];
		$sql="INSERT INTO SanPham(TenSP,MoTa,NgaySX,NSXId,SoLuong,Anh,Gia,HamLuong,TrongLuong,TrangThai) VALUES('".$TenSP."','".$MoTa."','".$NgaySX."',".$NSX.",'".$SoLuong."','".$file_name."','".$giaban."','".$HamLuong."','".$trongluong."','".$trangthai."')";
		
		mysql_select_db($database_cnn,$conn);
		mysql_query($sql,$conn) or die(mysql_error());
		
		//chen vao bang CTDD
		$sql2="SELECT MaSP FROM SanPham ORDER BY MaSP DESC LIMIT 0,1";
		$result = mysql_query($sql2,$conn);
			while($row = mysql_fetch_array($result)){
				$MaSP = $row["MaSP"];
			}
		$loaisp=$_REQUEST['LoaiSP'];
		if ($loaisp){
			foreach ($loaisp as $t){
			$sql5="INSERT INTO CTLSP(MaLoaiSP,MaSP) VALUES(".$t.",".$MaSP.")";
			mysql_query($sql5,$conn);			
			}
			}
		echo ("<script> alert('Đã thêm sản phẩm thành công')</script>");
		include("SP_Form.php");
   }
   else
   {
       echo ("<script> alert('Load ảnh không thành công')</script>");
   }
}else{
$anh=$_REQUEST['anh'];
$MaSP=$_REQUEST['MaSP'];
$TenSP=$_REQUEST['TenSP'];
$NSX=$_REQUEST['NSX'];
$NgaySX=$_REQUEST['NgaySX'];
$SoLuong=$_REQUEST['SoLuong'];
$giaban=$_REQUEST['gia'];
$HamLuong=$_REQUEST['HamLuong'];
$trongluong=$_REQUEST['TrongLuong'];
$MoTa=$_REQUEST['MoTa'];
$trangthai=$_REQUEST['TrangThai'];

	if($anh!=""){
	$dir=$_SERVER['DOCUMENT_ROOT']."/Trangsuc/Images/SanPham/";
		$file_name=$_FILES['anh']['name'];
		$file= $dir.$_FILES['anh']['name'];
		if (move_uploaded_file($_FILES['anh']['tmp_name'],$file))
	   {
		  //sua cuan sach
		$sql="UPDATE SanPham SET 	TenSP='".$TenSP."',
									MoTa='".$MoTa."',
									NgaySX='".$NgaySX."',
									NSXId='".$NSX."',
									SoLuong='".$SoLuong."',
									Anh='".$file_name."',
									Gia='".$giaban."',
									HamLuong=".$HamLuong.",
									TrongLuong='".$trongluong."',
									TrangThai='".$trangthai."'
							WHERE MaSP=".$MaSP;
			mysql_select_db($database_cnn,$conn);
			mysql_query($sql,$conn) or die(mysql_error());
			//chen vao bang CTLSP
			$loaisp=$_REQUEST['LoaiSP'];
			if ($loaisp){
				$sql5="DELETE FROM CTLSP WHERE MaSP=".$MaSP;
				mysql_query($sql5,$conn);
				foreach ($loaisp as $t){
				$sql6="INSERT INTO CTLSP(MaLoaiSP,MaSP) VALUES(".$t.",".$MaSP.")";
				mysql_query($sql6,$conn);			
				}
				}
			echo ("<script> alert('Cập nhật thành công sản phẩm mã=".$MaSP."')</script>");
			include("SP_Form.php");
	   }
	   else
	   {
		   echo ("<script> alert('Upload ảnh không thành công hãy kiểm tra ảnh của bạn và thử lại')</script>");
	   }
   }else{
	   		$sql="UPDATE SanPham SET	TenSP='".$TenSP."',
										MoTa='".$MoTa."',
										NgaySX='".$NgaySX."',
										NSXId='".$NSX."',
										SoLuong='".$SoLuong."',
										Gia='".$giaban."',
										HamLuong='".$HamLuong."',
										TrongLuong='".$trongluong."',
										TrangThai='".$trangthai."'
								WHERE MaSP=".$MaSP;
				mysql_select_db($database_cnn,$conn);
				mysql_query($sql,$conn) or die(mysql_error());
				//chen vao bang CTLSP
				$loaisp=$_REQUEST['LoaiSP'];
				if ($loaisp){
					$sql5="DELETE FROM CTLSP WHERE MaSP=".$MaSP;
					mysql_query($sql5,$conn);
					foreach ($loaisp as $t){
					$sql6="INSERT INTO CTLSP(MaLoaiSP,MaSP) VALUES(".$t.",".$MaSP.")";
					mysql_query($sql6,$conn);			
					}
					}
				echo ("<script> alert('Cập nhật thành công sản phẩm có mã=".$MaSP."')</script>");
				include("SP_Form.php");
   }
}
?>