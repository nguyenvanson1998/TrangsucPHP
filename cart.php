<? 
session_start();
include("inc/khoitao.php");
require_once('inc/conn.php'); 
?>

<?
	//require_once('inc/conn.php');
	$cart = $_SESSION["CART"];
	$action = $_REQUEST["action"];
	switch($action){
		case "add":{
				$MaSP = $_REQUEST["MaSP"];	
				if($cart){
					if(array_key_exists($MaSP,$cart))
					{
						$cart[$MaSP] +=1;
					}else{
						$cart[$MaSP]=1;
					}
				}else{
					$cart[$MaSP]=1;
				}
				$_SESSION["CART"] = $cart;
				echo("<script>window.location='cart.php'</script>");
			}break;
		case "update":{
		
			/*foreach(array_keys($cart) as $value){
				if(ereg("([1-9])",$_REQUEST["quantity_".$value])&&($_REQUEST["quantity_".$value]>=1)&&(fmod($_REQUEST["quantity_".$value])==0)){
				$cart[$value] = $_REQUEST["quantity_".$value];
				}else $cart[$value]=1;
			}*/
			foreach(array_keys($cart) as $value){
				if(!ereg("[^1-9]",$_REQUEST["quantity_".$value])){
				$cart[$value] = $_REQUEST["quantity_".$value];
				}else $cart[$value]=1;
			}
			$_SESSION["CART"] = $cart;
			echo("<script>window.location='cart.php'</script>");
			}break;
		case "delete":{
			$MaSP = $_REQUEST["MaSP"];
			$_SESSION["quantity"]=0;
			if($cart)
			{
				foreach(array_keys($cart) as $value){
					if($value != $MaSP){
						$newcart[$value] = $cart[$value];
					}
				}
				$_SESSION["CART"] = $newcart;	
				$cart=$newcart;
			}
			echo("<script>window.location='cart.php'</script>");
			}break;
	
	}
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
				<table width="500" cellpadding="0" cellspacing="0">
				<tr><td width="77" height="5px"></td></tr>
<tr>
<td height="25" align="center" background="Images/Tool_bar1.jpg" style="background-repeat:no-repeat"><span style="color: #FFFFFF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style="font-size:13px"><b>Bạn Đã Mua</b></font></span></td>
<td width="77">&nbsp;</td>
</tr>
<tr>
<td>
<form id="form1" name="form1" method="post" action="cart.php?action=update">
<input type="hidden" id="act" name="act" value="update" />
  <table width="494"  border="1" cellpadding="0" cellspacing="0" bordercolor="#C5B083" bordercolorlight="#C5B083" bordercolordark="#C5B083">
    <tr>
    <tr>
      <td width="180" height="17" valign="top"><div align="center" ><strong><span class="style2">Tên sản phẩm</span></strong></div></td>
      <td width="68" valign="top"><div align="center"><strong><span class="style2">S&#7889; l&#432;&#7907;ng</span></strong></div></td>
      <td width="77" valign="top"><div align="center"><strong><span class="style2">Gi&aacute;</span></strong></div></td>
      <td width="111" valign="top"><div align="center"><span class="style2"><b>T&#7893;ng</b></span></div></td>
      <td width="52" align="right" valign="top"><div align="center"><strong><span class="style2">Xóa</span></strong></div></td>
    </tr>
    <tr>
      <td height="17" colspan="5"><div align="left"></div></td>
    </tr>
	<?
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
      <td height="26" valign="top"><div align="center" ><? echo $row["TenSP"]; ?></div></td>
      <td valign="top"><div align="left">
        <input name="quantity_<? echo $row["MaSP"]; ?>" type="text" id="quantity_<? echo $row["MaSP"]; ?>" value="<? echo GetQuantity($row["MaSP"]); ?>" size="4" maxlength="4"/>
      </span></div></td>
      <td valign="top"><div align="right"><? echo $row["Gia"]; ?>VNĐ</div></td>
      <td valign="top"><div align="right">
        <? $total += $row["Gia"]*GetQuantity($row["MaSP"]);echo $row["Gia"]*GetQuantity($row["MaSP"]);
			$totalquantity+=GetQuantity($row["MaSP"]);
		?>
        VNĐ</div></td>
      <td align="right" valign="top"><div align="center"><a href="?action=delete&MaSP=<? echo $row["MaSP"]; ?>"><img src="Images/rac.gif" border="0" /></a></div></td>
    </tr>
	<?
		}
		$_SESSION["quantity"]=$totalquantity;
		$_SESSION["total"]=$total;
		mysql_free_result($result);
	}else{
	?>
	 <tr>
      <td height="17" colspan="5"><div align="left">Kh&ocirc;ng c&oacute; h&agrave;ng trong gi&#7887;</span></div></td>
    </tr>
	<?	
		}
	?>
    <tr>
      <td height="17" colspan="5"><div align="left"></div></td>
    </tr>
    <tr>
      <td valign="top" colspan="3" align="center" height="22"><span class="style2"><b>T&#7893;ng:</b></span></td>
      <td valign="top"><div align="right"><span class="style14"><? echo $total; ?></span>VNĐ</div></td>
      <td align="right"></td>
    </tr>
    <tr>
      <td height="17" colspan="5"><div align="left"></div></td>
    </tr>
    <tr>
      <td height="26" colspan="5" align="right">
	  	<table>
			<tr>
				<td><input class="button_" type="submit" name="Submit" value="Cập nhật" /></td>
				<td><input  class="button_" type="button" name="Submit2" value="Mua ti&#7871;p" onClick="window.location='index.php'" /></td>
        		<td><input class="button_" type="button" name="Submit3" value="Đặt Hàng" onclick="window.location='order.php';"/></td>
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
					    <br><span lang="en-us">Copyright ©2010	BaoHan-Shop</span>
					  <br />Địa chỉ:Hà Nội - Điện thoại: 1201910383</td>
					</tr>	
				</table>
			</div>
		</div>
	</body>
<!-- InstanceEnd --></html>
