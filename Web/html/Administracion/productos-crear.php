<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css-new/style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="../iconos/sushi.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css-new/body.css">
    <link rel="stylesheet" href="../css-new/style.css">
</head>
<body >
    <div class="sidebar open">
        <div class="logo-details">
        <img src="../iconos/sushi.png" alt="" class="bx ms-4">
        <span class="logo_name">MikaySushi</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="/Administracion/4dm1n.php">
                <i class='bx bx-grid-alt' ></i>
                <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                <li><a class="link_name" href="/Administracion/4dm1n.php">Dashboard</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                <a href="/Administracion/categoria-listar.php">
                    <i class='bx bx-collection' ></i>
                    <span class="link_name">Categorias</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
                </div>
                <ul class="sub-menu">
                <li><a class="link_name" href="/Administracion/categoria-listar.php">Categorias</a></li>
                <li><a href="/Administracion/categoria-crear.php">Crear</a></li>
                <li><a href="/Administracion/categoria-actuali.php">Actualizar</a></li>
                <li><a href="/Administracion/categoria-borrar.php">Borrar</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                <a href="/Administracion/productos-listar.php">
                    <i class='bx bx-book-alt' ></i>
                    <span class="link_name">Productos</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
                </div>
                <ul class="sub-menu">
                <li><a class="link_name" href="/Administracion/productos-listar.php">Productos</a></li>
                <li><a href="/Administracion/productos-crear.php">Crear</a></li>
                <li><a href="/Administracion/productos-actuali.php">Actualizar</a></li>
                <li><a href="/Administracion/productos-borrar.php">Borrarar</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                <i class='bx bx-pie-chart-alt-2' ></i>
                <span class="link_name">Analytics</span>
                </a>
                <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Analytics</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                <a href="/Administracion/repartidor-listar.php">
                    <i class='bx bx-car' ></i>
                    <span class="link_name">Repartidores</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
                </div>
                <ul class="sub-menu">
                <li><a class="link_name" href="/Administracion/repartidor-listar.php">Repartidores</a></li>
                <li><a href="/Administracion/repartidor-crear.php">Ingresar</a></li>
                <li><a href="/Administracion/repartidor-actuali.php">Actualizar</a></li>
                <li><a href="/Administracion/repartidor-borrar.php">Borrarar</a></li>
                </ul>
            </li>
            <li>
                <a href="../Control/conexion.php">
                <i class='bx bx-plug' ></i>
                <span class="link_name">Conexion</span>
                </a>
                <ul class="sub-menu blank">
                <li><a class="link_name" href="../Control/conexion.php">Conexion</a></li>
                </ul>
            </li>
            <li>
            <div class="profile-details">
            <div class="profile-content">
                <img src="../iconos/user.png" alt="profileImg">
            </div>
            <div class="name-job">
                <div class="profile_name">Admin</div>
                <div class="job">Administrador</div>
            </div>
            <a href="../Control/mikai-4dm1n.php">
            <i class='bx bx-log-out' ></i></a>
            </div>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <div class="home-content bg-dark bg-opacity-50">
        <i class='bx bx-menu' ></i>
        <h3 class="text-dark">Crear producto nuevo</h3>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <?php 
                        include("../Control/conexion.php");
                        if (isset($_POST['insert_producto'])){
                            if($_POST['ID_producto'] != '' && $_POST['ID_categ'] != '' && $_POST['tiempo_producto'] != '' && $_POST['nombre_producto'] != '' && $_POST['precio_producto'] != ''){
                                $id_prod = $_POST['ID_producto'];
                                $id_cat= $_POST['ID_categ'];
                                $nombre_prod = $_POST['nombre_producto'];
                                $precio_prod = $_POST['precio_producto'];
                                $tiempo_prod = $_POST['tiempo_producto'];
                                $sql = "CALL CREAR_PRODUCTO ($id_prod, $id_cat, '$nombre_prod', $precio_prod, $tiempo_prod)";
                                if ($conn->query($sql) === TRUE) {
                                    ?> <h3 class="mt-3 text-center bg-success">Producto creado exitosamente</h3> <?php
                                } else {
                                    ?> <h3 class="mt-3 text-center bg-danger">Ocurrio un error</h3> <?php
                                }
                                $conn->close();
                            }else{?>
                                <h3 class="mt-3 text-center bg-warning">Por favor ingrese todos los datos</h3> <?php
                            }
                        }
                    ?>
                    <form method="post">
                        <div class="row"></div>
                            <div class="col mx-auto mt-5 text-center">
                                <h5 class="mb-5">Ingrese los datos para crear el nuevo producto</h5>
                                <div class="row">
                                    <div class="col">
                                        <label for="inputid" class="form-label">Ingrese Identificador</label>
                                        <input type="number" name="ID_producto" class="form-control" id="inputEmail4">
                                        
                                    </div>
                                    <div class="col">
                                        <label for="inputid" class="form-label">Asigne una categoria</label>
                                        <input type="number" name="ID_categ" class="form-control" id="inputEmail4">

                                    </div>
                                    <div class="col">
                                        <label for="inputid" class="form-label">Ingrese tiempo de preparacion</label>
                                        <input type="number" name="tiempo_producto" class="form-control" id="inputEmail4">
                                    
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="inputid" class="form-label">Ingrese nombre del producto</label>
                                        <input type="text" name="nombre_producto" class="form-control" id="inputEmail4">

                                    </div>
                                    <div class="col">
                                        <label for="inputid" class="form-label">Ingrese precio del producto</label>
                                        <input type="number" name="precio_producto" class="form-control" id="inputEmail4">

                                    </div>
                                </div>
                                <button type="submit" name="insert_producto" class="mt-5 btn btn-dark bg-warning shadow text-dark">Ingresar producto</button>
                            </div>
                            <div class="col"></div>
                        </div>
                    </form>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>
    <script src="../js/script.js"></script>
</body>
</html>