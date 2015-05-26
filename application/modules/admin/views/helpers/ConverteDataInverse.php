<?php
// application/default/views/helpers/ConverteData.php
class Zend_View_Helper_ConverteDataInverse
{
    public function converteDataInverse ($data)
    {
        $data = explode('/', $data);
        return $data[2] . '-' . $data[1] . '-' . $data[0];
    }
}
