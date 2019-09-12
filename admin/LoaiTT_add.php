<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Tạo mới loại tin</title>
</head>
<script>
function checkform(form)
{
  with(form)
  {
    if(TenLTT.value=="")
	{
	  alert("Bạn chưa nhập tên loại tin");
	  TenLTT.focus()
	  return false
	}
	
	 if(MoTa.value=="")
	{
	  alert("Bạn chưa nhập tên loại tin");
	  MoTa.focus()
	  return false
	}
	
	return true
  }
}
</script>
<body>
<h3>Tạo mới loại tin</h3>
<form id="form1" name="form1" method="post" action="index.php?act=LoaiTT&func=process">
  <table width="300" border="0" >
 
    <tr>
      <td width="144" class="stylebold"> Tên loại tin:</td>
      <td width="146">
        <input name="TenLTT" type="text" id="TenLTT"/>
      </td>
    </tr>
    <tr>
      <td class="stylebold"> Mô tả:</td>
      <td>
        <input name="MoTa" type="text" id="MoTa"/>
      </td>
    </tr>
    <tr>
      <td class="stylebold"> Trạng thái:</td>
      <td>
        <select name="TrangThai">
		<option value="1"> Hiển thị</option>
		<option value="0"> Không hiển thị</option>
		</select>
      </td>
    </tr>
  </table>
  <table width="301" border="1" bgcolor="#25a9f4">
    <tr>
      <td width="139"class="stylebold"> Đồng ý:</td>
      <td width="146" align="left">
        <input name="select" type="checkbox" id="select" value="ok" onclick="this.checked==true?this.form.ok.disabled=false:this.form.ok.disabled=true"/>
      </td>
    </tr>
  </table>
  <p>
    
    <input name="ok" type="submit" id="ok" value="Thêm mới"  disabled="disabled"  onclick="return checkform(this.form)"/>
    
    
    <input type="reset" name="Submit2" value="Làm lại" onclick="this.form.ok.disabled=true"/>
    
  </p>
</form>
</body>
</html>
