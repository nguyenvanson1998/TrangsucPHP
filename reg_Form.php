<?
include('inc/session_reg.php');
$msg = $_GET['msg'];
$msgcode=$_GET['msgcode'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" media="all" href="CSS/calendar-blue.css" title="win2k-cold-1" />
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/calendar-en.js"></script>
<script type="text/javascript" src="js/calendar-setup.js"></script>

<script language="javascript" type="text/javascript">
function checkform(form){
	with(form){
		ok=0;
		regname=/[a-zA-Z\s]{6}/
		if(!regname.test(username.value)){
			document.getElementById("tdusername").innerHTML="Tên đăng không được để trống và độ dài tối thiểu 6 ký tự chỉ gồm các ký tự A-Za-z";
			document.getElementById("tdusername").style.visibility="visible"
			ok++
		}
		regpass=/\d{6}/
		if((!regpass.test(pass.value))||(pass.value=='')){
			document.getElementById("tdpassword").innerHTML="Mật khẩu không để trống và độ dài ít nhất 6 ký tự";
			document.getElementById("tdpassword").style.visibility="visible"
			ok++
		}
		if(pass.value!=repass.value){
			document.getElementById("tdcpassword").innerHTML="Nhập lại mật khẩu đăng nhập"
			document.getElementById("tdcpassword").style.visibility="visible"
			ok++		
			}
		regmail=/\w+(\@)\w+(\.)\w+/
		if(!regmail.test(email.value)){
			document.getElementById("tdemail").innerHTML="Email không để trống và đinh dạng(username@domain) "
			document.getElementById("tdemail").style.visibility="visible"
			ok++
			}
		if(firstname.value==""){
			document.getElementById("tdfirstname").innerHTML="Họ không để trống và chỉ gồm các ký tự a-zA-Z"
			document.getElementById("tdfirstname").style.visibility="visible"
			ok++
		}
		if(lastname.value==""){
			document.getElementById("tdlastname").innerHTML="Tên không để trống và chỉ gồm các ký tự a-zA-Z"
			document.getElementById("tdlastname").style.visibility="visible"
			ok++
		}
		if(company.value==""){
			document.getElementById("tdcompany").innerHTML="Tên công ty không để trống"
			document.getElementById("tdcompany").style.visibility="visible"
			ok++
		}
		if(phone.value==""){
			document.getElementById("tdphone").innerHTML="Số điện thoại không để trống và có định dạng(0xxxxxxxxx)"
			document.getElementById("tdphone").style.visibility="visible"
			ok++
		}
		if(fax.value==""){
			document.getElementById("tdmobile").innerHTML="Số fax không để trống và có định dạng (0xxxxxxxxx)"
			document.getElementById("tdmobile").style.visibility="visible"
			ok++
		}
		if(address.value==""){
			document.getElementById("tdaddress").innerHTML="Địa chỉ không để trống"
			document.getElementById("tdaddress").style.visibility="visible"
			ok++
		}
		if(ok!=0) return false
		//else return true;	
	}
	return true	
}
</script>
<style type="text/css">
<!--
.style20 {color: #FF0000}
.style21 {color: #FFFFFF}
.style22 {color: #FF3300}
-->
</style>
<script language="javascript" src="js/ajax.js"></script>
</head>

<body>
<form name="formreg" method="post" action="reg_process.php">
<fieldset>
  <table width="100%" border="0" bgcolor="#FFFFFF" class="stylewhite">
  	<tr>
    <td colspan="2"><? echo $msg; ?></td>
    </tr>
    <tr>
      <td colspan="2" >
      <table width="100%" height="28">
      <tr>
      <td width="100%" align="center" background="Images/Tool_bar1.jpg"><span> &nbsp; &nbsp; &nbsp; <span class="style21">&nbsp;</span></span><span style="color: #FFFFFF"><fontstyle="font-size:14px">
	  <b>Đăng ký tài khoản mới</b></font></span></td>
      <td width="27%"></td>
      </tr>
      </table>
      </td>
    </tr>
    <tr>
    <td colspan="2" align="center"><span class="style22">C&aacute;c d&ograve;ng &#273;&#432;&#7907;c ghi ch&uacute; m&agrave;u &#273;&#7887; kh&ocirc;ng &#273;&#432;&#7907;c &#273;&#7875; tr&#7889;ng!</span></td>
    </tr>
    <tr>
      <td width="29%" height="28" align="right">T&ecirc;n &#273;&#259;ng nh&#7853;p:</td>
      <td width="71%"><input name="username" type="text" size="30" value="<?=$_SESSION['reg_username'];?>" id="usr" onKeyUp="showHint(this.value)"/>
        <span class="style20">*</span></td>
    </tr>
    <tr>
    <td></td>
    <td id="tdusername" style="color:red;"><div id="checkuser"></div></td>
    </tr>
	 <tr>
      <td width="29%" height="23" align="right">M&#7853;t kh&#7849;u:</td>
      <td width="71%"><input name="pass" type="password"  size="30" id="pass" onFocus="document.getElementById('tdpassword').style.visibility='hidden'"/>
       <span class="style20">*</span></td>
    </tr>
    <tr>
    <td></td>
    <td id="tdpassword" style="color:red; visibility:hidden"></td>
    </tr>
	<tr>
      <td width="29%" height="23" align="right">Nh&#7853;p l&#7841;i m&#7853;t kh&#7849;u:</td>
      <td width="71%"><input name="repass" type="password" size="30" onFocus="document.getElementById('tdcpassword').style.visibility='hidden'"/>
      <span class="style20">*</span></td>
    </tr>
    <tr>
    <td></td>
    <td id="tdcpassword" style="color:red; visibility:hidden"></td>
    </tr>
	<tr>
      <td width="29%" align="right">Email:</td>
      <td width="71%"><input name="email" type="text" size="30" value="<?=$_SESSION['reg_email'];?>" onFocus="document.getElementById('tdemail').style.visibility='hidden'" />
      <span class="style20">*</span></td>
    </tr>
    <tr>
    <td></td>
    <td id="tdemail" style="color:red; visibility:hidden"></td>
    </tr>
	<tr>
      <td width="29%" align="right">H&#7885;:</td>
      <td width="71%"><input name="firstname" type="text" size="30" value="<?=$_SESSION['reg_ho'];?>" onFocus="document.getElementById('tdfirstname').style.visibility='hidden'" />
      <span class="style20">*</span></td>
    </tr>
    <tr>
    <td></td>
    <td id="tdfirstname" style="color:red; visibility:hidden"></td>
    </tr>
	<tr>
      <td width="29%" align="right">T&ecirc;n:</td>
      <td width="71%"><input name="lastname" type="text" size="30" value="<?=$_SESSION['reg_ten'];?>" onFocus="document.getElementById('tdlastname').style.visibility='hidden'" />
      <span class="style20">*</span></td>
    </tr>
    <tr>
    <td></td>
    <td id="tdlastname" style="color:red; visibility:hidden"></td>
    </tr>
	<tr>
      <td width="29%" align="right">Ng&agrave;y Sinh:</td>
 		<td>
			<input type="text" name="birthday" id="birthday" readonly="1" value="<?=$_SESSION['reg_ngaysinh'];?>" />
 			<img src="images/img.gif" id="anh" style="cursor: pointer;"/>
		</td>
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
            </script>
    <tr>
    <td align="right">&#272;i&#7879;n tho&#7841;i:</td>
    <td><label><input name="phone" type="text" value="<?=$_SESSION['reg_dienthoai'];?>" size="30" onFocus="document.getElementById('tdphone').style.visibility='hidden'"/>
        <span class="style20">*</span></label></td>
    </tr>
      <tr>
    <td></td>
    <td id="tdphone" style="color:red; visibility:hidden"></td>
    </tr>
     <tr>
    <td align="right">Số máy Fax:</td>
    <td><label><input name="fax" type="text" id="fax" onFocus="document.getElementById('tdmobile').style.visibility='hidden'" value="<?=$_SESSION['reg_fax'];?>" size="30"/>
        <span class="style20">*</span></label></td>
    </tr>
      <tr>
    <td></td>
    <td id="tdmobile" style="color:red; visibility:hidden"></td>
    </tr>
	<tr>
      <td width="29%" align="right">C&ocirc;ng ty:</td>
      <td width="71%"><input name="company" type="text" size="30" value="<?=$_SESSION['reg_congty'];?>" onFocus="document.getElementById('tdcompany').style.visibility='hidden'" />
      <span class="style20">*</span></td>
    </tr>
    <tr>
    <td></td>
    <td id="tdcompany" style="color:red; visibility:hidden"></td>
    </tr>
	<tr>
      <td width="29%" align="right">Tỉnh:</td>
      <td width="71%"><select name="city">
      	<option value="">Chọn thành phố</option>
	  	<option value="An Giang">An Giang</option>
	  	<option value="Bà Rịa Vũng Tàu">Bà Rịa Vũng Tàu</option>
	  	<option value="Bắc Giang">Bắc Giang</option>
	  	<option value="Bắc Kạn">Bắc Kạn</option>
	  	<option value="Bạc Liêu">Bạc Liêu</option>
	  	<option value="Bắc Ninh">Bắc Ninh</option>
	  	<option value="Bến Tre">Bến Tre</option>
	  	<option value="Bình Dương">Bình Dương</option>
	  	<option value="Bình Phước">Bình Phước</option>
	  	<option value="Bình Thuận">Bình Thuận</option>
	  	<option value="Bình Định">Bình Định</option>
		<option value="Cà Mau">Cà Mau</option>
		<option value="Cao Bằng">Cao Bằng</option>
		<option value="Gia Lai">Gia Lai</option>
		<option value="Hà Giang">Hà Giang</option>
		<option value="Hà Nội">Hà Nội</option>
		<option value="Hà Tĩnh">Hà Tĩnh</option>
		<option value="Hải Dương">Hải Dương</option>
		<option value="Hải Phòng">Hải Phòng</option>
		<option value="Hậu Giang">Hậu Giang</option>
		<option value="Hồ Chí Minh">Hồ Chí Minh</option>
		<option value="Hòa Bình">Hòa Bình</option>
		<option value="Huế">Huế</option>
		<option value="Hưng Yên">Hưng Yên</option>
		<option value="Khánh Hòa">Khánh Hòa</option>
		<option value="Kiên Giang">Kiên Giang</option>
		<option value="Kom Tum">Kom Tum</option>
		<option value="Lai Châu">Lai Châu</option>
		<option value="Lâm Đồng">Lâm Đồng</option>
		<option value="Lạng Sơn">Lạng Sơn</option>
		<option value="Long An">Long An</option>
		<option value="Nam Định">Nam Định</option>
		<option value="Nghệ An">Nghệ An</option>
		<option value="Ninh Bình">Ninh Bình</option>
		<option value="Ninh Thuận">Ninh Thuận</option>
		<option value="Phú Thọ">Phú Thọ</option>
		<option value="Quảng Bình">Quảng Bình</option>
		<option value="Quảng Nam">Quảng Nam</option>
		<option value="Quảng Ngãi">Quảng Ngãi</option>
		<option value="Quảng Ninh">Quảng Ninh</option>
		<option value="Quảng Trị">Quảng Trị</option>
		<option value="Sóc Trăng">Sóc Trăng</option>
		<option value="Sơn La">Sơn La</option>
		<option value="Tây Ninh">Tây Ninh</option>
		<option value="Thái Bình">Thái Bình</option>
		<option value="Thái Nguyên">Thái Nguyên</option>
		<option value="Thanh Hóa">Thanh Hóa</option>
		<option value="Tiền Giang">Tiền Giang</option>
		<option value="Trà Vinh">Trà Vinh</option>
		<option value="Vĩnh Long">Vĩnh Long</option>
		<option value="Vĩnh Phúc">Vĩnh Phúc</option>
		<option value="Yên Bái">Yên Bái</option>
		<option value="Đằ Nẵng">Đằ Nẵng</option>
		<option value="Ðắc Lắc">Ðắc Lắc</option>
		<option value="Ðắk Nông">Ðắk Nông</option>
		<option value="Ðồng Nai">Ðồng Nai</option>
		<option value="Ðồng Tháp">Ðồng Tháp</option>
		<option value="Điện Biên">Điện Biên</option>		
	  </select></td>
    </tr>
    <tr>
      <td width="29%" align="right">&#272;&#7883;a ch&#7881;:</td>
      <td width="71%"><input name="address" type="text" size="30" value="<?=$_SESSION['reg_diachi'];?>" onFocus="document.getElementById('tdaddress').style.visibility='hidden'" />
      <span class="style20">*</span></td>
    </tr>
    <tr>
    <td></td>
    <td id="tdaddress" style="color:red; visibility:hidden"></td>
    </tr>
    <tr>
      <td width="29%" align="right">Gi&#7899;i t&iacute;nh:</td>
      <td width="71%"><p>
          <input type="radio" name="gender" value="0" checked="checked" />
          Nam
          <input type="radio" name="gender" value="1" />
          N&#7919;
      </p></td>
    </tr>
    <tr>
      <td width="29%"></td>
      <td width="71%"><img src="inc/CaptchaSecurityImages.php?width=100&height=40&characters=6" /></td>
    </tr>
    <tr>
      <td width="29%" align="right">M&atilde; an to&agrave;n:</td>
      <td width="71%">
      <input name="securitycode" type="text" size="5" maxlength="6" onFocus="document.getElementById('tdsecuritycode').style.visibility='hidden'"/>
      <span class="style22">
      (Nh&#7853;p c&aacute;c k&yacute; t&#7921; nh&igrave;n th&#7845;y tr&ecirc;n &#7843;nh)</span></td>
    </tr>
    <tr>
    <td></td>
    <td id="tdsecuritycode" style="color:red;"><? echo $msgcode;?></td>
    </tr>
    <tr>
      <td>
      </td>
      <td>
	  <table>
	  <tr>
	  <td><input type="submit"  class="button_" name="submit" value="Đăng ký" onClick="return checkform(this.form);" id="button" /></td>
      <td><input type="reset"  class="button_" name="lamlai" value="L&agrave;m l&#7841;i" /></td>
	  </tr>
	  </table>
	  </td>
    </tr>
  </table>
  </fieldset>
</form>
</body>
</html>