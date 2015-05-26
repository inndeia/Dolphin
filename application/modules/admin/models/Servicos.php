<?php



class Admin_Model_Servicos extends Zend_Db_Table_Abstract

{

    protected $_name = 'servicos';

    protected $_primary = 'id';

    

    public function getAll() {
    	
    	try {
    		$select = $this->select()
    						->from(array('s'=>'servicos'))
    						->order(array('s.id DESC'))
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
    		$select->where('servicos.id = ?', $id);
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
    public function save(array $data, $imgAntiga = null,$imgAntigaVideo =null) {
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

}



