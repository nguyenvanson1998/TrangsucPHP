<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
}
.style12 {
	border: 4px outset #FF6600;
	
}
-->
</style>
</head>
<body>
<?
		$id=$_REQUEST['MaTT'];
		$sql="select * from TinTuc where MaTT=$id";
		$r = mysql_query($sql);
			if($row = mysql_fetch_array($r)); {
				$Title=$row["TieuDe"];
				$Content = $row["NoiDung"];
				$Index=$row["MaLTT"];
				$Image=$row["AnhTT"];
				$Status=$row["TrangThai"];
				$Date=$row["NgayViet"];
				$view=$row["SoLanXem"]+1;
				$view1 = "UPDATE TinTuc SET SoLanXem=$view WHERE MaTT=$id";				
				$rs1 = mysql_query ( $view1 ) or die ( mysql_error () );
				}
?>
				<table width="500" border="0" class="stylewhite" >
				<tr><td height="1"></td></tr>
				<tr>
				<td  height="25"colspan="3" align="center" background="Images/Tool_bar1.jpg" style="background-repeat:no-repeat"><span class="style1">&nbsp;&nbsp;&nbsp;&nbsp;
				    <font style="font-size:14px"><b> Tin Tức</b></font></span></td>
				</tr>
				
				
				<table width="450">
			<tr>
				<td align="center" colspan="2"></td></tr>
				<tr>
				<td align="left" colspan="2"><font size="+1" color="#0066ff"><?=$Title ?></font></td>
					</tr>
					<tr> <td width="342"  align="left" > Lượt xem : <?=$view;?>  
					 <p>Ngày gửi : <?=$Date;?></p></td>
	  			</tr>
				<tr>
	  				<td width="146" align="center"><img src="Images/Tintuc/<?=$row["AnhTT"];?>" width="140"  height="170"align="left" class="style12" />				</tr>
				

	 			<tr>	
	   	 			<td colspan="2"><?=$Content ?></td>
				</tr>

	 			<tr><td colspan="2"><font color="#F77705"><b>Các tin khác:</b></font></td></tr>
				<tr align="center">
	  <?  $limit=5; 
	$query = "SELECT * FROM TinTuc where MaTT<>$id and TrangThai=1 and MaLTT=$Index ORDER BY MaTT LIMIT $limit ";
	$result = mysql_query ( $query );
	while ( $row = mysql_fetch_array ( $result ) ) {
	?>
	
	<td><a href="index.php?mnu=TTCT&MaTT=<?=$row ['MaTT'];?>"><font color="#ff0000"><i><b>  <?=$row['TieuDe']; ?>(<?=$Date ?>)</b></i></font></a></td>
	</tr>
	<?
	}
?> </table>
</table>
</body>
</html>
