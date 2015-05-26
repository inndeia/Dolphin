<?php
class Admin_DolphinController extends Zend_Controller_Action
{
	private $_modelDolphin;
	
	public function init()
	{
		$this->_modelUser = new Admin_Model_Dolphin();
        $this->view->title = $this->title = 'Dolphin';
        $this->view->headTitle()->prepend($this->title);
        $this->flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->view->messages = $this->flashMessenger->getMessages();
	}
	public function preDispatch()
	{
		$ajaxContext = $this->_helper->getHelper('AjaxContext');
		$ajaxContext->addActionContext('salvarimagem', 'json')
					->addActionContext('crop', 'json')
		->initContext();
	}

	public function indexAction()
	{
		
	}
	public function conteudoAction()
	{
		
		$this->view->breadcrumb = array($this->title => 'admin/dolphin/conteudo');
		 
		$rs = $this->_modelUser->getAll();
				
		$rs = ($rs) ? $rs : array();
		$this->view->rs = $rs;
		
	}
	public function editarConteudoAction(){
		
		$id = $this->getRequest()->getParam('id');
		
		$this->view->breadcrumb = array($this->title => 'admin/dolphin/editar-conteudo/id/'.$id);
		
		$rs = $this->_modelUser->getByid($id);
		$rs =$rs[0];
		
		$this->view->rs = $rs;
		
		if (is_null($rs)) {
			$this->_helper->FlashMessenger('Operação não permitida!');
			$this->_redirect('/admin/dolphin/conteudo');
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
        				$this->_redirect('/admin/dolphin/editar-conteudo/id/'.$id);
        			}
        		}
        	}else{
        		if($rs['video'] != $video){
        			if($video != ''){
			        	if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$video)) {
			        		$this->_helper->FlashMessenger('URL inválida!');
			        		$this->_redirect('/admin/dolphin/editar-conteudo/id/'.$id);
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
			        				$this->_redirect('/admin/dolphin/editar-conteudo/id/'.$id);
			        			}
			        		}
			        	}else{
			        		$this->_helper->FlashMessenger('Adicione uma imagem para o video!');
			        		$this->_redirect('/admin/dolphin/editar-conteudo/id/'.$id);
			        	}
        			}
        		}else{
        			$imageVideo = $rs['imagem_video'];
        		}
        	}
			$data = array(
					'id' => $rs['id'],
					'titulo' => utf8_decode($this->_request->getPost('titulo')),
					'descricao' => utf8_decode($this->_request->getPost('descricao'))
			);
			if($image['name'] == ''){
            	$data['video'] = $video;
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
					
			$return = $this->_modelUser->save($data,$imgAntiga, $imgAntigaVideo);
		
			if ($return) {
				$this->_helper->FlashMessenger('Atualizado com sucesso!');
				$this->_redirect('/admin/dolphin/conteudo');
			}
		}
	}
	public function salvarimagemAction(){
		$this->_helper->viewRenderer->setNoRender();
		$this->_helper->layout->disableLayout();
		
		
		$imagem		= ( isset( $_FILES['file'] ) && is_array( $_FILES['file'] ) ) ? $_FILES['file'] : NULL;
		$tem_crop	= false;
		$img		= '';
		
		// valida a imagem enviada
		if( $imagem['tmp_name'] )
		{
			// armazena dimensões da imagem
			$imagesize = getimagesize( $imagem['tmp_name'] );
		
			if( $imagesize !== false )
			{
					
				$ext = pathinfo($imagem['name']);
				$ext = $ext['extension'];
				// move a imagem para o servidor
				$nome = 'images/'.date('dmYGis').'.'.$ext;
				if( move_uploaded_file( $imagem['tmp_name'], $nome) )
				{
					include( 'm2brimagem.class.php' );
					$oImg = new m2brimagem( $nome );
					// valida via m2brimagem
					if( $oImg->valida() == 'OK' )
					{
						// redimensiona (opcional, só pra evitar imagens muito grandes)
						//$oImg->redimensiona( '500', '', '' );
						// grava nova imagem
						$oImg->grava( $nome );
						// novas dimensões da imagem
						$data = array();
						$data['imagesize'] 	= getimagesize( $nome );
						$data['img']		= '<img src="'.$this->view->baseUrl().'/'.$nome.'" id="jcrop" '.$data['imagesize'][3].' />';
						$data['nome'] 	= $nome;
						
						echo json_encode($data);
					}
				}
			}
		}else{
			echo'erro';
		}
	}
	public function cropAction(){
		
		include( 'm2brimagem.class.php' );
		$oImg = new m2brimagem( $_POST['img'] );
		if( $oImg->valida() == 'OK' )
		{
			
			$oImg->posicaoCrop( $_POST['x'], $_POST['y'] );
			$oImg->redimensiona( $_POST['w'], $_POST['h'], 'crop' );
			$oImg->grava( $_POST['img'] );
			
		}
		return;
	}
	public function galeriaAction(){
		$this->view->breadcrumb = array($this->title => 'admin/dolphin/conteudo');
			
		$rs = $this->_modelUser->getAllGaleria();
		
		$rs = ($rs) ? $rs : array();
		$this->view->rs = $rs;
	}
	public function galeriaEstruturaAction(){
		$this->view->breadcrumb = array($this->title => 'admin/dolphin/conteudo');
			
		$rs = $this->_modelUser->getAllGaleriaEstrutura();
	
		$rs = ($rs) ? $rs : array();
		$this->view->rs = $rs;
	}
	
	public function editarGaleriaAction(){
	
		$id = $this->getRequest()->getParam('id');
	
		$this->view->breadcrumb = array($this->title => 'admin/dolphin/editar-galeria');
	
		$rs = $this->_modelUser->getByidgaleria($id);
		$rs =$rs[0];
	
		$this->view->rs = $rs;
	
		if (is_null($rs)) {
			$this->_helper->FlashMessenger('Operação não permitida!');
			$this->_redirect('/admin/dolphin/galeria');
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
        				$this->_redirect('/admin/dolphin/galeria');
        			}
        		}
        	}else if($video == ''){
        		$this->_redirect('/admin/dolphin/galeria');
        	}else{
        		if($rs['video'] != $video){
		        	if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$video)) {
		        		$this->_helper->FlashMessenger('URL inválida!');
		        		$this->_redirect('/admin/dolphin/galeria');
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
		        				$this->_redirect('/admin/dolphin/galeria');
		        			}
		        		}
		        	}else{
		        		$this->_helper->FlashMessenger('Adicione uma imagem para o video!');
		        		$this->_redirect('/admin/dolphin/galeria');
		        	}
		       	}else{
		       		$this->_redirect('/admin/dolphin/galeria');
		       	}
        	}
			$data = array(
					'id' => $rs['id']
			);
			if($image['name'] == ''){
            	$data['video'] = $video;
            	$data['imagem'] = '';
            	$data['imagem_video'] = $imageVideo;
            	$imgAntigaVideo = $rs['imagem_video'];
            	$imgAntiga = $rs['imagem'];
            }else{
            	$data['imagem'] = $image;
            	$data['video'] = '';
            	$data['imagem_video'] = '';
            	$imgAntigaVideo = $rs['imagem_video'];
            	$imgAntiga = $rs['imagem'];
            	
            }
			
				
			$return = $this->_modelUser->editGaleria($data, $imgAntiga, $imgAntigaVideo);
	
			if ($return) {
				$this->_helper->FlashMessenger('Atualizado com sucesso!');
				$this->_redirect('/admin/dolphin/galeria');
			}
		}
	}
	public function editarGaleriaEstruturaAction(){
	
		$id = $this->getRequest()->getParam('id');
	
		$this->view->breadcrumb = array($this->title => 'admin/dolphin/editar-galeria-estrutura');
	
		$rs = $this->_modelUser->getByidgaleriaestrutura($id);
		$rs =$rs[0];
	
		$this->view->rs = $rs;
	
		if (is_null($rs)) {
			$this->_helper->FlashMessenger('Operação não permitida!');
			$this->_redirect('/admin/dolphin/galeria-estrutura');
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
						$this->_redirect('/admin/dolphin/galeria-estrutura');
					}
				}
			}else if($video == ''){
				$this->_redirect('/admin/dolphin/galeria-estrutura');
			}else{
				if($rs['video'] != $video){
					if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$video)) {
						$this->_helper->FlashMessenger('URL inválida!');
						$this->_redirect('/admin/dolphin/galeria-estrutura');
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
								$this->_redirect('/admin/dolphin/galeria-estrutura');
							}
						}
					}else{
						$this->_helper->FlashMessenger('Adicione uma imagem para o video!');
						$this->_redirect('/admin/dolphin/galeria-estrutura');
					}
				}else{
					$this->_redirect('/admin/dolphin/galeria-estrutura');
				}
			}
			$data = array(
					'id' => $rs['id']
			);
			if($image['name'] == ''){
				$data['video'] = $video;
				$data['imagem'] = '';
				$data['imagem_video'] = $imageVideo;
				$imgAntigaVideo = $rs['imagem_video'];
				$imgAntiga = $rs['imagem'];
			}else{
				$data['imagem'] = $image;
				$data['video'] = '';
				$data['imagem_video'] = '';
				$imgAntigaVideo = $rs['imagem_video'];
				$imgAntiga = $rs['imagem'];
				 
			}
				
	
			$return = $this->_modelUser->editGaleriaEstrutura($data, $imgAntiga, $imgAntigaVideo);
	
			if ($return) {
				$this->_helper->FlashMessenger('Atualizado com sucesso!');
				$this->_redirect('/admin/dolphin/galeria-estrutura');
			}
		}
	}
	public function removerGaleriaAction(){
		$id = $this->getRequest()->getParam('id');
		$rs = $this->_modelUser->getByidgaleria($id);
		$rs = $rs[0];
		if (!$rs) {
			$this->_helper->FlashMessenger('Operação não permitida');
			$this->_redirect('/admin/dolphin/galeria');
		}
		
		$countDelete = $this->_modelUser->removerGaleria($id);
		
		if ($countDelete) {
		
			$this->_helper->FlashMessenger('Removido com sucesso!');
			$this->_redirect('/admin/dolphin/galeria');
		}
	}
	public function removerGaleriaEstruturaAction(){
		$id = $this->getRequest()->getParam('id');
		$rs = $this->_modelUser->getByidgaleriaestrutura($id);
		$rs = $rs[0];
		if (!$rs) {
			$this->_helper->FlashMessenger('Operação não permitida');
			$this->_redirect('/admin/dolphin/galeria-estrutura');
		}
	
		$countDelete = $this->_modelUser->removerGaleriaEstrutura($id);
	
		if ($countDelete) {
	
			$this->_helper->FlashMessenger('Removido com sucesso!');
			$this->_redirect('/admin/dolphin/galeria-estrtura');
		}
	}


}