<?php 
	
	$tabla=3;
	$suma = 0;
	

	for($k=0;$k<10;$k++){
		
		$m = ($tabla*$k)+$suma;
		//echo $m.'<br>';
		if(($m%2)==0){
			echo $tabla.'X'.$k.'='.$m.'<br>';
		}

		
	}

?>