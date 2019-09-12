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
   $page = "index.php?act=LoaiSP";

   $query = mysql_query("SELECT * FROM LoaiSp");
   
   $row_num = mysql_num_rows($query);
   
   $totalpage = ceil( $row_num / $row_per_page);
   if(!$pagenum || $pagenum<=0 || $pagenum > $totalpage)
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
   
   $query = "SELECT * FROM LoaiSP LIMIT ".$from.",".$row_per_page;
   $display = sprintf("%s",$query);
   $query_category = mysql_query($display, $conn)or die(mysql_error());
   $row = mysql_fetch_array($query_category); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản Lý Loại Trang Sức</title>
<script>
	function checkdel(){
	a="Bạn muốn tiếp tục?";
	if(confirm(a)) return true;
	else return false;
	} 
</script>
</head>

<body>
<h3>Quản Lý Loại Trang Sức</h3>
<div align="left" class="stylered">
<? echo "Có: ".$row_num." loại trang sức" ?>
</div>
<div align="left"><span><a href="index.php?act=LoaiSP&func=add" >Thêm mới</a></span></div>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr align="center" class="stylebold" bgcolor="#25a9f4">
    <td width="70" >Mã</td>
    <td width="251" >Tên loại </td>
    <td width="263" >Mô tả</td>
    <td width="90" >Sô sản phẩm </td>
    <td width="122" >Trạng thái</td>
    <td width="49" >Sửa</td>
    <td width="44" >Xoá</td>
	<td colspan="2" >Chức năng</td>
  </tr>
<? if($row) { ?>
<? do { ?>
  <form action="index.php?act=LoaiSP&func=process" method="post" name="form1">  
  <tr bgcolor="#FFFFFF">
    <td align="center" nowrap="nowrap">
	<input readonly="1" name="MaLoaiSP" type="text" id="MaLoaiSP" value="<? echo $row['MaLoaiSP']?>" size="10"/>
	</td>
    <? 
	$sqlb="SELECT COUNT(MaSP) AS SL FROM CTLSP WHERE MaLoaiSP=".$row['MaLoaiSP']." GROUP BY MaLoaiSP";
	$resultb=mysql_query($sqlb,$conn);
	$rowb=mysql_fetch_array($resultb);
	?>
    <td align="center" nowrap="nowrap">
      <input name="TenLoaiSP" type="text" id="TenLoaiSP" value="<? echo $row['TenLoaiSP']?>" size="30"/>
    </td>
    <td align="center" nowrap="nowrap">
      <input name="MoTa" type="text" id="MoTa" value="<? echo $row['MoTa']?>" size="30"/>
    </td>
    <td align="center" nowrap="nowrap"><? if($rowb['SL']) echo $rowb['SL'];
												else echo "0";?></td>
    <td align="center" nowrap="nowrap">
    <select name="TrangThai" id="TrangThai">
    <option value="<?=$row['TrangThai'] ?>"><? if($row['TrangThai']==0) echo "Không hiển thị";
												else echo "Hiển thị";
	 ?></option>
     <? if($row['TrangThai']==0){
	 ?>
     <option value="1">Hiển thị</option>
     <? }else{?>
     <option value="0">Không hiển thị</option>
     <? }?>
    </select>
    </td>
    <td align="center" nowrap="nowrap">
    <input type="radio" name="select" id="radio" value="edit" onclick="this.checked==true?this.form.ok.disabled=false:this.form.ok.disabled=true"/>
    </td>
    <td align="center" nowrap="nowrap">
      <input type="radio" name="select" id="radio2" value="delete" onclick="this.checked==true?this.form.ok.disabled=false:this.form.ok.disabled=true;" />
      </td>
    <td  align="center" nowrap="nowrap">
      <input name="ok" type="submit" id="ok" value="Thực hiện" disabled="disabled" onclick="return checkdel()" />
    </td>
    <td width="74" align="center" nowrap="nowrap">
      <input type="reset" name="Submit2" value="Bỏ Qua" onclick="this.form.ok.disabled=true"/>
    </td>
    </tr>
  </form>
<? } while($row=mysql_fetch_array($query_category));
}
else
{
?>
<tr><td colspan="9" align="center">Chưa  có loại trang sức</td></tr>
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
