<h1>  matriz  </h1>

<?php 
  $planilla[] = array('nombres'		=>'Denys',
                      'apellidos'   =>'urquilla',
                      'salario'		=> '2000.00',
                      'direccion' 	=>'XXXXXX');

  $planilla[] = array('nombres'		=>'Guadalupe',
                      'apellidos'   =>'XXXXXXXYYY',
                      'salario'		=> '3000.00',
                  	   'direccion' 	=>'XXXXXX');


  $planilla[] = array('nombres'		=>'Marcelino',
                      'apellidos'   =>'zzzzzz',
                      'salario'		=> '4000.00',
                      'direccion' 	=>'XXXXXX');




  //estrurctura control foreach

?>

<table class='table'>
	<tr>
		<td>Nombres</td>
		<td>Apellidos</td>
		<td>Salario</td>
		<td>Direccion</td>
	</tr>

<?php foreach($planilla as $p): ?>
	<tr>
		<td><?php echo $p['nombres'];?> </td>
		<td><?php echo $p['apellidos'];?></td>
		<td><?php echo $p['salario'];?></td>
		<td><?php echo $p['direccion'];?></td>
	</tr>

<?php endforeach;?>
    
    
</table>