<?php

header('Content-type:text/html; charset=UTF-8');
function sina()
{
    $html = file_get_contents('http://feed.mix.sina.com.cn/api/roll/get?pageid=153&lid=2510&k=&num=300&page=1');
    preg_match_all("/\"url\":\"(.*?)\",/", $html, $urls);
    foreach ($urls['1'] as $url) {
        $wz_url = str_replace('https', 'http', $url);
        $wz_url = str_replace('\\', '', $wz_url);
        $html = file_get_contents($wz_url);
        preg_match("/<h1 class=\"main-title\">(.*?)<\/h1>/", $html, $titles);
        preg_match("/<div class=\"article\" id=\"article\">.*?<p class=\"show_author\">/s", $html, $contents);
        preg_match_all("/<p>(.*?)<\/p>/", $contents['0'], $juzis);
        foreach ($juzis['1'] as $juzi)
        {
            $wz_juzi = ltrim($juzi, "　");
            $wz_juzi = preg_replace("/<.*?>/", '', $wz_juzi);
            if (!strstr($juzi, '原标题')) {
                if (mb_strlen($wz_juzi, 'UTF-8') > 60) {
                    file_put_contents(str_replace('\\','/',__DIR__).'/temp/data/body/news/'. date("YmdHi") . '.txt', $juzi . PHP_EOL, FILE_APPEND);
                }
            }
        }

        echo $titles['1'] . " >>> 采集完成" . "<br>";
    }
}


sina();