<?
include('../inc/conn.php');
$MaDD=$_REQUEST['MaDD'];
mysql_select_db($database_cnn,$conn);
	//lay thong tin ban sp
	$sql_SanPham = "SELECT * FROM SanPham WHERE MaSP in ( SELECT MaSP FROM CTDD WHERE MaDD = ".$MaDD." )";
   $result_SanPham = mysql_query($sql_SanPham, $conn);
   
   //lay phuong thuc thanh toan
   $sql_payment = "SELECT * FROM PTTT WHERE MaPTTT =(SELECT MaPTTT FROM DonDat WHERE MaDD = ".$MaDD.")";
   $result_payment = mysql_query($sql_payment, $conn);
   $row_payment = mysql_fetch_array($result_payment);
   
   //lay phuong thuc van chuyen
   $sql_ship = "SELECT * FROM PTVC WHERE MaVC in (SELECT MaVC FROM DonDat WHERE MaDD = ".$MaDD.")";
   $result_ship = mysql_query($sql_ship, $conn);
   $row_ship = mysql_fetch_array($result_ship);
   //lay tu bang DonDat
   $sql_DonDat = "SELECT * FROM DonDat WHERE MaDD = ".$MaDD."";
   $result_DonDat = mysql_query($sql_DonDat, $conn);
   $row_DonDat = mysql_fetch_array($result_DonDat);
   //lay thong tin tu bang khach hang
   $sql_KhachHang="SELECT * FROM KhachHang WHERE MaKhach=(SELECT MaKhach FROM DonDat WHERE MaDD=".$MaDD.")";
   $result_KhachHang=mysql_query($sql_KhachHang,$conn);
   $row_KhachHang=mysql_fetch_array($result_KhachHang);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--

body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
</head>

<body>
<h3>Hóa đơn</h3>
<hr />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#25a9f4">
    <td width="50%" height="24" >Thông tin khách hàng:</span></td>
    <td width="50%">Thông tin người nhận:</span></td>
  </tr>
  <tr>
    <td><table width="100%" border="1" bgcolor="#72c7f8">
      <tr>
        <td width="28%" align="right"><strong>Tên khách hàng:</strong></td>
        <td width="72%"><? echo $row_KhachHang['Ho']." ".$row_KhachHang['Ten'];?></td>
      </tr>
      <tr>
        <td align="right"><strong>Email:</strong></td>
        <td><? echo $row_KhachHang['Email']?></td>
      </tr>
      <tr>
        <td align="right"><strong>Số điện thoại:</strong></td>
        <td><? echo $row_KhachHang['SoDT']?></td>
      </tr>
      <tr>
        <td align="right"><strong>Số fax:</strong></td>
        <td><? echo $row_KhachHang['SoFax']?></td>
      </tr>
      <tr>
        <td align="right"><strong>Địa chỉ:</strong></td>
        <td><? echo $row_KhachHang['DiaChi']?></td>
      </tr>
      <tr>
        <td align="right"><strong>Công ty:</strong></td>
        <td><? echo $row_KhachHang['CongTy']?></td>
      </tr>
      <tr>
        <td align="right"></td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td><table width="100%" border="1" bgcolor="#72c7f8">
      <tr>
        <td width="31%" align="right"><strong>Tên Người nhận:</strong></td>
        <td width="69%"><? echo $row_DonDat['NguoiDat'];?></td>
      </tr>
      <tr>
        <td align="right"><strong>Email:</strong></td>
        <td><? echo $row_DonDat['Email'];?></td>
      </tr>
      <tr>
        <td align="right"><strong>Số điện thoại:</strong></td>
        <td><? echo $row_DonDat['SDT'];?></td>
      </tr>
      <tr>
        <td align="right"><strong>Số fax:</strong></td>
        <td><? echo $row_DonDat['Fax'];?></td>
      </tr>
      <tr>
        <td align="right"><strong>Địa chỉ:</strong></td>
        <td><? echo $row_DonDat['DiaChi'];?></td>
      </tr>
      <tr>
        <td align="right"><strong>Công ty:</strong></td>
        <td><? echo $row_DonDat['CongTy'];?></td>
      </tr>
      <tr>
        <td align="right"><strong>Ngày nhận:</strong></td>
        <td><? echo $row_DonDat['NgayNhan'];?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" >
      <tr>
        <td class="stylebold" width="39%">Phương thức vận chuyển:</td>
        <td width="61%"><? echo $row_ship['TenVC'];?></td>
      </tr>
    
      <tr>
        <td class="stylebold" width="39%">Phương thức thanh toán:</td>
        <td width="61%"><? echo $row_payment['TenPTTT']?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="1" bgcolor="A8FDCA">
      <tr class="stylebold">
        <td width="7%" align="center" valign="middle" >Mã sản phẩm</td>
        <td width="53%" align="center" valign="middle" >Tên sản phẩm</td>
        <td width="16%" align="center" valign="middle" >Số lượng</td>
        <td width="11%" align="center" valign="middle" >Giá</td>
        <td width="13%" align="center" valign="middle" >Tổng</td>
      </tr>
      <? 
	  $tong=0;
	  while($row_SanPham = mysql_fetch_array($result_SanPham)){?>
      <tr align="center">
        <td bgcolor="#F0FFFF"><? echo $row_SanPham['MaSP'];?></td>
        <td bgcolor="#F0FFFF"><? echo $row_SanPham['TenSP'];?></td>
        <?
        $sql_CTDD = "SELECT * FROM CTDD WHERE MaSP =".$row_SanPham['MaSP']." AND MaDD=".$MaDD;
	    $result_CTDD = mysql_query($sql_CTDD);
   		$row_CTDD = mysql_fetch_array($result_CTDD);
		?>
        <td bgcolor="#F0FFFF"><? echo $row_CTDD['SoLuong'];?></td>
        <td bgcolor="#F0FFFF"><? echo $row_CTDD['Gia'];?>vnđ</td>
        <td bgcolor="#F0FFFF"><? echo $row_CTDD['SoLuong']*$row_CTDD['Gia']?>vnđ</td>
      </tr>
      <?
	  	$tong+=$row_CTDD['SoLuong']*$row_CTDD['Gia'];
	   }?>
      <tr>
        <td colspan="3">&nbsp;</td>
        <td align="center" class="stylebold">Tổng:</td>
        <td><? echo $tong;?>vnđ</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="74%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center"  class="stylebold" >Ngày lập:</td>
        <td align="center" bgcolor="#F0FFFF"><? echo $row_DonDat['NgayDat'];?></td>
		
        </tr>
      <tr class="stylered">
        <td align="center"   class="stylebold">Trạng thái:</td>
        <td align="center" ><? if($row_DonDat['TrangThai']==0) echo "Chưa sử lý";
				else if($row_DonDat['TrangThai']==1) echo "Đang chờ";
				else echo "Đã xong";
		
		?></td>
        </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right" valign="top"><strong>Trạng thái:</strong></td>
    <td align="left" valign="middle">
    <? if($row_DonDat['TrangThai']==2) echo "Hóa đơn đã xong"; else{?>
    <form id="form1" name="form1" method="post" action="index.php?act=HD&func=process&MaDD=<?=$row_DonDat['MaDD'];?>">
      <label>
      <select name="status" id="select">
        <option value="0">Chưa sử lý</option>
        <option value="1">Đang chờ</option>
        <option value="2">Đã xong</option>
      </select>
      </label>
      <label>
      <input class="button_" type="submit" name="button" id="button" value="Cập nhật" />
      </label>
    </form>
    <? }?>    </td>
  </tr>
</table>
<p>&nbsp; </p>
</body>
</html>
<?
mysql_close($conn);
?>