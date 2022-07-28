<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//pregunta si existe el archivo
if(file_exists("archivo.txt")){

    //vamos a leerlo y almacenamos el contenido en jsonClientes
    $jsonClientes = file_get_contents("archivo.txt");

    //convertir jsonClientes en un array llamado aCliente 
    $aClientes = json_decode($jsonClientes, true);
}else{
    //si no existe el archivo
    //creamos un clinete inicializado como un array vacio
    $aClientes = array();
}

if($_POST){
    $dni = trim($_POST["txtDni"]);
    $nombre = trim($_POST["txtNombre"]);
    $telefono = trim($_POST["txtTelefono"]);
    $correo = trim($_POST["txtcorreo"]);

    $aClientes[] = array ("dni" => $dni,
                         "nombre" => $nombre,
                         "telefono" => $telefono,
                         "correo" => $correo); 

    //convertir el array de clientes a jsonClientes
    $jsonClientes = json_encode($aClientes);

    //Almacenar el string jsonClientes en el "archivo.txt"
    file_put_contents("archivo.txt", $jsonClientes);
}


?>
<!DOCTYPE html>
<html lang="es">

    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABM Clientes</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    </head>

    <body>
        <div class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1> Registro de clientes </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-3 offset-1 me-5">
                <form action="" method="POST" class="form">

                    <label for="txtDni">DNI:</label>
                    <input type="text" name="txtDni" class="form-control my-2"

                    <label for="txtNombre">Nombre:</label>
                    <input type="text" name="txtNombre" class="form-control my-2 " placeholder="Ingrese el nombre y apellido">

                    <label for="txtTelefono">Telefono:</label>
                    <input type="tel" name="txtTelefono" class="form-control my-2" >

                    <label for="txtcorreo">correo:*</label>
                    <input type="email" name="txtcorreo" class="form-control my-2" required>
                    <div>
                        <label for="">Archivo adjunto</label>
                        <input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png">
                        <small class="d-block">Archivos admitidos: .jpg, .jpeg, .png </small>
                    </div>
                    <button type="submit" name="btnEnviar" class="btn bg-primary text-white">Guardar</button>   
                </form>
                </div>
            <div class="col-6 ms-5">
                    <table class="table table-hover shadow border">
                        <tr>
                        <th>Imagen:</th>
                        <th>DNI:</th>
                        <th>Nombre:</th>
                        <th>Correo:</th>
                        <th>Acciones:</th>
                        </tr>
                            <?php foreach ($aClientes as $cliente):  ?>
                            <tr>
                                <td></td>
                                <td><?php echo $cliente["dni"]; ?></td>
                                <td><?php echo $cliente["nombre"]; ?></td>
                                <td><?php echo $cliente["correo"]; ?></td>
                                <td>
                               <a href=""><i class="bi bi-pencil-fill"></i><a/>
                               <a href=""><i class="bi bi-trash-fill"></i><a/>
                                </td>
                            </tr>
                        </tr>
                        <?php endforeach; ?>
                     </table>
                </div>
            </div>
        </div>
    </body>
</html>