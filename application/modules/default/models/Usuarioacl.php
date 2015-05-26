<?php

class Usuarioacl implements Zend_Acl_Role_Interface {

    private $_email;
    private $_cpf;
    private $_roleId;
    private $_roleLabel;
    private $_fullName;
    private $_id;
    private $_resources;

    /**
     * @return the $_id
     */
    public function getId() {
        return $this->_id;
    }

    /**
     * @param field_type $_id
     */
    public function setId($_id) {
        $this->_id = (int) $_id;
    }

    public function getCpf() {
        return $this->_cpf;
    }

    public function setCpf($cpf) {
        $this->_cpf = (string) $cpf;
    }
    
    public function getEmail() {
        return $this->_email;
    }

    public function setEmail($userName) {
        $this->_email = (string) $userName;
    }

    public function getFullName() {
        return $this->_fullName;
    }

    public function setFullName($fullName) {
        $this->_fullName = (string) $fullName;
    }

    /**
     *
     */
    public function getRoleId() {
        return $this->_roleId;
    }

    public function setRoleId($roleId) {
        $this->_roleId = (string) $roleId;
    }

    public function getRoleLabel() {
        return $this->_roleLabel;
    }

    public function setRoleLabel($roleLabel) {
        $this->_roleLabel = (string) $roleLabel;
    }

    public function getResources() {
        return $this->_resources;
    }

    public function setResources($resources) {
        $this->_resources = $resources;
    }

}
