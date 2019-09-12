<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p>
  <? require_once('inc/conn.php'); ?>
  <?
  mysql_select_db("truong", $conn);
  
  $cusid = $_SESSION['MaKhach'];
  
  $row_per_page = 10;
  $pagenum = $_REQUEST['page'];
  $page = "index.php?mnu=YKPH&action=view";
  
  $query = mysql_query("SELECT * FROM YKPH WHERE MaKhach=".$cusid." ") or die(mysql_error());
  $row_num = mysql_num_rows($query);
  
  $totalpage = ceil( $row_num / $row_per_page );
  
  if(!$pagenum || $pagenum <= 0 || $pagenum > $totalpage)
  {
    $pagenum = 1;
  }
  if($pagenum == 1)
  {
    $from = 0;
  }
  else
  {
    $from = ($pagenum-1)*$row_per_page;
  }
  
  $query = "SELECT * FROM YKPH WHERE MaKhach = ".$cusid." LIMIT ".$from.",".$row_per_page;
  $display = sprintf("%s",$query);
  $query_viewanswer = mysql_query($display, $conn) or die(mysql_error());
  $row = mysql_fetch_array($query_viewanswer);
 
?>
<fieldset><legend><font color="#149ff7"> Xem trả lời phản hồi</font></legend>
<table width="430" border="0" align="center" cellpadding="0" cellspacing="10">
<? if($row) { ?>
<? do { ?>
  <tr>
    <td><fieldset><legend> <font color="#149ff7"> Tựa đề phản hồi</font></legend>
      <? echo $row['YKPHTieuDe']?>
    </fieldset></td>
  </tr>
  <tr>
    <td><fieldset><legend> <font color="#149ff7">Nội dung phản hồi</font></legend><? echo $row['YKPHNoiDung']?></fieldset></td>
  </tr>
  <tr>
    <td><fieldset><legend><font color="#149ff7"> Trả lời</font></legend><? echo $row['TraLoi']?></fieldset></td>
  </tr>
  <tr>
  <td><hr align="center" color="#FF0000" size="2" width="400" /></td>
  </tr>
<? } while($row = mysql_fetch_array($query_viewanswer));
}
else
{
?>
<tr><td> Chưa có câu trả lời</td></tr>
<?
}
?>
</table>

<br />
<div align="center">
 Trang <? 
   for($i=1;$i<=$totalpage;$i++)
   {
     if($i==1)
	 echo "<a href='".$page."&page=".$i."'>".$i."</a> ";
	 else
	 echo " | <a href='".$page."&page=".$i."'>".$i."</a> "; 
   }
?>
</div>
</fieldset>
</body>
</html>
