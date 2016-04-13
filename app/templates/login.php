 <?php ob_start() ?>

<div class="container">
	<?php if(isset($params['mensaje'])) :?>
	<b><span style="color: red;"><?php echo $params['mensaje'] ?></span></b>
	<?php endif; ?>
      <form class="form-signin" method="POST" action="index.php?ctl=login">
      <div class="container login">
        <h2 class="form-signin-heading">Inicio Sesion</h2>
        <label for="inputEmail" >Usuario</label>
        <input type="text" name="user" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword">Contraseña</label>
        <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>
        <!-- <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div> -->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </div>
      </form>

    </div>

 <?php $contenido = ob_get_clean() ?>
 <?php include 'layout.php' ?>