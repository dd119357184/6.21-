<?php
$strchulis="";
$sgresult="";
$baidustr1 = file_get_contents("http://top.baidu.com/buzz/top10.html");
$baidustr2 = file_get_contents("http://top.baidu.com/buzz?b=11&c=513&fr=topcategory_c513");
$baidustr3 = file_get_contents("http://top.baidu.com/buzz?b=344&c=513&fr=topcategory_c513");
for ($x=1; $x<=3; $x++) {
    $sgstr1 = file_get_contents("http://top.sogou.com/hot/sevendsnews_".$x.".html");
    $sgstr2 = file_get_contents("http://top.sogou.com/hot/shishi_".$x.".html");
    $sgstr3 = file_get_contents("http://top.sogou.com/movie/all_".$x.".html");
    $sgstr4 = file_get_contents("http://top.sogou.com/tvplay/all_".$x.".html");
    $sgstr5 = file_get_contents("http://top.sogou.com/tvshow/all_".$x.".html");
    $sgstr6 = file_get_contents("http://top.sogou.com/animation/all_".$x.".html");
    $sgstr7 = file_get_contents("http://top.sogou.com/book/all_".$x.".html");
    $sgstr8 = file_get_contents("http://top.sogou.com/song/newsong_".$x.".html");
    $sgstr9 = file_get_contents("http://top.sogou.com/game/all_".$x.".html");
    $sgstr10 = file_get_contents("http://top.sogou.com/auto/all_".$x.".html");
    $sgstr11 = file_get_contents("http://top.sogou.com/people/all_".$x.".html");
    for ($i=1; $i<=11; $i++) {
        preg_match_all('/<p class=\"p1\".*?>.*?<\/p>/ism', ${"sgstr".$i}, $matchestop);
        preg_match_all('/<p class=\"p3\".*?>.*?<\/p>/ism', ${"sgstr".$i}, $matchesbottom);
        $matc1 = $matchestop[0];
        $matc2 = $matchesbottom[0];
        $strtop = join("\r\n", $matchestop[0]);
        $strbottom = join("\r\n", $matchesbottom[0]);
        $sgresult.=$strtop.$strbottom;
      } 
    $baidustr = mb_convert_encoding(${"baidustr".$x}, 'UTF-8', 'GB2312');
    preg_match_all('/<a class=\"list-title\".*?>.*?<\/a>/ism', $baidustr, $matches);
    $baidustr = join("\r\n", $matches[0]);
    $sgstrend=$sgresult.$baidustr;
    $strchuli = strip_tags($sgstrend);
    $strchulis.=$strchuli;
  }
    echo $strchulis;
    file_put_contents(str_replace('\\','/',__DIR__).'/temp/data/article/news/'.date("Y-m-d").'.txt', $strchulis);
?>