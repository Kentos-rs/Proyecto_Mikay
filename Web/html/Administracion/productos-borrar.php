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
        <h3 class="text-dark">Eliminar producto</h3>
        </div>
        <div class="container">
            <div class="row p-5">
                <div class="col"></div>
                <div class="col text-center">  
                    <form method="get">
                        <h5 class="">Ingrese el identificador del producto a eliminar</h5>
                        <div class="form-floating mb-3 mt-2">
                            <input type="number" name="id_delete_producto" class="form-control" id="floatingInput" placeholder="Identificador">
                            <label for="floatingInput">Identificador</label>
                            <button type="submit" name="buscar_producto" class="mt-5 btn btn-dark bg-warning shadow text-dark">Buscar categoria</button>
                        </div>
                    </form>
                </div>
                <div class="col"></div>
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col">ID_Producto</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Tiempo preparacion</th>
                            <th scope="col">ID_Categoria</th>
                            <th scope="col">Categoria</th>
                        </tr>       
                    </thead>
                    <tbody>
                        <?php 
                        include('../Control/conexion.php');
                        if(isset($_GET['buscar_producto'])){
                            if($_GET['id_delete_producto'] !=''){
                                $_id = $_GET['id_delete_producto'];
                                $sql = "SELECT * FROM VER_PRODUCTOS";
                                $resultado = $conn->query($sql);
                                $i=1;
                                while($row = mysqli_fetch_array(($resultado))){
                                    if($row['ID_PRODUCTO'] == $_id){?>
                                        <tr>
                                            <th scope="row"><?php echo $i; ?></th>
                                            <form action="/Administracion/productos-borrar.php" method="post">
                                                <td><?php echo $row['ID_PRODUCTO'];?></td>
                                                <td><?php echo $row['NOMBRE'];?></td>
                                                <td><?php echo $row['PRECIO'];?></td>
                                                <td><?php echo $row['T_PREPARACION'];echo ' min.';?></td>
                                                <td><?php echo $row['ID_CATEGORIA'];?></td>
                                                <td><?php echo $row['NOMBRE_CATEGORIA'];?></td>
                                                <td>
                                                    <div class="col">
                                                        <button type="submit" name="delete_producto" class="btn btn-dark bg-warning shadow text-dark">Eliminar</button>
                                                        <input type="number" name="id_delete_producto" class="invisible form-control " id="floatingInput" value="<?php echo $row['ID_PRODUCTO'];?>">
                                                    </div>
                                                </td>
                                            </form>
                                        </tr><?php    
                                    }
                                    $i=$i+1;
                                }
                                $conn->close();
                            }else{?>
                                <h3 class="mt-3 mb-5 text-center bg-warning">Por favor ingrese un identificador</h3> 
                            <?php
                            }
                        }
                        ?>
                        <?php 
                            include('../Control/conexion.php');
                            if(isset($_POST['delete_producto'])){
                                $id_delete = $_POST['id_delete_producto'];
                                $resu = "CALL DELETE_PRODUCTO ($id_delete)";
                                if ($conn->query($resu) === TRUE) {
                                    ?> <h3 class="mt-3 text-center bg-success">Producto eliminado exitosamente</h3> <?php
                                } else {
                                    ?> <h3 class="mt-3 text-center bg-danger">Ocurrio un error</h3> <?php
                                }
                                $conn->close();
                            }
                        ?>
                    </tbody>
                </table> 
            </div>
        </div>
    </section>
    <script src="../js/script.js"></script>
</body>
</html>