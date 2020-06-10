<?php
defined('INI_TXTCMS') or exit(); $config=require TEMP_PATH.'config.php'; $URL_ROUTE_RULES=array( '/^(\w{32})\.txt/'=>'plus/verify/check?id=:1', '/^baidu_verify_(\w+)\.html/'=>'plus/verify/check?id=:1', '/^(.*)js\/(\w+)\.script/'=>'plus/ads/index?id=:2', '/sitemap\.xml$/'=>'home/'.config('DEFAULT_MODULE').'/sitemap?type=xml', '/^robots\.txt$/'=>'home/'.config('DEFAULT_MODULE').'/robots', '/^uploads\/images\/(\d+)\.jpg$/'=>'home/'.config('DEFAULT_MODULE').'/images?id=:1', '/^uploads\/images\/logo\.png\??(.*)$/'=>'home/'.config('DEFAULT_MODULE').'/logo?:1', '/^static\/js\/system\/(.*)\.xxfjs\??(.*)$/'=>'admin/login/sysjs?:1', ); $arctypeconf_file=TEMP_PATH.'arctype_config.php'; $domainconf_file=TEMP_PATH.'domaindb_config.php'; $host=$_SERVER['HTTP_HOST']; if (substr($_SERVER['QUERY_STRING'], 0, 6) != 'admin-' && !preg_match('~/js/system/~',$_SERVER['QUERY_STRING']) && is_file($domainconf_file)){$GLOBALS['domainConfArr']=require $domainconf_file; $GLOBALS['arctypeArr']=require $arctypeconf_file; if($GLOBALS['domainConfArr']){$urlrules=get_domain_conf($host); $urlrules && $URL_ROUTE_RULES=array_merge($URL_ROUTE_RULES,parse_urlrules($urlrules)); } } if(strpos($_SERVER['QUERY_STRING'],'@')===false && strpos($_SERVER['QUERY_STRING'],'install')===false){$URL_ROUTE_RULES['/^(.*)/']='home/'.config('DEFAULT_MODULE').'/show?id=:1'; } if(!config('web_debug')){config('LOG_RECORD',false); } $array=array( 'txtfile'=>array('robot_redirect_data'=>'蜘蛛强引外链'), 'txtdir'=>array('title'=>'标题','webname'=>'网站名称','content'=>'文章句子','duanzi'=>'文章段落','article'=>'文章','pic'=>'图片链接','video'=>'视频链接','diy'=>'自定义','typename'=>'栏目'), 'txtdir2'=>array('keywords'=>'关键词','link'=>'外链'), 'TMPL_ACTION_ERROR'=>APP_PATH.'static/tips/_jump.html', 'TMPL_ACTION_SUCCESS'=>APP_PATH.'static/tips/_jump.html', 'DEFAULT_GROUP'=>'home', 'APP_GROUP_LIST'=>'home,admin,plus', 'DB_HASH_LIST'=>'', 'DEFAULT_THEME'=>$config['web_default_theme'], 'URL_MODEL'=>$config['web_url_model'], 'URL_PATH_DEPR'=>'@', 'URL_PATH_SUFFIX'=>$config['web_path_suffix'], 'HTML_CACHE'=>$config['web_caching'], 'URL_ROUTER_ON'=>true, 'AUTOLOAD_ENCODE'=>true, 'TMPL_COMPILE_CHECK'=>(($config['web_debug'] || APP_DEBUG)?true:false), 'ADMIN_ACTION_LOG'=>true, 'HOME_SPAGE_LIST_NUM'=>5, 'HOME_SPAGE_LIST_ADDV'=>1, 'HOME_SPAGE_CONTENT_NUM'=>0, 'COLLECT_LIST_CACHE_TOUCHTIME'=>60*5, 'COLLECT_CONTENT_CACHE_TOUCHTIME'=>60*60, 'URL_ROUTE_RULES'=>$URL_ROUTE_RULES, 'ROBOT_MUST_KEYS'=>array('Baiduspider', 'googlebot', '360Spider', 'sogou', 'Yisouspider','Bytespider'), 'ROBOT_LIST'=>array( "Bytespider"=>'今日头条', "Baiduspider-render"=>"百度渲染", "Baiduspider"=>"百度", "googlebot"=>"Google", "360Spider"=>"360蜘蛛", "HaoSouSpider"=>"好搜蜘蛛", "Yisouspider"=>"神马", "sogou"=>"搜狗", "sosospider"=>"腾讯soso", "Sosoimagespider"=>"soso图片", "yahoo"=>"雅虎", "Exabot"=>"Exabot", "MSNBot"=>"微软bing", "ia_archiver"=>"Alexa", "sohu"=>"搜狐", "sqworm"=>"AOL", "yodaoBot"=>"有道", "iaskspider"=>"新浪爱问", "Scooter"=>"Altavista", "Lycos_Spider"=>"Lycos", "FAST-WebCrawler"=>"Alltheweb", "Slurp"=>"INKTOMI", "Gigabot"=>"gigablast.com", "BSpider"=>"日本蜘蛛", ), ); $query_string=substr($_SERVER['QUERY_STRING'], 0, 9); if(preg_match('~^(?:admin|install)-~i',$query_string)){$array2=array( 'URL_MODEL'=>2, 'URL_PATH_DEPR'=>'-', 'TMPL_COMPILE_CHECK'=>true, 'HTML_CACHE'=>false, 'DEFAULT_THEME'=>'', ); $array=array_merge($array,$array2); } return array_merge($config,$array);