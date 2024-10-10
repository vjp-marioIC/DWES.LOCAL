<?php include __DIR__.'/partials/inicio-doc.part.php' ?>
<?php include __DIR__.'/partials/nav.part.php' ?>

<!-- Principal Content Start -->
   <div id="contact">
   	  <div class="container">
   	    <div class="col-xs-12 col-sm-8 col-sm-push-2">
       	   <h1>CONTACT US</h1>
       	   <hr>
       	   <p>Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>

			<?php if (!empty($erroresValidacion)): ?>
				<div class="alert alert-danger">
					<ul>
						<?php foreach ($erroresValidacion as $error): ?>
							<li>
								<?php echo $error ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>

			<?php if (empty($erroresValidacion) && isset($nombre)): ?>
				<div class="alert alert-info">
					<ul>
						<?php foreach ($datos as $clave => $valor): ?>
							<?php if (!empty($valor)): ?>
								<li>
									<?php echo $clave . $valor ?>
								</li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>

	       <form class="form-horizontal" action="<?=$_SERVER['PHP_SELF'];?>" method="post">
	       	  <div class="form-group">
	       	  	<div class="col-xs-6">
	       	  	    <label class="label-control" for="nombre">First Name</label>
	       	  		<input class="form-control" id="nombre" name="nombre" type="text" value="<?php if (!empty($erroresValidacion)) { echo $nombre; }?>">
	       	  	</div>
	       	  	<div class="col-xs-6">
	       	  	    <label class="label-control" for="apellido">Last Name</label>
	       	  		<input class="form-control" id="apellido" name="apellido" type="text" value="<?php if (!empty($erroresValidacion)) { echo $apellido; }?>">
	       	  	</div>
	       	  </div>
	       	  <div class="form-group">
	       	  	<div class="col-xs-12">
	       	  		<label class="label-control" for="correo">Email</label>
	       	  		<input class="form-control" id="correo" name="correo" type="text" value="<?php if (!empty($erroresValidacion)) { echo $correo; }?>">
	       	  	</div>
	       	  </div>
	       	  <div class="form-group">
	       	  	<div class="col-xs-12">
	       	  		<label class="label-control" for="asunto">Subject</label>
	       	  		<input class="form-control" id="asunto" name="asunto" type="text" value="<?php if (!empty($erroresValidacion)) { echo $asunto; }?>">
	       	  	</div>
	       	  </div>
	       	  <div class="form-group">
	       	  	<div class="col-xs-12">
	       	  		<label class="label-control" for="mensaje">Message</label>
	       	  		<textarea class="form-control" name="mensaje"><?php if (!empty($erroresValidacion)) { echo $mensaje; } ?></textarea>

	       	  		<button class="pull-right btn btn-lg sr-button">SEND</button>
	       	  	</div>
	       	  </div>
	       </form>
	       <hr class="divider">
	       <div class="address">
	           <h3>GET IN TOUCH</h3>
	           <hr>
	           <p>Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero.</p>
		       <div class="ending text-center">
			        <ul class="list-inline social-buttons">
			            <li><a href="#"><i class="fa fa-facebook sr-icons"></i></a>
			            </li>
			            <li><a href="#"><i class="fa fa-twitter sr-icons"></i></a>
			            </li>
			            <li><a href="#"><i class="fa fa-google-plus sr-icons"></i></a>
			            </li>
			        </ul>
				    <ul class="list-inline contact">
				       <li class="footer-number"><i class="fa fa-phone sr-icons"></i>  (00228)92229954 </li>
				       <li><i class="fa fa-envelope sr-icons"></i>  kouvenceslas93@gmail.com</li>
				    </ul>
				    <p>Photography Fanatic Template &copy; 2017</p>
		       </div>
	       </div>
	    </div>   
   	  </div>
   </div>
<!-- Principal Content Start -->

<?php include __DIR__.'/partials/fin-doc.part.php' ?>