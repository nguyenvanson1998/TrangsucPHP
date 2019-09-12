<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Tạo mới quảng cáo</title>
</head>
<script>
function checkform(form)
{
   with(form)
   {
      if(TenCT.value=="")
	  {
	  alert("Bạn chưa nhập tên công ty quảng cáo")
	  adsname.focus()
      return false
	  }	
	  
	  if(anh.value =="")
	  {
	  alert("Bạn chưa chọn anh cho quảng cáo")
	  image.focus()
      return false
	  }	 
	  return true  
   } 
}
</script>
<body>
<h3>Thêm mới</h3>
<form action="index.php?act=QC&func=process" method="post" enctype="multipart/form-data" name="form1" id="form1" >
  <table width="512">

    <tr>
      <td width="110"  class="stylebold"> Tên quảng cáo:</td>
      <td width="392">
        <input name="TenCT" type="text" id="TenCT" size="30" />
        <select name="loai">
          <option value="right" >Phải</option>
          <option value="left">Trái</option>
        </select>
      </td>
    </tr>
    <tr>
      <td  class="stylebold"> Ảnh quảng cáo:</td>
      <td>
        
        <input type="file" name="anh" id="anh" />
      </td>
    </tr>
    <tr>
      <td class="stylebold"> Đường dẫn:</td>
      <td>
        <input name="link" type="text" id="link" size="30" />
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
  <table width="100" border="1" bgcolor="#25a9f4">
    <tr>
      <td width="83" class="stylebold"> Đồng ý</td>
      <td width="17">
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
