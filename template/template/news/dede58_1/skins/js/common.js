function tags(items,length,value){
  for(var i=1;i<=length;i++){
    if(value==i){
      document.getElementById(items+"_tag_"+value).className='this';      
      document.getElementById(items+"_"+value).style.display="block";
    } else{	
      document.getElementById(items+"_tag_"+i).className='';      
      document.getElementById(items+"_"+i).style.display="none";
    }
  }
}