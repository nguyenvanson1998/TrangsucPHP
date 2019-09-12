<? 
session_start();
include("inc/khoitao.php");
require_once('inc/conn.php'); 
?>
<?
	//require_once('inc/conn.php');
	$cart = $_SESSION["CART"];
	function GetQuantity($MaSP){
		$cart = $_SESSION["CART"];
		$quantity=0;
		foreach(array_keys($cart) as $value){
			if($value == $MaSP){
				$quantity = $cart[$MaSP];
				break;
			}
		}
		return $quantity;	
	} 
if($_SESSION['MaKhach']){	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="CSS/style.css" />
		<link rel="shortcut icon" type="image/x-icon" href="Logo/AddressBook.ico" />
		<title>oOo Bao Han Shop oOo</title>
	<script type="text/JavaScript">
<!--

function MM_initTimelines() { //v4.0
    //MM_initTimelines() Copyright 1997 Macromedia, Inc. All rights reserved.
    var ns = navigator.appName == "Netscape";
    var ns4 = (ns && parseInt(navigator.appVersion) == 4);
    var ns5 = (ns && parseInt(navigator.appVersion) > 4);
    var macIE5 = (navigator.platform ? (navigator.platform == "MacPPC") : false) && (navigator.appName == "Microsoft Internet Explorer") && (parseInt(navigator.appVersion) >= 4);
    document.MM_Time = new Array(1);
    document.MM_Time[0] = new Array(1);
    document.MM_Time["Timeline1"] = document.MM_Time[0];
    document.MM_Time[0].MM_Name = "Timeline1";
    document.MM_Time[0].fps = 15;
    document.MM_Time[0][0] = new String("sprite");
    document.MM_Time[0][0].slot = 1;
    if (ns4)
        document.MM_Time[0][0].obj = document["divAdLeft"];
    else if (ns5)
        document.MM_Time[0][0].obj = document.getElementById("divAdLeft");
    else
        document.MM_Time[0][0].obj = document.all ? document.all["divAdLeft"] : null;
    document.MM_Time[0][0].keyFrames = new Array(1, 15);
    document.MM_Time[0][0].values = new Array(0);
    document.MM_Time[0].lastFrame = 15;
    for (i=0; i<document.MM_Time.length; i++) {
        document.MM_Time[i].ID = null;
        document.MM_Time[i].curFrame = 0;
        document.MM_Time[i].delay = 1000/document.MM_Time[i].fps;
    }
}
//-->
</script></head>
	
	<body>
<script language="JavaScript" src="js/adv.js"></script>
<div id="divAdLeft" style="left: 0pt; width: 115px; position: absolute; top: 130px; height: 100px;" align="right"></div>
<div id="divAdRight" style="left: 1149px; width: 115px; position: absolute; top: 130px;"></div>
<div id="apDiv1" style="visibility:hidden; position:absolute">
  <table width="100%" height="37" border="1" cellpadding="0" cellspacing="0" background="Images/divbg.png">
    <? $sqlcatenews="SELECT MaLTT, TenLTT FROM LoaiTT WHERE TrangThai=1";
		$resultcatenews= mysql_query($sqlcatenews,$conn);
	while($rowcatenews=mysql_fetch_array($resultcatenews)){
?>
    <tr>
      <td height="25" align="center"><a href="index.php?mnu=TT&MaLTT=<?=$rowcatenews['MaLTT'];?>" id="menu" style="font-size:12px"><? echo $rowcatenews['TenLTT'];?></a></td>
    </tr>
    <? }?>
  </table>
</div>
		<div id="wrapper">
			<div id="header">
				<div class="logo"></div>
				<div class="slogan"><img src="Images/cart01.png" /> Giỏ hàng
				<? if($_SESSION["quantity"]){?>
					<p>Gồm: <? echo $_SESSION["quantity"]; ?> sản phẩm | Tổng tiền: <? echo $_SESSION["total"]; ?> VNĐ 
				<? }else{}?>
				</div>
				<div id="menu">
					<ul> 
					<li><span>
					<SCRIPT>   
						var mydate=new Date()   
						var year=mydate.getYear()   
						if (year < 1000)   
						year+=1900   
						var day=mydate.getDay()   
						var month=mydate.getMonth()   
						var daym=mydate.getDate()   
						if (daym<10)   
						daym="0"+daym   
						var dayarray=new Array("Ch&#7911; nh&#7853;t","Th&#7913; hai","Th&#7913; ba","Th&#7913; t&#432;","Th&#7913; n&#259;m","Th&#7913; sáu","Th&#7913; b&#7843;y")   
						var montharray=new Array("/ 1","/ 2","/ 3","/ 4","/ 5","/ 6","/ 7","/ 8","/ 9","/ 10","/ 11","/ 12")   
						document.write(" Ngày "+daym+" "+montharray[month]+" / "+year)   
							</SCRIPT></span>
					</li>                                                                     
					<b><li><a href="index.php">Trang chủ</a></li>
					<li onClick="document.getElementById('apDiv1').style.visibility='visible'" onMouseOver="document.getElementById('apDiv1').style.visibility='hidden'"><a>Tin Tức</a></li>
					</b>
					<? if($_SESSION["flag1"]!="true"){?>
					<b><li><a href="index.php?mnu=dangky">Đăng ký</a></li>
					<? }else{}?></b><b>
					<li><a href="index.php?mnu=gioithieu">Giới thiệu</a></li>
					<li><a href="index.php?mnu=lienhe">Liên hệ</a></li>
					<li><a href="index.php?mnu=huongdan">Hướng dẫn</a></li>
				
					<li><a href="cart.php">Xem giỏ hàng</a></li>
					</b>
					<!--<li><a href="details.html">prices</a></li>-->
					</ul>
				</div>
			</div>
			<div id="content">
				<div id="left_bar">
						<table border="0" width="190" id="table304" cellpadding="0" style="border-collapse: collapse">
				<tr><td height="5"></td></tr>
			<tr>
			<td width="100%" height="24" background="Images/Tool_bar1.jpg" style="background-repeat:no-repeat">
					<span class="title_icon"></span>		
					<div align="center" class="title"><font color="#ffffff" style="font-size:13px">		
					Danh mục trang sức </font></div> 	
					</td>
			</tr>
		</table>	
					<? include "menu_left.php"?>
					<div class="side_bar"></div>
					<? include "search.php"?>
				  <div class="side_bar"> 
				  </div>
					<? include "Quangcao_left.php";?>	
					<div class="side_bar">&nbsp;</div>
				</div>
				<!-- InstanceBeginEditable name="center" -->
				<div id="center">
				<script language="javascript">
					function checkform(form){
						with(form){
							i=end.value;
							alert i;
							if(i==""){ 
							alert "Ngày nhân không được để trống!";
							}
						}
					)
				</script>
					<table width="494" cellpadding="0" cellspacing="0" bgcolor ="#ffffff">
<tr><td height="5"></td></tr>				
<tr>
<td height="24" align="center" background="Images/Tool_bar1.jpg" style="background-repeat:no-repeat"><span style="color: #FFFFFF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font  style="font-size:13px"><b>Lập hóa đơn</b></font></span></td>
</tr>
<tr><td height="5"></td></tr>
<tr>
<td>
<form id="form1" name="form1" method="post" action="order_process.php">
<input type="hidden" id="action" name="action" value="update" />
  <table width="492" border="1" cellpadding="0" cellspacing="0" bordercolorlight="#000000" bordercolor="#000000" bordercolordark="#000000"bgcolor="#FFFFFF">
    <tr>
      <td width="200" height="28" valign="top"><div align="center"><strong><span class="style2">Tên sản phẩm</span></strong></div></td>
      <td valign="top"><div align="center"><strong><span class="style2">S&#7889; l&#432;&#7907;ng</span></strong></div></td>
      <td colspan="2" valign="top"><div align="center"><strong><span class="style2">Gi&aacute;</span></strong></div></td>
      <td width="118" valign="top"><div align="center"><span class="style2"><b>T&#7893;ng</b></span></div></td>
      </tr>
    <tr>
      <td height="17" colspan="6"><div align="left"></div></td>
    </tr>
	<?
	$sqlship="select * from PTVC where (TrangThai=1) AND (MaVC =".$_REQUEST['ship'].")";
	$sqlpay="select * from PTTT where (TrangThai=1) AND (MaPTTT=".$_REQUEST['pay'].")";
	$resultship=mysql_query($sqlship,$conn);
	$rowship=mysql_fetch_array($resultship);
	$resultpay=mysql_query($sqlpay,$conn);
	$rowpay=mysql_fetch_array($resultpay);
	if($cart){
		$idlist = "";
		$total=0;
		foreach(array_keys($cart) as $value){
			$idlist = $idlist.$value.",";
		}
		$idlist = $idlist."0";
		$sql = "SELECT * FROM SanPham WHERE MaSP IN (".$idlist.")";
		
		$result = mysql_query($sql,$conn);
		while($row = mysql_fetch_array($result)){
	?>
    <tr>
      <td height="26" valign="top"><div align="center"><? echo $row["TenSP"]; ?></div></td>
      <td valign="top"><div align="center"><span ><? echo GetQuantity($row["MaSP"]); ?></span></div></td>
      <td colspan="2" valign="top"><div align="right"><? echo $row['Gia']; ?>VNĐ</div></td>
      <td colspan="2" valign="top"><div align="right">
        <? $total += $row['Gia']*GetQuantity($row["MaSP"]);echo $row['Gia']*GetQuantity($row["MaSP"]);
			$totalquantity+=GetQuantity($row["MaSP"]);
		?>
        VNĐ</div></td>
      </tr>
	<?
		}
		$_SESSION["quantity"]=$totalquantity;
		mysql_free_result($result);
	}else{
	?>
	 <tr>
      <td height="17" colspan="6"><div align="left"><span class="style9">Kh&ocirc;ng c&oacute; h&agrave;ng trong gi&#7887;</span></div></td>
    </tr>
	<?	
		}
	?>
    <tr>
      <td height="17" colspan="6"><div align="left"></div></td>
    </tr>
    <tr>
      <td height="22" colspan="2"></td>
      <td width="80" valign="top"><div align="center"><span class="style2"><b>T&#7893;ng:</b></span></div></td>
      <td colspan="3" valign="top"><div align="right"><span class="style14"><? echo $total; ?></span>VNĐ</div></td>
      </tr>
    <tr>
      <td height="17" colspan="6"><div align="left"></div></td>
    </tr>
    <tr>
    <td height="56" colspan="6">
    <table width="440" border="0">
  <tr>
    <td width="81">Vận chuyển:</td>
    <td width="349"><div class="style2"><? echo $rowship['TenVC']?></div>
    <input type="hidden" name="ship" value="<?=$rowship['MaVC'] ?>" />    </td>
  </tr>
  <tr>
    <td>Thanh toán:</td>
    <td><div class="style2"><? echo $rowpay['TenPTTT']?></div>
    <input type="hidden" name="payment" value="<?=$rowpay['MaPTTT'] ?>" />    </td>
  </tr>
  </table>    </td>
    </tr>
    <tr>
    <td colspan="6">
    <table width="100%%" border="0" bgcolor="#FFFFFF">
  	<tr>
      <td colspan="2" ><span class="style2">*Thông tin người nhận </span></td>
    </tr>
    <tr>
      <td width="29%" height="28" align="right">T&ecirc;n:</td>
      <td width="71%"><input name="dname" type="text" id="dname" value="<?=$_SESSION['Ho'].$_SESSION['Ten'];?>" size="30" />
        <span class="style2">*</span></td>
    </tr>
    <tr>
      <td height="28" align="right">Email:</td>
      <td>
        <input name="email" type="text" id="email" value="<?=$_SESSION['Email'];?>" size="30">      </td>
    </tr>
    <tr>
      <td width="29%" align="right">Công ty:</td>
      <td width="71%"><input name="company" type="text" size="30" value="<?=$_SESSION['CongTy'];?>" />
      <span class="style2">*</span></td>
    </tr>
    <tr>
      <td width="29%" align="right">Số điện thoại:</td>
      <td width="71%"><input name="phone" type="text" id="phone" value="<?=$_SESSION['SoDT'];?>" size="30" />
        <span class="style2">*</span></td>
    </tr>
    <tr>
      <td width="29%" align="right">Số Fax:</td>
      <td width="71%"><input name="fax" type="text" id="fax" value="<?=$_SESSION['SoFax'];?>" size="30" />
      <span class="style2">*</span></td>
    </tr>
    <tr>
      <td width="29%" align="right">Địa chỉ:</td>
      <td width="71%"><input name="address" type="text" id="address" value="<?=$_SESSION['DiaChi'];?>" size="30" />
      <span class="style2">*</span></td>
    </tr>
    <tr>
    <td align="right">Ngày Nhận:</td>
    <input type="hidden" name="start" value="<?=date("y-m-d");?>">
    <td><input type="text" name="end">
			<A onClick="gfPop.fEndPop(document.form1.start,document.form1.end);return false;" href="javascript:void(0)"><img height="22" alt="Click here to pickup date" src="picker/calbtn.gif" width="34" align="absMiddle" border="0" name="popcal" /></td>
    </tr>
     <iframe id="gToday:contrast:agenda.js" style="Z-INDEX: 999; LEFT: -500px; VISIBILITY: visible; POSITION: absolute; TOP: 0px"
					name="gToday:contrast:agenda.js" src="picker/ipopeng.htm" frameBorder="0" width="174" scrolling="no"
			height="189"></iframe>
  </table>    </td>
    </tr>
    <tr>
      <td height="26" colspan="6" align="right">
	  <table>
      	<tr>
			<td><input class="button_" type="button" name="button2" id="button" value="Quay lại" onclick="history.go(-1)" /></td>
        	<td><input class="button_" type="submit" name="Submit1" value="Đặt hàng" onclick="return checkform(this.form);"/></td>
		</tr>
		</table>
		</td>
    </tr>
    
  </table>
</form>
</td>
</tr>
</table>
				</div>
				 <!-- InstanceEndEditable -->
				<div id="right_bar"> 	
					<? include "login_form.php"?>
					<div class="side_bar"></div>
					<? include "tinmoi_form.php"?>
					<div class="side_bar"></div>
					<? include "Quangcao_right.php"?>
					<div class="side_bar">&nbsp;</div>
			  </div>
				<div class="clear"></div>
			</div>
			<div id="footer">
				<table width="100%" height="100%">
					<tr>
						<td>
						</td>
					  <td align="right">
					  <br><span lang="en-us">Copyright ©2010	BaoHanShop</span>
					  <br />Địa chỉ:Hà Nội - Điện thoại: 01234321239</td>
					</tr>	
				</table>
			</div>
		</div>
	</body>
<!-- InstanceEnd --></html>
<?php
//mysql_free_result($rs_bcate);
mysql_close($conn);
}else header("location:index.php?mnu=checklogin")
?>