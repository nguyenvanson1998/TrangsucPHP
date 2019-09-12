<?php 
require_once('inc/conn.php');
 ?>
<?php
mysql_select_db($database_cnn, $conn);
//truy van tin tuc
$query_news = "SELECT * FROM Tintuc where TrangThai=1 ORDER BY MaTT DESC LIMIT 0,1";
$result_news = mysql_query($query_news, $conn) or die(mysql_error());
$row_news = mysql_fetch_array($result_news);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style2 {color: #FF6600}
.style3 {color: #0000FF}
.style4 {font-size: 13px}
}
.style12 {border: 6px outset #FF6600;}
-->
</style>
</head>

<body>
<div class="tinmoi">
			
			<table border="0" width="190" id="table304" cellpadding="0" style="border-collapse: collapse">				
			<tr>
			<td width="100%" height="24" background="Images/Tool_bar1.jpg" style="background-repeat:no-repeat">
					
			<div class="title">
			  <div align="center" class="style4"><span style="color: #ffffff">	<font>Tin mới nhất </font></span></div>
			</div>
			</td>
			</tr>
			</table>
<table width="190"  >
      <tr>
           <td align="center" ><span style="color:#F77705"><b><? echo $row_news["TieuDe"]; ?></b></span>
		   <br>&nbsp;</td>
      </tr>
	  <tr>
           <td align="center">
		   <img src="Images/Tintuc/<?=$row_news["AnhTT"]; ?>" alt="<? echo $width ."/".$height; ?>" width="150" height="100"  hspace="2" vspace="2" border="0" class="style12">
		   <br>
	    &nbsp;</td>
      </tr>
	  <tr>
           <td class="stylewhite" align="justify"><span ><? echo $row_news["TrichDan"]; ?></span><br>
        &nbsp;</td>
      </tr>
      <tr>
           <td><div align="left" class="style1"><a href ="?mnu=TTCT&MaTT=<?=$row_news["MaTT"];?>" class="style3">	       Chi tiết...</a>
		   </div>
		   </td>
      </tr>
     </table>
</div> 	
</body>
</html>
