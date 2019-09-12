<?php require_once('inc/conn.php'); ?>
<?php
//tim va hien thi ten danh muc san pham tuong ung voi pid truyen toi
$colname_rs_title = "1";
if (isset($_GET['MaLoaiSP'])) {
  $colname_rs_title = (get_magic_quotes_gpc()) ? $_GET['MaLoaiSP'] : addslashes($_GET['MaLoaiSP']);
}
mysql_select_db($database_cnn, $conn);
$query_rs_title = sprintf("SELECT TenLoaiSP FROM LoaiSP WHERE MaLoaiSP = %s", $colname_rs_title);
$rs_title = mysql_query($query_rs_title, $conn) or die(mysql_error());
$row_rs_title = mysql_fetch_assoc($rs_title);
$totalRows_rs_title = mysql_num_rows($rs_title);
?>
<html>
<head>
<title>..::..</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
.style5 {
	color: #FFFFFF;
	font-size: 13px;
	font-weight: bold;
}
.style12 {
	border: 6px outset #FF6600;}
-->
</style>

</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td align="left" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr align="left" valign="top"> 
          <td colspan="3" height="5"></td>
  </tr>
        <tr align="left" valign="top"> 
        <td width="100%" height="24" valign="middle" background="Images/Tool_bar1.jpg" style="background-repeat:no-repeat">
		  <div align="center" class="style5"><font>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_rs_title['TenLoaiSP']; ?></font></div></td>
          
        </tr>
</table>
</td>
  </tr>
  <tr> 
    <td> <div align="center">
      <?		$number_of_sp=10;
				$sql="SELECT * FROM SanPham WHERE MaSP in (select MaSP from CTLSP where MaLoaiSP='$MaLoaiSP')";
				$result=mysql_query($sql);
				$total = mysql_num_rows($result);
				//print $total;
				$sotrang=$total / $number_of_sp;
				//print $sotrang;
			if ($total > $number_of_sp)	
				{
				print "Trang<strong> ";
				for ($i=0;$i<$sotrang;$i++)
					{
					if ($page==$i) { print " [".($i+1)."] "; } else {
		  ?>
      <a href="?mnu=<?=$mnu?>&MaLoaiSP=<?=$MaLoaiSP?>&page=<?=($i+1)?>" class="menu2"> 
        <?=($i+1)?>
      </a> 
        <? 			
	  					}
	  				}
	  			} 
?>    
      </div></td>
  </tr>
  <tr> 
    <td style="padding-left:20;padding-top:10"><table width="100%" border="0" cellspacing="2" cellpadding="0" class="table">
        <tr align="left" valign="top"> 
          <?

$start=$page*$number_of_sp;
$sqlsp="SELECT 
  SanPham.MaSP,
  SanPham.TenSP,
  SanPham.Anh,
  SanPham.MoTa,
  SanPham.HamLuong,
  SanPham.NSXId,
  SanPham.Gia,
  SanPham.TrongLuong
  FROM
  SanPham
  WHERE MaSP in (select MaSP from CTLSP where MaLoaiSP='$MaLoaiSP')
ORDER BY
  SanPham.MaSP DESC
 LIMIT $start,$number_of_sp";
 //print $sqlsp;
$resultsp=mysql_query($sqlsp);
$numrow = mysql_num_rows($resultsp);
if($numrow==0) echo "Đang cập nhật !";
else{
				$i=1;
				WHILE ($rowsp = mysql_fetch_array($resultsp))
					{  	 
					if ($i % 2==0)
						{

?>      
          <td width="25%"> <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
            
			<tr>
			<td height="5"></td>
			</tr>
			   			  <tr align="left" valign="top"> 
			  <?php 
              list($width, $height, $type, $attr) = getimagesize("Images/SanPham/".$rowsp["Anh"]);
				?> 
                <td colspan="2" ><a href="?mnu=chitiet&MaSP=<?=$rowsp['MaSP']?>">
                 <div align="center" onmouseover="ddrivetip(ttFile<? echo $rowsp["MaSP"];?>)" onmouseout="hideddrivetip()" ><img src="Images/SanPham/<?=$rowsp["Anh"]; ?>" width="100" height="100"  hspace="2" vspace="2" border="0" class="style12"></div>
                </a>
                 <script language="javascript" type="text/javascript">
				 var ttFile<? echo $rowsp["MaSP"];?> = '<table class="ToolTipTable" cellpadding="2" cellspacing="0"><tr><td class="Label" valign="top"  align="center">Chi tiết sản phẩm</td></tr><tr><td class="Label" valign="middle" align="center"><img src="Images/SanPham/<?=$rowsp["Anh"]; ?>"></td></tr></table>';
				 </script></td>
              </tr>
              <tr align="left" valign="top" >
                <td ><table width="160" border="0" align="center" cellpadding="0" cellspacing="0" >
                 <tr>
              <td colspan="2" align="center"  class="header" ><? echo $rowsp["TenSP"]; ?></td>	  
			  </tr>
				<tr>
                    <td class= "styleyellow" align="right">Giá Bán</td>
                    <td class="styleblue">: <? echo $rowsp["Gia"]; ?> VNĐ</td>
                  </tr>
                  <tr>
				 
                    <td class="stylewhite" colspan="2"><div align="center"><a href="cart.php?action=add&MaSP=<?=$rowsp["MaSP"]; ?>" class="menu2"><img src="Images/sgsg.jpg" width="16" height="13" border="0">&nbsp;Chọn mua</a> </div><br>&nbsp;</td>
					 
					 </td>                 
				  </tr>
                </table></td>
              </tr>
            </table></td>
        </tr>
        <tr align="left" valign="top"> 
          <? } else { ?>
         <td width="25%"> <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
             
			 <tr>
			<td height="5"></td>
			</tr>
              <tr align="right" valign="top"> 
			  			  <?php 
              list($width, $height, $type, $attr) = getimagesize("Images/SanPham/".$rowsp["Anh"]);

				?> 
                <td width="43%" ><a href="?mnu=chitiet&MaSP=<?=$rowsp['MaSP']?>"><div align="center" onmouseover="ddrivetip(ttFile<? echo $rowsp["MaSP"];?>)" onmouseout="hideddrivetip()"><img src="Images/SanPham/<?=$rowsp["Anh"]; ?>" width="100" height="100"  hspace="2" vspace="2" border="1" class="style12"></div>
                </a>
                <script language="javascript" type="text/javascript">
				 var ttFile<? echo $rowsp["MaSP"];?> = '<table class="ToolTipTable" cellpadding="2" cellspacing="0"><tr><td class="Label" valign="top"  align="center">Chi tiết sản phẩm</td></tr><tr><td class="Label" valign="middle" align="center"><img src="Images/SanPham/<?=$rowsp["Anh"]; ?>"></td></tr></table>';
				 </script>                </td>
				 
              </tr>
			  
              <tr align="left" valign="top">
                <td colspan="2" ><table width="160" border="0" align="center" cellpadding="0" cellspacing="0">
				 <tr>
              <td colspan="2" align="center"  class="header"><? echo $rowsp["TenSP"]; ?></td>
              </tr>
                  
                  <tr>
                    <td  class= "styleyellow" align="right">Giá Bán</td>
                    <td class="styleblue">:&nbsp;<? echo $rowsp["Gia"]; ?> VNĐ </td>
                  </tr>
                  <tr>
                    <td class="stylewhite" colspan="2"><div align="center"><a href="cart.php?action=add&MaSP=<?=$rowsp["MaSP"]; ?>" class="menu2"><img src="Images/sgsg.jpg" width="16" height="13" border="0">&nbsp;Chọn mua</a> </div><br>&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          <? 
		} 
	$i++;
	}
}
?>
      </table>
		  </td>
  </tr>
  <tr> 
    <td><div align="right"></div></td>
  </tr>
  <tr> 
    <td> <div align="center">
      <?
				$sql="SELECT * FROM SanPham WHERE MaSP in (select MaSP from CTLSP where MaLoaiSP='$MaLoaiSP')";
				$result=mysql_query($sql);
				$total = mysql_num_rows($result);
				//print $total;
				$sotrang=$total / $number_of_sp;
				//print $sotrang;
			if ($total > $number_of_sp)	
				{
				print "Trang<strong> ";
				for ($i=0;$i<$sotrang;$i++)
					{
					if ($page==$i) { print " [".($i+1)."] "; } else {
		  ?>
      <a href="?mnu=<?=$mnu?>&MaLoaiSP=<?=$MaLoaiSP?>&page=<?=($i+1)?>" class="menu2"> 
        <?=($i+1)?>
      </a> 
        <? 			
	  					}
	  				}
	  			} 
?>    
      </div></td>
  </tr>
</table>
<div style="left: -1000px; top: -44px; visibility: hidden;" id="dhtmltooltip">
</div>
<script src="js/tooltip.js" type="text/javascript"></script>
</body>
</html>
<?php
//mysql_free_result($re_quickjump_pro);

//mysql_free_result($rs_title);
?>
