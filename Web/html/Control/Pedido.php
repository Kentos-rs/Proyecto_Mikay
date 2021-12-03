<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Su Pedido</title>
    <link rel="shortcut icon" href="../iconos/sushi.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css-new/body.css">
</head>
<body>
    <header class="bg-dark">
        <div class="row text-center">
            <div class="col-md-1"></div>
            <div class="col-md-1 mt-2 mb-2 text-center">
                <img src="../picture/Logo-Mikay-sushi-JPEG02.jpg" class="rounded" width="100" height="50">
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5 text-center d-flex align-items-center">
                <h3 class="text-white">Fusión de sabor de nuestra cocina a tu mesa</h3>   
            </div>
            <div class="col-md-2 text-center position-left">
                <a class="py-2 mt-3 mb-2 text-white btn bg-dark" href="../">Volver</a>
            </div>
        </div>
    </header>
    <main class="contenedor">
        <div class="row ">
            <div class="col-md-4 mt-3 text-center">
                <div class="card me-4 ms-4 border-warning border-4">
                    <div class="border-warning  bg-warning">
                        <h1>Su orden</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row">3</th>
                                <td>sushi</td>
                                <td>sushi frito de prueba</td>
                                <td>$5000</td>
                                </tr>
                                <tr>
                                <th scope="row">TOTAL</th>
                                <td></td>
                                <td></td>
                                <td>$5000</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        <form class="row text-center mt-1 g-3 needs-validation was-validated"  method="post" novalidate>
                            <h5>Ingrese sus datos para adjuntar a su pedido</h5>
                            <div class="col mt-2">
                                <input type="text" name="nombre" class="form-control" id="validationCustom01" placeholder="Nombre y Apellido" required>
                            </div>
                            <div class="col mt-2">
                                <input type="number" name="telefono"  class="form-control" id="validationCustom02" placeholder="Numero de telefono" required>
                            </div>
                            <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Correo" required>
                            <div class="row mt-3"> 
                            <h5>Seleccione como recibir su pedido</h5>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="domicilio" value="1" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Despacho a domicilio
                                        </label>
                                    </div>
                                </div>
                                |
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="local" value="2" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Retiro en local
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3 border-top"> 
                            <h5 class="mt-3">Seleccione su medio de pago</h5>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="efectivo" value="1" id="flexCheckChecked1">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Efectivo
                                        </label>
                                    </div>
                                </div>
                                |
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="transfer" value="2" id="flexCheckChecked2">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Transferencia
                                        </label>
                                    </div>
                                </div>
                                |
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="tarjeta" value="3" id="flexCheckChecked3">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Tarjeta debito/credito
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-dark bg-warning text-dark mb-3" name="mandar" type="submit">¡ORDENAR!</button>
                        </form>
                        <?php 
                            include('../Control/conexion.php');
                            if(isset($_POST['mandar'])){
                                if($_POST['nombre'] != '' && $_POST['telefono'] != '' && $_POST['email'] != ''){
                                    if($_POST['local'] != '2' && $_POST['domicilio'] != '1'){
                                        ?><h3 class="mt-3 text-center bg-warning">Por favor seleccione un tipo de retiro</h3> <?php
                                    }else{
                                        if($_POST['local'] == '2' && $_POST['domicilio'] == '1'){
                                            ?><h3 class="mt-3 text-center bg-warning">Por favor seleccione solo un tipo de retiro</h3> <?php
                                        }else{
                                            if($_POST['efectivo'] != '1' && $_POST['transfer'] != '2' && $_POST['tarjeta'] != '3'){
                                                ?><h3 class="mt-3 text-center bg-warning">Por favor seleccione un medio de pago</h3> <?php
                                            }else{
                                                if($_POST['efectivo'] == '1' && $_POST['transfer'] == '2' || $_POST['efectivo'] == '1' && $_POST['tarjeta'] == '3' || $_POST['tarjeta'] == '3' && $_POST['transfer'] == '2' ){
                                                    ?><h3 class="mt-3 text-center bg-warning">Por favor seleccione solo un medio de pago</h3> <?php
                                                }else{
                                                    $valor = $valor + intval($_POST['efectivo']) + intval($_POST['transfer']) + intval($_POST['tarjeta']);
                                                    if($_POST['domicilio'] === '1'){?>
                                                        <div class="row border-top">
                                                            <h5 class="mt-3">Ingrese los datos para adjuntar a su delivery</h5>
                                                            <div class="col mt-2">
                                                                <input type="text" name="dir" class="form-control" id="validationCustom01" placeholder="Direccion" required>
                                                            </div>
                                                            <div class="col mt-2">
                                                                <input type="number" name="num_casa"  class="form-control" id="validationCustom02" placeholder="Numero de casa" required>
                                                            </div>
                                                            <input type="number" name="dir" class="form-control invisible" id="validationCustom03" value="<?php $valor ?>" required>
                                                            <form action="final.php" method="post"><button type="submit" class="mt-3 bg-danger btn shadow "><h5>Confirmar y ordenar</h5></button></form>
                                                        </div>
                                                    <?php
                                                    }else{?>
                                                        <form action="final.php" method="post"><button type="submit" class="mt-3 bg-danger btn shadow "><h5>Confirmar y ordenar</h5></button></form>
                                                    <?php }
                                                }
                                                
                                            }
                                            
                                        }
                                    }
                                }else{?>
                                    <h3 class="mt-3 text-center bg-warning">Por favor ingrese todos los datos</h3> <?php
                                }
                            }
                        ?>
                    </div>
                </div>

                <div class="border-top mt-3 text-center">
                    <h4 class="mt-3">Visita nuestro menu interactivo... es gratis ^-^</h4>
                    <a href="https://online.fliphtml5.com/johww/krsx/" target="_blank" class="btn mt-2 btn-rain bg-danger text-white">Menu Interactivo</a>
                </div>
            </div>
            
            <div class="col-md-8 mt-3 mb-3 container overflow-auto text-center">
                <div class="card me-2 ms-2 border-warning border-2">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                            <button class="text-center accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <img src="../picture/Platos-calientes.jpg" alt="" class="text-center bg.secondary img-fluid">
                            </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body"> 
                                    <div class="container">
                                        <div class="row">
                                            <?php
                                            $i = 0; 
                                            while($i<3){
                                                ?> 
                                                <div class="col mt-3">
                                                    <div class="card ms-4" style="width: 18rem;">
                                                        <img src="../picture/mikay.jpg" class="card-img-top" alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Nombre del producto</h5>
                                                            <p class="card-text">Descripcion esquisita del producto, esto para el deleite de sus papilas</p>
                                                            <div class="row">
                                                                <div class="col text-center">
                                                                    <div class="col">
                                                                        <input type="number" name="id_new_categoria" class="form-control " id="floatingInput" value="1">
                                                                    </div>
                                                                    <h4 class="mt-2 bg-success text-white">$1000</h4>
                                                                </div>
                                                                <div class="col">
                                                                    <button type="submit" name="pedir" class=" bg-warning btn btn-dark shadow "><h5 class="text-dark">Pedir</h5></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                $i = $i+1;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <img src="../picture/sushi-promos.jpg" alt="" class="text-center bg.secondary img-fluid">
                            </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="container">
                                        <div class="row">
                                            <?php
                                            $i = 0; 
                                            while($i<6){
                                                ?> 
                                                <div class="col mt-3">
                                                    <div class="card ms-4" style="width: 18rem;">
                                                        <img src="../picture/mikay.jpg" class="card-img-top" alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Nombre del producto</h5>
                                                            <p class="card-text">Descripcion esquisita del producto, esto para el deleite de sus papilas</p>
                                                            <div class="row">
                                                                <div class="col text-center">
                                                                    <div class="col">
                                                                        <input type="number" name="id_new_categoria" class="form-control " id="floatingInput" value="1">
                                                                    </div>
                                                                    <h4 class="mt-2 bg-success text-white">$1000</h4>
                                                                </div>
                                                                <div class="col">
                                                                    <button type="submit" name="pedir" class=" bg-warning btn btn-dark shadow "><h5 class="text-dark">Pedir</h5></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                $i = $i+1;
                                            }
                                            ?>
                                        </div>
                                    </div>                        
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                <img src="../picture/sushi-deluxe.jpg" alt="" class="text-center bg.secondary img-fluid">
                            </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="container">
                                        <div class="row">
                                            <?php
                                            $i = 0; 
                                            while($i<3){
                                                ?> 
                                                <div class="col mt-3">
                                                    <div class="card ms-4" style="width: 18rem;">
                                                        <img src="../picture/mikay.jpg" class="card-img-top" alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Nombre del producto</h5>
                                                            <p class="card-text">Descripcion esquisita del producto, esto para el deleite de sus papilas</p>
                                                            <div class="row">
                                                                <div class="col text-center">
                                                                    <div class="col">
                                                                        <input type="number" name="id_new_categoria" class="form-control " id="floatingInput" value="1">
                                                                    </div>
                                                                    <h4 class="mt-2 bg-success text-white">$1000</h4>
                                                                </div>
                                                                <div class="col">
                                                                    <button type="submit" name="pedir" class=" bg-warning btn btn-dark shadow "><h5 class="text-dark">Pedir</h5></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                $i = $i+1;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingfour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefour" aria-expanded="false" aria-controls="flush-collapsefour">
                                <img src="../picture/chorrillanas.jpg" alt="" class="text-center bg.secondary img-fluid">
                            </button>
                            </h2>
                            <div id="flush-collapsefour" class="accordion-collapse collapse" aria-labelledby="flush-headingfour" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="container">
                                        <div class="row">
                                            <?php
                                            $i = 0; 
                                            while($i<3){
                                                ?> 
                                                <div class="col mt-3">
                                                    <div class="card ms-4" style="width: 18rem;">
                                                        <img src="../picture/mikay.jpg" class="card-img-top" alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Nombre del producto</h5>
                                                            <p class="card-text">Descripcion esquisita del producto, esto para el deleite de sus papilas</p>
                                                            <div class="row">
                                                                <div class="col text-center">
                                                                    <div class="col">
                                                                        <input type="number" name="id_new_categoria" class="form-control " id="floatingInput" value="1">
                                                                    </div>
                                                                    <h4 class="mt-2 bg-success text-white">$1000</h4>
                                                                </div>
                                                                <div class="col">
                                                                    <button type="submit" name="pedir" class=" bg-warning btn btn-dark shadow "><h5 class="text-dark">Pedir</h5></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                $i = $i+1;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingfive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefive" aria-expanded="false" aria-controls="flush-collapsefive">
                                <img src="../picture/cenches.jpg" alt="" class="text-center bg.secondary img-fluid">
                            </button>
                            </h2>
                            <div id="flush-collapsefive" class="accordion-collapse collapse" aria-labelledby="flush-headingfive" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="container">
                                        <div class="row">
                                            <?php
                                            $i = 0; 
                                            while($i<3){
                                                ?> 
                                                <div class="col mt-3">
                                                    <div class="card ms-4" style="width: 18rem;">
                                                        <img src="../picture/mikay.jpg" class="card-img-top" alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Nombre del producto</h5>
                                                            <p class="card-text">Descripcion esquisita del producto, esto para el deleite de sus papilas</p>
                                                            <div class="row">
                                                                <div class="col text-center">
                                                                    <div class="col">
                                                                        <input type="number" name="id_new_categoria" class="form-control " id="floatingInput" value="1">
                                                                    </div>
                                                                    <h4 class="mt-2 bg-success text-white">$1000</h4>
                                                                </div>
                                                                <div class="col">
                                                                    <button type="submit" name="pedir" class=" bg-warning btn btn-dark shadow "><h5 class="text-dark">Pedir</h5></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                $i = $i+1;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingsix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsesix" aria-expanded="false" aria-controls="flush-collapsesix">
                                <img src="../picture/handroll.jpg" alt="" class="text-center bg.secondary img-fluid">
                            </button>
                            </h2>
                            <div id="flush-collapsesix" class="accordion-collapse collapse" aria-labelledby="flush-headingsix" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="container">
                                        <div class="row">
                                            <?php
                                            $i = 0; 
                                            while($i<3){
                                                ?> 
                                                <div class="col mt-3">
                                                    <div class="card ms-4" style="width: 18rem;">
                                                        <img src="../picture/mikay.jpg" class="card-img-top" alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Nombre del producto</h5>
                                                            <p class="card-text">Descripcion esquisita del producto, esto para el deleite de sus papilas</p>
                                                            <div class="row">
                                                                <div class="col text-center">
                                                                    <div class="col">
                                                                        <input type="number" name="id_new_categoria" class="form-control " id="floatingInput" value="1">
                                                                    </div>
                                                                    <h4 class="mt-2 bg-success text-white">$1000</h4>
                                                                </div>
                                                                <div class="col">
                                                                    <button type="submit" name="pedir" class=" bg-warning btn btn-dark shadow "><h5 class="text-dark">Pedir</h5></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                $i = $i+1;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingseven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseseven" aria-expanded="false" aria-controls="flush-collapseseven">
                                <img src="../picture/empanadas.jpg" alt="" class="text-center bg.secondary img-fluid">
                            </button>
                            </h2>
                            <div id="flush-collapseseven" class="accordion-collapse collapse" aria-labelledby="flush-headingseven" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="container">
                                        <div class="row">
                                            <?php
                                            $i = 0; 
                                            while($i<3){
                                                ?> 
                                                <div class="col mt-3">
                                                    <div class="card ms-4" style="width: 18rem;">
                                                        <img src="../picture/mikay.jpg" class="card-img-top" alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Nombre del producto</h5>
                                                            <p class="card-text">Descripcion esquisita del producto, esto para el deleite de sus papilas</p>
                                                            <div class="row">
                                                                <div class="col text-center">
                                                                    <div class="col">
                                                                        <input type="number" name="id_new_categoria" class="form-control " id="floatingInput" value="1">
                                                                    </div>
                                                                    <h4 class="mt-2 bg-success text-white">$1000</h4>
                                                                </div>
                                                                <div class="col">
                                                                    <button type="submit" name="pedir" class=" bg-warning btn btn-dark shadow "><h5 class="text-dark">Pedir</h5></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                $i = $i+1;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingeight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseeight" aria-expanded="false" aria-controls="flush-collapseeight">
                                <img src="../picture/especiales.jpg" alt="" class="text-center bg.secondary img-fluid">
                            </button>
                            </h2>
                            <div id="flush-collapseeight" class="accordion-collapse collapse" aria-labelledby="flush-headingeight" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="container">
                                        <div class="row">
                                            <?php
                                            $i = 0; 
                                            while($i<3){
                                                ?> 
                                                <div class="col mt-3">
                                                    <div class="card ms-4" style="width: 18rem;">
                                                        <img src="../picture/mikay.jpg" class="card-img-top" alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Nombre del producto</h5>
                                                            <p class="card-text">Descripcion esquisita del producto, esto para el deleite de sus papilas</p>
                                                            <div class="row">
                                                                <div class="col text-center">
                                                                    <div class="col">
                                                                        <input type="number" name="id_new_categoria" class="form-control " id="floatingInput" value="1">
                                                                    </div>
                                                                    <h4 class="mt-2 bg-success text-white">$1000</h4>
                                                                </div>
                                                                <div class="col">
                                                                    <button type="submit" name="pedir" class=" bg-warning btn btn-dark shadow "><h5 class="text-dark">Pedir</h5></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                $i = $i+1;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </main>
    <footer class="row bg-dark opacity-75">
        <div class="row">
            <div class="border-top ms-3 mt-3 text-center">
                <h6 class="p-1 text-secondary">UCM Ingenieria Civil Informatica / Ingenieria de Software I</h6>          
            </div>
        </div>
      </footer>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>