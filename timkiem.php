<? 
	$TenSP=$_POST['TenSP'];
	$NSX=$_POST['nsx'];
	$LoaiSP=$_POST['LoaiSP'];
	$gia=$_POST['Gia'];
	$HamLuong=$_POST['HamLuong'];
	$w='where';
	$number_of_sp=10;
	if ($HamLuong=="" and $LoaiSP=="" and $gia=="" and $NSX=="" and $TenSP=="") { $w="";}
	   
	 
	  if ($NSX=="") { $h="";}
	  else { $h="p.NSXId='$NSX'";}
	  
	    if ($gia=="") {$g="";}
	  elseif ($gia==1) { if ($h=="") { $g="p.Gia < 1000000";}
	  		 else 	$g=" and p.Gia < 500000"; } 
	  elseif ($gia==2) { if ($h=="") { $g="(p.Gia between 1000000 and 2000000)";}
	  		 else 	$g=" and (p.Gia between 500000 and 2000000)"; }
	   elseif ($gia==3) { if ($h=="") { $g="(p.Gia between 2000000 and 5000000)";}
	  		 else 	$g=" and (p.Gia between 2000000 and 5000000)"; }
	    elseif ($gia==4) { if ($h=="") { $g="p.Gia >5000000";}
	  		 else 	$g=" and p.Gia >100000"; }  
	  
	   if ($LoaiSP=="") { $s="";}
	  else { if ($g=="" and $h=="") { $s="(MaSP IN (SELECT MaSP FROM CTLSP WHERE MaLoaiSP =$LoaiSP))";}
	  		else  	$s=" and (MaSP IN (SELECT MaSP FROM CTLSP WHERE MaLoaiSP =$LoaiSP))";}
	  
	  if ($HamLuong=="") { $m="";}
	  else { if ($s=="" and $g=="" and $h=="")  {$m="p.HamLuong='$HamLuong'";}
	  		 else 	$m=" and p.HamLuong='$HamLuong'";} 
		if ($TenSP=="") { $T="";}
	  else { if ($s=="" and $g=="" and $h=="" and $m=="")  {$T="p.TenSP like '%$TenSP%'";}
	  		 else 	$T=" and p.TenSP Like'%$TenSP%'";} 
			 
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style12 {border: 6px outset #FF6600;}
-->
</style>

<table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td align="left" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr align="left" valign="top"> 
          <td colspan="3" height="5"></td>
  </tr>
        <tr align="left" valign="top"> 
        <td height="24"  colspan="3" align="center"valign="middle" background="Images/Tool_bar1.jpg"  style="background-repeat:no-repeat">
		<font color="#FF0000" style="font-size:14px"><span lang="en-us">&nbsp;&nbsp;&nbsp;</span></font><font style="font-size:14px"><span lang="en-us"><span class="style1">&nbsp;</span></span> <span class="style1"><b>Kết qu&#7843; tìm kiếm</b></span></font></td>
        </tr>
</table>
</td>
  </tr>
  <tr> 
    <td> <div align="center">
      <?
	  
				$sql="SELECT * FROM SanPham as p $w $h $g $s $m $T";
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
      <a href="?mnu=<?=$mnu?>&page=<?=($i+1)?>" > 
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
$sqlsp="SELECT *
FROM SanPham as p $w $h $g $s $m $T
ORDER BY
p.MaSP DESC
 LIMIT $start,$number_of_sp"; //print $sqlsp;
$resultsp=mysql_query($sqlsp);
$numrow=mysql_num_rows($resultsp);
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
				$sql="SELECT * FROM SanPham as p  $w $h $g $s $m $T";
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
      <a href="?mnu=<?=$mnu?>&page=<?=($i+1)?>" class="menu2"> 
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

//mysql_free_result($row_nsx);
?>