<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>o.O BaoHanShop Admin O.o</title>
<link rel="stylesheet" type="text/css" href="../CSS/styleadmin.css">
<style type="text/css">
#apDiv1 {
	position:absolute;
	left:264px;
	top:425px;
	width:125px;
	height:54px;
	z-index:1;
}
</style>
</head>

<body>

<div id="container">

<div id="header">
<div id="header_left">
<h4 align="right">Xin chào: <font color="#CC9900"><? echo $_SESSION["admin"]?></font><font size="3"><a href="../admin/logout.php"><pre>Đăng xuất </pre></a></pre></font></h4>
<h1><span class="red">Quản Trị Website</span></h1>
</div>
</div>
<div id="left">
<div id="navcontainer">
<div id="apDiv1" style="visibility:hidden">
  <table>
    <tr>
      <td><a href="../admin/index.php?act=HD&status=0">Chưa xử lý</a></td>
    </tr>
    <tr>
      <td><a href="../admin/index.php?act=HD&status=1">Đang chờ</a></td>
    </tr>
    <tr>
      <td><a href="../admin/index.php?act=HD&status=2">Đã xử lý</a></td>
    </tr>
  </table>
</div>
<ul id="navlist">
<li><a href="../admin/index.php?act=LoaiSP" id="current">Loại trang sức </a></li>
<li><a href="../admin/index.php?act=SP">Chi tiết sản phẩm </a></li>
<li><a href="../admin/index.php?act=KH">Khách hàng</a></li>
<li><a onclick="document.getElementById('apDiv1').style.visibility='visible'" onmouseover="document.getElementById('apDiv1').style.visibility='hidden'"><font color="#93b26e">Hóa đơn</font></a></li>
<li><a href="../admin/index.php?act=NSX">Nhà cung cấp </a></li>
<li><a href="../admin/index.php?act=PTVC">Phương thức vận chuyển</a></li>
<li><a href="../admin/index.php?act=PTTT">Phương thức thanh toán</a></li>
<li><a href="../admin/index.php?act=YKPH">Ý kiến phản hồi</a></li>
<li><a href="../admin/index.php?act=LoaiTT">Loại tin tức</a></li>
<li><a href="../admin/index.php?act=TT">Tin Tức</a></li>
<li><a href="../admin/index.php?act=QC">Quảng cáo</a></li>
<li><a href="../admin/logout.php">Thoát</a></li>
</ul>
</div>
</div>
<!-- TemplateBeginEditable name="chinh sua" -->
<div id="right">
asda
  </div>
<!-- TemplateEndEditable -->
<div id="footer">| Tạo bởi: Quynh |  </div>
</div>


</body>
</html>
