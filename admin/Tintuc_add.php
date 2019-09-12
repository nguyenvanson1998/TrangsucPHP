<? session_start() ?>
<? require_once('../inc/conn.php')?>
<?
   mysql_select_db($database_cnn, $conn);
   $query = "SELECT MaLTT,TenLTT FROM LoaiTT";
   $display = mysql_query($query, $conn)or die(mysql_error());
   $row = mysql_fetch_array($display);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Tạo mới tin tức</title>
</head>
<script>
function checkform(form)
{
  with(form)
  {
    if(newstitle.value=="")
	{
	 alert("Bạn chưa nhập tên tin tức")
	 newstitle.focus()
	 return false
	}
	
	if(TrichDan.value=="")
	{
	 alert("Bạn chưa nhập nội dung tin tức")
	 TrichDan.focus()
	 return false
	}
	
	if(anh.value=="")
	{
	 alert("Bạn chưa chọn ảnh tin")
	 anh.focus()
	 return false
	}
	return true
  }
}
</script>
<body>
<h3>Thêm mới</h3>
<form action="index.php?act=TT&func=process" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="857" border="0">
    <tr>
      <td width="82" class="stylebold"> Loại tin:</td>
      <td width="765"><select name="MaLTT"><? do {?><option value="<? echo $row['MaLTT']?>"><? echo $row['TenLTT']?></option><? } while($row = mysql_fetch_array($display))?></select>      </td>
    </tr>
    <tr>
      <td class="stylebold"> Tên tin tức:</td>
      <td>
        <input name="TieuDe" type="text" id="Tieude" size="50"  />
      </td>
    </tr>
	<tr>
      <td class="stylebold"> Ảnh tin:</td>
      <td>
      <input type="file" name="anh" id="anh" />
      </td>
    </tr>
    <tr>
      <td valign="top" class="stylebold">Trích dẫn:</td>
      <td>
        <textarea name="TrichDan" cols="80" rows="5" id="TrichDan"></textarea>
      </td>
    </tr>
	<tr>
      <td align="left" colspan="2"class="stylebold">Nội dung giới thiệu:</td>
      <script src="inputtext/js/richtext.js" type="text/javascript" language="javascript"></script>
<!-- Include the Free Rich Text Editor Variables Page -->
		<script src="inputtext/js/config.js" type="text/javascript" language="javascript"></script>
	  </tr>
	  <tr>
	  <td colspan="2">
        <script>
		rteFormName = "NoiDung";
		MyText('','example.css');</script>
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
  <table width="100" border="1" bgcolor="#25a9f4">
    <tr>
      <td width="83"class="stylebold"> Đồng ý</td>
      <td width="17" align="center">
        <input name="select" type="checkbox" id="select" value="ok"  onclick="this.checked==true?this.form.ok.disabled=false:this.form.ok.disabled=true"/>
      </td>
    </tr>
  </table>
  <p> 
    <input name="ok" type="submit" id="ok" value="Thêm mới"  disabled="disabled" onclick="return checkform(this.form)"/>
    <input type="reset" name="Submit2" value="Làm lại" onclick="this.form.ok.disabled=true"/>
  </p>
</form>
</body>
</html>
