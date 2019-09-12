<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
ul#menu_L {
  width: 180px;
  list-style-type: inherit;
  /*border-top: solid 1px #ffffff;*/
 margin-left:5px;
  padding: 15px 0 20px 0;
}

ul#menu_L ol {
  display: none;
  text-align:left;
  list-style-type: square;
  margin: 0;
  padding: 15px;
}
ul#menu_L a {
	font-family: "Times New Roman", Times, serif;
	font-size: 16px;
	color: #252525;
}

ul#menu_L a {
  text-decoration: underline;
  outline: none;
}
ul#menu_L a:hover {
  color: #FF9900;
 }

ul#menu_L a.active {
  color: #15aeef;
}
</style>
<script language="javascript">

if(!window.Node){
  var Node = {ELEMENT_NODE : 1, TEXT_NODE : 3};
}

function checkNode(node, filter){
  return (filter == null || node.nodeType == Node[filter] || node.nodeName.toUpperCase() == filter.toUpperCase());
}

function getChildren(node, filter){
  var result = new Array();
  var children = node.childNodes;
  for(var i = 0; i < children.length; i++){
    if(checkNode(children[i], filter)) result[result.length] = children[i];
  }
  return result;
}

function getChildrenByElement(node){
  return getChildren(node, "ELEMENT_NODE");
}

function getFirstChild(node, filter){
  var child;
  var children = node.childNodes;
  for(var i = 0; i < children.length; i++){
    child = children[i];
    if(checkNode(child, filter)) return child;
  }
  return null;
}

function getFirstChildByText(node){
  return getFirstChild(node, "TEXT_NODE");
}

function getNextSibling(node, filter){
  for(var sibling = node.nextSibling; sibling != null; sibling = sibling.nextSibling){
    if(checkNode(sibling, filter)) return sibling;
  }
  return null;
}
function getNextSiblingByElement(node){
        return getNextSibling(node, "ELEMENT_NODE");
}

// Menu Functions & Properties

var activeMenu = null;

function showMenu() {
  if(activeMenu){
    activeMenu.className = "";
    getNextSiblingByElement(activeMenu).style.display = "none";
  }
  if(this == activeMenu){
    activeMenu = null;
  } else {
    this.className = "active";
    getNextSiblingByElement(this).style.display = "block";
    activeMenu = this;
  }
  return false;
}

function initMenu(){
  var menus, menu, text, a, i;
  menus = getChildrenByElement(document.getElementById("menu_L"));
  for(i = 0; i < menus.length; i++){
    menu = menus[i];
    text = getFirstChildByText(menu);
    a = document.createElement("a");
    menu.replaceChild(a, text);
    a.appendChild(text);
    a.href = "#";
    a.onclick = showMenu;
    a.onfocus = function(){this.blur()};
  }
}

if(document.createElement) window.onload = initMenu;

</script>
</head>
<ul class="list" id="menu_L">
	
		
			<li><a href="index.php?mnu=SP">Tất cả</a></li>
			<? $resultnsx1 = mysql_query("select * from LoaiSP where TrangThai=1") or die (mysql_error());
while ($row = mysql_fetch_array($resultnsx1))
{?>
	
      <li><a href="index.php?mnu=SPLSP&MaLoaiSP=<? echo $row["MaLoaiSP"];?>"><? echo $row["TenLoaiSP"];?></a></li>
<? }?>
		
	                                     
</ul>
</html>
