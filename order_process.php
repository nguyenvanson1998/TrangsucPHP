<?
session_start();
	require_once('inc/conn.php');
	$cart = $_SESSION["CART"];
	function GetQuantity($MaSP){
		$cart = $_SESSION["CART"];
		$quantity=0;
		foreach(array_keys($cart) as $value){
			if($value == $MaSP){
				$quantity = $cart[$MaSP];
				break;
			}
		}
		return $quantity;	
	} 
?>
<?
			$idlist = "";
			$total=0;
			$MaKhach = $_SESSION["MaKhach"];
			$email=$_REQUEST["email"];
			$shipid=$_REQUEST['ship'];
			$payid=$_REQUEST['payment'];
			$dname=$_REQUEST['dname'];
			$dcompany=$_REQUEST['company'];
			$dphone=$_REQUEST['phone'];
			$dfax=$_REQUEST['fax'];
			$daddress=$_REQUEST['address'];
			$ddate=$_REQUEST['end'];
			mysql_select_db($database_cnn,$conn);
				
			//Tao 1 hoa don moi
			$sql1 = "INSERT INTO DonDat (MaKhach,NgayDat,MaVC,MaPTTT,NguoiDat,Email,CongTy,SDT,Fax,DiaChi,NgayNhan,TrangThai) VALUES(".$MaKhach.",Date(Now()),'".$shipid."','".$payid."','".$dname."','".$email."','".$dcompany."','".$dphone."','".$dfax."','".$daddress."','".$ddate."',0)";
						
			mysql_query($sql1,$conn) or die(mysql_error());
						
			//Lay orderID LIMIT 0,1 la lay ban ghi tu vi tri 0 tiep theo 1 ban ghi. Cau lenh nay thay lenh TOP trong MSSQL
						
			$sql2 = "SELECT MaDD FROM DonDat ORDER BY MaDD DESC LIMIT 0,1";
						
			$result = mysql_query($sql2,$conn);
			while($row = mysql_fetch_array($result)){
				$orderid = $row["MaDD"];
			}
						
			//Insert vao bang Order Detail
						
			foreach(array_keys($cart) as $value){
			//Lay gia ban 
			$sql3 = "SELECT * FROM SanPham WHERE MaSP = ".$value;
							
			$result = mysql_query($sql3,$conn);
			while($row = mysql_fetch_array($result)){
				$price = $row["Gia"];
			}
			//Insert du lieu vao order detail
			$sql4 = "INSERT INTO CTDD (MaDD,MaSP,SoLuong,Gia) VALUES($orderid,$value,".GetQuantity($value).",$price)";
			mysql_query($sql4,$conn);
			}
			//mysql_close($conn);
			//Xoa gio hang khi insert du lieu xong
			unset($_SESSION["CART"]);
			unset($_SESSION['quantity']);
			header("location:index.php?mnu=success");

?>