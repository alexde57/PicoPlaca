<!doctype html>
<html>
<head>

<meta charset="utf-8">
<title>Pico y Placa Validator</title>
    <link href="ext/datepicker.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="ext/validationEngine.jquery.css" type="text/css"/>   
    <script type="text/javascript" src="ext/jquery/jquery-1.11.1.js"></script>
   
     <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script> 
<style>

 /* The alert message box */
.cssAlertNo {
    padding: 20px;
    background-color: #f44336; /* Red */
    color: white;
    margin-bottom: 15px;
}
.cssAlertYs{
    padding: 20px;
    background-color: #4CAF50; /* Red */
    color: white;
    margin-bottom: 15px;
}
/* The close button */
.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

/* When moving the mouse over the close button */
.closebtn:hover {
    color: black;
} 
</style> 
    
<script>
$(document).ready(function(){
    
            $('#btnValidate').click(function() {
                 if($("#frmIDSAct").valid()){ 
                    guardarDatos();
                    return false;
                 }

			});	
            
            

 });
	 

		function guardarDatos(){
			$.ajax({
					url: "picoplaca_ctl.php?validate=on",						 		 
					type: "POST",             // Type of request to be send, called as method
				    data: $('#frmIDSAct').serialize(),
					dataType: "json",
					success: function(data)   // A function to be called if request succeeds
					  {
					   //alert('MENSAJE '+data);
						 // $("#msgResponse").empty();
						  $("#msgResponse").append(data.msg);						  
						  alert(data.msg);

					  },
                     error: function(xhr, textStatus, error){
                        alert('ERROR' + error);
                                console.log(xhr.statusText);
                                console.log(textStatus);
                                console.log(error);
                         }
					});		
		}		 
</script>
<style>	
		.inp_dlg{
			border:solid 1px;
			background:none;
		}
</style>
</head>

<body>

<div align="left"><button id="btnValidate">Validate</button></div>
<form name="frmIDSAct" id="frmIDSAct" novalidate >
<fieldset  style="border:solid 1px;padding:27px;">
<legend><strong>Validate Pico y Placa</strong></legend>


    <label for="platenumber"><strong>Plate Number (*required in format ABC-1234):</strong></label><br>
    <input type="text" name="platenumber" id="platenumber" style="border:solid 1px;background:none;"  maxlength="8" required/><br>
    <label for="dtpDate"><strong>Date (*):</strong></label><br>
    <input type="text" class="datepicker" name="dtpDate" id="dtpDate" required/><br><br>
    <label for="hour"><strong>Hour (*):</strong></label>
     <select id="hour" name="hour" required>
     <option value="00" selected>00</option>
     <?php 
     
        for($i=1;$i<24;$i++){
            
            if($i<10){
                
                $val='0'.$i;
            }else
            {
                 $val=''.$i;
            }
          
            echo "<option value='$val' >$val</option>";
        }
        
     ?>
    </select> 
    
    <label for="minute"><strong>Minutes (*):</strong></label>
         <select id="minute" name="minute" required>
     <option value="00" selected>00</option>
     <?php 
     
        for($i=1;$i<60;$i++){
              if($i<10){
                
                $val='0'.$i;
            }else
            {
                 $val=''.$i;
            }
            
            echo "<option value='$val' >$val</option>";
        }
        
     ?>
    </select> 
    <br /><br />
    
    <br />
    <div role="alert" id="msgResponse" class="cssAlert"></div>
    
</fieldset>
</form>

</body>
</html>
<script src="ext/datepicker.js"></script>
<script>
$("#frmIDSAct").validate();
</script>