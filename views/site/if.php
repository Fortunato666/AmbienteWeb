<h2>:::::..Estructura de control IF..:::::</h2>


<?php 

$numero = 6;
$numero2 = 0;
$operador = '/';

echo 'numero 1 =' .$numero.'<BR>';
echo 'numero 2 = '.$numero2.'<BR>';

if($numero==$numero2){
	echo 'es Igual <BR>';
}
else{
	echo  'NO ES IGUAL  <BR>';
}

if($numero>$numero2)
{
	echo 'EL NUMERO ES MAYOR  <BR>';
}
else{
	echo 'EL NUMERO NO ES MAYOR  <BR>';
}


if($numero>=$numero2)
{
	echo 'EL NUMERO ES MAYOR E IGUAL  <BR>';
}
else{
	echo 'EL NUMERO NO ES MAYOR NI IGUAL  <BR>';
}


if($numero<$numero2)
{
	echo 'EL NUMERO ES MENOR  <BR>';
}
else{
	echo 'EL NUMERO NO ES MENOR  <BR>';
}

if($numero<=$numero2)
{
	echo 'EL NUMERO ES MENOR E IGUAL  <BR>';
}
else{
	echo 'EL NUMERO NO ES MENOR NI IGUAL  <BR>';
}


if($numero!=$numero2)
{
	echo 'EL NUMERO ES DIFERENTE  <BR>';
}
else{
	echo 'EL NUMERO NO ES DIFERENETE  <BR>';
}



?>

=============================================

<?php
	echo '<br>';
if($operador=='+')
{
	$suma = $numero+$numero2;
	
	echo "LA SUMA DE $numero + $numero2 =".$suma.'<br>';
}


if($operador=='-')
{
	$suma = $numero-$numero2;
	
	echo "LA resta DE $numero - $numero2 =".$suma.'<br>';
}

if($operador=='*')
{
	$suma = $numero*$numero2;
	
	echo "LA Multiplicacion DE $numero X $numero2 =".$suma.'<br>';
}

if($operador=='/')
{
	if($numero2==0){
		echo 'No se puede realizar operacion con 0';
	}
	else{

		$suma = $numero/$numero2;
		
		echo "LA Division DE $numero / $numero2 =".$suma.'<br>';
	}
}

?>