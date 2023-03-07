<?php
include './includes/config.php';
if($_POST['crear']) 
{
    //echo $_POST['usuario'];
    //echo $_POST['contrasena'];

    
    //$img = $_POST
    /*
    $carpeta = '';
    opendir($carpeta);
    $rutaImagen = 'images/imagenesPerfil/'.$_FILES['imagen']['name'];
    $ruta = $carpeta . $_FILES['imagen']['name'];
    copy($_FILES['imagen']['temp_name'], $ruta);
*/
    
        $usuario = $_POST['usuario'];
	    $contrasena = md5($_POST['contrasena']);
        /*$ruta = $rutaImagen*/
    
        if (isset($_FILES['image'])) {
            $nombreImg = $_FILES['image']['name'];
            $ruta = $_FILES['image']['tmp_name'];
            $destino = "images/imagenesPerfil/" . $nombreImg;
      
            $imagen = $_POST['image'];
        
            if (move_uploaded_file($ruta, $destino)) {
  
 
        $insertar = $connect->query("INSERT INTO usuarios(usuario , contrasena, avatar) VALUES ('$usuario' , '$contrasena' , '$destino')");

       
        }

    }

    
	
	/*$cons = ("SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'");

    if ($usuario == )
    {

    }

*/
/*
$cons = mysqli_query($connect, "INSERT INTO usuarios(usuario , contrasena, avatar) VALUES ($usuario , $contrasena , $ruta)");
*/
/*while($row = mysqli_fetch_assoc($resultado_cons)){
    $usuariobd = $row["usuario"];
    $passbd = $row["contrasena"];
    //$usuariobd = $row["usuario"];
}
mysqli_free_result($resultado_cons);*/
if($insertar == true)
{
    
    echo "<script>window.location = 'login.php'</script>";
    echo "Si se registro exitosamente";
    
}
else {
    echo "No se puede mi compa, mejor deje este proyecto y dese de baja y coma unos bonless";
}

}
?>