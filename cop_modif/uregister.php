<?php 

include 'connect.php';

if(isset($_POST['signUp'])){
    $nombre_completo=$_POST['nombre_completo'];
    $apellido_completo=$_POST['apellido_completo'];
    $gmail=$_POST['gmail'];
    $contraseña=$_POST['contraseña'];
    $contraseña=md5($contraseña);

     $checkEmail="SELECT * From usuario where gmail='$gmail'";
     $result=$conn->query($checkEmail);
     if($result->num_rows>0){
        echo "Email Address Already Exists !";
     }
     else{
        $insertQuery="INSERT INTO usuario(nombre_completo,apellido_completo,gmail,contraseña)
                       VALUES ('$nombre_completo','$apellido_completo','$gmail','$contraseña')";
            if($conn->query($insertQuery)==TRUE){
                header("location: uvistausuario.php");
            }
            else{
                echo "Error:".$conn->error;
            }
     }
   

}

if(isset($_POST['signIn'])){
   $gmail=$_POST['gmail'];
   $contraseña=$_POST['contraseña'];
   $contraseña=md5($contraseña);
   
   $sql="SELECT * FROM usuario WHERE gmail='$gmail' and contraseña='$contraseña'";
   $result=$conn->query($sql);
   if($result->num_rows>0){
    session_start();
    $row=$result->fetch_assoc();
    $_SESSION['gmail']=$row['gmail'];
    header("location: useparador.php");
    exit();
   }
   else{
    echo "Not Found, Incorrect Gmail or Contraseña";
   }

}
?>