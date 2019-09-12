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
	 
	 $row_per_page = 4;
	 $pagenum = $_REQUEST['page'];
	 $page = "index.php?act=YKPH";
	 
	 $query = mysql_query("SELECT * FROM YKPH");
	 $row_num = mysql_num_rows($query);
	 
	 $totalpage = ceil($row_num / $row_per_page);
	 
	 if(!$pagenum || $pagenum<=0 || $pagenum>$totalpage)
	 {
	   $pagenum = 1;
	 }
	 if($pagenum ==1)
	 {
	  $from =0;
	 }
	 else
	 {
	  $from = ($pagenum-1)*$row_per_page;
	 }
	
	 $query = "SELECT * FROM YKPH LIMIT ".$from.",".$row_per_page;
	 $display = sprintf("%s",$query);
	 $query_feedback = mysql_query($display, $conn)or die(mysql_error());
	 $row = mysql_fetch_array($query_feedback);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản lý Phản Hồi</title>
<script>
	function checkdel(){
	a="Bạn muốn tiếp tục?";
	if(confirm(a)) return true;
	else return false;
	}	
</script>

</head>

<body>
<h3>Quản lý Phản Hồi</h3>
<div align="left" class="stylered"><? echo "Có: ".$row_num." phản hồi".'<br>'?>
</div>
 <table border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr align="center" bgcolor="#25a9f4" class="stylebold">
    <td height="28"> Mã </td>
    <td > Khách hàng</td>
    <td > Tựa đề phản hồi</td>
    <td > Nội dung phản hồi</td>
    <td > Admin trả lời</td>
    <td > Ngày gửi</td>
    <td > Trạng thái</td>
    <td > Trả lời</td>
    <td > Xoá</td>
	<td colspan="2" >Chức năng</td>
   </tr>
<? if($row) { ?>
<? do { ?>
<form action="index.php?act=YKPH&func=process" method="post" name="form1">
    <tr>
      <td height="85" valign="top">
        <input readonly="1" name="MaYKPH" type="text" id="MaYKPH" size="3" value="<? echo $row['MaYKPH']?>"/>
      </td>
      <td valign="top"><?
	   $sql="SELECT Ho, Ten FROM KhachHang WHERE MaKhach=".$row['MaKhach'];
	   $kq=mysql_query($sql) or die(mysql_error());
	   $rowname=mysql_fetch_array($kq);
	   echo $rowname['Ho']." ".$rowname['Ten'];
	   ?>
      </td>
      <td valign="top">
        <input name="YKPHTieuDe" type="text" id="YKPHTieuDe" value="<? echo $row['YKPHTieuDe']?>" size="15" readonly="1"/>
      </td>
      <td>
        <textarea name="YKPHNoiDung" cols="21" rows="5" id="YKPHNoiDung" readonly="readonly"><? echo $row['YKPHNoiDung']?></textarea>
      </td>
      <td valign="top">
        <textarea name="TraLoi" cols="20" rows="5" id="TraLoi"><? echo $row['TraLoi']?></textarea>
      </td>
      <td valign="top">
        <input name="YKPHDate" type="text"  readonly="1" id="YKPHDate" value="<? echo $row['YKPHDate']?>" size="10"/>
      </td>
      <td valign="top">
    <select name="TrangThai">
    <option value="<?=$row['TrangThai']?>"><? if($row['TrangThai']==0) echo "Chưa trả lời"; else echo "Trả lời";?></option>
    <? if($row['TrangThai']==0){?>
    <option value="1">Trả lời</option>
    <? }else{?>
    <option value="0">Chưa trả lời</option>
    <? }?>
    </select>
      </td>
      <td align="center" valign="middle">
        <input type="radio" name="select" id="select" value="edit" onclick="this.checked==true?this.form.ok.disabled=false:this.form.ok.disabled=true" />
      </td>
      <td align="center" valign="middle">
        <input type="radio" name="select" id="radio2" value="delete" onclick="this.checked==true?this.form.ok.disabled=false:this.form.ok.disabled=true" />
      </td>
      <td align="center" valign="middle">
        <input name="ok" type="submit" id="ok" value="Thực hiện"  disabled="disabled" onclick="return checkdel()"/>
      </td>
      <td align="center" valign="middle">
        <input type="reset" name="Submit2" value="Hủy" onclick="this.form.ok.disabled=true"/>
      </td>
    </tr>
</form>
<? } while($row=mysql_fetch_array($query_feedback));
 }
 else
 {
?>
<tr><td colspan="11"m align="center">chưa có ý kiến phản hồi</td></tr>
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
