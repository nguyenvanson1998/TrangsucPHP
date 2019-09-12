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
   $page = "index.php?act=NSX";
   
   $query = mysql_query("SELECT * FROM NSX");
   $row_num = mysql_num_rows($query);
   
   $totalpage = ceil( $row_num / $row_per_page );
   
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
   
   $query = "SELECT * FROM NSX LIMIT ".$from.",".$row_per_page;
   $display = sprintf("%s",$query);
   $query_NSX = mysql_query($display, $conn)or die(mysql_error());
   $row = mysql_fetch_array($query_NSX);
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản Lý Nhà Cung Cấp</title>
<script>
	function checkdel(){
	a="Bạn muốn tiếp tục?";
	if(confirm(a)) return true;
	else return false;
	}	
</script>
</head>

<body>

<h3>Quản Lý Nhà Cung Cấp</h3>
<div align="left" class="stylered"><? echo "Có: ".$row_num." Nhà cung cấp" ?>
</div>
<div align="left" class="stylebold"><span><a href="index.php?act=NSX&func=add"> Thêm mới</a></span></div>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr align="center" bgcolor="#25a9f4" class="stylebold">
    <td width="50" > Mã </td>
    <td width="238" >Tên nhà cung cấp</td>
    <td width="282" >Địa chỉ</td>
    <td width="180">Số điên thoại</td>
    <td width="62"> Sửa </td>
    <td width="53"> Xoá </td>
	<td  colspan="2">Chức năng</td>
  </tr>
 <? if($row) { ?>
 <? do { ?>
<form action="index.php?act=NSX&func=process" method="post" name="form1">
  <tr>
    <td>
      <input readonly="true" name="NSXId" type="text" id="NSXId" size="5" value="<? echo $row['NSXId']?>"/>
    </td>
    <td>
      <input name="NSXName" type="text" id="NSXName" size="30" value="<? echo $row['NSXName']?>"/>
    </td>
    <td>
      <textarea name="DiaChi" cols="30" id="DiaChi"><? echo $row['DiaChi']?></textarea>
    </td>
	<td>
      <input name="SoDT" type="text" id="SoDT" size="20" value="<? echo $row['SoDT']?>"/>
    </td>
    <td align="center">
    <input type="radio" name="select" id="radio" value="edit" onclick="this.checked==true?this.form.ok.disabled=false:this.form.ok.disabled=true" />
    </td>
    <td align="center">
    <input type="radio" name="select" id="radio2" value="delete" onclick="this.checked==true?this.form.ok.disabled=false:this.form.ok.disabled=true" />
    </td>
    <td width="73">
    <input name="ok" type="submit" id="ok" value="Thực hiện"  disabled="true" onclick="return checkdel();"/>
    </td>
    <td width="65">
      <input type="reset" value="Hủy" onclick="this.form.ok.disabled=true"/>
    </td>
  </tr>
</form>
<? } while($row=mysql_fetch_array($query_NSX));
}
else
{
?>
<tr><td colspan="9"> Chưa có nhà cung cấp</td></tr>
<?
}
?>
</table>
<div align="center">Trang 
  <? 
   for($i=1;$i<=$totalpage;$i++)
   {
     if($i==1)
	 echo "<a href='".$page."&page=".$i."'>".$i."</a> ";
	 else
	 echo " | <a href='".$page."&page=".$i."'>".$i."</a> "; 
   }
?>
</div>
<h3>&nbsp;</h3>
</body>
</html>
