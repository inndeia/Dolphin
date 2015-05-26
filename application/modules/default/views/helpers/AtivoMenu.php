<?php
// application/default/views/helpers/ConverteData.php
class Zend_View_Helper_AtivoMenu
{
    public function ativoMenu ($item)
    {
        $request = Zend_Controller_Front::getInstance()->getRequest();
        $action = $request->getActionName();
        $controller = $request->getControllerName();
        if ($controller == $item) {
            return 'class="active"';
             //return $controller;
        } else {
            return false;
        }
    }
}
