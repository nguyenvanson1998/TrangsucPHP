<?
include("../inc/conn.php");
$bid=$_REQUEST['MaSP'];
mysql_select_db($database_cnn,$conn);
$sqlvb="SELECT * FROM SanPham WHERE MaSP =".$bid;
$sqlau="SELECT NSXName FROM NSX WHERE NSXId IN ( SELECT NSXId FROM SanPham WHERE MaSP=".$bid.")";
$sqll="SELECT TenLoaiSP FROM LoaiSP WHERE MaLoaiSP IN ( SELECT MaLoaiSP FROM CTLSP WHERE MaSP=".$bid.")";
$resultb=mysql_query($sqlvb,$conn);
$resulta=mysql_query($sqlau,$conn);
$resultl=mysql_query($sqll,$conn);
$rowview=mysql_fetch_array($resultb);
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h3>CHI TIẾT SẢN PHẨM</h3>
<table width="440" border="0" cellpadding="0" cellspacing="0">
   <tr>
    <td width="158" height="177" valign="middle"> <div align="center"><img src="/Trangsuc/Images/SanPham/<?=$rowview["Anh"]; ?>" width="143" height="188"  hspace="2" vspace="2" border="0"></div></td>
    <td width="282" valign="top"><table width="100%" border="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td height="25" colspan="2" align="center"><h4><? echo $rowview['TenSP']?></h4></td>
      </tr>
      <tr>
        <td width="111" height="25" align="right"><strong>Nhà cung cấp :</strong></td>
        <td width="167" align="left" >
        <?
        while($rowa=mysql_fetch_array($resulta)){
		echo $rowa['NSXName'].",";
		}
		?>        </td>
      </tr>
	  <tr>
        <td width="111" height="25" align="right"><strong>Kiểu trang sức :</strong></td>
        <td width="167" align="left" >
        <?
        while($rowl=mysql_fetch_array($resultl)){
		echo $rowl['TenLoaiSP'].",";
		}
		?>        </td>
      </tr>
      <tr>
        <td height="25" align="right"><strong>Ngày sản xuất :</strong></td>
        <td align="left"><? echo $rowview['NgaySX']?></td>
      </tr>
      <tr>
        <td height="25" align="right"><strong>Số lượng :</strong></td>
        <td align="left"><? echo $rowview['SoLuong']?></td>
      </tr>
      <tr>
        <td height="25" align="right"><strong>Trọng lượng :</strong></td>
        <td align="left"><? echo $rowview['TrongLuong']?>chỉ</td>
      </tr>
      <tr>
        <td height="25" align="right"><strong>Chất liệu:</strong></td>
        <td align="left"><? echo $rowview['HamLuong']?> </td>
      </tr>
      <tr>
        <td height="25" align="right"><strong>Giá bán :</strong></td>
        <td align="left"><? echo $rowview['Gia']?>VNĐ</td>
      </tr>
    </table>    </td>
  </tr>
  <tr>
    <td align="center" colspan="2"><strong>Đôi nét về sản phẩm</strong></td>
  </tr>
  <tr>
    <td height="36" colspan="2" valign="top" align="center"><? echo $rowview['MoTa']?></td>
  </tr>
  <tr>
    <td height="25"></td>
    <td align="left" valign="top"><label>
      <input type="submit" name="Submit" id="button" value="Sửa" onClick="window.location='index.php?act=SP&func=edit&MaSP=<?=$rowview['MaSP']?>'">
    </label></td>
  </tr>
</table>
</body>
</html>
