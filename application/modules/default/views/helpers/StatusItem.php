<?php
// application/default/views/helpers/ConverteData.php
class Zend_View_Helper_StatusItem
{
    public function StatusItem ($status)
    {
        if ($status == '1') {
            return 'Ativo';
             //return $controller;
        } else if($status == '0') {
            return 'Inativo';
        }
    }
}
