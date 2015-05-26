<?php
// application/default/views/helpers/ConverteData.php
class Zend_View_Helper_estaAberto
{
    public function estaAberto ($isOpen)
    {
        if ($isOpen == 1) {
            return 'Sim';
             //return $controller;
        } else if ($isOpen == 0){
            return 'Não';
        }else {
        	return '';
        }
    }
}
