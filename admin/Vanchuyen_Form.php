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
   
   $row_per_page =10;
   $pagenum = $_REQUEST['page'];
   $page = "index.php?act=PTVC";
   
   $query = mysql_query("SELECT * FROM PTVC");
   $num_row = mysql_num_rows($query);
   
   $totalpage = ceil($num_row / $row_per_page);
   
   if(!$pagenum || $pagenum<=0 || $pagenum>$totalpage)
   {
     $pagenum =1;
   }
   if($pagenum==1)
   {
    $from = 0;
   }
   else
   {
     $from = ($pagenum-1)*$row_per_page;
   }
   
   $query = "SELECT * FROM PTVC LIMIT ".$from.",".$row_per_page;
   $display = sprintf("%s",$query);
   $query_shipping = mysql_query($display, $conn)or die(mysql_error());
   $row = mysql_fetch_array($query_shipping);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản lý vận chuyển</title>
<script>
	function checkdel(){
	a="Bạn muốn tiếp tục?";
	if(confirm(a)) return true;
	else return false;
	}	
</script>

</head>

<body>
<h3>Phương Thức Vận Chuyển</h3>
<div align="left" class="stylered"><? echo "Có: ".$num_row." phương thức vận chuyển".'<br>'?>
</div>
<div align="left" class="stylebold" ><a href="index.php?act=PTVC&amp;func=add"> Thêm mới</a></div>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr bgcolor="#25a9f4" class="stylebold" align="center">
    <td width="20" height="28" >Mã</td>
    <td width="271" > Tên vận chuyển</td>
    <td width="273" > Thông tin vận chuyển</td>
    <td width="137" > Trạng thái</td>
    <td width="33" > Sửa</td>
    <td width="35" > Xoá</td>
	<td colspan="2"> Chức năng</td>
  </tr>
<? if($row) { ?>
<? do {?>
<form name="form1" action="index.php?act=PTVC&func=process" method="post">
  <tr>
    <td align="center">
      <input readonly="1" name="MaVC" type="text" id="MaVC" size="3" value="<? echo $row['MaVC']?>"/>
    </td>
    <td align="center">
      <input name="TenVC" type="text" id="TenVC" value="<? echo $row['TenVC']?>" size="40" />
    </td>
    <td align="center"><textarea name="MoTa" cols="40" rows="3" id="MoTa"><? echo $row['MoTa']?></textarea></td>
    <td align="center">
    <select name="TrangThai">
    <option value="<?=$row['TrangThai']?>"><? if($row['TrangThai']==0) echo "Không hoạt động"; else echo "Hoạt động"?></option>
    <? if($row['TrangThai']==0){?>
    <option value="1">Hoạt động</option>
    <? }else{?>
    <option value="0">Không hoạt động</option>
    <? }?>
    </select>
    </td>
    <td align="center">
      <input type="radio" name="select" id="radio" value="edit" onClick="this.checked==true?this.form.ok.disabled=false:this.form.ok.disabled=true" />
      </td>
    <td align="center">
    <input type="radio" name="select" id="radio2" value="delete" onClick="this.checked==true?this.form.ok.disabled=false:this.form.ok.disabled=true" />
    </td>
    <td width="79" align="center">
      <input type="submit" name="ok" value="Thực hiện" disabled="disabled" onClick="return checkdel()"/>
    </td>
    <td width="35" align="center">
      <input type="reset" name="Submit2" value="Hủy" onClick= "this.form.ok.disabled=true"/>
    </td>
  </tr>
</form>
<? } while($row = mysql_fetch_array($query_shipping));
}
else
{
?>
<tr><td colspan="10">Chưa có vận chuyển</td></tr>
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
