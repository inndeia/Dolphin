<?php
// application/default/views/helpers/ConverteData.php
class Zend_View_Helper_GetUser
{
    public function GetUser ()
    {
    	$identity = Zend_Auth::getInstance()->getIdentity();
    	return $identity->getFullName();
    }
}
