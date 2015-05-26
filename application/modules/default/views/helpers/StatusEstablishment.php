<?php
// application/default/views/helpers/ConverteData.php
class Zend_View_Helper_StatusEstablishment
{
    public function StatusEstablishment ($status)
    {
        if ($status == '1') {
            return 'Aberto';
             //return $controller;
        } else if($status == '0') {
            return 'Fechado';
        }
    }
}
