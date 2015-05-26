<?php

class Default_GastronomiaController extends Zend_Controller_Action
{

    public function init()
    {
        $this->_modelUser = new Default_Model_Gastronomia();
    }

    public function indexAction()
    {
        $rs = $this->_modelUser->getAll();				
		$rs = ($rs) ? $rs : array();
		
		$galeria = $this->_modelUser->getAllGaleria();
		$galeria = ($galeria) ? $galeria : array();
		$this->view->galeria = $galeria;
		$this->view->rs = $rs;
    }
    


}

