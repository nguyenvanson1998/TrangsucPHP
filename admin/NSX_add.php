<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Tạo mới nha cung cap</title>
</head>
<script>
function checkform(form)
{
   with(form)
   {

      if(NSXName.value =="")
	  {
	    alert("Bạn chưa nhập tên hãng sản xuất")
		auname.focus()
		return false
	  }
	  
	  if(DiaChi.value=="")
	  {
	    alert("Bạn chưa nhập địa chỉ")
		discript.focus()
		return false
	  }
	   if(SoDT.value=="")
	  {
	    alert("Bạn chưa nhập số điện thoại")
		discript.focus()
		return false
	  }	 
	  return true
   }
}
</script>
<body>
<h3>Tạo thêm Nhà cung cấp</h3>
<form method="post" action="index.php?act=NSX&func=process">
  <table width="275" border="0">
    <tr>
      <td width="116" class="stylebold"> Tên nhà cung cấp:</td>
      <td width="149"><input name="NSXName" type="text" id="NSXName" /></td>
    </tr>
    <tr>
      <td class="stylebold">Địa chỉ:</td>
      <td><input name="DiaChi" type="text" id="DiaChi" /></td>
    </tr>
	<tr>
      <td class="stylebold">Số điên thoại:</td>
      <td><input name="SoDT" type="text" id="SoDT" /></td>
    </tr>
	</table>
  <table width="100" border="1" bgcolor="#25a9f4" class="stylebold">
    <tr>
      <td width="83" class="stylebold"> Đồng ý:</td>
      <td  width="17" align="center"><input name="select" type="checkbox" id="select" value="ok" onclick="this.checked==true?this.form.ok.disabled=false:this.form.ok.disabled=true"/></td>
    </tr>
  </table>
  <p>
    <label>
    <input type="submit" name="ok" value="Thêm mới" disabled="disabled" onclick="return checkform(this.form)"/>
    </label>
    <label>
    <input type="reset" value=" Làm lại" />
    </label>
  </p>
</form>
</body>
</html>
