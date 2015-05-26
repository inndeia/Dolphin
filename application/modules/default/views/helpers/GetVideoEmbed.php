<?php

// application/default/views/helpers/ConverteData.php
class Zend_View_Helper_GetVideoEmbed {

    public function GetVideoEmbed($url) {
        
        preg_match(
                '/[\\?\\&]v=([^\\?\\&]+)/', $url, $matchesYoutube
        );

        preg_match(
                '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/', $url, $matchesVimeo
        );

        if(count($matchesYoutube)>0){
            
            $id = $matchesYoutube[1];
            return '<iframe width="342" height="272" src="//www.youtube.com/embed/'.$id.'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
        }elseif (count($matchesVimeo)>0) {
            
            $id = $matchesVimeo[2]; 
            return '<iframe src="//player.vimeo.com/video/'.$id.'" width="342" height="272" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
            
        }

    }

}
