<?
include('../inc/conn.php');
mysql_select_db($database_cnn,$conn);
$sql="select * from NSX";
$result1=mysql_query($sql,$conn);
$result2=mysql_query($sql,$conn);
$sqlcate="select * from LoaiSP";
$resultcate=mysql_query($sqlcate,$conn)
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../CSS/calendar-blue.css">
<script type="text/javascript" src="../js/calendar.js"></script>
<script type="text/javascript" src="../js/calendar-en.js"></script>
<script type="text/javascript" src="../js/calendar-setup.js"></script>
<script language="JavaScript" type="text/javascript" src="inputtext/cbrte/html2xhtml.js"></script>
<script language="JavaScript" type="text/javascript" src="inputtext/cbrte/richtext_compressed.js"></script>

<title></title>

</head>
<script>
function checkform(form)
{
  with(form)
  {
    
	if(TenSP.value =="")
	{
	  alert("Bạn chưa nhập tên sản phẩm")
	  TenSP.focus()
	  return false
	}
	if(NgaySX.value =="")
	{
	  alert("Bạn chưa nhập ngày sản xuất")
	  NgaySX.focus()
	  return false
	}
	
	if(SoLuong.value =="")
	{
	  alert("Bạn chưa nhập số lượng")
	  SoLuong.focus()
	  return false
	}
	
	if(anh.value =="")
	{
	  alert("Bạn chưa chọn ảnh")
	  anh.focus()
	  return false
	}
	
	if(gia.value =="")
	{
	  alert("Bạn chưa nhập giá bán")
	  gia.focus()
	  return false
	}
	
	if(HamLuong.value =="")
	{
	  alert("Bạn chưa nhập số hàm lượng")
	  HamLuong.focus()
	  return false
	}
	if(TrongLuong.value =="")
	{
	  alert("Bạn chưa nhập trong lượng")
	  TrongLuong.focus()
	  return false
	}
	return true
  }
}
</script>
<body>
<h3>Thêm sản phẩm mới</h3>
<form action="index.php?act=SP&func=process" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="100%" border="0" align="center">
    <tr>
      <td width="15%" align="right">Tên sản phẩm </td>
      <td colspan="3">
        <input name="TenSP" type="text" id="TenSP" size="30" />      </td>
    </tr>
    <tr>
      <td align="right">Hãng sản xuất</td>
      <td colspan="3">
        <select name="NSX" size="5" >
        <? while($row=mysql_fetch_array($result1)){ ?>
		<option value="<?=$row['NSXId']?>"><? echo $row['NSXName']?></option>
		<? }?>
        </select>      </td>
    </tr>
    <tr>
      <td align="right">Chọn thể loại</td>
      <td colspan="3">
        <select name="LoaiSP[]" size="5" multiple="multiple" id="select">
        <? while($rowcate=mysql_fetch_array($resultcate)){ ?>
		<option value="<?=$rowcate['MaLoaiSP']?>"><? echo $rowcate['TenLoaiSP']?></option>
		<? }?>
        </select>      </td>
    </tr>
    <tr>
      <td align="right">Ngày sản xuất</td>
      <td ><input name="NgaySX" type="text" id="NgaySX" size="20" /><img src="../Images/img.gif" id="anhlich" style="cursor: pointer;"/></td>
	    <script type="text/javascript">
    	Calendar.setup(
		{
        inputField:"NgaySX",     // id of the input field
        ifFormat:"%Y-%m-%d",      // format of the input field
        button:"anhlich",  // trigger for the calendar (button ID)
        align:"Tl",           // alignment (defaults to "Bl")
        singleClick:true
    }
	);
</script>
    </tr>
    <tr>
      <td align="right">Số lượng</td>
      <td colspan="3">
        <input name="SoLuong" type="text" id="SoLuong" size="5" />      </td>
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
        <input name="gia" type="text" id="gia" size="50" /> VNĐ </td>
    </tr>
    <tr>
      <td align="right">Chất liệu</td>
      <td colspan="3">
        <input name="HamLuong" type="text" id="HamLuong" size="50" />      </td>
    </tr>
    <tr>
      <td align="right">Trọng lượng</td>
      <td colspan="3">
        <input name="TrongLuong" type="text" id="TrongLuong" size="50" /> chỉ</td>
    </tr>
    <tr>
      <td align="right">Nội dung giới thiệu</td>
      <script src="inputtext/js/richtext.js" type="text/javascript" language="javascript"></script>
<!-- Include the Free Rich Text Editor Variables Page -->
<script src="inputtext/js/config.js" type="text/javascript" language="javascript"></script>
      </tr>
	  <tr>
	  <td colspan="4">
        <script>
		rteFormName = "MoTa";
		MyText('','example.css');</script>      </td>
    </tr>
    <tr>
      <td align="right">Trạng thái:</td>
      <td>
        <select name="status">
        <option value="0">chưa có sản phẩm</option>
        <option value="1">Sản phẩm đã có</option>
        </select>      </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <input type="submit" name="Submit" id="button" value="Thêm mới" onClick="return checkform(this.form)"/>
        <input type="reset" name="button2" id="button2" value="Làm lại" />      
	</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
</body>
</html>
