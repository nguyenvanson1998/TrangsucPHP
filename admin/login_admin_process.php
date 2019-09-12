<?
	session_start();
	require_once('../inc/conn.php');
?>
<?
	
		mysql_select_db($database_cnn,$conn);
		
		$usr = $_REQUEST["adminname"];
		$pwd = $_REQUEST["passwordadmin"];
		$flag = false;
		$sql = "SELECT * FROM admin WHERE UserName='".$usr."' AND PassWord='".($pwd)."'";
		//Kiem tra xem admin da ton tai trong CSDL chua
		$result = mysql_query($sql,$conn);
		while($row = mysql_fetch_array($result)){
			$flag = true;
			$_SESSION["flag"] = "true";
			$_SESSION["admin"]=$row['UserName'];
		}
		if($flag){
			header("location:index.php");
		}else header("location: login.php");
		mysql_free_result($result);
		mysql_close($conn);
?>
        
