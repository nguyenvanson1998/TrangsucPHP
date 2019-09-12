<? session_start() ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sdasdasdsa</title>
</head>

<body>
<? require_once('../inc/conn.php') ?>


<? 
   $id = $_REQUEST['NSXId'];
   $name = $_REQUEST['NSXName'];
   $DC = $_REQUEST['DiaChi'];
   $SDT = $_REQUEST['SoDT'];
   $select = $_REQUEST['select'];

   if($select == 'edit')
   {
		  if($conn)
		  { 
			mysql_select_db($database_cnn, $conn);
			$query = "UPDATE NSX 
							  SET NSXName = '".$name."',
								  DiaChi = '".$DC."',
								  SoDT='".$SDT."'
							  WHERE NSXId =".$id."";
			mysql_query($query, $conn) or die(mysql_error());
			echo ("<script> alert ('Sửa hãng sản xuất có ID= ".$id." thành công'); </script>");
			include('NSX_Form.php');  
		  }
		  else
		  {
			echo "Connect sever fail";
			return false;
			include('');
		  }
   }
   
   else if($select == 'delete')
   {
   echo (" <script> alert ('Chua lam'); </script> ");
   /*
		  if($conn)
		  {
			//kiem tra tac gia co sach chua
			$sql="SELECT BId FROM bookauthor WHERE AuId=".$auid;
			$rs_tg=mysql_query($sqltg) or die(mysql_error());
			$rowtg=mysql_num_rows($rs_tg);
			if($rowtg){
				echo "Không thể xóa tác giả này";
				include('form_author.php');
				}else{
			mysql_select_db($database_cnn, $conn);
			$query = "DELETE FROM author WHERE AuId = ".$auid." ";
			mysql_query($query, $conn) or die(mysql_error());
			echo " Đã xoá tác giả có ID = ".$auid;
			include('Form_author.php');
		  }
		 }
		  else
		  {
			echo "Connect sever fail";
			return false;
			include('');
		  }
   */
   }
   
   else if($select == 'ok')
   {
		 if($conn)
		 {
		   mysql_select_db($database_cnn, $conn);
		   $query = "INSERT INTO nsx(NSXName,DiaChi,SoDT) VALUES('".$name."','".$DC."','".$SDT."') ";
		   mysql_query($query, $conn) or die(mysql_error());
		   echo ("<script> alert('Tạo mới thành công'); </script>");
		   include('NSX_Form.php');
		 }
		 else
		 {
		   echo "Connect fail";
		   include('');
		 }
   }
   
	else
	{
	   include('NSX_Form.php');
	}

?>
</body>
</html>

