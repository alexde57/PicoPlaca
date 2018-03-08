<?php

/**
 * @author alex dominguez
 * 
 */

    
    
 
 
include_once 'picoplaca_mdl.php';
//error_reporting(E_ALL);



$obj = new stdClass();

try{

$objPicoPlaca = new cls_picoplaca();
   

if(isset($_REQUEST['validate'])){
        


        
   $objPicoPlaca->allowed=1;//Set to allowed, by default any car will be allowed
        
    $platenumber = $_REQUEST['platenumber'];
    
    if(strlen($platenumber)<7)
    {
        
        $msg = "The Plate number is not correct ";
        $obj->msg = $msg;
        echo json_encode($obj);	
        return;          
        
    }
    
    $date =  $_REQUEST['dtpDate'];
    
 
    
    
    $hour =  $_REQUEST['hour'];
    $minute =  $_REQUEST['minute'];
    
    $time = $hour.':'.$minute;  
    
    $strDate = strtotime($date);
    $dayw = date('w', $strDate);
    
    try{
        
        if(!$arrayPlatNumber= split('[-]',$platenumber)[1].'')
        {
                 $msg = "The Plate number is not correct, formar ABC-1234";
                 $obj->msg = $msg;
                 echo json_encode($obj);	
                 return;  
            
        }
    }catch(Exception $ex)
    {
        $msg = "The Plate number is not correct ".$ex->getMessage();
        $obj->msg = $msg;
        echo json_encode($obj);	
        return;          
        
    }
  
    $msg="";
    
    //if(!($last_digit =intval(substr($arrayPlatNumber[1],-1)))){

    

    if(!($last_digit =intval(substr($arrayPlatNumber,-1)))){        
        $msg= "ERROR: the plate number is not correct";
    }
    
    
       

 
    
    $objPicoPlaca->day = $dayw;
    $objPicoPlaca->last_digit = $last_digit;
    $objPicoPlaca->time = $time;
    

    
    $timeconverted = date('h:i',strtotime($objPicoPlaca->time));
    
    
        

    
    
    
    $xmlData=$objPicoPlaca->selectXML();
 
    if($xmlData=='-1')
    {
      $msg = "Error, the data could not be loaded".$xmlData;
      $obj->msg = $msg;
      echo json_encode($obj);	
      return;  
        
    }
 
 
    
     foreach($xmlData as $item){
            $timeItemStart = date('h:i',strtotime($item->time_start));
            $timeItemEnd = date('h:i',strtotime($item->time_end));
            if($objPicoPlaca->day==$item->daynumber && $objPicoPlaca->last_digit==$item->lastdigit && ($timeItemStart<=$timeconverted && $timeItemEnd >= $timeconverted))
            {
                $objPicoPlaca->allowed=0;
                
            }
            
     }  
 

 
    
    if($objPicoPlaca->allowed==1){
        
        $msg="<div class='cssAlertYs'>";
        $msg.="<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span>";
        $msg.="You are allowed</div>";
    }else
    {
        $msg="<div class='cssAlertNo'>";
        $msg.="<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span>";   
        $msg.="You are NOT allowed</div>";
    }
    
    
    $obj->msg = $msg;
    $obj->allowed = $objPicoPlaca->allowed;
    echo json_encode($obj);	
    //return $msg;
    
    
    
}//end of if validate
else{
    $msg = "The data could not been sent";
    $obj->msg = $msg;
    echo json_encode($obj);	
    
}




} catch (Exception $e) {
    $msg = $e->getMessage();
    $obj->msg = $msg;
    echo json_encode($obj);	
   
}


?>