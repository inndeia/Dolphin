<?php

class Admin_UsuariosController extends Zend_Controller_Action {

	private $_modelUser;

    public function init() {

    	$this->_modelUser = new Admin_Model_Usuarios();
    
        $this->view->title = $this->title = 'Usuários';
        $this->view->headTitle()->prepend($this->title);
        $this->flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->view->messages = $this->flashMessenger->getMessages();
    }

    public function indexAction() {
        //    	$this->view->headMeta()->appendName('description', '');
        //     	$this->view->headLink()->prependStylesheet($this->view->baseUrl('/modules/default/css/file.css'));
        //     	$this->view->headScript()->prependFile($this->view->baseUrl('/js/file.js'));

        $this->view->breadcrumb = array($this->title => 'admin/usuarios');
       
        $rs = $this->_modelUser->getAll();        
        $rs = ($rs) ? $rs : array();
       
        $page = $this->_getParam('page', 1);
        
        
        $paginator = Zend_Paginator::factory($rs);       
        $paginator->setItemCountPerPage(20);        
        $paginator->setCurrentPageNumber($page);        
        $this->view->rs = $paginator;
    }

    public function inserirAction() {


        $this->view->breadcrumb = array($this->title => 'admin/usuarios', 'Inserir' => 'admin/usuarios/inserir');
        

        if ($this->_request->isPost()) {

            if ($this->_modelUser->verificarEmail($this->_request->getPost('email'))) {
                $this->_helper->FlashMessenger('Email já existente na nossa base de usuários!');
                $this->_redirect($_SERVER['HTTP_REFERER']);
            }

            $data = array(
                'email' => $this->_request->getPost('email'),
                'nome_completo' => $this->_request->getPost('name'),
                'senha' => $this->_request->getPost('passw'),
                'perfil_id' => 1,
            );

            $return = $this->_modelUser->create($data);

            if ($return != 0) {
                $this->_helper->FlashMessenger('Adicionado com sucesso!');
                $this->_redirect('/admin/usuarios');
            }
        }
    }

    public function editarAction() {
        $id = $this->getRequest()->getParam('id');

        $this->view->breadcrumb = array($this->title => 'admin/usuarios/editar');

        $this->view->rs = $rs = $this->_modelUser->getByid($id);

        if (is_null($rs)) {
            $this->_helper->FlashMessenger('Operação não permitida!');
            $this->_redirect('/admin/usuarios/');
        }

        if ($this->_request->isPost()) {

            $data = array(
                'id' => $rs['id'],
                'email' => $this->_request->getPost('email'),
                'nome_completo' => $this->_request->getPost('name')
            );

            if (!empty($this->_dataPost['passw'])) {
                $data['senha'] = $this->_request->getPost('passw');
            }

            $return = $this->_modelUser->save($data);

            if ($return) {
                $this->_helper->FlashMessenger('Atualizado com sucesso!');
                $this->_redirect('/admin/usuarios/');
            }
        }
    }

    public function deleteAction() {
        $id = $this->getRequest()->getParam('id');
        $rs = $this->_modelUser->getByid($id);

        if (!$rs) {
            $this->_helper->FlashMessenger('Operação não permitida');
            $this->_redirect('/admin/usuarios');
        }

        $countDelete = $this->_modelUser->remover($id);

        if ($countDelete) {

            $this->_helper->FlashMessenger('Deletado com sucesso!');
            $this->_redirect('/admin/usuarios');
        }
    }

}
