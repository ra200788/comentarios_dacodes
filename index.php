<?php
session_start();
include "includes/config.php";
include "includes/funciones.php";

if(!isset($_SESSION['usuario'])) {
	header("Location: login.php");
}

ini_set('error_reporting',0);
?>
<!doctype html>
<html lang="es-ES">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <title>Sistema de Comentarios TUNTORIALES</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</head>

<body>

<div id="L">

<h1>SISTEMA DE COMENTARIOS TUNTORIALES <a class="button" href="logout.php">(SALIR)</a></h1>

<form action="" method="post"  enctype="multipart/form-data">
  <label for="textarea"></label>
  <center>
    <p>
      <textarea name="comentario" cols="80" rows="5" id="textarea" onclick="mostrarBtnFile()"><?php if(isset($_GET['user'])) { ?>@<?php echo $_GET['user']; ?><?php } ?> </textarea>
         <input type="file" name="image" id="image_Insert" multiple hidden required>
     </p>
    <p>
      <input type="submit" <?php if (isset($_GET['id'])) { ?>name="reply"<?php } else { ?>name="comentar"<?php } ?>value="Comentar">
    </p>
  </center>
</form>

<?php
	if(isset($_POST['comentar'])) {
    if (isset($_FILES['image'])) {
    $nombreImg = $_FILES['image']['name'];
      $ruta = $_FILES['image']['tmp_name'];
      $destino = "images/img_coment/" . $nombreImg;
      if (move_uploaded_file($ruta, $destino)) {
		$query = mysqli_query($connect, "INSERT INTO comentarios (comentario,usuario,url_img_coment,fecha) value ('".$_POST['comentario']."','".$_SESSION['id']."','".$destino."',NOW())");	
      }}
 	if($query) { header("Location: index.php"); }}
?>

<?php
	if(isset($_POST['reply'])) {

    if (isset($_FILES['image'])) {
      $nombreImg = $_FILES['image']['name'];
        $ruta = $_FILES['image']['tmp_name'];
        $destino = "images/img_coment/" . $nombreImg;
        if (move_uploaded_file($ruta, $destino)) {
      



		$query = mysqli_query($connect, "INSERT INTO comentarios (comentario,usuario,url_img_coment,fecha,reply) value ('".$_POST['comentario']."','".$_SESSION['id']."','".$destino."',NOW(),'".$_GET['id']."')");	
  }}if($query) { header("Location: index.php"); }
	}
?>

<br>

	<div id="container">
    	<ul id="comments">
        
        <?php
		
        $comentarios = $connect->query( "SELECT * FROM comentarios WHERE reply = 0 ORDER BY id DESC");

		while($row= mysqli_fetch_array($comentarios)) {
 			$usuario = mysqli_query($connect, "SELECT * FROM usuarios WHERE id = '".$row['usuario']."' ");
      $user = mysqli_fetch_array($usuario);

		?>
       
        	<li class="cmmnt">
            	<div class="avatar">
                <img src="<?php echo $user['avatar'];  ?>" height="55" width="55" alt=""  title="Imagen de ejemplo">
                </div>
                <div class="cmmnt-content">
                	<header>
                    <a href="#" class="userlink"><?php echo $user['usuario']; ?></a> - <span class="pubdate"><?php echo $row['fecha']; ?></span>
                    </header>
       
                    <?php echo $row['comentario']; 

                    ?>             <p>
                    <br>
                  <img src="<?php echo $row['url_img_coment']; ?>" id="image_Coment" height="55" width="55" >
                  <button id="btn" onclick="original()" hidden>Resetear Imagen</button>
                
                </p>
                    <span>
                    <a href="index.php?user=<?php echo $user['usuario']; ?>&id=<?php echo $row['id']; ?>">
                    Responder
                    </a>
                    </span>
                </div>
                
                <?php
                $coment_a = mysqli_query($connect, "SELECT * FROM comentarios WHERE reply = '".$row['id']."'");
				        $contar = mysqli_num_rows($coment_a);
				if($contar != '0') {
					
					$reply = $connect->query("SELECT * FROM comentarios WHERE reply = '".$row['id']."' ORDER BY id DESC");
					while($rep=mysqli_fetch_array($reply)) {
						
					$usuario2 = mysqli_query( $connect, "SELECT * FROM usuarios WHERE id = '".$rep['usuario']."' or usuario = '".$rep['usuario']."' ");
					$user2 = mysqli_fetch_array($usuario2);
            $consultaNombres = $connect->query("SELECT * FROM usuarios WHERE id = '".$rep['usuario']."'");

          $datos = mysqli_fetch_array($consultaNombres);

				?>
                
                <ul class="replies">
                	<li class="cmmnt">
                    	<div class="avatar">
                <img src="<?php echo $user2['avatar']; ?>" height="55" width="55">
                </div>
                	<div class="cmmnt-content">
                        <header>
                        <a href="#" class="userlink"><?php echo $datos['usuario']; ?></a> - <span class="pubdate"><?php echo $rep['fecha']; ?></span>
                        </header>
                       
                        <?php echo $rep['comentario']; ?> <p>
                        <img src="<?php echo $rep['url_img_coment']; ?>" id="image_Coment" height="55" width="55" >
                  <button id="btn" onclick="original()" hidden>Resetear Imagen</button>
                        </p>
                    </div>
                    
                    </li>
                </ul>
                
                <?php } } } ?>
                
                
            </li>        
        
        </ul>
    </div>
       
        
        
        

</div>
<script>
    

    $("p img").one( "click", function() {
  $( this ).height( 300);

     $( this ).width( 300);
 
 });

 $("p img").dblclick(function(){
  $( this ).height( 55);

     $( this ).width( 55);

   
 })

 

              /*
     window.addEventListener('click', function(e){   
     if (document.getElementById('textarea').contains(e.target)){
      document.getElementById("image_Insert").hidden = false;
}else{
  document.getElementById("image_Insert").hidden = true;
}
 
});
   function tamanioreal()
    {
 
    
      document.getElementsByClassName("img_Coment").height="300";
      document.getElementById("image_Coment").height="300";
      document.getElementById("image_Coment").width="300";
      document.getElementById("btn").hidden = false;
    }
    
    function original(){
      document.getElementById("image_Coment").height="55";
      document.getElementById("image_Coment").width="55";
      document.getElementById("btn").hidden = true;

    }
 
    function mostrarBtnFile(){
   
      document.getElementById("image_Insert").hidden = false;
    } */
 

 
</script>
</body>
</html>
