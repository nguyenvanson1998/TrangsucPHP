<?
   switch ($act){
		case "LoaiSP":{
			switch($func){
					case "add":
					include "LoaiSP_add.php";
					break;
					case "process":
					include "LoaiSP_process.php";
					break;
					default:
					include "LoaiSP_Form.php";
					break;
			}		
		break;
		}	
		case "SP":{
			switch($func){
					case "add":
					include "SP_add.php";
					break;
					case "edit":
					include "SP_edit.php";
					break;
					case "editSP":
					include "SP_process.php";
					break;
					case "xoa":
					include "SP_process.php";
					break;
					case "process":
					include "SP_process.php";
					break;
					case "detail":
					include "SP_detail.php";
					break;
					default:
					include "SP_Form.php";
					break;
			}		
		break;
		}
		case "KH":{
		switch($func){
			case "xoa":
			include "khachhang_process.php";
			break;
			default:
			include "Khachhang_Form.php";
			break;
			}
		break;
		}
		case "HD":{
			switch($func){
					case "xoa":
					include "order_process.php";
					break;
					case "process":
					include "order_process.php";
					break;
					case "edit":
					include "order_edit.php";
					break;
					default:
					include "order_form.php";
			break;
			}		
		break;
		}	
		case "NSX":{
			switch($func){
					case "add":
					include "NSX_add.php";
					break;
					case "process":
					include "NSX_process.php";
					break;
					default:
					include "NSX_Form.php";
					break;
			}		
		break;
		}	
		case "PTVC":{
			switch($func){
					case "add":
					include "Vanchuyen_add.php";
					break;
					case "process":
					include "Vanchuyen_process.php";
					break;
					default:
					include "Vanchuyen_Form.php";
					break;
			}
		break;
		}
		case "PTTT":{
			switch($func){
					case "add":
					include "Thanhtoan_add.php";
					break;
					case "process":
					include "Thanhtoan_process.php";
					break;
					default:
					include "Thanhtoan_Form.php";
					break;
			}
		break;
		}
		case "YKPH":{
			switch($func){
				case "add":
				include "YKPH_add.php";
				break;
				case "process":
				include "YKPH_process.php";
				break;
				default:
				include "YKPH_Form.php";
				break;
			}
		break;
		}
		case "LoaiTT":{
			switch($func){
				case "add":
				include "LoaiTT_add.php";
				break;
				case "process":
				include "LoaiTT_process.php";
				break;
				default:
				include "LoaiTT_Form.php";
				break;
			}
		break;
		}		
		case "TT":{
			switch($func){
				case "add":
				include "Tintuc_add.php";
				break;
				case "process":
				include "Tintuc_process.php";
				break;
				case "xoa":
				include "Tintuc_process.php";
				break;
				case "edit":
				include "Tintuc_edit.php";
				break;
				default:
				include "Tintuc_Form.php";
				break;
			}
		break;
		}
		case "QC":{
			switch($func){
				case "add":
				include "Quangcao_add.php";
				break;
				case "process":
				include "Quangcao_process.php";
				break;
				default:
				include "Quangcao_Form.php";
				break;
			}
		break;
		}	
		case "QLA":{
		break;
		}	
		case "SMK":{
		break;
		}			
	}
?>    