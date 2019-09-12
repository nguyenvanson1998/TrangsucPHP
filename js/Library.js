
<!--
var fBrw=(navigator.userAgent.indexOf('MSIE')!= -1 && navigator.userAgent.indexOf('Windows')!= -1);
var RefBanner = new Array();
var RefAdLogo = new Array();
var RefAdLBox = new Array();
var RefAdStay = 0;
var RefAdIcon = new Array();
var SkpFolder = true;
var CurBanner = 0;

if (typeof(PageHost) == 'undefined')
{
	var PageHost = '';
}

if (window.parent!=window)
{
	window.open(location.href, '_top', '');
}


function FP_openNewWindow(w,h,nav,loc,sts,menu,scroll,resize,name,url) {//v1.0
 var windowProperties=''; if(nav==false) windowProperties+='toolbar=no,'; else
  windowProperties+='toolbar=yes,'; if(loc==false) windowProperties+='location=no,'; 
 else windowProperties+='location=yes,'; if(sts==false) windowProperties+='status=no,';
 else windowProperties+='status=yes,'; if(menu==false) windowProperties+='menubar=no,';
 else windowProperties+='menubar=yes,'; if(scroll==false) windowProperties+='scrollbars=no,';
 else windowProperties+='scrollbars=yes,'; if(resize==false) windowProperties+='resizable=no,';
 else windowProperties+='resizable=yes,'; if(w!="") windowProperties+='width='+w+',';
 if(h!="") windowProperties+='height='+h; if(windowProperties!="") { 
  if( windowProperties.charAt(windowProperties.length-1)==',') 
   windowProperties=windowProperties.substring(0,windowProperties.length-1); } 
 newwin=window.open(url,name,windowProperties);
	newwin.document.writeln('<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">');
	newwin.document.writeln('<a href="JavaScript:window.close()"><img src="', url, '" alt="', (fBrw) ? 'Close this Window!' : 'Dong lai', '" border=0></a>');
	newwin.document.writeln('</body>');
}
// -->
