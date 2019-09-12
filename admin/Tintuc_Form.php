<?
session_start();
$_SESSION["flag"];
$_SESSION["admin"];
if($_SESSION["flag"]!="true")
header("location: login.php");
include("../inc/conn.php");
?>
<?
	   mysql_select_db($database_cnn, $conn);
	   
	   $row_per_page = 10;
	   $pagenum = $_REQUEST['page'];
	   $page = "index.php?act=TT";
	   
	   $query = mysql_query("SELECT * FROM TinTuc");                                    
	   $row_num = mysql_num_rows($query);
	   
	   $totalpage = ceil( $row_num / $row_per_page );
	   
	   if(!$pagenum || $pagenum<=0 || $pagenum > $totalpage)
	   {
	     $pagenum = 1;
	   }
	   if($pagenum==1)
	   {
	     $from=0;
	   }
	   else
	   {
	     $from = ($pagenum-1)*$row_per_page;
	   }
	   
	   $query = "SELECT * FROM TinTuc ORDER BY MaTT DESC LIMIT ".$from.",".$row_per_page;
	   $display = sprintf("%s",$query);
	   $query_news = mysql_query($display, $conn)or die(mysql_error());
	   $row = mysql_fetch_array($query_news);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản lý Tin tức</title>
</head>

<body>
<h3 align="center">Quản lý Tin tức</h3>
<div align="left" class="stylered"><? echo " Có: ".$row_num." tin"?>
</div>
<div align="left" class="stylebold" ><span><a href="index.php?act=TT&func=add" > Thêm mới</a></span></div>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
<tr align="center" valign="middle"  class="stylebold" bgcolor="#25a9f4">
      <td width="78" > Mã tin tức</td>
      <td width="109" > Loại tin</td>
      <td width="232" > Tên tin tức</td>
      <td width="164" >Ngày đăng tin</td>
      <td colspan="2" >Chọn</td>
  </tr>
<? if($row){?>
<? do { ?>
<form action="index.php?act=TT&func=process" method="post" name="form<?=$row['MaTT']?>">
    <tr >
      <td valign="top">
        <? echo $row['MaTT']?>
      </td>
      <td valign="top">
        <? 
		$sqlloaitin="SELECT TenLTT FROM LoaiTT WHERE MaLTT=".$row['MaLTT'];
		$kq=mysql_query($sqlloaitin) or die(mysql_error());
		$rowloaitin=mysql_fetch_array($kq);
		echo $rowloaitin['TenLTT'];
		?>
      </td>
      <td valign="top">
       <? echo $row['TieuDe']?>
      </td>
	  <td valign="top">
        <? echo $row['NgayViet']?></td>
      <td width="55" align="center" valign="top">
        <input name="ok" type="button" id="ok" value="Sửa" onclick="window.location = 'index.php?act=TT&func=edit&MaTT=<? echo $row['MaTT']?> ' "/>
      
      <td width="54" align="center" valign="top">
        <input type="button" name="Submit2" value="Xoá" onClick="confirm('Bạn muốn xóa không!')==true?window.location = 'index.php?act=TT&func=xoa&MaTT=<? echo $row['MaTT']?>':window.location='index.php?act=TT'"/>
      </td>
    </tr>
</form>
<? } while($row=mysql_fetch_array($query_news));
 }
 else
 {
 ?>
   <tr>
   <td colspan="10">Chưa có tin</td>
   </tr>
<?  
 }
?>
</table>
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
