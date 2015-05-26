<?php
// application/default/views/helpers/ConverteData.php
class Zend_View_Helper_GetImage
{
    public function GetImage ($url)
    {
        if(empty($url)) {
             $InfoUrl = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', 'development');
            return $InfoUrl->servidor->url.'/images/image-not-found.jpg';
        }else{
            return $url;
        }
    }
}
