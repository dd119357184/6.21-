$(function (){
	try {
		//�������
		var speed=30;
		if ($id('caseMarX').offsetWidth<$id('caseMarX1').offsetWidth){
			$id('caseMarX2').innerHTML=$id('caseMarX1').innerHTML;
			$id('caseMarX3').innerHTML=$id('caseMarX1').innerHTML;
		}
		function Marquee(){
			if($id('caseMarX2').offsetWidth-$id('caseMarX').scrollLeft<=0){
				$id('caseMarX').scrollLeft-=$id('caseMarX1').offsetWidth;
			}else{
				$id('caseMarX').scrollLeft+=1.8;
			}
		}
		var MyMar=setInterval(Marquee,speed)
		$id('caseMarX').onmouseover=function() { clearInterval(MyMar); }
		$id('caseMarX').onmouseout=function() { MyMar=setInterval(Marquee,speed); }
		
	}catch (e) {}
});

// ͶƱ��
function CheckVoteForm(formID){
	var isSel=false;
	for (var i=0; i<$name('voteItem'+ formID).length; i++){
		if ($name('voteItem'+ formID)[i].checked){
			isSel = true;
		}
	}
	if (isSel==false){
		alert('����ѡ����ҪͶƱ��ѡ��');return false;
	}

	AjaxPostDeal("voteForm"+ formID);
	return false;
}

// ͶƱ���
function ReadVoteResult(formID){
	var ajax=new AJAXRequest();
	ajax.encode = function(str) { 
		return encodeURI(str); 
	} 

	ajax.get(
		"deal.asp?mudi=voteResult&dataID="+ formID,
		// �ص�������ע�⣬�ǻص�����������Ҫ������
		function(obj) {
			if (obj.responseText.length<50){
				eval(obj.responseText);
			}else{
				document.getElementById('voteResultBox'+ formID).innerHTML = obj.responseText;
				$id('voteResultBox'+ formID).style.display="";
				$id('voteBox'+ formID).style.display="none";
			}
		}
	);
	return false;

}

// �ر�ͶƱ���
function CloseVoteResult(formID){
	$id('voteResultBox'+ formID).style.display="none";
	$id('voteBox'+ formID).style.display="";

}

