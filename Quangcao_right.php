<?php 
require_once('inc/conn.php');
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style2 {font-size: 13px}
.style12 {border: 9px outset #FF6600;}
-->
</style>
</head>

<body>
<div class="tinmoi">
<div class="title"><span class="title_icon"></span> </div>
<table width="100%" cellspacing="5">
<?php
mysql_select_db($database_cnn, $conn);
//truy van tin tuc
$sqladvr="SELECT * FROM QC WHERE (TrangThai=1) and (TenCT like '%right') ORDER BY QCId DESC limit 0,5";
		$result=mysql_query($sqladvr);
		while($rowadv=mysql_fetch_array($result))
			{
?>
	  <tr>
           <td align="center">
		   <a href="<?=$rowadv["Link"]?>" target="_blank"><img src="Images/Quangcao/<?=$rowadv["Anh"]; ?>" alt="<? echo $width ."/".$height; ?>" width="160" height="160"  hspace="2" vspace="2" border="0" class="style12"></a></td>
      </tr>
	  <? 	
			} 
			mysql_free_result($result);
			?>
     </table>
</div> 	
</body>
</html>
