<?php

class Admin_ServicosController extends Zend_Controller_Action {

	private $_modelUser;

    public function init() {
    	$this->_modelUser = new Admin_Model_Servicos();
        $this->view->title = $this->title = 'Serviços e Passeios';
        $this->view->headTitle()->prepend($this->title);
        $this->flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->view->messages = $this->flashMessenger->getMessages();
    }

    public function indexAction() {
        //    	$this->view->headMeta()->appendName('description', '');
        //     	$this->view->headLink()->prependStylesheet($this->view->baseUrl('/modules/default/css/file.css'));
        //     	$this->view->headScript()->prependFile($this->view->baseUrl('/js/file.js'));

        $this->view->breadcrumb = array($this->title => 'admin/servicos');
       
        $rs = $this->_modelUser->getAll();        
        $rs = ($rs) ? $rs : array();
       
        $page = $this->_getParam('page', 1);
        
        
        $paginator = Zend_Paginator::factory($rs);       
        $paginator->setItemCountPerPage(20);        
        $paginator->setCurrentPageNumber($page);        
        $this->view->rs = $paginator;
    }

    public function adicionarAction() {


        $this->view->breadcrumb = array($this->title => 'admin/servicos', 'Adicionar' => 'admin/servicos/adicionar');
        

        if ($this->_request->isPost()) {
        	
        	$image  = $_FILES['imagem'];
			$video  = $_POST['video'];
			$imageVideo = $_FILES['imagem_video'];
						
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
        				$this->_redirect('/admin/servicos/adicionar');
        			}
        		}
        	}else if($video == ''){
        		$this->_redirect('/admin/servicos');
        	}else{
	        	if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$video)) {
	        		$this->_helper->FlashMessenger('URL inválida!');
	        		$this->_redirect('/admin/servicos/adicionar');
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
	        				$this->_redirect('/admin/servicos/adicionar');
	        			}
	        		}
	        	}else{
	        		$this->_helper->FlashMessenger('Adicione uma imagem para o video!');
	        		$this->_redirect('/admin/servicos/adicionar');
	        	}
        	}
        	
        	$data = array(
        			'id' => $rs['id'],
        			'titulo' => utf8_decode($this->_request->getPost('titulo')),
        			'descricao' => utf8_decode($this->_request->getPost('descricao')),
        			'autoplayer' => $this->_request->getPost('autoplayer'),
        			'tipo' => $this->_request->getPost('tipo')
        	);
        	if($image['name'] == ''){
        		$data['video'] = $video;
        		$data['imagem'] = '';
        		$data['imagem_video'] = $imageVideo;
        	}else{
        		$data['imagem'] = $image;
        		$data['video'] = '';
        		$data['imagem_video'] = '';
        	}
            $return = $this->_modelUser->create($data);
            if ($return != 0) {
                $this->_helper->FlashMessenger('Adicionado com sucesso!');
                $this->_redirect('/admin/servicos');
            }
        }
    }

    public function editarAction() {
        $id = $this->getRequest()->getParam('id');

        $this->view->breadcrumb = array($this->title => 'admin/servicos/editar');
		
        $rs = $this->_modelUser->getByid($id);
        $rs = $rs[0];
        $this->view->rs = $rs;
        
        if (is_null($rs)) {
            $this->_helper->FlashMessenger('Operação não permitida!');
            $this->_redirect('/admin/servicos/');
        }
       
        if ($this->_request->isPost()) {
        	$image  = $_FILES['imagem'];
        	$video  = $_POST['video'];
        	$imageVideo = $_FILES['imagem_video'];
        	
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
        				$this->_redirect('/admin/servicos/editar/id/'.$id);
        			}
        		}
        	}else{
        		if($rs['video'] != $video){
        			if($video != ''){
	        			if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$video)) {
	        				$this->_helper->FlashMessenger('URL inválida!');
	        				$this->_redirect('/admin/servicos/editar/id/'.$id);
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
	        						$this->_redirect('/admin/servicos/editar/id/'.$id);
	        					}
	        				}
	        			}
        			}else{
        				$this->_helper->FlashMessenger('Adicione uma imagem para o video!');
        				$this->_redirect('/admin/servicos/editar/id/'.$id);
        			}
        		}else{
        			$imageVideo = $rs['imagem_video'];
        		}
        	}

            $data = array(
        			'id' => $rs['id'],
        			'titulo' => utf8_decode($this->_request->getPost('titulo')),
        			'descricao' => utf8_decode($this->_request->getPost('descricao')),
            		'autoplayer' => $this->_request->getPost('autoplayer'),
            		'tipo' => $this->_request->getPost('tipo'),
            		'video' => $video,
        	);
        	if($image['name'] == ''){
            	$data['imagem'] = $video == '' ?$rs['imagem'] : '';
            	$data['imagem_video'] = $imageVideo;
            	$imgAntigaVideo = $rs['imagem_video'] == $imageVideo ? '' : $rs['imagem_video'];
            	$imgAntiga = $video != '' ?$rs['imagem'] : '';
            }else{
            	$data['imagem'] = $image;
            	$data['video'] = '';
            	$data['imagem_video'] = '';
            	$imgAntigaVideo = $rs['imagem_video'];
            	$imgAntiga = $rs['imagem'];
            	
            }

            $return = $this->_modelUser->save($data,$imgAntiga,$imgAntigaVideo);

            if ($return) {
                $this->_helper->FlashMessenger('Atualizado com sucesso!');
                $this->_redirect('/admin/servicos/');
            }
        }
    }

    public function removerAction() {
        $id = $this->getRequest()->getParam('id');
        $rs = $this->_modelUser->getByid($id);

        if (!$rs) {
            $this->_helper->FlashMessenger('Operação não permitida');
            $this->_redirect('/admin/servicos');
        }

        $countDelete = $this->_modelUser->remover($id);

        if ($countDelete) {

            $this->_helper->FlashMessenger('Deletado com sucesso!');
            $this->_redirect('/admin/servicos');
        }
    }

}
