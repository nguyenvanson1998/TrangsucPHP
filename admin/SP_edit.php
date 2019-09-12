<?
include('../inc/conn.php');
$bid=$_REQUEST['MaSP'];
mysql_select_db($database_cnn,$conn);
$sql="select * from NSX";
$result1=mysql_query($sql,$conn);
$result2=mysql_query($sql,$conn);
$sqlcate="select * from LoaiSP";
$resultcate=mysql_query($sqlcate,$conn);
$sqlbook="select * from SanPham where MaSP=".$bid;
$resultb=mysql_query($sqlbook,$conn);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title></title>
</head>
<script>function checkform(form)
{
  with(form)
  {
    if(TenSP.value =="")
	{
	  alert("Bạn chưa nhập tên sản phẩm")
	  TenSP.focus()
	  return false
	}	
	if(ngaySX.value =="")
	{
	  alert("Bạn chưa nhập ngày sản xuất")
	  namxb.focus()
	  return false
	}
	
	if(SoLuong.value =="")
	{
	  alert("Bạn chưa nhập số lượng")
	  taiban.focus()
	  return false
	}
	if(gia.value =="")
	{
	  alert("Bạn chưa nhập giá bán")
	  gia.focus()
	  return false
	}
	
	if(trongluong.value =="")
	{
	  alert("Bạn chưa nhập trong lượng")
	  trongluong.focus()
	  return false
	}
	
	if(HamLuong.value =="")
	{
	  alert("Bạn chưa nhập hàm lượng")
	  sotrang.focus()
	  return false
	}
	
	return true
  }
}
</script>
<body>
<h3>SỬA THÔNG TIN SẢN PHẨM</h3>
<? while($rowb=mysql_fetch_array($resultb)){?>
<form action="index.php?act=SP&func=editSP&MaSP=<?=$bid?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="100%" border="0" align="center">
    <tr>
      <td width="14%" align="right">Tên sản phẩm</td>
      <td colspan="3">
        <input name="TenSP" type="text" value="<?=$rowb['TenSP'];?>" size="30" />      </td>
    </tr>
    <tr>
      <td align="right">Nhà cung cấp</td>
      <td  colspan="3">
        <select name="NSX" size="5" multiple>
        <? while($row=mysql_fetch_array($result1)){ ?>
		<option value="<?=$row['NSXId']?>"><? echo $row['NSXName']?></option>
		<? }?>
        </select>      </td>
    </tr>
    <tr>
      <td align="right">Chọn thể loại </td>
      <td colspan="3">
        <select name="LoaiSP[]" size="5" multiple="multiple" id="select">
        <? while($rowcate=mysql_fetch_array($resultcate)){ ?>
		<option value="<?=$rowcate['MaLoaiSP']?>"><? echo $rowcate['TenLoaiSP']?></option>
		<? }?>
        </select>      </td>
    </tr>
    <tr>
      <td align="right">Ngay xuất bản</td>
      <td colspan="3">
        <input name="NgaySX" type="text" value="<?=$rowb['NgaySX']?>" size="50" />      </td>
    </tr>
    <tr>
      <td align="right">Số Lượng</td>
      <td colspan="3">
        <input name="SoLuong" type="text" value="<?=$rowb['SoLuong']?>" size="5" />      </td>
    </tr>
    <tr>
      <td align="right">Ảnh</td>
      <td colspan="3">
      	<input type=hidden name="MAX_FILE_SIZE" value="1000000">
        <input type="file" name="anh" id="anh" />      </td>
    </tr>
    <tr>
      <td align="right">Giá bán</td>
      <td colspan="3">
        <input name="gia" type="text" value="<?=$rowb['Gia']?>" size="50" /> VNĐ     </td>
    </tr>
    <tr>
      <td align="right">Chất liệu</td>
      <td colspan="3">
        <input name="HamLuong" type="text" value="<?=$rowb['HamLuong']?>" size="50" />      </td>
    </tr>
    <tr>
      <td align="right">Trọng lượng</td>
      <td colspan="3">
        <input name="TrongLuong" type="text" value="<?=$rowb['TrongLuong']?>" size="50" />chỉ </td>
    </tr>
    <tr>
      <td align="right">Nội dung giới thiệu</td>
     
      <td colspan="3">
	  <script src="inputtext/js/richtext.js" type="text/javascript" language="javascript"></script>
<!-- Include the Free Rich Text Editor Variables Page -->
		<script src="inputtext/js/config.js" type="text/javascript" language="javascript"></script>
		 <script>
		rteFormName = "MoTa";
		MyText('<? echo $rowb['MoTa'];?>','example.css');</script> 
	  </td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td colspan="3"><a style="CURSOR: pointer" 
                              onclick="window.open('inputtex.htm', 'input_content', 'width=750,height=500,resizable=no,scrollbars=yes,status=no');" class="menu2">Nhập nội dung theo đinh dạng</a></td>
    </tr>
    <tr>
      <td align="right">Trạng thái:</td>
      <td>
        <select name="status">
        <option value="0">chưa có sản phẩm</option>
        <option value="1">Đã có sản phẩm</option>
        </select>      </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <input type="submit" name="Submit" id="button" value="Lưu thay đổi" onClick="return checkform(this.form)"/>
        <input type="reset" name="button2" id="button2" value="Làm lại" />      </td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<? }?>
<p>&nbsp; </p>
</body>
</html>

