<?php

class Default_ServicosController extends Zend_Controller_Action
{

    public function init()
    {
        $this->_modelUser = new Default_Model_Servicos();
    }

    public function indexAction()
    {
        $rs = $this->_modelUser->getAll();
				
		$rs = ($rs) ? $rs : array();
		$this->view->rs = $rs;
    }
    


}

