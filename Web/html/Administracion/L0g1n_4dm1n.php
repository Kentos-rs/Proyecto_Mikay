<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
    <link rel="shortcut icon" href="../iconos/sushi.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css-new/body.css"> 
</head>
<body class="container w-25 text-center">
    <main class="row mt-5 form-signin">
        <img class="mb-4 p-1 bg-dark rounded" src="../picture/Logo-Mikay-sushi-JPEG02.jpg" alt="" width="300" height="175">
        <h1 class="h3 mb-3 fw-normal">Por favor inicie sesion</h1>
        <?php 
        include('../Control/conexion.php');
        if(isset($_POST['ver_admin'])){
            if($_POST['correo_admin'] != '' && $_POST['contrasena_admin'] != ''){
                $correo = $_POST['correo_admin'];
                $contra = $_POST['contrasena_admin'];
                $sql = "SELECT EXISTE_USUARIO('$correo','$contra') AS existe";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()){
                    if($row['existe'] == 1){
                        $sql2 = "SELECT DEVOLVER_ROL('$correo','$contra') AS roll";
                        $result2 = $conn->query($sql2);
                        while ($row2 = $result2->fetch_assoc()){
                            if($row2['roll'] == 1){
                                header("Location: 4dm1n.php");
                            }else{?>
                                <h3 class="mt-3 text-center bg-danger">Pagina exclusiva de administradores</h3> <?php
                            }
                        }
                    }else{?>
                        <h3 class="mt-3 text-center bg-danger">Error de credenciales</h3> <?php
                    }
                }
            }else{?>
                <h3 class="mt-3 text-center bg-warning">Por favor ingrese todos los datos</h3> <?php
            }

        }
        ?>
        <form class="col" method="post">
            <div class="mb-2 form-floating">
                <input type="email" name="correo_admin" class="form-control" id="floatingInput" placeholder="nombre@ejemplo.com" >
                <label for="floatingInput">Correo electronico</label>
            </div>
            <div class="mb-4 form-floating">
                <input type="password" name="contrasena_admin" class="form-control" id="floatingPassword" placeholder="Contraseña" >
                <label for="floatingPassword">Contraseña</label>
            </div>
            <button type="submit" name="ver_admin" class="bg-dark btn-danger btn shadow "><h5 class="mt-1">Iniciar sesion</h5></button><br> 
        </form>
        <form action="../Control/mikai-4dm1n.php"><button type="submit" class="mt-1 bg-dark btn-danger btn shadow "><h6 class="mt-1">Volver</h6></button></form>
        <footer class="mt-5 border-top">
            <div class="row">
                <h6 class="p-1 text-secondary">UCM Ingenieria Civil Informatica / Ingenieria de Software I</h6>     
            </div>
        </footer>
    </main>
    
    <script src="../js/jquery-3.5.1.min.js"></script>
</body>
</html>