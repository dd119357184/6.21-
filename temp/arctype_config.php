<?php
return array (
  51 => 
  array (
    'id' => 51,
    'name' => '行业企业',
    'dirname' => 'company',
    'urlrules1' => 'a:6:{s:4:"list";a:3:{s:7:"tplfile";s:4:"list";s:5:"rules";s:32:"newslist/{数字1}{id}{数字1}/";s:6:"system";s:1:"1";}s:4:"show";a:3:{s:7:"tplfile";s:4:"show";s:5:"rules";s:116:"html/{日期}/{数字1}{id}{数字2}.html,news/{日期}/{数字1}{id}{数字2}.html,show/{数字1}{id}{数字2}.html";s:6:"system";s:1:"1";}s:7:"contact";a:3:{s:7:"tplfile";s:7:"contact";s:5:"rules";s:33:"contact/,contact.html,lianxi.html";s:6:"system";s:1:"0";}s:5:"about";a:3:{s:7:"tplfile";s:5:"about";s:5:"rules";s:26:"about/,aboutus/,about.html";s:6:"system";s:1:"0";}s:12:"product_list";a:3:{s:7:"tplfile";s:12:"product_list";s:5:"rules";s:141:"product/list_{数字1}{数字2}.html,product/index_{数字1}{数字2}.html,product/list_{数字1}{数字2}/,product/index_{数字1}{数字2}/";s:6:"system";s:0:"";}s:12:"product_show";a:3:{s:7:"tplfile";s:12:"product_show";s:5:"rules";s:100:"product/{数字2}{数字2}.html,product/show_{数字2}{数字2}.html,product/show{数字2}{数字2}/";s:6:"system";s:0:"";}}',
    'tplrules' => '10',
    'urlrules2' => 'a:6:{s:4:"list";a:3:{s:7:"tplfile";s:4:"list";s:5:"rules";s:40:"list/{id}-{aid}/,liebiao/{id}-{aid}.html";s:6:"system";s:1:"1";}s:4:"show";a:3:{s:7:"tplfile";s:4:"show";s:5:"rules";s:62:"html/{id}-{aid}.html,news/{id}-{aid}.html,show/{id}-{aid}.html";s:6:"system";s:1:"1";}s:7:"contact";a:3:{s:7:"tplfile";s:7:"contact";s:5:"rules";s:33:"contact/,contact.html,lianxi.html";s:6:"system";s:0:"";}s:5:"about";a:3:{s:7:"tplfile";s:5:"about";s:5:"rules";s:26:"about/,aboutus/,about.html";s:6:"system";s:0:"";}s:12:"product_list";a:3:{s:7:"tplfile";s:12:"product_list";s:5:"rules";s:50:"product/list_{id}-{aid}/,product/index_{id}-{aid}/";s:6:"system";s:0:"";}s:12:"product_show";a:3:{s:7:"tplfile";s:12:"product_show";s:5:"rules";s:23:"product/show{id}/{aid}/";s:6:"system";s:0:"";}}',
    'tplfiles' => 'contact,about,product_list,product_show',
    'musttpl' => 'index,list,show',
    'temp5' => '',
    'temp6' => '',
  ),
  52 => 
  array (
    'id' => 52,
    'name' => '文章新闻',
    'dirname' => 'news',
    'urlrules1' => 'a:2:{s:4:"list";a:3:{s:7:"tplfile";s:4:"list";s:5:"rules";s:61:"list/{数字1}{id}{数字2}/,newslist/{数字1}{id}{数字2}/";s:6:"system";s:1:"1";}s:4:"show";a:3:{s:7:"tplfile";s:4:"show";s:5:"rules";s:98:"html/{日期}/{数字1}{id}{数字3}.html,news/{数字3}{id}{数字2}.html,show/{id}{数字5}.html";s:6:"system";s:1:"1";}}',
    'tplrules' => '10',
    'urlrules2' => 'a:2:{s:4:"list";a:3:{s:7:"tplfile";s:4:"list";s:5:"rules";s:37:"list/{id}-{aid}/,cate/{id}_{aid}.html";s:6:"system";s:1:"1";}s:4:"show";a:3:{s:7:"tplfile";s:4:"show";s:5:"rules";s:41:"html/{id}_{aid}.html,show/{id}_{aid}.html";s:6:"system";s:1:"1";}}',
    'tplfiles' => '',
    'musttpl' => 'index,list,show',
    'temp5' => '',
    'temp6' => '',
  ),
  54 => 
  array (
    'id' => 54,
    'name' => '电影视频',
    'dirname' => 'video',
    'urlrules1' => 'a:2:{s:4:"list";a:3:{s:7:"tplfile";s:4:"list";s:5:"rules";s:123:"videolist/{数字2}{id}{数字2}/,list/{数字2}{id}{数字2}/,tvlist/{数字2}{id}{数字2}/,movie/{数字2}{id}{数字2}/";s:6:"system";s:1:"1";}s:4:"show";a:3:{s:7:"tplfile";s:4:"show";s:5:"rules";s:131:"video/{数字2}{id}{数字2}.html,html/{数字2}{id}{数字2}.html,tv/{数字2}{id}{数字2}.html,movie/{数字2}{id}{数字2}.html";s:6:"system";s:1:"1";}}',
    'tplrules' => '10',
    'urlrules2' => 'a:2:{s:4:"list";a:3:{s:7:"tplfile";s:4:"list";s:5:"rules";s:75:"videolist/{id}-{aid}/,list/{id}-{aid}/,tvlist/{id}-{aid}/,movie/{id}-{aid}/";s:6:"system";s:1:"1";}s:4:"show";a:3:{s:7:"tplfile";s:4:"show";s:5:"rules";s:50:"video/{aid}-{id}/,tv/{id}-{aid}/,movie/{id}-{aid}/";s:6:"system";s:1:"1";}}',
    'tplfiles' => '',
    'musttpl' => 'index,list,show',
    'temp5' => '',
    'temp6' => '',
  ),
  55 => 
  array (
    'id' => 55,
    'name' => '论坛社区',
    'dirname' => 'bbs',
    'urlrules1' => 'a:2:{s:4:"list";a:3:{s:7:"tplfile";s:4:"list";s:5:"rules";s:195:"forum/{数字2}{id}{数字2}/,forum/{数字2}{id}/,forum/{日期}/{数字2}{id}/,forum-{数字2}{id}{数字2}-1.html,forum-{数字1}{id}{数字1}-{数字1}.html,forum-{数字1}{id}-{数字1}.html";s:6:"system";s:1:"1";}s:4:"show";a:3:{s:7:"tplfile";s:4:"show";s:5:"rules";s:232:"thread-{数字2}{id}{数字2}-1-1.html,thread-{数字1}{id}{数字1}.html,thread-{数字1}{id}{数字2}-{数字1}-1.html,thread/{数字2}{id}{数字2}.html,html/{数字2}{id}{数字2}.html,thread/{日期}/{数字2}{id}{数字1}.html";s:6:"system";s:1:"1";}}',
    'tplrules' => '10',
    'urlrules2' => 'a:2:{s:4:"list";a:3:{s:7:"tplfile";s:4:"list";s:5:"rules";s:61:"forum/{id}_{aid}/,forum/{id}-{aid}.html,forum-{id}-{aid}.html";s:6:"system";s:1:"1";}s:4:"show";a:3:{s:7:"tplfile";s:4:"show";s:5:"rules";s:64:"thread/{id}_{aid}/,thread/{id}-{aid}.html,thread-{id}-{aid}.html";s:6:"system";s:1:"1";}}',
    'tplfiles' => '',
    'musttpl' => 'index,list,show',
    'temp5' => '',
    'temp6' => '',
  ),
);
?>