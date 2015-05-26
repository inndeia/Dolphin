<?php
// application/default/views/helpers/ConverteData.php
class Zend_View_Helper_GetDataHora
{
    public function GetDataHora ($data)
    {
        return date("d-m-Y H:i:s", strtotime($data));
    }
}
