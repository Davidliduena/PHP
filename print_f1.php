<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Definición
function print_f3($variable)
{
    if (is_array($variable)) {
        $contenido = "";
        foreach ($variable as $item) {
            $contenido .= $item . "\n";
        }
        file_put_contents("datos.txt", $contenido);

    } else {
        //Entonces es string, guardo el contenido en el archivo “datos.txt”
        file_put_contents("datos.txt", $variable);
    }
    echo "Archivo actualizado.";
}

//Uso
$item = array(8,5,7,9,10);
$msg = "Este es un mensaje";
print_f3($item);
?>