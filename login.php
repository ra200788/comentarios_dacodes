<?php
session_start();
include "includes/config.php";
include "includes/funciones.php";

if(isset($_SESSION['usuario'])) {
	header("Location: index.php");
}

ini_set('error_reporting',0);
?>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="forms.css">
</head>
<div class="container-center center">
    <div class="container-content center">
        <div class="content-action center">
            <h4>Iniciar sesión</h4>
            <form action="loguear.php" method="POST">
                <input type="text" name="usuario" id="textfield" placeholder="Usuario" required>
                <input type="password" name="contrasena" id="textfield2" placeholder="Contraseña" required>
                <button type="submit" class="btn btn-purple btn-large btn-block" name="guardar" id="button" value="Entrar">Entrar</button>
            </form>
            <div class="contenido-link mt-2">
                <span class="mr-2">¿No tienes una cuenta?</span>
                <a href="registro.php"><button>Registrarme</button></a>
            </div>
        </div>
        <div class="content-image center">
            <img src="./images/dev-anim.png" alt="Devs" srcset="">
        </div>
    </div>
</div>
  <!--<p>
    <label for="textfield"></label>
    Usuario: 
    <input type="text" name="usuario" id="textfield" />
  </p>
  <p>
    Contraseña: 
    <input type="password" name="contrasena" id="textfield2" />
  </p>
  <p>
    <input type="submit" name="guardar" id="button" value="Entrar" />
  </p>
  
         <p>¿No tienes una cuenta?<a class="link" href="login.php">Registrate</a></p>-->
</form>



