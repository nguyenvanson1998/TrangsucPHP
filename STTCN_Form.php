<?
session_start();
require_once('inc/conn.php');
if(!isset($_POST['dongy'])){
?>
<link rel="stylesheet" type="text/css" media="all" href="css/calendar-blue.css" title="win2k-cold-1" />
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/calendar-en.js"></script>
<script type="text/javascript" src="js/calendar-setup.js"></script> 
<script language="javascript" type="text/javascript">

	function hidden()
	{
		i=form.check2.checked;
		if(i)
		{ 
		form.dongy.disabled=false;
		}
		else form.dongy.disabled=true;
	
	}
	function hidden1(){
	
		if(form.check.checked == false)
		{ 
		  document.getElementById('changepass').style.visibility=visible ;
		}
		else document.getElementById('changepass').style.visibility=hidden ;
	
	}	
	function kiemtra(){
	if(form.email.value==""){
			document.getElementById("mail").innerText="Email không được để trống!";
			form.email.focus();
			return false;
	} else document.getElementById("mail").innerText="";
	
	// bat loi email khong hop le
	reemail=/^\w+(\.\w+)*@\w+(\.\w+)+$/
	if(reemail.test(form.email.value)==false)
	{
			document.getElementById("mail").innerText="Email không hợp lệ: UserName@DomainName";
			form.email.select();
			form.email.focus();
			return false;
	} else document.getElementById("mail").innerText="";
	if(form.lastname.value==""){
			document.getElementById("ho").innerText="Tên không được để trống!";
			form.lastname.focus();
			return false;
	} else document.getElementById("ho").innerText="";

	if(form.firstname.value==""){
			document.getElementById("ten").innerText="Họ không được để trống!";
			form.firstname.focus();
			return false;
	} else document.getElementById("ten").innerText="";
	
	if(form.phone.value==""){
			document.getElementById("cd").innerText="Số ĐT không được để trống!";
			form.phone.focus();
			return false;
	}   else document.getElementById("cd").innerText="";
	if(isNaN(form.phone.value)==true)	{			
			document.getElementById("cd").innerText="Số ĐT không hợp lệ!";
			form.phone.focus();
			return false;
	}  else document.getElementById("cd").innerText="";
	
	if(form.mobile.value==""){			
			document.getElementById("dd").innerText="Số ĐT không hợp lệ!";
			form.mobile.focus();
			return false;
	}  else document.getElementById("dd").innerText="";
	if(isNaN(form.mobile.value)==true)	{			
			document.getElementById("dd").innerText="Số ĐT không hợp lệ!";
			form.mobile.select();
			form.mobile.focus();
			return false;
	}  else document.getElementById("dd").innerText="";
	
	if(form.address.value==""){
			document.getElementById("dc").innerText="Địa chỉ không được để trống!";
			form.address.focus();
			return false;
	} else document.getElementById("dc").innerText="";
	
	if(form.check.checked==true)
	{		
		if(form.password1.value=="")
		{
			document.getElementById("pass").innerText="Mật khẩu không được để trống";
			form.password1.focus();
			return false;
		} else document.getElementById("pass").innerText="";
		
		regpass=/\w{6,20}/;
		if(regpass.test(form.password1.value)==false){
			document.getElementById("pass").innerText="Hãy nhập ít nhất 6 kí tự!";
			form.password1.select();
			form.password1.focus();
			return false;
		} else document.getElementById("pass").innerText="";
		
		if(form.password1.value!=form.password2.value){
			document.getElementById("repass").innerText="Mật khẩu xác nhận sai!";
			form.password2.select();
			form.password2.focus();
			return false;
		} else document.getElementById("repass").innerText="";
	}
	
	// tat ca cac kiem tra deu ok
	return true;
}
</script>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style4 {font-size: 13px}
.style5 {color: #FFFFFF; font-size: 13px; }
-->
</style>
<form name="form" method="post" action="" onsubmit="return kiemtra()">
<table width="100%" border="0" align="center">
  <tr>
  <td colspan="2">
  <table width="100%" height="28">
      <tr>
      <td width="100%" height="24" background="Images/Tool_bar1.jpg" style="background-repeat:no-repeat"><div align="center"><span class="style1"> &nbsp;&nbsp;&nbsp;<span class="style4"> &nbsp;</span></span>
            <span class="style5"><font style"font-size:14px"><b>Sửa thông tin cá nhân</b></font><font style"font-size:14px"><b></b></font></span></div></td>
      
      </tr>
      </table></td>
    </tr>
  <tr>
    <td width="143" align="right">T&ecirc;n &#273;&#259;ng nh&#7853;p:</td>
    <td width="293"><? echo $_SESSION["TaiKhoan"];?></td>
  </tr>
  <tr>
    <td align="right">Email:</td>
    <td><input name="email" type="text" size="30" value="<?=$_SESSION["Email"];?>"/></td>
  </tr>
  <tr>
    <td></td><td><span id="mail" style="color:red"></span></td>
  </tr>
  <tr>
    <td align="right">H&#7885;:</td>
    <td><input name="firstname" type="text" size="30" value="<?=$_SESSION["Ho"];?>"/></td>
  </tr>
  <tr>
    <td></td><td><span id="ho" style="color:red"></span></td>
    </tr>
  <tr>
    <td align="right">T&ecirc;n:</td>
    <td><input name="lastname" type="text" size="30" value="<?=$_SESSION["Ten"];?>"/></td>
  </tr>
  <tr>
    <td></td><td><span id="ten" style="color:red"></span></td>
    </tr>
  <tr>
    <td align="right">Ng&agrave;y Sinh</td>
    <td>
 		<input type="text" name="birthday" id="birthday" readonly="1" value="<?=$_SESSION["NgaySinh"];?>" /><img src="images/img.gif" id="anh" style="cursor: pointer;"/></td>
        <script type="text/javascript">
    	Calendar.setup(
		{
        inputField:"birthday",     // id of the input field
        ifFormat:"%Y-%m-%d",      // format of the input field
        button:"anh",  // trigger for the calendar (button ID)
        align:"Tl",           // alignment (defaults to "Bl")
        singleClick:true
    }
	);
</script></td>
  </tr>
  <tr>
    <td align="right">&#272;i&#7879;n tho&#7841;i:</td>
    <td><input name="phone" type="text" size="30" value="<?=$_SESSION["SoDT"];?>"/></td>
  </tr>
  <tr>
    <td></td><td><span id="cd" style="color:red"></span></td>
    </tr>
  <tr>
    <td align="right">Số fax:</td>
    <td><input name="fax" type="text" size="30" value="<?=$_SESSION["SoFax"];?>"/></td>
  </tr>
  <tr>
    <td></td><td><span id="dd" style="color:red"></span></td>
    </tr>
  <tr>
    <td align="right">Công ty:</td>
    <td><input name="company" type="text" value="<?=$_SESSION["CongTy"];?>" size="30"/>
    	
    </td>
  </tr>
  <tr>
    <td align="right">Thành phố:</td>
    <td><input name="city" type="text" size="30" value="<?=$_SESSION["ThanhPho"];?>"/>
    </td>
  </tr>
  <tr>
    <td colspan="2" id="tinh" style="visibility:hidden"></td>
    </tr>
  <tr>
    <td align="right">Địa chỉ</td>
    <td><input name="address" type="text" size="30" value="<?=$_SESSION["DiaChi"];?>"/></td>
  </tr>
  <tr>
    <td></td><td><span id="dc" style="color:red"></span></td>
    </tr>
  <tr>
    <td align="right">Giới tính:</td>
    <td>
	<input type="radio" name="gender" value="0"/>
    Nam
      <input type="radio" name="gender" value="1"/>
      Nữ</td>
  </tr>
  <tr>
    <td colspan="2"  align="center"><a href="?mnu=SMK" >Thay đổi mật khẩu đăng nhập</a></td>
    </tr>
  <tr>
    <td colspan="2" align="center"><input type="checkbox" name="check2" onclick="return hidden();"/>
Tôi đồng ý thay đổi thông tin cá nhân?</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input class="button_left" type="submit" value="Đồng ý"  name="dongy" /></td>
  </tr>
</table>
</form>
<?
}else{
mysql_select_db($database_cnn, $conn);
	$email      = $_REQUEST["email"];
    $firstname  = $_REQUEST["firstname"];
	$lastname   = $_REQUEST["lastname"];
	$birthday   = $_REQUEST["birthday"];
	$phone      = $_REQUEST["phone"];
	$fax     	= $_REQUEST["fax"];
	$company    = $_REQUEST["company"];
	$city       = $_REQUEST["city"];
	$address    = $_REQUEST["address"];
	$gender     = $_REQUEST["gender"];
	
	$sql_update = "UPDATE KhachHang SET 
							Ho ='".$firstname."',
							Ten = '".$lastname."', 
							Email='".$email."',
							SoDT='".$phone."', 
							SoFax='".$fax."',  
							NgaySinh ='".$birthday."',
							CongTy = '".$company."', 
							ThanhPho='".$city."', 
							DiaChi='".$address."', 
							GioiTinh=".$gender."
					WHERE MaKhach=".$_SESSION["MaKhach"];
	$result = mysql_query($sql_update, $conn) or die(mysql_error());
		if($result){
		  		echo ("<script>alert('Thay đổi thông tin thành công!')</script>");
		 		echo("<script>window.location='index.php'</script>");
		}
		  		else echo "Không thành công!";
	}
?>
