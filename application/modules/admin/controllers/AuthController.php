<?php

class Admin_AuthController extends Zend_Controller_Action {

    private $_modelUser;

    public function init() {
        /* Initialize action controller here */
       // $this->_modelUser = new UserModel();

        $this->_helper->layout->disableLayout();
    }

    public function indexAction() {
        // action body
    }

    public function loginAction() {
    	$this->flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->view->messages = $this->flashMessenger->getMessages();

        //Verifica se existem dados de POST
        if ( $this->getRequest()->isPost() ) {
        	$login = $this->_request->getPost('email');
        	$senha = $this->_request->getPost('password');
            //Formulário corretamente preenchido?
            if ($login != null && $senha != null ) {
 
                try {
                    Admin_Model_Auth::login($login, $senha);
                    //Redireciona para o Controller protegido
                    return $this->_helper->redirector->goToRoute( array('module'=>'admin','controller' => 'index','action'=>'index'), null, true);
                } catch (Exception $e) {
                    //Dados inválidos
                    $this->_helper->FlashMessenger($e->getMessage());
                    $this->_redirect('/admin/auth/login');
                }
            } else {
                //Formulário preenchido de forma incorreta
                $form->populate($data);
            }
        }
    }
    
    public function loginmobileAction() {
    	header('Access-Control-Allow-Origin: *');
    	
    	$this->getHelper('Layout')
    	->disableLayout();
    	
    	$this->getHelper('ViewRenderer')
    	->setNoRender();
    	
    	if ( $this->getRequest()->isPost() )
		{
			$email = $this->_request->getPost('email_txt');
			$senha = $this->_request->getPost('password_txt');
			try {

				$_serviceAuth = new AuthService();
                $result = $_serviceAuth->login($email, $senha);
				
				$jsonData = Zend_Json::encode($result);
				
				$this->getResponse()
				->setHeader('Content-Type', 'text/json')
				->setBody($jsonData)
				->sendResponse();
				exit;
	
			} catch (Exception $e) {
				throw $e;
			}
		}
    	
    }

    public function logoutAction() {
        // action body
        $this->_helper->viewRenderer->setNoRender(true);
        $auth = Zend_Auth::getInstance();
        $auth->clearIdentity();

        session_destroy();

        $this->_redirect('/admin');
    }

    public function esqueciASenhaAction() {
        // action body
//         $this->_helper->viewRenderer->setNoRender(true);
        if ($this->getRequest()->isPost()) {
            $email = $this->getRequest()->getPost('email');
            $_serviceAuth = new AuthService();
            $_serviceAuth->recoveryPassword($email);
        }
    }

}
