<? session_start() ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<? require_once('../inc/conn.php')?>
<?   
    $MaTT = $_REQUEST['MaTT']; 

    mysql_select_db($database_cnn , $conn);

	$query = "SELECT * FROM TinTuc WHERE MaTT = ".$MaTT;
	$display = mysql_query($query, $conn)or die(mysql_error());
	$row = mysql_fetch_array($display);

	$query1 = "SELECT MaLTT,TenLTT FROM LoaiTT ";
	$display1 = mysql_query($query1, $conn)or die(mysql_error());
	$row1 = mysql_fetch_array($display1);
	
?>

<script>
function checkform(form)
{
  with(form)
  {
    if(TieuDe.value=="")
	{
	 alert("Bạn chưa nhập tên tin tức")
	 TieuDe.focus()
	 return false
	}
	
	if(TrichDan.value=="")
	{
	 alert("Bạn chưa nhập trích dẫn tin tức")
	 TrichDan.focus()
	 return false
	}
	if(NoiDung.value=="")
	{
	 alert("Bạn chưa nhập nội dung tin tức")
	 TrichDan.focus()
	 return false
	}
	return true
  }
}
</script>
<body>
<h3 >Sửa Tin tức</h3>
<form action="index.php?act=TT&amp;func=process&amp;fame=edit&MaTT=<?=$MaTT?>" enctype="multipart/form-data" name="form1" method="post">
  <table >
  <tr>
    <td>Loại tin </td>
    <td><select name="MaLTT"><? do { ?><option value="<? echo $row1['MaLTT']?>"><? echo $row1['TenLTT']?></option><? } while($row1 = mysql_fetch_array($display1))?></select></td>
  </tr>
  <tr>
    <td>Tên tin </td>
    <td>
      <input name="TieuDe" type="text" id="TieuDe" value="<? echo $row['TieuDe']?>" size="50"/></td>
  </tr>
  <tr>
    <td>Ảnh tin </td>
    <td>
      <input name="anh" type="file" id="anh" />
    </td>
  </tr>
  <tr>
    <td>Trích dẫn</td>
    <td>
      <textarea name="TrichDan" cols="80" rows="5" id="TrichDan"><? echo $row['TrichDan']?></textarea></td>
  </tr>
   <tr>
    <td>Nội dung </td>
    <td>
	 <script src="inputtext/js/richtext.js" type="text/javascript" language="javascript"></script>
<!-- Include the Free Rich Text Editor Variables Page -->
		<script src="inputtext/js/config.js" type="text/javascript" language="javascript"></script>
		 <script>
		rteFormName = "NoiDung";
		MyText('<? echo $row['NoiDung']?>','example.css');</script>  
    </td>
  </tr>
  <tr>
    <td>Ngày đăng tin </td>
    <td>
       <? echo $row['NgayViet']?>
    </td>
  </tr>
  <tr>
    <td>Trạng thái</td>
    <td>
	<select name="TrangThai">
    <option value="<?=$row['TrangThai']?>"><? if($row['TrangThai']==0) echo "Không đăng"; else echo "Đăng tin"?></option>
    <? if($row['TrangThai']==0){?>
    <option value="1">Đăng tin</option>
    <? }else{?>
    <option value="0">Không đăng tin</option>
    <? }?>
    </select></td>
  </tr>
</table>

    <div align="center">
      <input type="submit" name="Submit" value="Lưu sửa" onclick="return checkform(this.form)"/>
    </div>
</form>
</body>
</html>
<? mysql_close($conn);?>