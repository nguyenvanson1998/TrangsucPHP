<?php 
require_once('inc/conn.php');
 ?>
<?php
mysql_select_db($database_cnn, $conn);
//truy van tin tuc
$query_news = "SELECT TieuDe, TrichDan, AnhTT FROM Tintuc ORDER BY MaTT DESC LIMIT 0,1";
$result_news = mysql_query($query_news, $conn) or die(mysql_error());
$row_news = mysql_fetch_array($result_news);
?>
<style type="text/css">
<!--
.style11 {color: #FFFFFF}
.style12 {

	border: 4px outset #FF6600;
	;
}
-->
</style>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr align="left"> 
    <td width="79%" style="padding-left:3;padding-right:5;">
	<table border="0" width="100%" id="table299" style="border-collapse: collapse" cellpadding="0">
	<tr><td height="5"></td></tr>



<tr>
	<td>
		<table border="0" width="100%" id="table304" cellpadding="0" style="border-collapse: collapse">
			<tr>
			<td width=100% height="24" background="Images/Tool_bar1.jpg" style="background-repeat:no-repeat">
				<div align="center" class="style11"><font><span lang="en-us">&nbsp; </span> <b>Sản Phẩm Mới </b></font></div></td>
			</tr>
		</table></td>
</tr>
<tr><td height="5"></td></tr>
<tr> 
    <td style="padding-left:20;padding-top:10">
      <table width="100%" border="0" cellspacing="2" cellpadding="0" class="table">
        <tr align="left" valign="top"> 
          <?

$sqlsp="SELECT 
  SanPham.MaSP,
  SanPham.TenSP,
  SanPham.Anh,
  SanPham.MoTa,
  SanPham.NSXId,
  SanPham.HamLuong,
  SanPham.Gia,
  SanPham.TrongLuong
  FROM
  SanPham
  ORDER BY
  SanPham.MaSP DESC
 LIMIT 0,10";
 //print $sqlsp;
$resultsp=mysql_query($sqlsp);
$numrow = mysql_num_rows($resultsp);
if($numrow==0) echo "Chưa có sản phẩm";
else{
				$i=1;
				WHILE ($rowsp = mysql_fetch_array($resultsp))
					{  	 
					if ($i % 2==0)
						{

?>
          <td width="25%"> <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
            
			
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
      </table>      </td>
  </tr>
										
    </table></td>
  </tr>
</table>
<div style="left: -1000px; top: -44px; visibility: hidden;" id="dhtmltooltip">
</div>
<script src="js/tooltip.js" type="text/javascript"></script>
