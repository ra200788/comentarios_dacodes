<?php
include './includes/config.php';
if($_POST['guardar']) 
/*{

	$usuario = $_POST['usuario'];
	$contrasena = md5($_POST['contrasena']);
	
	$cons = ("SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'");
	if(!$cons)
	{
		echo "no jala";
	}
	$res = mysqli_query($connect, $cons);
	
	$contar = mysqli_num_rows($res);
	
	if ($contar != 0) {
	
		while($row=mysqli_fetch_assoc($res)) {
		
			if($usuario == $row['usuario'] && $contrasena == $row['contrasena']) 
			
			{
			
				$_SESSION['usuario'] = $usuario;
				
				$_SESSION['id'] = $row['id'];
				
				$_SESSION['rango'] = $row['rango'];
				
				header("Location: index.php");
				
			}
			
		} 
		
	} else { echo "El nombre de usuario y/o contrasena no coinciden"; }
	
}*/

{
    echo $_POST['usuario'];
    echo $_POST['contrasena'];

    $usuario = $_POST['usuario'];
	$contrasena = md5($_POST['contrasena']);
	
	/*$cons = ("SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'");

    if ($usuario == )
    {

    }

*/

$cons = "SELECT * FROM usuarios";
$resultado_cons = mysqli_query($connect , $cons);

while($row = mysqli_fetch_assoc($resultado_cons)){
	$id_usuario = $row["id"];
    $usuariobd = $row["usuario"];
    $passbd = $row["contrasena"];
    //$usuariobd = $row["usuario"];
}
mysqli_free_result($resultado_cons);
if(($usuario = $usuariobd) && ( $contrasena = $passbd))
{
    session_start();    
    //echo  "Si se pudo";
	$_SESSION["id"] = $id_usuario;
    $_SESSION['usuario'] = $usuariobd;
    echo "<script>window.location = 'index.php'</script>";
    
}
else {
    echo "No se puede mi compa, mejor deje este proyecto y dese de baja y coma unos bonless";
}

}
?>