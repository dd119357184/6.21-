/*
var flashdns	= '';
var pic_width	= 286;		// ��
var pic_height	= 237;		// ��
var button_pos	= 4;		// ��Ťλ�� 1�� 2�� 3�� 4��
var stop_time	= 4000;		// ͼƬͣ��ʱ��(1000Ϊ1����)
var show_text	= 1;		// �Ƿ���ʾ���ֱ�ǩ 1��ʾ 0����ʾ
var txtcolor	= '000000'; // ����ɫ
var bgcolor		= 'd5d5d5'; // ����ɫ
// bcastr_config=0xffffff:������ɫ|2:����λ��|0x004C9A:���ֱ�����ɫ|60:���ֱ���͸����|0xffffff:����������ɫ|0x004C9A:����Ĭ����ɫ|0x000033:������ǰ��ɫ|5:�Զ�����ʱ��(��)|2:ͼƬ����Ч��|1:�Ƿ���ʾ��ť|_blank:�򿪴���
var config='0xffffff'+	// ������ɫ
		'|2'+			// ����λ��
		'|0x004C9A'+	// ���ֱ�����ɫ
		'|60'+			// ���ֱ���͸����
		'|0xffffff'+	// ����������ɫ
		'|0x004C9A'+	// ����Ĭ����ɫ
		'|0x000033'+	// ������ǰ��ɫ
		'|4'+			// �Զ�����ʱ��(��)
		'|2'+			// ͼƬ����Ч��
		'|1'+			// �Ƿ���ʾ��ť
		'|_blank'+		// _blank�򿪴���
		'';
imgStr	= "201032618375571.jpg|2010326183635157.jpg|2010326183539789.jpg";
hrefSrr	= "./article/39.html|./article/37.html|./article/36.html";
textStr	= "ͼƬ�ֲ�ʾ��003|ͼƬ�ֲ�ʾ��002|ͼƬ�ֲ�ʾ��001";

OT_FlashImgTrun(1);
OT_FlashImgTrun(2);
OT_FlashImgTrun(3);
OT_FlashImgTrun(4);
*/

function OT_FlashImgTrun(num){
	var swf_height	= 0;
	var text_height	= 0;
	if (show_text==1){ 
		text_height=22;
		swf_height= pic_height+text_height;
	}else{
		swf_height= pic_height;
	}

	pics=imgStr;
	links=hrefSrr;
	texts=textStr;
	if (num==1 || num==2 || num==3){
		fvStr = 'pics='+ pics +'&links='+ links +'&texts='+ texts +'&borderwidth='+ pic_width +'&borderheight='+ pic_height +'&textheight='+ text_height +'';
	}else if (num==4){
		fvStr = 'bcastr_file='+ pics +'&bcastr_link='+ links +'&bcastr_title='+ texts +'&bcastr_config='+ config +'';
	}
	
	document.write(''+
	'<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cabversion=6,0,0,0" width="'+ pic_width +'" height="'+ swf_height +'">'+
	'<param name="allowScriptAccess" value="sameDomain">'+
	'<param name="movie" value="'+ flashdns +'imgTrun'+ num +'.swf">'+
	'<param name="quality" value="high">'+
	'<param name="bgcolor" value="'+ bgcolor +'">'+
	'<param name="menu" value="false">'+
	'<param name="wmode" value="opaque">'+
	'<param name="FlashVars" value="'+ fvStr +'">'+
		'<embed src="'+ flashdns +'imgTrun'+ num +'.swf" FlashVars="'+ fvStr +'" quality="high" width="'+ pic_width +'" height="'+ swf_height +'" allowScriptAccess="sameDomain"  wmode="opaque" menu="false" bgcolor="'+ bgcolor +'" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />'+
	'</object>'+
	'');
}