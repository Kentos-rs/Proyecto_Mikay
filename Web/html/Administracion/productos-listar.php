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
                <?php 
                    include('../Control/conexion.php');
                    if ($conn->connect_error) {
                        $var = 'Conexion fallida';
                    }else{
                        $var = 'Conexion exitosa';
                    }
                    mysqli_close($conn); 
                    ?>
                <a>
                    <i class='bx bx-plug' ></i>
                    <span class="link_name">
                        <div class="container">
                            <button type="button" class="btn text-white" data-toggle="popover" data-placement="bottom" title="Conexion base de datos" data-content="<?php echo $var;?>">Conexion</button>
                        </div>
                    </span>
                </a>
                <ul class="sub-menu blank">
                <li>
                    <div class="container">
                        <button type="button" class="btn text-white" data-toggle="popover" data-placement="bottom" title="Conexion base de datos" data-content="<?php echo $var;?>">Conexion</button>
                    </div>
                </li>
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
        <h3 class="text-dark">Listado de productos</h3>
        </div>
        <div class="container">
            <div class="row p-5">
                <table class="table table-striped">
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
                        include("../Control/conexion.php");
                        $sql = "SELECT * FROM VER_PRODUCTOS";
                        $vuelta = $conn->query($sql);
                        $i=1;
                        while($row = mysqli_fetch_array(($vuelta))){?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $row['ID_PRODUCTO'];?></td>
                                <td><?php echo $row['NOMBRE'];?></td>
                                <td><?php echo $row['PRECIO'];?></td>
                                <td><?php echo $row['T_PREPARACION'];echo ' min.';?></td>
                                <td><?php echo $row['ID_CATEGORIA'];?></td>
                                <td><?php echo $row['NOMBRE_CATEGORIA'];?></td>
                            </tr><?php
                            $i=$i+1;
                        }
                        $conn->close();
                    ?>
                    </tbody>
                </table>    
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
        
        <script>
            var popoverTriggerList = [].slice.call( document.querySelectorAll( '[data-toggle="popover"]' ) );
            var popoverList = popoverTriggerList.map( function( popoverTrigger )
            {
                return new bootstrap.Popover( popoverTrigger );
            } );
        </script>
    <script src="../js/jquery-3.5.1.min.js"></script> 
    <script src="../js/bootstrap.min.js"></script> 
    <script src="../js/script.js"></script>
</body>
</html>