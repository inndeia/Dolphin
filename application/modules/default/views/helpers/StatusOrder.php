<?php
// application/default/views/helpers/ConverteData.php
class Zend_View_Helper_StatusOrder
{
    public function StatusOrder ($status)
    {
        if ($status == '1') {
            return 'Processando';
             //return $controller;
        } else if($status == '2') {
            return 'Pago';
        } else if($status == '3') {
            return 'Pagamento-Rejeitado';
        } else if($status == '4') {
            return 'Confirmado';
        } else if($status == '5') {
            return 'Rejeitado';
        } else if($status == '6') {
            return 'Completo';
        }
    }
}