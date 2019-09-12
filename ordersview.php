<? session_start(); ?>

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
   
   $row_per_page = 20;
   $pagenum = $_REQUEST['page'];
   $page = "index.php?mnu=viewOrder";
   
   $query = mysql_query("SELECT * FROM DonDat LEFT JOIN KhachHang ON KhachHang.MaKhach = DonDat.MaKhach WHERE KhachHang.MaKhach=".$_SESSION["MaKhach"]);
   $row_num = mysql_num_rows($query);
   
   $totalpage = ceil($row_num / $row_per_page);
   
   if(!$pagenum || $pagenum <= 0 || $pagenum > $totalpage)
   {
     $pagenum = 1;
   }
   if($pagenum == 1)
   {
     $from = 0;
   }
   else
   {
     $from = ($pagenum-1)*$row_per_page;
   }
   
   $query = "SELECT MaDD,Ho,Ten,NgayDat,DonDat.TrangThai FROM DonDat LEFT JOIN KhachHang ON KhachHang.MaKhach = DonDat.MaKhach WHERE KhachHang.MaKhach=".$_SESSION["MaKhach"]." LIMIT ".$from.",".$row_per_page;
   $display = sprintf("%s",$query);
   $query_viewDonDat = mysql_query($display, $conn)or die(mysql_error());
   $row = mysql_fetch_array($query_viewDonDat);
   $row_num = mysql_num_rows($query_viewDonDat);

?>
<div align="center" style="margin-top:10px;"><font color="#149ff7" style="font-weight:bold; font-size:20px;"> Xem hoá đơn</font></div>
<fieldset><legend><font color="#149ff7"><? echo "Bạn có ".$row_num." hoá đơn" ?></font></legend>
<table width="430" border="0" align="center" cellpadding="2" cellspacing="0">
<tr height="35" style="font-weight:bold" align="center">
    <td width="24" >Mã</td> 
    <td width="148" >Họ và tên</td>
    <td width="65" >Ngày đặt</td>
    <td width="109" >Tình Trạng</td>
	<td width="66">
	 </td>
  </tr>
<? if($row) { ?>
<? do { ?>
<form action="index.php?mnu=viewOrder&func=detail" method="post" name="form1">
	
  <tr>
    <td width="24" ><input name="MaDD" readonly="1" type="text" id="MaDD" value="<? echo $row['MaDD']?>" size="3"/></td> 
    <td width="148" align="center" ><? echo $row['Ho']." ".$row['Ten'] ?></td>
    <td width="90" ><? echo $row['NgayDat']?></td>
    <td width="109" ><? if($row['TrangThai'] == 0)
	                    echo "Chưa thanh toán";
					   else if($row['TrangThai']==1)
					    echo "Đang chờ";
					  else
					    echo "Đã thanh toán";
	?></td>
	<td width="66">
	  <input class="button_" type="submit" name="Submit" value="Chi tiết" />
	 </td>
  </tr>
</form>
<? } while($row = mysql_fetch_array($query_viewDonDat));
}
else
{
?>
<tr><td colspan="5"> Chưa có hoá đơn</td>
</tr>
<?
}
?>
</table>
</fieldset>
<br />
<div align="center">
 Trang <? 
   for($i=1;$i<=$totalpage;$i++)
   {
     if($i==1)
	 echo "<a href='".$page."&page=".$i."'>".$i."</a> ";
	 else
	 echo " | <a href='".$page."&page=".$i."'>".$i."</a> "; 
   }
?>
</div>
</body>
</html>
