<?php
// application/default/views/helpers/ConverteData.php
class Zend_View_Helper_GetDataNews
{
    public function GetDataNews ($data)
    {
    	$month = date("m", strtotime($data));
    	$month = $this->getMonth($month);
        $day = date("d", strtotime($data));
        return $day.'/'.$month;
    }
    
    public function getMonth($month){
    	switch ($month) {
    		case 1:
    			return "JAN";
    			break;
    		case 2:
    			return "FEV";
    			break;
    		case 3:
    			return "MAR";
    			break;
    		case 4:
    			return "ABR";
    			break;
    		case 5:
    			return "MAI";
    			break;
    		case 6:
    			return "JUN";
    			break;
    		case 7:
    			return "JUL";
    			break;
    		case 8:
    			return "AGO";
    			break;
    		case 9:
    			return "SET";
    			break;
    		case 10:
    			return "OUT";
    			break;
    		case 11:
    			return "NOV";
    			break;
    		case 12:
    			return "DEZ";
    			break;
    	}
    }
    
}
