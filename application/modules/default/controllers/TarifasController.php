<?php

class Default_TarifasController extends Zend_Controller_Action
{

    public function init()
    {
        $this->_modelPacote = new Default_Model_Pacote();
		$this->_modelOpcionais = new Default_Model_Opcionais();
		$this->_modelConteudo = new Default_Model_Tarifa();
		$this->_modelAcomodacoes = new Default_Model_Acomodacoes();
    }

    public function indexAction()
    {
       	$pacote = $this->_modelPacote->getAll();        
        $pacote = ($pacote) ? $pacote : array();
        
        $opcionais = $this->_modelOpcionais->getAll();
        $opcionais = ($opcionais) ? $opcionais : array();
        
        $conteudo = $this->_modelConteudo->getAll();
        $conteudo = ($conteudo) ? $conteudo : array();
        
        $preco = $this->_modelAcomodacoes->getAll();
        $preco = ($preco) ? $preco : array();
        
        $this->view->preco = $preco;
        $this->view->pacote = $pacote;
        $this->view->opcionais = $opcionais;
        $this->view->conteudo = $conteudo;
    }
    


}

