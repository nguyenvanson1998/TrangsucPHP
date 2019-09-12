<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		 <style type="text/css">
<!--
.style1 {font-size: 13px}
-->
         </style>
		 <form action="index.php?mnu=timkiem" method="post">
            <table align="center" >
                
				<tr>
					<td width="190" height="24" background="Images/Tool_bar1.jpg" style="background-repeat:no-repeat">
					
					 <div class="title">
					   <div align="center" class="style1"><span style="color: #FFFFFF"><font>Tìm kiếm nâng cao</font></span></div>
					 </div>				  </td>
				</tr>
				
				<tr><td height="5"></td></tr>
				
                  <tr>
                    <td  align="left">
					<font color="#252525" >
						Tên: <input type="text" name="TenSP" /></font>
					</td>
					</tr>
					
					<tr><td height="5"></td></tr>
			<tr>					
					<td  align="center" >
				<select size="1" name="nsx" style="width:165">
				<option value="">-- Chọn nhà cung cấp ---</option>
		<? 
		$result = mysql_query("select * from NSX") or
		die (mysql_error());
		while ($row = mysql_fetch_array($result))
		{?>
				<option value="<? echo $row["NSXId"];?>" ><? echo $row["NSXName"];?></option>
		<?
		}
		?>
				</select>          
				</td> 
		  </tr>
		  
		  <tr><td height="5"></td></tr>
		  <tr>
                    <td align="center" >

		<select size="1" name="LoaiSP" style="width:165">
		<option value=""> -- Chọn  kiểu  trang sức -- </option>
<? 
$result = mysql_query("select * from LoaiSP order by MaLoaiSP") or
die (mysql_error());
while ($row = mysql_fetch_array($result))
{?>
		<option value="<? echo $row["MaLoaiSP"];?>"><? echo $row["TenLoaiSP"];?></option>
<?
}
?>
		</select>          </td>
                  </tr>
				  <tr><td height="5"></td></tr>
				  <tr>
                    <td align="center">

		<select size="1" name="HamLuong" style="width:165">
		<option value=""> ------ Chọn chất liệu ------ </option>
<? 
$result = mysql_query("select distinct(HamLuong) from SanPham order by HamLuong") or
die (mysql_error());
while ($row = mysql_fetch_array($result))
{?>
		<option value="<? echo $row["HamLuong"];?>"><? echo $row["HamLuong"];?></option>
<?
}
?>
		</select>          </td>
                  </tr> 		  
		  <tr><td height="5"></td></tr>		     		  
                  <tr>
                    <td align="center">
                        <select size="1" select name="Gia" style="width:165">
                          <option value="">------ Chọn mức giá ------</option>
                          <option value="1">&lt; 1000000vnđ</option>
                          <option value="2">1000000vnđ-2000,000vnđ</option>
                          <option value="3">2000000vnđ-5000,000vnđ</option>
                          <option value="4">&gt; 5000,000vnđ</option>
                        </select>                    </td>
                  </tr>
                  <tr><td height="5"></td></tr>
                  <tr>
                    <td align="center" >
					
			          <div align="left">
			            <input class="button_" type="submit" value="Tìm kiếm">
	                </div></td>
                  </tr>

            </table>
			</form>	