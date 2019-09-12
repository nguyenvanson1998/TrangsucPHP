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
<title>Quản Lý Khách Hàng</title>
<script>
	function checkdel(){
	a="Bạn muốn xóa không?";
	if(confirm(a)) return true;
	else return false;
	}	
</script>
</head>
<body>
<h3>Quản Lý Khách Hàng</h3>

<div align="center">
      <?
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
				$sql="SELECT * FROM Khachhang";
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
  <a href="?act=<?=$act?>&page=<?=($i+1)?>"> 
        <?=($i+1)?>
  </a> 
        <? 			
	  					}
	  				}
	  			} 
?>    
</div>

<table width="100%" border="1" cellpadding="0" cellspacing="0">
  <tr bgcolor="#25a9f4"  class="stylebold" align="center">
    <td width="35">Mã </td>
    <td width="110">Tên khách hàng</td>
    <td width="110">Tên đăng nhập</td>
    <td width="150">Email</td>
    <td width="100">Tham gia ngày</td>
    <td width="150">Địa chỉ</td>
    <td width="100">Trạng thái</td>
    <td colspan="2">Chọn chức năng</td>
  </tr>
<?
$start=$page*$number_of_sp;
$sqlsp="SELECT 
  MaKhach,
  TaiKhoan,
  Ho,
  Ten,
  Email,
  NgayDK,
  DiaChi,
  TrangThai
  FROM
  KhachHang
  ORDER BY
  MaKhach DESC
 LIMIT $start,$number_of_sp";
 //print $sqlsp;
$resultsp=mysql_query($sqlsp);
$numrow = mysql_num_rows($resultsp);
if($numrow==0) echo "Chưa có khách hàng nào";
else{
while($rowsp=mysql_fetch_array($resultsp)){
?>
  <tr align="center">
    <td><? echo $rowsp['MaKhach']?></td>
    <td><? echo $rowsp['Ho']." ".$rowsp['Ten']?></td>
    <td><? echo $rowsp['TaiKhoan']?></td>
    <td><? echo $rowsp['Email']?></td>
    <td><? echo $rowsp['NgayDK']?></td>
    <td><? echo $rowsp['DiaChi']?></td>
    <td><? if($rowsp['TrangThai']==0) echo"Không hoạt động";
											else echo"Hoạt động";
										?></td>
    <td width="45">
      <label>
      <input type="button" name="button" id="button" value="Xóa" onClick="confirm('Bạn muốn xóa không')==true?window.location='index.php?act=KH&func=xoa&cid=<?=$rowsp['MaKhach']?>':window.location='index.php?act=KH'" />
      </label>    </td>
    <td width="65"><label>
      <input type="button" name="button3" id="button3" value="Hóa đơn" onClick="window.location='index.php?act=HD&cid=<?=$rowsp['MaKhach']?>'" />
    </label></td>
  </tr>
<?  }
} ?>
</table>
<br/>
</body>
</html>
