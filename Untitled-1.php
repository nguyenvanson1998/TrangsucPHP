<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<td  align="right">
		<select size="1" name="nsx" style="width:170">
		<option value="">-- Ch?n nhà s?n xu?t --</option>
<? 
$result = mysql_query("select * from NSX") or
die (mysql_error());
while ($row = mysql_fetch_array($result))
{?>
		<option value="<? echo $row["NSXId"];?>" ><? echo $row["NSXName"];?></option>
<?
}
?>
		</select>          </td>
<body>
</body>
</html>
