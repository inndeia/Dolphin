<?php

// application/default/views/helpers/ConverteData.php
class Zend_View_Helper_GetYoutubeThumb {

    public function GetYoutubeThumb($url) {
        preg_match(
                '/[\\?\\&]v=([^\\?\\&]+)/', $url, $matchesYoutube
        );

        preg_match(
                '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/', $url, $matchesVimeo
        );


        if (count($matchesYoutube) > 0) {

            $id = $matchesYoutube[1];
            return 'http://img.youtube.com/vi/' . $id . '/mqdefault.jpg';
        } elseif (count($matchesVimeo) > 0) {
            
            $id = $matchesVimeo[2]; 
            $url = 'http://vimeo.com/api/v2/video/' . $id . '.php';
            
            if (ini_get('allow_url_fopen')) {
                $result = file_get_contents($url);
            } else {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);
                curl_close($ch);
            }

            $hash = unserialize($result);
            
            if ($hash && isset($hash[0]) && isset($hash[0]['thumbnail_large'])) {
                echo $hash[0]['thumbnail_large'];
            }

//            $id = $matchesVimeo[2]; 
//            $url = "vimeo.com/api/v2/video/".$id.".php";
//            $contents = file_get_contents($url);
//            $thumb = unserialize(trim($contents));
//            var_dump($contents);
//            return $thumb[0][thumbnail_small]; 
        }
    }

}
