<?
session_start();
$_SESSION["flag"];
$_SESSION["admin"];
if($_SESSION["flag"]!="true")
header("location: login.php");
include("../inc/conn.php");
?>
<?
   mysql_select_db($database_cnn,$conn);
   
   $row_per_page = 10;
   $pagenum = $_REQUEST['page'];
   $page = "index.php?act=PTTT";
   
   $query = mysql_query("SELECT * FROM PTTT");
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
   
   $query = "SELECT * FROM PTTT LIMIT ".$from.",".$row_per_page;
   $display = sprintf("%s",$query);
   $query_payment = mysql_query($display, $conn)or die(mysql_error());
   $row = mysql_fetch_array($query_payment);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Phương Thức Thanh Toán</title>
<script>
	function checkdel(){
	a="Bạn muốn tiếp tục?";
	if(confirm(a)) return true;
	else return false;
	}	
</script>

</head>
<body>
<h3>Phương Thức Thanh Toán</h3>
<div align="left" class="stylered"><? echo "Có: ".$row_num." phương thức thanh toán".'<br>' ?></div>
<div align="left" class="stylebold"><a href="index.php?act=PTTT&func=add"> Thêm mới</a></div>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr bgcolor="#25a9f4" class="stylebold" align="center">
    <td width="40" height="26" >Mã </td>
    <td width="483" >Tên phương thức thanh toán</td>
    <td width="210" > Trang thái</td>
    <td width="59" >Sửa</td>
    <td width="59" > Xoá</td>  
	<td colspan="2" > Chức năng</td> 
  </tr>
<? if($row) {?>
<? do {?> 
<form name="form1" method="post" action="index.php?act=PTTT&func=process">
  <tr align="center">
    <td>
      <input readonly="1" name="MaPTTT" type="text" id="MaPTTT" value="<? echo $row['MaPTTT']?>" size="3"/>
    </td>
    <td>
      <input name="TenPTTT" type="text" id="TenPTTT" value="<? echo $row['TenPTTT']?>" size="50" />
    </td>
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
    <td width="80"  align="center">
      <input type="submit" name="ok" value="Thực hiện"  disabled="disabled" onClick="return checkdel()"/>
    </td>
    <td width="78" align="center">
      <input type="submit" name="Submit" value="Hủy" "this.form.ok.disabled=true"/>
    </td>
  </tr>
</form>
<? } while($row=mysql_fetch_array($query_payment));
}
else
{
?>
<tr><td colspan="7">Chưa có phương thức thanh toán</td></tr>
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
