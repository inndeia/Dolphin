<?php
class Admin_TarifasController extends Zend_Controller_Action
{
	
	
	public function init()
	{
		$this->_modelPacote = new Admin_Model_Pacote();
		$this->_modelOpcionais = new Admin_Model_Opcionais();
		$this->_modelConteudo = new Admin_Model_Tarifa();
        $this->view->title = $this->title = 'Tarifas';
        $this->view->headTitle()->prepend($this->title);
        $this->flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->view->messages = $this->flashMessenger->getMessages();
	}
	
	public function indexAction()
	{
		$this->view->breadcrumb = array($this->title => 'admin/tarifas');
       
        $rs = $this->_modelPacote->getAll();        
        $rs = ($rs) ? $rs : array();
       
        $page = $this->_getParam('page', 1);
        
        
        $paginator = Zend_Paginator::factory($rs);       
        $paginator->setItemCountPerPage(20);        
        $paginator->setCurrentPageNumber($page);        
        $this->view->rs = $paginator;
		
	}
	public function addpacoteAction(){
		$this->view->breadcrumb = array($this->title => 'admin/tarifas');
		
		if ($this->_request->isPost()) {
			 
			$image  = $_FILES['imagem'];
			$imageBanner  = $_FILES['imagem_banner'];
		
			if($image['name'] != ''){
				$handle   = Zend_Controller_Action_HelperBroker::getStaticHelper('Upload');
				$handle   -> Upload($image);
				$nome = date('dmYGis');
				if ($handle->uploaded) {
		
					$handle->file_new_name_body   = $nome;
					$handle->allowed = array('image/*');
					$handle->process('images/');
					 
		
					if ($handle->processed) {
						$image = 'images/'. $handle->file_dst_name;
					} else {
						$this->_helper->FlashMessenger('Erro ao carregar imagem!');
						$this->_redirect('/admin/tarifas/addpacote');
					}
				}
			}else{
				$image = '';
			}
			if($imageBanner['name'] != ''){
				$handle   = Zend_Controller_Action_HelperBroker::getStaticHelper('Upload');
				$handle   -> Upload($imageBanner);
				$nome = date('dmYGis');
				if ($handle->uploaded) {
			
					$handle->file_new_name_body   = $nome;
					$handle->allowed = array('image/*');
					$handle->process('images/');
			
			
					if ($handle->processed) {
						$imageBanner = 'images/'. $handle->file_dst_name;
					} else {
						$this->_helper->FlashMessenger('Erro ao carregar imagem!');
						$this->_redirect('/admin/tarifas/addpacote');
					}
				}
			}else{
				$imageBanner = '';
			}
			 
			$data = array(
					'id' => $rs['id'],
					'titulo' => utf8_decode($this->_request->getPost('titulo')),
					'texto' => utf8_decode($this->_request->getPost('texto')),
					'periodo_pacote_de' => $this->_request->getPost('periodo_pacote_de'),
					'periodo_pacote_ate' => $this->_request->getPost('periodo_pacote_ate'),
					'validade_pacote' => $this->_request->getPost('validade_pacote'),
					'imperdivel' => $this->_request->getPost('imperdivel')
			);
			if($image != ''){
				$data['imagem'] = $image;				
			}
			if($imageBanner != ''){
				$data['imagem_banner'] = $imageBanner;
			}
			
			$return = $this->_modelPacote->create($data);
			if ($return != 0) {
				$this->_helper->FlashMessenger('Adicionado com sucesso!');
				$this->_redirect('/admin/tarifas');
			}
		}
	}
	
	public function editarpacoteAction(){
		$id = $this->getRequest()->getParam('id');
		
		$this->view->breadcrumb = array($this->title => 'admin/tarifas/');
		
		$rs = $this->_modelPacote->getByid($id);
		$rs = $rs[0];
		$this->view->rs = $rs;
		
		if (is_null($rs)) {
			$this->_helper->FlashMessenger('Operação não permitida!');
			$this->_redirect('/admin/tarifas/');
		}
		 
		if ($this->_request->isPost()) {
			
			$image  = $_FILES['imagem'];
			$imageBanner  = $_FILES['imagem_banner'];
			
			if($image['name'] != ''){
				$handle   = Zend_Controller_Action_HelperBroker::getStaticHelper('Upload');
				$handle   -> Upload($image);
				$nome = date('dmYGis');
				if ($handle->uploaded) {
		
					$handle->file_new_name_body   = $nome;
					$handle->allowed = array('image/*');
					$handle->process('images/');
					 
		
					if ($handle->processed) {
						$image = 'images/'. $handle->file_dst_name;
					} else {
						$this->_helper->FlashMessenger('Erro ao carregar imagem!');
						$this->_redirect('/admin/tarifas/editarpacote/id/'.$rs['id']);
					}
				}
			}
			if($imageBanner['name'] != ''){
				$handle   = Zend_Controller_Action_HelperBroker::getStaticHelper('Upload');
				$handle   -> Upload($imageBanner);
				$nome = date('dmYGis');
				if ($handle->uploaded) {
						
					$handle->file_new_name_body   = $nome;
					$handle->allowed = array('image/*');
					$handle->process('images/');
						
						
					if ($handle->processed) {
						$imageBanner = 'images/'. $handle->file_dst_name;
					} else {
						$this->_helper->FlashMessenger('Erro ao carregar imagem!');
						$this->_redirect('/admin/tarifas/editarpacote/id/'.$rs['id']);
					}
				}
			}
			
			$data = array(
					'id' => $rs['id'],
					'titulo' => utf8_decode($this->_request->getPost('titulo')),
					'texto' => utf8_decode($this->_request->getPost('texto')),
					'periodo_pacote_de' => $this->_request->getPost('periodo_pacote_de'),
					'periodo_pacote_ate' => $this->_request->getPost('periodo_pacote_ate'),
					'validade_pacote' => $this->_request->getPost('validade_pacote'),
					'imperdivel' => $this->_request->getPost('imperdivel')
			);
			if($image['name'] != ''){
				$data['imagem'] = $image;
				$imgAntiga = $rs['imagem'];
				 
			}
			if($imageBanner['name'] != ''){
				$data['imagem_banner'] = $imageBanner;
				$imgBannerAntiga = $rs['imagem_banner'];
					
			}
		
			$return = $this->_modelPacote->save($data, $imgAntiga, $imgBannerAntiga);
		
			if ($return) {
				$this->_helper->FlashMessenger('Atualizado com sucesso!');
				$this->_redirect('/admin/tarifas/');
			}
		}
	}
	
	public function removerpacoteAction(){
		$id = $this->getRequest()->getParam('id');
		$rs = $this->_modelPacote->getByid($id);
		
		if (!$rs) {
			$this->_helper->FlashMessenger('Operação não permitida');
			$this->_redirect('/admin/tarifas');
		}
		
		$countDelete =$this->_modelPacote->remover($id);
		
		if ($countDelete) {
		
			$this->_helper->FlashMessenger('Deletado com sucesso!');
			$this->_redirect('/admin/tarifas');
		}
		
	}
	
	public function editarOpcionaisAction(){
		$id = $this->getRequest()->getParam('id');
		$this->view->breadcrumb = array($this->title => 'admin/tarifas/editar-opcionais/id/1');
		
		$rs = $this->_modelOpcionais->getByid($id);
		$rs = $rs[0];
		$this->view->rs = $rs;
		
		if (is_null($rs)) {
			$this->_helper->FlashMessenger('Operação não permitida!');
			$this->_redirect('/admin/tarifas/editar-opcionais/id/1');
		}
			
		if ($this->_request->isPost()) {
				
							
			$data = array(
					'id' => $rs['id'],					
					'texto' => utf8_decode($this->_request->getPost('texto'))
			);
		
			$return = $this->_modelOpcionais->save($data);
		
			if ($return) {
				$this->_helper->FlashMessenger('Atualizado com sucesso!');
				$this->_redirect('/admin/tarifas/editar-opcionais/id/1');
			}
		}
	}
	
	public function editarConteudoAction(){
		
		$id = $this->getRequest()->getParam('id');
		$this->view->breadcrumb = array($this->title => 'admin/tarifas/editar-conteudo/id/1');
		
		$rs = $this->_modelConteudo->getByid($id);
		$rs = $rs[0];
		$this->view->rs = $rs;
		if (is_null($rs)) {
			$this->_helper->FlashMessenger('Operação não permitida!');
			$this->_redirect('/admin/tarifas/editar-conteudo/id/1');
		}
		
		if ($this->_request->isPost()) {
		
				
			$data = array(
					'id' => $rs['id'],
					'texto' => utf8_decode($this->_request->getPost('texto'))
			);
		
			$return = $this->_modelConteudo->save($data);
		
			if ($return) {
				$this->_helper->FlashMessenger('Atualizado com sucesso!');
				$this->_redirect('/admin/tarifas/editar-conteudo/id/1');
			}
		}
	}


}