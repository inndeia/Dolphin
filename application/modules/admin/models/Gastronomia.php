<?php


class Admin_Model_Gastronomia extends Zend_Db_Table_Abstract

{

    protected $_name = 'gastronomia';

    protected $_primary = 'id';

    

    public function getAll() {
    	
    	try {
    		$select = $this->select()
    						->from(array('g'=>'gastronomia'))
    						->order(array('g.id ASC'))
    						->setIntegrityCheck(false);
    		$conteudo = $this->fetchAll($select)->toArray();
    		
    		
    		return $conteudo;
    	} catch (Exception $e) {
    		throw $e;
    	}
    }

    public function create($data) {
    	
    	try {
    			$id = $this->insert($data);
    			if ($id > 0) {
    
    				$item = $this->getByid($id);

    				return $item;
    			} else {
    				return array("error" => 'Erro ao inserir');
    			}
    		
    	} catch (Exception $e) {
    		throw $e;
    	}
    }
    public function getByid($id) {
    	try {
    		$select = $this->select();
    		$select->where('gastronomia.id = ?', $id);
    		$conteudo = $this->fetchAll($select)->toArray();
    	
    		if (count($conteudo) > 0) {
    			return $conteudo;
    		} else {
    			return null;
    		}
    	} catch (Exception $e) {
    		throw $e;
    	}
    	
    }
  
    public function remover($id) {
    	try {
    		$base = new Zend_Controller_Request_Http();  
    		
    		$item = $this->getByid($id);
    		$where = $this->getAdapter()->quoteInto("id = $id");
    		$count = $this->delete($where);
    		if($count){
    			unlink($item[0]['imagem']);
    			unlink($item[0]['imagem_video']);
    		}
    
    		return $count;
    	} catch (Exception $e) {
    		throw $e;
    	}
    }
    public function save(array $data, $imgAntiga = null,$imgAntigaVideo = null) {
    	try {
    		
    		$id = $data['id'];
    		unset($data['id']);
    
    		$where = $this->getAdapter()->quoteInto('id = ?', $id);
    
    		$return = $this->update($data, $where);
    
    		if ($return > 0) {
    			if($imgAntiga != null){
    				unlink($imgAntiga);
    			}
    			if($imgAntigaVideo != null){
    				unlink($imgAntigaVideo);
    			}
    			$conteudo = $this->getByid($id);
    			return $conteudo;
    		} else {
    			return true;
    		}
    	} catch (Exception $e) {
    		throw $e;
    	}
    }
    
    public function getAllGaleria() {
    
    	try {
    		$select = $this->select()
    		->from(array('g'=>'gastronomia_galeria'))
    		->setIntegrityCheck(false);
    		$conteudo = $this->fetchAll($select)->toArray();
    
    
    		return $conteudo;
    	} catch (Exception $e) {
    		throw $e;
    	}
    }
    public function removerGaleria($id) {
    	try {
    		$_galeria = new Admin_Model_GastronomiaGaleria();
    		$item = $this->getByidgaleria($id);
    
    		$where = $_galeria->getAdapter()->quoteInto('id =?', $id);
    		$count = $_galeria->update(array('imagem'=>'','imagem_video'=>'','video'=>''),$where);
    		if($count){
    			unlink($item[0]['imagem']);
    			unlink($item[0]['imagem_video']);
    		}
    
    		return $count;
    	} catch (Exception $e) {
    		throw $e;
    	}
    }
    public function editGaleria(array $data, $imgAntiga = null, $imgAntigaVideo = null) {
    	try {
    		$_galeria = new Admin_Model_GastronomiaGaleria();
    		$id = $data['id'];
    		unset($data['id']);
    
    		$where = $_galeria->getAdapter()->quoteInto('id = ?', $id);
    
    		$return = $_galeria->update($data, $where);
    
    		if ($return > 0) {
    			if($imgAntiga != null){
    				unlink($imgAntiga);
    			}
    			if($imgAntigaVideo != null){
    				unlink($imgAntigaVideo);
    			}
    			$conteudo = $this->getByidgaleria($id);
    			return $conteudo;
    		} else {
    			return true;
    		}
    	} catch (Exception $e) {
    		throw $e;
    	}
    }
    public function getByidgaleria($id) {
    
    	try {
    
    		$select = $this->select()->from(array('g'=>'gastronomia_galeria'))
    		->where('g.id = ?', $id)
    		->setIntegrityCheck(false);
    
    		$conteudo = $this->fetchAll($select)->toArray();
    
    		if (count($conteudo) > 0) {
    			return $conteudo;
    		} else {
    			return null;
    		}
    	} catch (Exception $e) {
    		throw $e;
    	}
    }

}



