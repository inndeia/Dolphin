<?php

abstract class CardapioDigital_Controller_Rest extends Zend_Controller_Action {

    protected $_user;
    protected $_currentEstablishment;
    protected $_dataPost;
    protected $_model;

    public function init() {
        if ($this->_request->isPost()) {
            $this->_dataPost = $this->_request->getPost();
            
            if (isset($this->_dataPost['submit']))
                unset($this->_dataPost['submit']);
        }
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

//    protected function updateSession ()
//    {
//        try {
//            $_SESSION['user'] = $this->objectToArray($this->_user);
//            return true;
//        }
//        catch (Exception $e) {
//            return false;
//        }
//    
//    }

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

}