<?php 

?>

<head>
	<meta charset="UTF-8">
	<title>Registro de Usuarios</title>
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">    <link href="./manifest.json" rel="manifest">
    <link rel="stylesheet" href="forms.css">
    <link href="./img/icons/favicon.png" rel="website icon">
	

</head>  
<body>
<div class="container-center center">
        <div class="container-content center">
            <div class="content-action center">
                <h4>Crear cuenta</h4>
                <form action="registrar.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="usuario" id="" placeholder="Usuario" required>
                    <input type="password" name="contrasena" id="" placeholder="Contraseña" required>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" id="image" multiple required>
                            <label for="image" class="custom-file-label">Seleccione una foto</label>
                        </div>
                    </div>
                    <button type="submit" class="btn-purple btn-block" name="crear" id="button" value="Crear">Ingresar</button>  
                    <button type="reset" class="btn btn-dark btn-block">Limpiar</button>
                </form>
                <div class="contenido-link mt-2">
                    <span class="mr-2">¿Ya tienes una cuenta?</span>
                    <a href="login.php"> <button>Iniciar sesión</button> </a>
                </div>
            </div>
            <div class="content-image center">
                <img src="./images/dev-anim.png" alt="Devs" srcset="">
            </div> 
        </div>
    </div>
    
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>