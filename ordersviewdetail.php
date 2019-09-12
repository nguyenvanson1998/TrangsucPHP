<? session_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<? require_once('inc/conn.php')?>
<? 
   mysql_select_db($database_cnn, $conn)or die(mysql_error());
   $MaKhach = $_SESSION['MaKhach'];
   $MaDD = $_POST['MaDD'];
 
   $query_SanPham = "SELECT * FROM SanPham WHERE MaSP in ( SELECT MaSP FROM CTDD WHERE MaDD = ".$MaDD." )";
   $display_SanPham = sprintf("%s ",$query_SanPham);
   $query_SanPham = mysql_query($display_SanPham, $conn);
   $row_SanPham = mysql_fetch_array($query_SanPham);
   
   
   $query_payment = "SELECT * FROM PTTT WHERE MaPTTT in( SELECT MaPTTT FROM DonDat WHERE MaDD = ".$MaDD.")";
   $display_payment = sprintf("%s ",$query_payment);
   $query_payment = mysql_query($display_payment, $conn);
   $row_payment = mysql_fetch_array($query_payment);
   
   
   $query_PTVC = "SELECT * FROM PTVC WHERE MaVC in (SELECT MaVC FROM DonDat WHERE MaDD = ".$MaDD.")";
   $display_PTVC = sprintf("%s",$query_PTVC);
   $query_PTVC = mysql_query($display_PTVC, $conn);
   $row_PTVC = mysql_fetch_array($query_PTVC);
   
   
   $query_DonDat = "SELECT * FROM DonDat WHERE MaDD = ".$MaDD."";
   $display_DonDat = sprintf("%s",$query_DonDat);
   $query_DonDat = mysql_query($display_DonDat, $conn);
   $row_DonDat = mysql_fetch_array($query_DonDat);
   
?>
<table border="0" align="center" cellpadding="0" cellspacing="0" >
	<tr height="5"></tr>
	<tr align="center"><font size="+2" color="#149ff7"><td colspan="3">Chi tiết hóa đơn</td></font></tr>
  <tr>
    <td valign="top"><fieldset style="border-color:#d87a0c"><legend><font color="#149ff7" style="font-weight:bold">Sản phẩm</font></legend>
		<table width="430" border="0">  
      <tr >
		   <td> Tên sản phẩm</td>
		   <td> Số lượng</td>
		   <td> Giá</td>
		</tr>
	  <? do { ?>
        <tr >
          <td><? echo $row_SanPham['TenSP'] ?></td>
          <?  
		   $sql_CTDD = "SELECT * FROM CTDD WHERE MaSP = ".$row_SanPham['MaSP']." AND MaDD=".$MaDD;
		   $result_CTDD = mysql_query($sql_CTDD);
		   $row_CTDD = mysql_fetch_array($result_CTDD);
		   ?>
          <td><? echo $row_CTDD['SoLuong']?></td>
          <td><? echo $row_CTDD['Gia']?></td>
        </tr>
	  <? } while($row_SanPham = mysql_fetch_array($query_SanPham))?>
      </table>
    </fieldset> </td>
  </tr>
  <tr>
  <td valign="top"><fieldset style="border-color:#d87a0c"><legend><font color="#149ff7" style="font-weight:bold">Phương thức thanh toán</font></legend>
    <table width="430" >
      <tr><td ><? echo $row_payment['TenPTTT']?> </td>
      </tr></table>
    </fieldset> </td>
  </tr>
  <tr>
  	<td><fieldset style="border-color:#d87a0c"><legend><font color="#149ff7" style="font-weight:bold">Phương thức vận chuyển</font></legend>
	<table width="430" border="0" >
      <tr >
        <td width="153">Loại vận chuyển </td>
        <td width="267"><? echo $row_PTVC['TenVC']?></td>
      </tr>
      <tr >
        <td>Thông tin vận chuyển </td>
        <td><? echo $row_PTVC['MoTa']?></td>
      </tr>
    </table>
	</fieldset></td>
  </tr>
  <tr height="25"></tr>
  <tr>
    <td align="left" valign="top"><fieldset style="border-color:#d87a0c">
    <legend><font color="#149ff7" style="font-weight:bold">Thông tin người nhận</font></legend>  
    <table width="430" border="0" >
      <tr >
        <td width="153">Ngày lập hóa đơn</td>
        <td width="267"><? echo $row_DonDat['NgayDat']?></td>
      </tr>
      <tr >
        <td>Người nhận  </td>
        <td><? echo $row_DonDat['NguoiDat']?></td>
      </tr>
      <tr >
        <td>Số điện thoại người nhận</td>
        <td><? echo $row_DonDat['SDT']?></td>
      </tr>
      <tr >
        <td>Số fax người nhận</td>
        <td><? echo $row_DonDat['Fax']?></td>
      </tr>
      <tr >
        <td>Địa chỉ người nhận</td>
        <td><? echo $row_DonDat['DiaChi']?></td>
      </tr>
      <tr >
        <td>Ngày nhận </td>
        <td><? echo $row_DonDat['NgayNhan']?></td>
      </tr>
      <tr >
        <td><span style="color:#FF0000">Trạng thái</span></td>
        <td><? if($row_DonDat['TrangThai']==0) echo "<span style=color:#FF0000>Chưa sử lý</span>";
				else if($row_DonDat['TrangThai']==1) echo "<span style=color:#FF0000>Đang chờ</span>";
				else echo "<span style=color:#FF0000>Đã xong</span>";
		
		?></td>
      </tr>
    </table>
    </fieldset></td>
  </tr>
</table>
</body>
</html>
