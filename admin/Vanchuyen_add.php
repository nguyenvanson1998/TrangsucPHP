<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Tạo mới vận chuyển</title>
</head>
<script>
function checkform(form)
{
  with(form)
  {
    if(TenVC.value=="")
	{
	  alert("Bạn chưa nhập tên vận chuyển")
	  TenVC.focus()
	  return false
	}
	
	 if(Mota.value=="")
	{
	  alert("Bạn chưa nhập thông tin vận chuyển")
	  Mota.focus()
	  return false
	}
	
	return true
  }
   
}
</script>
<body>
<h3> Tạo mới phương thức vận chuyển</h3>
<form id="form1" name="form1" method="post" action="index.php?act=PTVC&func=process">
  <table>

    <tr>
      <td width="128"  class="stylebold"> Tên vận chuyển:</td>
      <td width="144">
        <input name="TenVC" type="text" id="TenVC" />
      </td>
    </tr>
    <tr>
      <td class="stylebold"> Thông tin vận chuyển:</td>
      <td>
        <input name="MoTa" type="text" id="MoTa" />
      </td>
    </tr>
    <tr>
      <td class="stylebold"> Trạng thái:</td>
      <td>
        <select name="TrangThai">
        <option value="0">Không hoạt động</option>
        <option value="1">Hoạt động</option>
        </select>
      </td>
    </tr>
  </table>
  <table width="286" border="1" bgcolor="#25a9f4">
    <tr>
      <td width="124" class="stylebold"> Đồng ý:</td>
      <td width="146" align="left">
        <input name="select" type="checkbox" id="select" value="ok" onclick="this.checked==true?this.form.ok.disabled=false:this.form.ok.disabled=true"/>
      </td>
    </tr>
  </table>
  <p>
    
    <input name="ok" type="submit" id="ok" value="Thêm mới"  disabled="disabled" onclick="return checkform(this.form)"/>
    
    
    <input type="reset" name="Submit2" value=" Làm lại" onclick="this.form.ok.disabled=true"/>
    
  </p>
</form>
</body>
</html>
