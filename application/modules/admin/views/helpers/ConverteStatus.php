<?php
// application/default/views/helpers/ConverteData.php
class Zend_View_Helper_ConverteStatus
{
    public function converteStatus ($status)
    {
    	if ($status == '1') {
    		return 'Processando';
    	}elseif ($status == '2') {
    		return 'Pago';
    	}elseif ($status == '3') {
    		return 'Pagamento Rejeitado';
    	}elseif ($status == '4') {
    		return 'Confirmado';
    	}elseif ($status == '5') {
    		return 'Rejeitado';
    	}elseif ($status == '6') {
    		return 'Completo';
    	}
    }
}
