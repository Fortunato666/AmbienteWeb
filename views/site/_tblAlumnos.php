<h1>Alumnos ingresados</h1>

<TABLE>
	
	<TR>
		<TD>NOMBRES</TD>
	</TR>

	<?php foreach(Yii::$app->session['s_alumnos'] as $d):?>
		<TR>
			<TD><?php echo $d['nombre'];?></TD>
		</TR>
	<?php endforeach;?>

</TABLE>