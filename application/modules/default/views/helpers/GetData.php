<?php
// application/default/views/helpers/ConverteData.php
class Zend_View_Helper_GetData
{
    public function GetData ($data)
    {
        return date("d.m.Y", strtotime($data));
    }
}
