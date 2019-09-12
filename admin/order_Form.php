<?
session_start();
$_SESSION["flag"];
$_SESSION["admin"];
if($_SESSION["flag"]!="true")
header("location: login.php");
include("../inc/conn.php");
$trangthai=$_REQUEST['status'];
$cid=$_REQUEST['cid'];
if($cid){
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?
   mysql_select_db($database_cnn, $conn)or die(mysql_error());
   
   $row_per_page = 10;
   $pagenum = $_REQUEST['page'];
   $page = "index.php?act=HD&cid=".$cid;
   
   $query = mysql_query("SELECT * FROM DonDat WHERE MaKhach=".$cid);
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
   
   $query = "SELECT * FROM DonDat LEFT JOIN KhachHang ON KhachHang.MaKhach = DonDat.MaKhach WHERE DonDat.MaKhach =".$cid." LIMIT ".$from.",".$row_per_page;
   $display = sprintf("%s",$query);
   $query_viewDonDat = mysql_query($display, $conn)or die(mysql_error());
   $row_num = mysql_num_rows($query_viewDonDat);

?>
<div align="center"><h3>QUẢN LÝ HÓA ĐƠN</h3></div>
<fieldset><legend><font color="#09588f"><? echo "có ".$row_num." hoá đơn" ?></font></legend>
<table width="691" border="1" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF">
<tr bgcolor="#25a9f4" class="stylebold">
    <td width="69" align="center" >Mã số</td> 
    <td width="241" align="center" >Tên khách hàng</td>
    <td width="244" align="center" >Ngày Lập </td>
	<td width="111" align="center" >Chọn</td>
  </tr>
<? if($row_num) { ?>
<?  while($row = mysql_fetch_array($query_viewDonDat)){ ?>
  <tr>
    <td align="center" ><? echo $row['MaDD']?></td> 
    <td align="center" ><? echo $row['Ho']." ".$row['Ten'] ?></td>
    <td align="center" ><? echo $row['NgayDat']?></td>
    <td>
    <? //lay trang thai hoa don
	$sqlstatus="SELECT TrangThai FROM DonDat WHERE MaDD=".$row['MaDD'];
	$kq=mysql_query($sqlstatus) or die(mysql_error());
	$rowstatus=mysql_fetch_array($kq);
	$status=$rowstatus['TrangThai'];
	if($status==0){?>
    <a href="">
	  <label>
	  <input type="button" name="Button" value="Sửa" onClick="window.location='index.php?act=HD&func=edit&MaDD=<?=$row['MaDD']?>'" />
	  </label>
	  <label>
	  <input type="button" name="button" id="button" value="Xóa" onClick="confirm('Bạn muốn xóa không!')==true?window.location='index.php?act=HD&status=0&func=xoa&MaDD=<?=$row['MaDD']?>':window.location='index.php?act=HD&status=0'">
	  </label>
	</a>
    <? }else if($status==1){?>
    <label>
	  <input type="button" name="Button" value="Sửa" onClick="window.location='index.php?act=HD&func=edit&MaDD=<?=$row['MaDD']?>'" />
	  </label>
      <? }else{?>
      <label>
	  <input type="button" name="Button" value="Xem hóa đơn" onClick="window.location='index.php?act=HD&func=edit&MaDD=<?=$row['MaDD']?>'" />
	  </label>
      <? }?>
    </td>
  </tr>
<? }
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
<? }else{?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?
   mysql_select_db($database_cnn, $conn)or die(mysql_error());
   
   $row_per_page = 10;
   $pagenum = $_REQUEST['page'];
   $page = "index.php?act=HD&status=".$trangthai;
   
   $query = mysql_query("SELECT * FROM DonDat WHERE TrangThai=".$trangthai);
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
   
   $query = "SELECT * FROM DonDat LEFT JOIN KhachHang ON KhachHang.MaKhach = DonDat.MaKhach WHERE DonDat.TrangThai =".$trangthai." LIMIT ".$from.",".$row_per_page;
   $display = sprintf("%s",$query);
   $query_viewDonDat = mysql_query($display, $conn)or die(mysql_error());
   $row_num = mysql_num_rows($query_viewDonDat);

?>
<div align="center"><h3>QUẢN LÝ HÓA ĐƠN</h3></div>
<fieldset><legend><font color="#09588f"><? echo "có ".$row_num." hoá đơn" ?></font></legend>
<table width="100%" border="1" align="center" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF">
<tr bgcolor="#25a9f4" class="stylebold">
    <td width="69" align="center" >Mã số</td> 
    <td width="241" align="center" >Tên khách hàng</td>
    <td width="244" align="center" >Ngày Lập </td>
	<td width="111" align="center" >Chọn</td>
  </tr>
<? if($row_num) { ?>
<?  while($row = mysql_fetch_array($query_viewDonDat)){ ?>
  <tr>
    <td width="104" align="center" ><? echo $row['MaDD']?></td> 
    <td width="416" align="center" ><? echo $row['Ho']." ".$row['Ten'] ?></td>
    <td width="165" align="center" ><? echo $row['NgayDat']?></td>
    <td width="91">
    <? if($trangthai==0){?>
   
	  <label>
	  <input type="button" name="Button" value="Sửa" onClick="window.location='index.php?act=HD&func=edit&MaDD=<?=$row['MaDD']?>'" />
	  </label>
	  <label>
	  <input type="button" name="button" id="button" value="Xóa" onClick="confirm('Bạn muốn xóa không!')==true?window.location='index.php?act=HD&func=xoa&MaDD=<?=$row['MaDD']?>':window.location='index.php?act=HD&status=0'">
	  </label>
	
    <? }else if($trangthai==1){?>
    <label>
	  <input type="button" name="Button" value="Sửa" onClick="window.location='index.php?act=HD&func=edit&MaDD=<?=$row['MaDD']?>'" />
	  </label>
      <? }else{?>
      <label>
	  <input type="button" name="Button" value="Xem hóa đơn" onClick="window.location='index.php?act=HD&func=edit&MaDD=<?=$row['MaDD']?>'" />
	  </label>
      <? }?>
    </td>
  </tr>
<? }
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
<? }?>