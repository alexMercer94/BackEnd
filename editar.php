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
           $id = intval($_GET['id']);
			$sql = mysqli_query($conn, "SELECT * FROM contacts WHERE id_contact='$id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
            
            <blockquote>
            Actualizar datos del contacto
            </blockquote>
                         <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php" method="POST" >
										<div class="control-group">
											<label class="control-label" for="basicinput">ID</label>
											<div class="controls">
												<input type="text" name="id" id="id" value="<?php echo $row['id_contact']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Nombre</label>
											<div class="controls">
												<input type="text" name="nombre" id="nombre" value="<?php echo $row['name']; ?>" placeholder="" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Apellidos</label>
											<div class="controls">
												<input type="text" name="apellidos" id="apellidos" value="<?php echo $row['surnames']; ?>" placeholder="" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Dirección</label>
											<div class="controls">
												<input name="direccion" id="direccion" value="<?php echo $row['address']; ?>" class="form-control span8 tip" type="text"  required />
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Teléfono</label>
											<div class="controls">
												<input type="text" name="telefono" id="telefono" value="<?php echo $row['tel']; ?>" placeholder="" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Email</label>
											<div class="controls">
												<input name="email" id="email" value="<?php echo $row['email']; ?>" class="form-control span8 tip" type="email"  required />
											</div>
										</div>
                                        
                                        <div class="control-group">
											<label class="control-label" for="basicinput">Ciudad</label>
											<div class="controls">
												<input name="ciudad" id="ciudad" value="<?php echo $row['city']; ?>" class=" form-control span8 tip" type="text" required/>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Sexo</label>
											<div class="controls">
												<input name="sexo" id="sexo" value="<?php echo $row['sexo']; ?>" class=" form-control span8 tip" type="text" required/>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Notas</label>
											<div class="controls">
												<input name="notas" id="notas" value="<?php echo $row['notes']; ?>" class=" form-control span8 tip" type="text" required/>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-primary"/>
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
