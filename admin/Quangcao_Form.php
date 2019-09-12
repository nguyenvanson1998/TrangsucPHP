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
   $page = "index.php?act=QC";
   
   $query = mysql_query("SELECT * FROM QC");
   $row_num = mysql_num_rows($query);
   
   $totalpage = ceil( $row_num / $row_per_page );
   
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
   
   $query = "SELECT * FROM QC LIMIT ".$from.",".$row_per_page;
   $display = sprintf("%s",$query);
   $query_ads = mysql_query($display, $conn)or die(mysql_error());
   $row = mysql_fetch_array($query_ads);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản lý quảng cáo</title>
<script>
	function checkdel(){
	a="Bạn muốn tiếp tục?";
	if(confirm(a)) return true;
	else return false;
	}	
</script>

</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<h3 align="center"> Quản lý quảng cáo</h3>
<div align="left" class="stylered"><? echo "có: ".$row_num." quảng cáo".'<br>'?>
</div>
<div align="left" class="stylebold"><a href="index.php?act=QC&func=add" > Thêm mới</a></div>
<table border="1" align="center" cellpadding="0" cellspacing="0" >
  <tr class="stylebold" bgcolor="#25a9f4" align="center">
    <td height="23" ><Mã</td>
    <td >Tên quảng cáo</td>
    <td >Ảnh</td>
    <td >Đường dẫn</td>
    <td >Trạng thái</td>
    <td >Sửa</td>
    <td >Xoá</td> 
	<td  colspan="2">Chức năng</td>   
  </tr>
<? if($row) { ?>
<? do { ?>
<form action="index.php?act=QC&func=process" method="post" name="form1">
  <tr>
    <td>
      <input readonly="1" name="QCId" type="text" id="QCId" value="<? echo $row['QCId']?>" size="3"/>
    </td>
    <td>
      <input name="TenCT" type="text" id="TenCT" value="<? echo $row['TenCT']?>"/>
    </td>
    <td>
      <input name="anh" type="text" id="anh" value="<? echo $row['Anh']?>"/>
    </td>
    <td>
      <input name="link" type="text" id="link" value="<? echo $row['Link']?>" size="30"/>
    </td>
    <td>
	<select name="TrangThai">
    <option value="<?=$row['TrangThai']?>"><? if($row['TrangThai']==0) echo "Không hoạt động"; else echo "Hoạt động"?></option>
    <? if($row['TrangThai']==0){?>
    <option value="1">Hoạt động</option>
    <? }else{?>
    <option value="0">Không hoạt động</option>
    <? }?>
    </select></td>
    <td align="center">
    <input type="radio" name="select" id="select" value="edit" onclick="this.checked==true?this.form.ok.disabled=false:this.form.ok.disabled=true" />
    </td>
    <td align="center">
      <input type="radio" name="select" id="select" value="delete" onclick="this.checked==true?this.form.ok.disabled=false:this.form.ok.disabled=true" />
      </td>
    <td valign="top">
      <input name="ok" type="submit" id="ok" value="Thực hiện"  disabled="disabled" onclick="return checkdel()"/>
    </td>
    <td valign="top">
      <input type="reset" name="Submit2" value="Hủy" onclick="this.form.ok.disabled=true"/>
    </td>
  </tr>
</form>
<? } while($row=mysql_fetch_array($query_ads));
}
else
{
?>
<tr><td colspan="9"> Chưa có quảng cáo</td></tr>
<?
}
?>
</table>
<br />
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
</body>
</html>
