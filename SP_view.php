<?
include("inc/conn.php");
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
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style2 {font-size: 13px}
.style12 {border: 8px inset #FF6600;}
.stylespview {color: #FF6600}
.style16 {font-size: 15px; }
-->
</style>
</head>

<body>
<table class="stylewhite" width="100%" border="0" cellspacing="0" cellpadding="0" >
	<tr align="left" valign="top"> 
          <td colspan="3" height="5"></td>
  	</tr>
    <tr align="left" valign="top"> 
      <td colspan="3"  height="24" valign="middle" background="Images/Tool_bar1.jpg" style="background-repeat:no-repeat">
	    <div align="center" class="style2">
	      <font ><span class="style1" lang="en-us">&nbsp;&nbsp;&nbsp;&nbsp;</span> <span class="style1"><b>
      Chi Tiết Sản Phẩm </b></span></font></div></td>
    </tr>
	
	<tr><td>&nbsp;</td></tr>
	
	<tr>
    <td width="177" height="177" valign="middle"> <div align="center"><img src="/Trangsuc/Images/SanPham/<?=$rowview["Anh"]; ?>" width="143" height="188"  hspace="2" vspace="2" border="0" class="style12"></div></td>
    <td width="700" valign="top"><table border="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr class="style2">
        <td height="25" colspan="2" align="center" class="styleblue"><h4><? echo $rowview['TenSP']?></h4></td>
      </tr>
     
        <td width="101"  height="25" align="right" class="stylespview" ><div align="left" class="style16">Nhà cung cấp </div></td>
        <td width="94" align="left" >:&nbsp;
        <?
        while($rowa=mysql_fetch_array($resulta)){
		echo $rowa['NSXName'].",";
		}
		?>        </td>
      </tr>
	  <tr >
        <td height="25" align="right" class="stylespview"><div align="left" class="style16">Kiểu trang sức  </div></td>
        <td align="left" >:&nbsp;
        <?
        while($rowl=mysql_fetch_array($resultl)){
		echo $rowl['TenLoaiSP'].",";
		}
		?>        </td>
      </tr>
      <tr>
        <td height="25" align="right" class="stylespview"><div align="left" class="style16">Ngày sản xuất </div></td>
        <td align="left">:&nbsp;&nbsp;<? echo $rowview['NgaySX']?></td>
      </tr>
      <tr>
        <td height="25" align="right" class="stylespview"><div align="left" class="style16">Trọng lượng </div></td>
        <td align="left">:&nbsp;&nbsp;<? echo $rowview['TrongLuong']?> <span class="stylespview">Chỉ</span></td>
      </tr>
      <tr>
        <td height="25" align="right" class="stylespview"><div align="left" class="style16">Chất liệu </div></td>
        <td align="left">:&nbsp;&nbsp;<? echo $rowview['HamLuong']?>  </td>
      </tr>
      <tr>
	 
        <td height="25" align="right"class="stylespview"><div align="left" class="style16">Giá bán </div></td>
        <td align="left"class="stylered">:&nbsp;&nbsp;<? echo $rowview['Gia']?> <span class="stylespview">VNĐ</span></td>
      </tr>
    </table>    </td>
  </tr>
  <tr>
    <td align="center" colspan="2" class="styleblue" ><strong>Đôi nét về sản phẩm:</strong></td>
  </tr>
  <tr>
    <td height="36" colspan="2" valign="top" align="center"><? echo $rowview['MoTa']?></td>
  </tr>
  <tr>
    <td height="25"></td>
    <td align="left" valign="top"><div align="left"><a href="cart.php?action=add&MaSP=<?=$rowview["MaSP"]; ?>"><img src="Images/sgsg.jpg" width="16" height="13" border="0">&nbsp;Chọn mua</a> </div><br>&nbsp;</td>
  </tr>
    </label></td>
  </tr>
</table>
</body>
</html>
