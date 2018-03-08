<?php	
/**
 * @author alex dominguez
 * 
 */

	
class cls_picoplaca{
	var $last_digit;	
	var $day;
	var $time;
    var $allowed;
    
	
    
    function selectXML(){
        
            if($xmlData=simplexml_load_file("data.xml"))
             {
                return $xmlData;  
             }else{
                
                return '-1';
             }
             
    }
    
		
	/*function select_digit(){
		$conexion = new cls_conexion();
		$conexion->conectarOracle();
	
	
        $sqlStr = "select from picoplaca 
                   where last_digit = ".$this->last_digit." day = ".$this->day." 
                   and time_begin <=".$time." and time_end >=".$time;
			
		
		@$result= pg_query($conexion->con,$sql);
		if ($result) {
					//Tecnicos
					$oid = 0;//pg_last_oid($result);
					
					while($row = pg_fetch_array($result))
					{
						$oid = $row['sact_id'];
					}
					$this->sact_id= $oid;
			
				return "REGISTRO INSERTADO";
		} else {
				return "ERROR AL INSERTAR ".pg_last_error($conexion->con);
		}
		
	}*/
		


	
}//end of class	

?>