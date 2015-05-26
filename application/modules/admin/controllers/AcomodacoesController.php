<?php
class Admin_AcomodacoesController extends Zend_Controller_Action
{
	private $_modelDolphin;
	
	public function init()
	{
		$this->_modelUser = new Admin_Model_Acomodacoes();
        $this->view->title = $this->title = 'Acomodações';
        $this->view->headTitle()->prepend($this->title);
        $this->flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->view->messages = $this->flashMessenger->getMessages();
	}
	public function preDispatch()
	{
		$ajaxContext = $this->_helper->getHelper('AjaxContext');
		$ajaxContext->addActionContext('additem', 'json')
		->addActionContext('listaitem', 'json')
		->addActionContext('removeritem', 'json')
		->initContext();
	}

	public function indexAction()
	{
		$id = $this->getRequest()->getParam('id');
		
		$rs = $this->_modelUser->getConteudo($id);
		$rs = ($rs) ? $rs : array();
		$galeria = $this->_modelUser->getGaleria($id);
		$galeria = ($galeria) ? $galeria : array();
		$preco = $this->_modelUser->getPreco($id);
		$preco = $preco[0];
		
		$this->view->galeria = $galeria;
		$this->view->preco = $preco;
		$this->view->rs = $rs;
		$this->view->id = $id;
		$this->view->nome = $preco['nome'];
		
	}
	public function additemAction(){
		$this->_helper->viewRenderer->setNoRender();
		$this->_helper->layout->disableLayout();
		
		$nome = $this->getRequest()->getParam('nome');
		$id = $this->getRequest()->getParam('id');
		
		
		$lista = $this->_modelUser->saveItem($nome,$id);
						
		echo json_encode($lista);
	}
	
	public function listaitemAction(){
		$this->_helper->viewRenderer->setNoRender();
		$this->_helper->layout->disableLayout();
	
		$id = $this->getRequest()->getParam('id');
		$lista = $this->_modelUser->getItem($id);
		
	
		echo json_encode($lista);
	}
	
	public function removeritemAction(){
		$this->_helper->viewRenderer->setNoRender();
		$this->_helper->layout->disableLayout();
	
		$id = $this->getRequest()->getParam('id');
		$lista = $this->_modelUser->removerItem($id);
		echo json_encode($lista);
	}
	public function editarConteudoAction(){
		
			$id = $this->getRequest()->getParam('id');
			$idConteudo = $this->getRequest()->getParam('idconteudo');
		
			$this->view->breadcrumb = array($this->title => 'admin/acomocacoes/editar-conteudo/id/'.$id.'/idconteudo/'.$idConteudo);
		
			$rs = $this->_modelUser->getByidConteudo($idConteudo);
			$rs =$rs[0];
		
			$this->view->rs = $rs;
		
			if (is_null($rs)) {
				$this->_helper->FlashMessenger('Operação não permitida!');
				$this->_redirect('/admin/acomocacoes/index/id/'.$id);
			}
		
			if ($this->_request->isPost()) {
				
				$data = array(
						'id' => $rs['id_conteudo'],
						'descricao' => utf8_decode($this->_request->getPost('descricao'))
				);
					
				$return = $this->_modelUser->saveConteudo($data);
		
				if ($return) {
					$this->_helper->FlashMessenger('Atualizado com sucesso!');
					$this->_redirect('/admin/acomodacoes/index/id/'.$rs['id']);
				}
			}
		
	}
	public function editarGaleriaAction(){
		$id = $this->getRequest()->getParam('id');
		$idGaleria = $this->getRequest()->getParam('idgaleria');
		
		$this->view->breadcrumb = array($this->title => 'admin/acomodacoes/editar-galeria/id/'.$id.'/idgaleria/'.$idGaleria);
		
		$rs = $this->_modelUser->getByidgaleria($idGaleria);
		$rs =$rs[0];
		
		$this->view->rs = $rs;
		
		if (is_null($rs)) {
			
			$this->_helper->FlashMessenger('Operação não permitida!');
			$this->_redirect('/admin/acomodacoes/index/id/'.$id);
		}
		
		if ($this->_request->isPost()) {
			$destaque  = $this->getRequest()->getParam('destaque');
			$image  = $_FILES['imagem'];
			$video  = $this->getRequest()->getParam('video');
			$imageVideo = $_FILES['imagem_video'];
			
			if($image['name'] != ''){
				if($destaque == ''){
					$this->_helper->FlashMessenger('O campo destaque é obrigatório!');
					$this->_redirect('/admin/acomodacoes/editar-galeria/id/'.$rs['id'].'/idgaleria/'.$rs['id_galeria']);
				}
				
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
						$this->_redirect('/admin/acomodacoes/index/id/'.$rs['id']);
					}
				}
			}else if($video == ''){
				$this->_redirect('/admin/acomodacoes/index/id/'.$rs['id']);
			}else{
				if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$video)) {
					$this->_helper->FlashMessenger('URL inválida!');
					$this->_redirect('/admin/acomodacoes/index/id/'.$rs['id']);
				}
				if($imageVideo['name'] != ''){
					$handle   = Zend_Controller_Action_HelperBroker::getStaticHelper('Upload');
					$handle   -> Upload($imageVideo);
					$nome = date('dmYGis');
					if ($handle->uploaded) {
			
						$handle->file_new_name_body   = $nome;
						$handle->allowed = array('image/*');
						$handle->process('images/');
						 
			
						if ($handle->processed) {
							$imageVideo = 'images/'. $handle->file_dst_name;
						} else {
							$this->_helper->FlashMessenger('Erro ao carregar imagem!');
							$this->_redirect('/admin/acomodacoes/index/id/'.$rs['id']);
						}
					}
				}else{
					$this->_helper->FlashMessenger('Adicione uma imagem para o video!');
					$this->_redirect('/admin/acomodacoes/index/id/'.$rs['id']);
				}
			}
		
			$data = array(
					'id' => $rs['id_galeria']
			);
			if($image['name'] == ''){
            	$data['video'] = $video;
            	$data['imagem'] = '';
            	$data['destaque'] = 0;
            	$data['imagem_video'] = $imageVideo;
            	$imgAntigaVideo = $rs['imagem_video'];
            	$imgAntiga = $rs['imagem'];
            }else{
            	$data['imagem'] = $image;
            	$data['video'] = '';
            	$data['imagem_video'] = '';
            	$data['destaque'] = $destaque == 1?1:0;
            	$imgAntigaVideo = $rs['imagem_video'];
            	$imgAntiga = $rs['imagem'];
            	
            }
		
			$return = $this->_modelUser->editGaleria($data, $imgAntiga, $imgAntigaVideo);
		
			if ($return) {
				$this->_helper->FlashMessenger('Atualizado com sucesso!');
				$this->_redirect('/admin/acomodacoes/index/id/'.$rs['id']);
			}
		}
		
	}
	public function editarPrecoAction(){
		$id = $this->getRequest()->getParam('id');
		
		$this->view->breadcrumb = array($this->title => 'admin/acomodacoes/editar-preco/id/'.$id);
		
		$rs = $this->_modelUser->getByidpreco($id);
		$rs =$rs[0];
		
		$this->view->rs = $rs;
		
		if (is_null($rs)) {				
			$this->_helper->FlashMessenger('Operação não permitida!');
			$this->_redirect('/admin/acomodacoes/index/id/'.$id);
		}
		
		if ($this->_request->isPost()) {
			$data = array(
					'id' => $rs['id_preco'],
					'id_quarto' => $rs['id'],
					'mes_baixa'=> utf8_decode($this->_request->getPost('mes_baixa')),
					'dbl_baixa'=> utf8_decode($this->_request->getPost('dbl_baixa')),
					'tpl_baixa'=> utf8_decode($this->_request->getPost('tpl_baixa')),
					'mes_alta'=> utf8_decode($this->_request->getPost('mes_alta')),
					'dbl_alta'=> utf8_decode($this->_request->getPost('dbl_alta')),
					'tpl_alta'=> utf8_decode($this->_request->getPost('tpl_alta')),
					'mes_media'=> utf8_decode($this->_request->getPost('mes_media')),
					'dbl_media'=> utf8_decode($this->_request->getPost('dbl_media')),
					'tpl_media'=> utf8_decode($this->_request->getPost('tpl_media')));
			
			$return = $this->_modelUser->editPreco($data);
			
			if ($return) {
				$this->_helper->FlashMessenger('Atualizado com sucesso!');
				$this->_redirect('/admin/acomodacoes/index/id/'.$rs['id']);
			}
		}
	}
	public function removerGaleriaAction(){
		$id = $this->getRequest()->getParam('id');
		$idGaleria = $this->getRequest()->getParam('idgaleria');
		$rs = $this->_modelUser->getByidgaleria($id);
		$rs = $rs[0];
		if (!$rs) {
			$this->_helper->FlashMessenger('Operação não permitida');
			$this->_redirect('/admin/acomodacoes/index/id/'.$rs['id']);
		}
		$countDelete = $this->_modelUser->removerGaleria($idGaleria);
		if ($countDelete > 0) {
			
			$this->_helper->FlashMessenger('Removido com sucesso!');
			$this->_redirect('/admin/acomodacoes/index/id/'.$rs['id']);
		}
	}


}