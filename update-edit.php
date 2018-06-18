<?php
include "conn.php";
if(isset($_POST['update'])){
				$id			= intval($_POST['id']);
				$nombre	= mysqli_real_escape_string($conn,(strip_tags($_POST['nombre'], ENT_QUOTES)));
				$apellidos	= mysqli_real_escape_string($conn,(strip_tags($_POST['apellidos'], ENT_QUOTES)));
				$direccion  = mysqli_real_escape_string($conn,(strip_tags($_POST['direccion'], ENT_QUOTES)));
				$telefono  	= mysqli_real_escape_string($conn,(strip_tags($_POST['telefono'], ENT_QUOTES)));
				$email 		= mysqli_real_escape_string($conn,(strip_tags($_POST['email'], ENT_QUOTES)));
				$ciudad 	= mysqli_real_escape_string($conn,(strip_tags($_POST['ciudad'], ENT_QUOTES)));
				$sexo 		= mysqli_real_escape_string($conn,(strip_tags($_POST['sexo'], ENT_QUOTES)));
				$notas 		= mysqli_real_escape_string($conn,(strip_tags($_POST['notas'], ENT_QUOTES)));
               
				
				$update = mysqli_query($conn, "UPDATE contacts SET name='$nombre', surnames='$apellidos', address='$direccion' ,tel='$telefono', email='$email', city='$ciudad',sexo='$sexo',notes='$notas' WHERE id_contact='$id'") or die(mysqli_error());
				if($update){
					echo "<script>alert('Los datos han sido actualizados!'); window.location = 'index.php'</script>";
				}else{
					echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
				}
			}
  ?>