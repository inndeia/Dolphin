<?php

class Default_AcomodacoesController extends Zend_Controller_Action
{

    public function init()
    {
        $this->_modelUser = new Default_Model_Acomodacoes();
    }

    public function indexAction()
    {
        
    }
    public function quartoAction()
    {
    	$id = $this->getRequest()->getParam('id');
    	
    	$rs = $this->_modelUser->getConteudo($id);
    	$rs = ($rs) ? $rs : array();
    	$galeria = $this->_modelUser->getGaleria($id);
    	$galeria = ($galeria) ? $galeria : array();
    	$item = $this->_modelUser->getItem($id);
    	$item = ($item) ? $item : array();
    	$destaque = $this->_modelUser->getImgDestaque($id);
    	$destaque = ($destaque) ? $destaque : array();
    	
    	$this->view->destaque = $destaque;
    	$this->view->item = $item;
    	$this->view->galeria = $galeria;
    	$this->view->rs = $rs;
    	$this->view->id = $id;
    	$this->view->nome = $rs[0]['nome'];
    
    }
    


}

