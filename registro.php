<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <?php include("head.php");?>
    </head>
    <body>
       <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="" target="_blank">Agenda</a>
                   
                   
                </div>
            </div>
            <!-- /navbar-inner -->
        </div><br />

            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                            <?php
			if(isset($_POST['input'])){
				$nombre	= mysqli_real_escape_string($conn,(strip_tags($_POST['nombre'], ENT_QUOTES)));
				$apellidos	= mysqli_real_escape_string($conn,(strip_tags($_POST['apellidos'], ENT_QUOTES)));
				$direccion  = mysqli_real_escape_string($conn,(strip_tags($_POST['direccion'], ENT_QUOTES)));
				$telefono  	= mysqli_real_escape_string($conn,(strip_tags($_POST['telefono'], ENT_QUOTES)));
				$email 		= mysqli_real_escape_string($conn,(strip_tags($_POST['email'], ENT_QUOTES)));
				$ciudad  = mysqli_real_escape_string($conn,(strip_tags($_POST['ciudad'], ENT_QUOTES)));
				$sexo  = mysqli_real_escape_string($conn,(strip_tags($_POST['sexo'], ENT_QUOTES)));
				$notas = mysqli_real_escape_string($conn,(strip_tags($_POST['notas'], ENT_QUOTES)));
		
				$insert = mysqli_query($conn, "INSERT INTO contacts(id_contact, name,surnames,address,tel,email,city,sexo,notes,id_user)
															VALUES(NULL,'$nombre','$apellidos','$direccion', '$telefono', '$email', '$ciudad', '$sexo','$notas','1')") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Se ha registrado correctamente</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';
						}
				
			}
			?>
            
            <blockquote>
            Agregar Contacto
            </blockquote>
                         <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php" method="POST" >
										<div class="control-group">
											<label class="control-label" for="nombres">Nombre</label>
											<div class="controls">
												<input type="text" name="nombre" id="nombre" placeholder="Nombres del contacto" class="form-control span8 tip" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="nombres">Apellidos</label>
											<div class="controls">
												<input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="direccion">Dirección</label>
											<div class="controls">
												<input name="direccion" id="direccion" class=" form-control span8 tip" type="text" placeholder="Dirección" required />
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="telefono">Teléfono</label>
											<div class="controls">
												<input type="text" name="telefono" id="telefono" placeholder="Teléfono del contacto" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="email">Email</label>
											<div class="controls">
												<input name="email" id="email" class="form-control span8 tip" type="email" placeholder="Correo electrónico"  required />
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="ciudad">Ciudad</label>
											<div class="controls">
												<input type="text" name="ciudad" id="ciudad" placeholder="Ciudad" class="form-control span8 tip" required>
											</div>
										</div>
                                        
                                      
										<div class="control-group">
											<label class="control-label" for="sexo">Sexo</label>
											<div class="controls">
												<input type="text" name="sexo" id="sexo" placeholder="Sexo" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="notas">Notas</label>
											<div class="controls">
												<input type="text" name="notas" id="notas" placeholder="notas" class="form-control span8 tip" required>
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Registrar</button>
                                               <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
											</div>
										</div>
									</form>
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        
        <!--/.wrapper--><br />
        <div class="footer span-12">
        </div>

        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      
    </body>
