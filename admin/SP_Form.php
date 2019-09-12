<?
session_start();
$_SESSION["flag"];
$_SESSION["admin"];
if($_SESSION["flag"]!="true")
header("location: login.php");
include("../inc/conn.php");
mysql_select_db($database_cnn, $conn);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản Lý Sản Phẩm</title>
</head>

<body>
<h3>Quản Lý Sản Phẩm</h3>
<div align="center">
      <?
	  			$number_of_sp=10;

//thiet lap cac thong tin ve hien thi sach
	$number_of_new_show=2;
	$number_of_new_list=12;
	$number_of_line=4;
	$number_of_page=18;
	$number_of_sp=14;
	if ($page==NULL)
		$page=0;
			else
		$page=$page-1;

				$sql="SELECT * FROM sanpham";
				$result=mysql_query($sql);
				$total = mysql_num_rows($result);
				//print $total;
				$sotrang=$total / $number_of_sp;
				//print $sotrang;
			if ($total > $number_of_sp)	
				{
				print "Trang<strong> ";
				for ($i=0;$i<$sotrang;$i++)
					{
					if ($page==$i) { print " [".($i+1)."] "; } else {
		  ?>
  <a href="?act=<?=$act?>&page=<?=($i+1)?>" class="menu2"> 
        <?=($i+1)?>
  </a> 
        <? 			
	  					}
	  				}
	  			} 
?>    
</div>
<div align="left"><a href="index.php?act=SP&func=add">Thêm mới</a></div>
<table width="100%" border="1" cellpadding="0" cellspacing="0">
  <tr bgcolor="#25a9f4" class="stylebold" align="center">
    <td width="6%" >Mã </td>
    <td width="26%" >Tên sản phẩm</td>
    <td width="15%" >Nhà cung cấp</td>
    <td width="12%" >Ngày sản xuât</td>
    <td width="7%" >Số lượng </td>
    <td width="13%" >Giá bán</td>
    <td colspan="3" >Chức năng</td>
  </tr>
<?
$start=$page*$number_of_sp;
$sqlsp="SELECT *
  FROM
  SanPham
  ORDER BY
  MaSP DESC
 LIMIT $start,$number_of_sp";
 //print $sqlsp;
$resultsp=mysql_query($sqlsp);
$numrow = mysql_num_rows($resultsp);
if($numrow==0) echo "Chưa có sản phẩm";
else{
while($rowsp=mysql_fetch_array($resultsp)){
?>
  <tr align="center" valign="middle">
    <td ><? echo $rowsp['MaSP']?></td>
    <td align="left"><? echo $rowsp['TenSP']?></td>
    <td ><? 
	$sql_author="select NSXName from NSX where NSXId =".$rowsp['NSXId'];
	$result_author=mysql_query($sql_author,$conn);
	$numrowau=mysql_num_rows($result_author);
	if($numrowau){
	while($rowau=mysql_fetch_array($result_author)){
	echo $rowau['NSXName'];
	}
	}else echo "Chưa rõ!";
	?></td>
    <td ><? echo $rowsp['NgaySX']?></td>
    <td ><? echo $rowsp['SoLuong']?></td>
    <td ><? echo $rowsp['Gia']?> VNĐ </td>
    <td width="4%" >
      
      <input type="button" name="button" id="button" value="Xóa" onClick="confirm('Bạn muốn xóa không!')==true?window.location='index.php?act=SP&func=xoa&MaSP=<?=$rowsp['MaSP']?>':window.location='index.php?act=SP'" />
          </td>
    <td width="5%" >

        <input type="button" name="button2" id="button2" value="Sửa" onClick="window.location='index.php?act=SP&func=edit&MaSP=<?=$rowsp['MaSP']?>'"/>
          </td>
    <td width="7%" >
      <input type="submit" name="button3" id="button3" value="Chi tiết" onClick="window.location='index.php?act=SP&func=detail&MaSP=<?=$rowsp['MaSP']?>'" />
    </td>
  </tr>
<?  }
} ?>

</table>
<p>&nbsp;</p>
</body>
</html>
