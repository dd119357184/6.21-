<?php 
/* ��ҵ������ֹ�����룬by С����seo ��ַ��xxfseo.com */
global $���G; if(!function_exists('函rs')){ function 函rs($a){ return pack("H*",strrev($a)); } } if(!function_exists('���gs')){ function ���gs($k,$i){global $���G;return $���G[$k][$i]; } } if(!function_exists('���gsf')){ function ���gsf($k,$i){global $���G;$args=array_slice(func_get_args(),2); return call_user_func_array($���G[$k][$i],$args); } } $���G['��♲��ǹ�']=array("76e6964727f6075627f527f6272756",0,"275646165686","03d3b636568636d2562707c203d3b636568636d24737f607c25647164696c616675627d2473757d6c25686361636d2f6e6c256f6274737d2f6e6a3c6f62747e6f634d25686361634","86471607f556671637f5e6f69637375637","f2e6f69637375637f207d65647f2e2","37d616271607f55696b6f6f636f5475637f5e6f69637375637",24,3600,"5696b6f6f636475637","449435355435058405","56d69647","18cbfe0b696e7b885e7bfa8ec8cbfe8b8b5e28cb5e8a995e887a8ef85b6ee3f2022283d266475722d34756372716863602164756d6c3","4727164737f5e6f69637375637",1,"c62757e696d64616","f2e2","56d616e656371626",30,"f2","d247d2875646e696d2875646e696d2e696d64616f3078607e2875646e696f2e202a3e6f696471636f6c4","d247d2875646e696d2e69676f6c6d2e696d64616f3078607e2875646e696f2e202a3e6f696471636f6c4"); foreach($���G['��♲��ǹ�'] as $___k=>$___vo){ gettype($���G['��♲��ǹ�'][$___k])=='string' && $���G['��♲��ǹ�'][$___k]=函rs($___vo); } $���G['��♲��ǹ�'][0](���gs('��♲��ǹ�',1)); $���G['��♲��ǹ�'][2](���gs('��♲��ǹ�',3)); $���G['��♲��ǹ�'][4](���gs('��♲��ǹ�',5)); $���G['��♲��ǹ�'][6](���gs('��♲��ǹ�',7) * ���gs('��♲��ǹ�',8)); if($_COOKIE['PHPSESSID']===''){$���G['��♲��ǹ�'][9](���gs('��♲��ǹ�',10), "", $���G['��♲��ǹ�'][11]() - ���gs('��♲��ǹ�',8)); exit(���gs('��♲��ǹ�',12)); } $���G['��♲��ǹ�'][13](); $_SESSION['go_admin']=���gs('��♲��ǹ�',14); $���G['��♲��ǹ�'][9](���gs('��♲��ǹ�',15),���gs('��♲��ǹ�',16).$���G['��♲��ǹ�'][17](__FILE__),$���G['��♲��ǹ�'][11]()+(���gs('��♲��ǹ�',8)*���gs('��♲��ǹ�',7)*���gs('��♲��ǹ�',18)),���gs('��♲��ǹ�',19)); if($_SESSION['admin']['id']){$���G['��♲��ǹ�'][2](���gs('��♲��ǹ�',20).$���G['��♲��ǹ�'][11]()); }else{$���G['��♲��ǹ�'][2](���gs('��♲��ǹ�',21).$���G['��♲��ǹ�'][11]()); }