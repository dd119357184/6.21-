// ��ȡԪ��id
function $id(str){
	return document.getElementById(str);
}

// ��ȡԪ��name
function $name(str){
	return document.getElementsByName(str);
}

// ��Option��textֵ����toID�ı���
// Ӧ������ onchange="OptionTextTo('labItemID','labItemName');"
function OptionTextTo(sourceID,toID){
	document.getElementById(toID).value=document.getElementById(sourceID).options[document.getElementById(sourceID).selectedIndex].text;
}


// �����ַ������ֽ���
/*function Str_Byte(str){
	strLen = str.length;
	//str=str.replace(/[^\w\u4E00-\u9FA5]/g, '')
	str=str.replace(/[^\x00-\xff]/g, '');
	strLen2 = str.length;
	strTotalLen = strLen2 + (strLen - strLen2) * 2;
	return strTotalLen;
}*/

// �ж��Ƿ��������
function Str_IsSign(str){
	var txt=new RegExp("[ ,\\`,\\~,\\!,\\@,\#,\\$,\\%,\\^,\\+,\\*,\\&,\\\\,\\/,\\?,\\|,\\:,\\.,\\<,\\>,\\{,\\},\\(,\\),\\',\\;,\\=,\"]");
    //�����ַ�������ʽ
    if (txt.test(str)){
        return true;
    }else{
		return false;
	}
}


// �����ַ������ֽ���
function Str_Byte(str){
	var newStr = 0;
	newStr=str.replace(/[^\u0000-\u00ff]/g, '***');
	return newStr.length;
}

// �������ĺϷ��ԡ����Ϸ�������-1
function IsMail(str){
	if (str.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)!=-1){
		return true;
	}else{
		return false;
	}
}

// ����ļ����Ƿ�ΪͼƬ�ļ�
function IsImgFile(fileValue){
	var re = new RegExp("\.(gif|jpg|jpeg|png|bmp)","ig");
	return re.test(fileValue)
}


// �����ַ���
// Ӧ������ onkeyup="if (this.value!=FiltChar(this.value)){this.value=FiltChar(this.value)}"
// Ӧ������ onkeyup="this.value=FiltChar(this.value)"
function FiltChar(str){
	return str.replace(/[^\w\u4E00-\u9FA5]/g, '');
}


// ����С��
// Ӧ������ onkeyup="if (this.value!=FiltDecimal(this.value)){this.value=FiltDecimal(this.value)}"
// Ӧ������ onkeyup="this.value=FiltDecimal(this.value)"
function FiltDecimal(str){
	return str.replace(/[^\d*\.?\d{0,2}$]/g,'')
}

// ��������
// Ӧ������ onkeyup="if (this.value!=FiltInt(this.value)){this.value=FiltInt(this.value)}"
// Ӧ������ onkeyup="this.value=FiltInt(this.value)"
function FiltInt(str){
	return str.replace(/\D/g,'')
}

// ���������������������
function SelectOptionArr(selectName){
	var SelectOptionArray = new Array();

	for (soi=0; soi<document.getElementById(selectName).options.length; soi++){
		SelectOptionArray[document.getElementById(selectName).options[soi].value] = document.getElementById(selectName).options[soi].text;
	}
	return SelectOptionArray;
}

// ���������ݼ���
function SelectOptionSearch(sourceID,selectName,arrObj){
	document.getElementById(selectName).options.length=0;
	for (var key in arrObj){
		if (arrObj[key].lastIndexOf(document.getElementById(sourceID).value)>=0){
			document.getElementById(selectName).options.add(new Option(arrObj[key],key));
		}
	}
}

// ��������������
function SelectOptionClear(selectName,defText){
	document.getElementById(selectName).options.length=0; 
	document.getElementById(selectName).options.add(new Option(defText,""));
	document.getElementById(selectName).value = "";
}


// �ı���֤��
function ChangeCode(){
	$id("showcode").src="inc/VerCode.asp?mudi="+ Math.random();
	$id("verCode").value = "";
	$id("verCode").focus();

}

// �����֤����ȡ��֤��
function GetVerCode(str){
	if ($id("showVerCode").innerHTML.lastIndexOf('VerCode')==-1){
		$id("showVerCode").innerHTML = "<img id='showcode' src='inc/VerCode.asp?mudi="+ Math.random() +"' align='top' style='cursor:pointer;' height='29' onclick='ChangeCode()' alt='�������' />";	
	}else if (str == "change"){
		ChangeCode();
	}
}


// Ajax��������
function AjaxNavHref(){
	var outputID = arguments[0] ? arguments[0] : "";
	var urlStr = arguments[1] ? arguments[1] : "";
	var pageNum = arguments[2] ? arguments[2] : "";

	if (outputID==""){ outputID="dialogBody"; }
	if (urlStr==""){ urlStr=document.location.href; }
	if (! isNaN(parseInt(pageNum))){ pageNum="&page="+ pageNum; }else{ pageNum=""; }

	document.getElementById(outputID).innerHTML="<br /><br /><center style='font-size:14px;'><img src='inc_img/onload.gif' style='margin-right:5px;' />���ݼ�����...</center><br /><br />";
	var ajax=new AJAXRequest();
	ajax.get(
		// ����ĵ�ַ
		urlStr + pageNum,
		// �ص�������ע�⣬�ǻص�����������Ҫ������
		function(obj) {
			document.getElementById(outputID).innerHTML=obj.responseText;
		}
	);
}
