<?php



class Default_Model_Opcionais extends Zend_Db_Table_Abstract

{

    protected $_name = 'tarifa_opcionais';

    protected $_primary = 'id';

    

    public function getAll() {
    	
    	try {
    		$select = $this->select()
    						->from(array('o'=>'tarifa_opcionais'))
    						->order(array('o.id DESC'))
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
    		$select->where('tarifa_opcionais.id = ?', $id);
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
    		$item = $this->getByid($id);
    		
    		$where = $this->getAdapter()->quoteInto("id = $id");
    		$count = $this->delete($where);
    		
    		return $count;
    	} catch (Exception $e) {
    		throw $e;
    	}
    }
    public function save(array $data) {
    	try {
    		
    		$id = $data['id'];
    		unset($data['id']);
    
    		$where = $this->getAdapter()->quoteInto('id = ?', $id);
    
    		$return = $this->update($data, $where);
    
    		if ($return > 0) {
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



