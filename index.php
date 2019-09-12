<? 
session_start();
include("inc/khoitao.php");
require_once('inc/conn.php'); 
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
  <table width="100%" height="37" border="0" cellpadding="0" cellspacing="0" background="Images/divbg.png">
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
					<? }else{}?></b>
					<b><li><a href="index.php?mnu=gioithieu">Giới thiệu</a></li>
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
				<? include "Container.php"?>
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
					  <br><span lang="en-us">Copyright ©2010	BaoHan-Shop</span>
					  <br />Địa chỉ:Hà Nội - Điện thoại: 1201910383</td>
					</tr>	
				</table>
			</div>
		</div>
	</body>
<!-- InstanceEnd --></html>
