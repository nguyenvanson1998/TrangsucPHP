<?
	switch ($mnu){
		case "SP":
				include "list_SP.php";
		break;
		case "SPNSX":
				include "list_SPNSX.php";
		break;
		case "SPLSP":
				include "list_SPLSP.php";
		break;
		case "dangnhap": {
			include "login_process.php";
		break;
		}
		case "checklogin": {
			include "checklogin.php";
		break;
		}
		case "dangky": {
			switch($action){
				case "err":
				include "reg_form.php";
				break;
				case "ok":
				include "reg_process.php";
				break;
				default:
				include "reg_form.php";
				break;
			}
		break;
		}
		case "lienhe": {
			include "lienhe_form.php";
		break;
		}
		case "gioithieu": {
			include "gioithieu.php";
		break;
		}
		case "huongdan": {
			include "huongdan.php";
		break;
		}
		case "YKPH": {
			switch($action){
				case "ok":
				include "YKPH_process.php";
				break;
				case "view":
				include "YKPH_answer.php";
				break;
				default:
				include "YKPH_form.php";
				break;
			}
		break;
		}
		case "chitiet": {
			include "sp_view.php";
		break;
		}
		case "TT": {
			include "tintucview.php";
		break;
		}
		case "TTCT": {
			include "tintucviewdetail.php";
		break;
		}
		case "STTCN": {
			include "STTCN_form.php";
		break;
		}
		case "SMK": {
			include "SMK_form.php";
		break;
		}
		case "success": {
			include "order_success.php";
		break;
		}
		case "viewOrder":{
			switch($func){
				case "detail":
				include "ordersviewdetail.php";
				break;
				default:
				include "ordersview.php";
			break;
			}
		break;
		}
		case "timkiem": {
			include "timkiem.php";
		break;
		}
		default:
			include "center.php";
		break;
	}
?>