<?php

abstract class App_Controller_Action extends Zend_Controller_Action {

    protected $_user;
    protected $_resources;
    protected $_dataPost;
    protected $authStatus = false;
    protected $_model;

    public function init() {
        //@session_start();
        $this->flashMessenger = $this->_helper->FlashMessenger;
        $this->view->messages = $this->flashMessenger->getMessages();
        if ($this->_request->isPost()) {
            $this->_dataPost = $this->_request->getPost();

            if (isset($this->_dataPost['submit'])) {
                unset($this->_dataPost['submit']);
            }
        }

        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $this->authStatus = true;
            $this->_user = $auth->getIdentity();

            $resources = $auth->getIdentity()->getResources();
            if (empty($_SESSION['dolphin']['resources'])) {


                $this->_resources = $resources;
                $_SESSION['dolphin']['resources'] = $resources;

                if ($this->_user->getRoleLabel() == 'admin') {
                    
                }
            } else {
                $this->_resources = $_SESSION['dolphin']['resources'];
            }
        }

        //verificar resources
        $controllerName = $this->_request->getControllerName();
        $roleLabel = $this->_user->getRoleLabel();
        foreach ($this->_resources as $resource) {
            $this->_resources[] = $this->slug($resource);
        }
//        var_dump($roleLabel);
//        var_dump($controllerName);
//        var_dump($this->_resources);

        if ($roleLabel != 'admin' && !in_array($controllerName, $this->_resources)) {
            $this->_helper->flashMessenger->addMessage('Você não tem permissão para acessar esta funcionalidade');
            $this->_redirect('/admin/' . $this->_resources[0]);
        }

        $this->view->user = $this->_user;
        $this->view->resources = $this->_resources;
    }

    public function arrayToObject($d) {
        if (is_array($d)) {
            /*
             * Return array converted to object
             * Using __FUNCTION__ (Magic constant)
             * for recursive call
             */
            return (object) array_map(array($this, 'arrayToObject'), $d);
        } else {
            // Return object
            return $d;
        }
    }

    protected function objectToArray($d) {
        if (is_object($d)) {
            // Gets the properties of the given object
            // with get_object_vars function
            $d = get_object_vars($d);
        }

        if (is_array($d)) {
            /*
             * Return array converted to object
             * Using __FUNCTION__ (Magic constant)
             * for recursive call
             */
            return array_map(array($this, 'objectToArray'), $d);
        } else {
            // Return array
            return $d;
        }
    }

    protected function cleanQuery($string) {
        if (get_magic_quotes_gpc()) {  // prevents duplicate backslashes
            $string = stripslashes($string);
        }
        if (phpversion() >= '4.3.0') {
            $string = mysql_real_escape_string($string);
        } else {
            $string = mysql_escape_string($string);
        }
        return $string;
    }

    public function slug($str) {
        $clean = $this->strRepair($str);
        
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $clean = preg_replace("/[^a-zA-Z0-9\/_| -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_| -]+/", '-', $clean);
        
        return $clean;
    }

    public function strRepair($str) {

        // assume $str esteja em UTF-8
        $map = array(
            'á' => 'a',
            'à' => 'a',
            'ã' => 'a',
            'â' => 'a',
            'é' => 'e',
            'ê' => 'e',
            'í' => 'i',
            'ó' => 'o',
            'ô' => 'o',
            'õ' => 'o',
            'ú' => 'u',
            'ü' => 'u',
            'ç' => 'c',
            'Á' => 'A',
            'À' => 'A',
            'Ã' => 'A',
            'Â' => 'A',
            'É' => 'E',
            'Ê' => 'E',
            'Í' => 'I',
            'Ó' => 'O',
            'Ô' => 'O',
            'Õ' => 'O',
            'Ú' => 'U',
            'Ü' => 'U',
            'Ç' => 'C',
            ' ' => ''
        );
        return strtr($str, $map);
    }

}
