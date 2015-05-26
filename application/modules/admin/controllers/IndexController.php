<?php

class Admin_IndexController extends Zend_Controller_Action
{

    public function init()
    {
    	$this->_redirect('/admin/usuarios');
    }

    public function indexAction()
    {
        // action body
    }


}

