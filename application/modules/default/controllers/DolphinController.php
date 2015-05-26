<?php

class Default_DolphinController extends Zend_Controller_Action
{

    public function init()
    {
        $this->_modelUser = new Default_Model_Dolphin();
    }

    public function indexAction()
    {
        $rs = $this->_modelUser->getAll();
				
		$rs = ($rs) ? $rs : array();
		
		$galeria = $this->_modelUser->getAllGaleria();		
		$galeria = ($galeria) ? $galeria : array();
		
		$galeriaEstrutura = $this->_modelUser->getAllGaleriaEstrutura();
		$galeriaEstrutura = ($galeriaEstrutura) ? $galeriaEstrutura : array();
		
		$this->view->galeria = $galeria;
		$this->view->galeriaEstrutura = $galeriaEstrutura;
		$this->view->rs = $rs;
    }
    


}

