<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
}
.style12 {
	border: 6px outset #FF6600;
	
}
-->
</style>
</head>

<body>
<table width="500" border="0">
<tr><td height="1"></td></tr>
<tr>
<td  height="25"colspan="3" align="center" background="Images/Tool_bar1.jpg" style="background-repeat:no-repeat"><span class="style1">&nbsp;&nbsp;&nbsp;&nbsp;
    <font style="font-size:14px"><b> Tin Tức</b></font></span></td>
</tr>
  <tr>
    <td> <div align="center">
      <?		$number_of_sp=5;
	  			$MaLTT=$_REQUEST['MaLTT'];
				$sql="SELECT * FROM TinTuc  WHERE MaLTT=".$MaLTT." and TrangThai=1" ;
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
  <tr>
    <td><table width="100%" border="0" cellspacing="2" cellpadding="0" class="table">
       <?
$start=$page*$number_of_sp;
$sqlsp="SELECT 
  TinTuc.MaTT,
  TinTuc.TieuDe,
  TinTuc.AnhTT,
  TinTuc.TrichDan,
  TinTuc.NgayViet
  FROM
  TinTuc
  WHERE MaLTT=".$MaLTT." and TrangThai=1
  ORDER BY
  TinTuc.MaTT DESC
 LIMIT $start,$number_of_sp";
 //print $sqlsp;
$resultsp=mysql_query($sqlsp);
$numrow = mysql_num_rows($resultsp);
if($numrow==0) echo "Tin chưa cập nhật";
else{
		while($rowsp = mysql_fetch_array($resultsp)){  	 
?>
   <tr>
   <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="stylewhite" >
  <tr>
  <td  align="center" valign="top" colspan="2"><font color="#0066ff" size="+1"><strong><? echo $rowsp["TieuDe"]?></strong></font></td>
  </tr>
  <tr>
  <td></td>
  <td><font color="#000000">Đăng ngày: <? echo $rowsp["NgayViet"]?></font></td>
  </tr>
  <tr>
    <td width="145" height="137"><div align="center" >
                <img src="Images/TinTuc/<?=$rowsp["AnhTT"]; ?>" width="100" height="130" border="0" class="style12"></div></td>
    <td width="345"><div align="justify"><? echo $rowsp["TrichDan"];?></div></td>
  </tr>
  <tr> 
	<td align="right" colspan="2"><a href="index.php?mnu=TTCT&MaTT=<?=$rowsp["MaTT"]?>"><font color="#0066ff"> Chi tiết...</font></a><br>&nbsp;
	<hr align="center" color="#C5B083"/></td>
  </tr>
</table></td>
   </tr>       
        
<?               
	}
}
?>
      </table></td>
  </tr>
    <tr>
    <td> <div align="center">
      <?
				$sql="SELECT * FROM TinTuc ";
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
</body>
</html>
