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
   $page = "index.php?act=LoaiTT";
   
   $query = mysql_query("SELECT * FROM LoaiTT");
   
   $row_num = mysql_num_rows($query);
   
   $totalpage = ceil($row_num / $row_per_page);   
   if(!$pagenum || $pagenum<=0 || $pagenum>$totalpage)
   {
     $pagenum = 1;
   }
   if($pagenum == 1)
   {
     $from = 0;
   }
    if($pagenum > 1)
   {
     $from = ($pagenum-1)*$row_per_page;
	 
   }
   $query = "SELECT * FROM LoaiTT LIMIT ".$from.",".$row_per_page;
   $display = sprintf("%s",$query);
   $query_newscategory = mysql_query($display, $conn)or die(mysql_error());
   $row = mysql_fetch_array($query_newscategory);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản lý loại tin tức</title>
<script>
	function checkdel(){
	a="Bạn muốn tiếp tục?";
	if(confirm(a)) return true;
	else return false;
	}	
</script>

</head>

<body>
<h3>Quản lý loại tin tức</h3>
<div align="left" class="stylered"><? echo "Có: ".$row_num." loại tin tức"?>
</div>
<a href="index.php?act=LoaiTT&func=add"><b> Thêm mới<b></a>
<table width="100%" border="1"  cellpadding="0" cellspacing="0">
  <tr align="center" bgcolor="#25a9f4" class="stylebold">
    <td width="60" height="27" >Mã</td>
    <td width="283" >Tên loại tin</td>
    <td width="254" >Mô tả</td>
    <td width="164" >Trạng thái</td>
    <td width="40" >Sửa</td>
    <td width="39" > Xoá</td>
	<td colspan="2" > Xoá</td>
  </tr>
<? if($row) { ?>
<? do { ?>
<form action="index.php?act=LoaiTT&func=process" method="post" name="form1">
  <tr align="center">
    <td >
      <input readonly="1" name="MaLTT" type="text" id="MaLTT" size="3" value="<? echo $row['MaLTT']?>"/>
    </td>
    <td >
      <input name="TenLTT" type="text" id="TenLTT" value="<? echo $row['TenLTT']?>"/>
    </td>
    <td >
      <textarea name="MoTa" cols="30"id="MoTa"><? echo $row['MoTa']?></textarea>
    </td>
    <td >
      <select name="TrangThai">
    <option value="<?=$row['TrangThai']?>"><? if($row['TrangThai']==0) echo "Không hoạt động"; else echo "Hoạt động"?></option>
    <? if($row['TrangThai']==0){?>
    <option value="1">Hoạt động</option>
    <? }else{?>
    <option value="0">Không hoạt động</option>
    <? }?>
    </select>
    </td>
    <td  valign="middle">
      <input type="radio" name="select" id="radio" value="edit" onClick="this.checked==true?this.form.ok.disabled=false:this.form.ok.disabled=true" />
      </td>
    <td  valign="middle">
    <input type="radio" name="select" id="radio2" value="delete" onClick="this.checked==true?this.form.ok.disabled=false:this.form.ok.disabled=true" />
    </td>
	<td width="79" >
	  <input name="ok" type="submit" id="ok" value="Thực hiện"  disabled="disabled" onClick="return checkdel()"/>
	</td>
    <td width="86" >
      <input type="submit" name="Submit2" value="Hủy" onClick="this.form.ok.disabled=true"/>
    </td>
  </tr>
</form>
<? } while($row = mysql_fetch_array($query_newscategory));
}
else
   { 
?>
      <tr>
	  <td colspan="8">Chưa có loại tin</td>
	  </tr>
<?
   }
?>
</table>
<br />
<div >
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
