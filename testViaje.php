<?php
include 'Viaje.php';

//FUNCIONES QUE ACOMPAÑAN EL PROGRAMA

function seleccionarOpcion(){
    //int $eleccion

    echo "\n-----------MENÚ DE OPCIONES-----------\n" ;
    echo "1. CARGAR DATOS DEL VIAJE \n";
    echo "2. MODIFICAR DATOS DE LOS PASAJEROS\n";
    echo "3. MODIFICAR DATOS DEL VIAJE\n";
    echo "4. MOSTRAR DATOS DEL VIAJE Y PASAJEROS \n";
    echo "5. SALIR\n";
    echo "\nIngrese su opción: ";
    $eleccion = solicitarNumeroEntre(1, 5);
    
    return $eleccion;
}

/**SOLICITA UN NUMERO ENTRE UN RANGO DE VALORES Y VERIFICA QUE SE ENCUENTRE EN ESE RANGO
 * @param INT $min
 * @param INT $max
 * @return INT
 */
function solicitarNumeroEntre($min, $max)
{
    //int $numero
    $numero = trim(fgets(STDIN));
    while (!is_int($numero) && !($numero >= $min && $numero <= $max)) {   //is_int, evalua que el tipo de dato de la variable sea entero y devuelve true si es así, false caso contrario
        echo "Debe ingresar un número entre " . $min . " y " . $max . ": ";
        $numero = trim(fgets(STDIN));
    }
    return $numero;
}

function cargarPasajeros($cantMaxPasajeros){

    for ($i= 1; $i < $cantMaxPasajeros + 1; $i++) { 
        echo "\nIngrese el nombre del pasajero [$i]: ";
        $nombre = trim(fgets(STDIN));
        echo "\nIngrese el apellido del pasajero [$i]: ";
        $apellido = trim(fgets(STDIN)); 
        echo "\nIngrese el DNI del pasajero [$i]: ";
        $documento = trim(fgets(STDIN));

        $cargaPasajeros [$i] = ["nombre"=>$nombre, "apellido"=>$apellido, "dni"=>$documento];
    }

    return $cargaPasajeros;
}

function cambiarUnSoloDato ($llave){
    
    if( $llave == 1){
        $llave = "nombre";
    }elseif ($llave == 2) {
        $llave = "apellido";
    }else{
        $llave = "dni";
    }
    
    return $llave;
}

function modificacionDelDato ($llave){
    if( $llave == 1){
        echo "Ingrese el nuevo nombre que desea asignarle: ";
        $modificacionDelDato = trim(fgets(STDIN));
    }elseif ($llave == 2) {
        echo "Ingrese el nuevo apellido que desea asignarle: ";
        $modificacionDelDato = trim(fgets(STDIN));
    }else{
        echo "Ingrese el nuevo documento que desea asignarle: ";
        $modificacionDelDato = trim(fgets(STDIN));
    }

    return $modificacionDelDato;
}

do {
    $opcion = seleccionarOpcion();       

    
    switch ($opcion) {
        case 1: 

            echo "\nIngrese el código de su viaje: ";
            $codigo = trim(fgets(STDIN));
            echo "\nIngrese el destino de su viaje: ";
            $destino = trim(fgets(STDIN));
            echo"\nIngrese la cantidad de pasajeros que viajan: ";
            $cantMaxPasajeros = trim(fgets(STDIN));

            $pasajeros = cargarPasajeros($cantMaxPasajeros);

            $objetoViaje = new Viaje($codigo, $destino, $cantMaxPasajeros, $pasajeros);

            break;

        case 2: 
            
            echo "Indique que N° de pasajero desea modificar: ";
            $numPasajero = solicitarNumeroEntre(1, $cantMaxPasajeros);
            echo "1. MODIFICAR NOMBRE";
            echo "\n2. MODIFICAR APELLIDO";
            echo "\n3. MODIFICAR DNI";
            echo "\nIngrese su opción: ";
            $opcionSeleccionada = solicitarNumeroEntre(1, 3);
            $llaveDelDato = cambiarUnSoloDato($opcionSeleccionada);
            $datoModificado = modificacionDelDato($opcionSeleccionada);
            $objetoViaje -> modificacionPasajeros($opcionSeleccionada, $llaveDelDato, $datoModificado);     
            
            break;

        case 3: 

            echo"Ingrese el nuevo código del viaje: ";
            $codigoDos = trim(fgets(STDIN));
            echo "Ingrese el nuevo destino del viaje: ";
            $destinoDos = trim(fgets(STDIN));

            $objetoViaje -> modificacionViaje ($codigoDos, $destinoDos);

            break;

        case 4: 

            echo $objetoViaje;
            //echo $objetoViaje->mostrarDatosPasajeros();
        

            break;
    }

} while ($opcion != 5);

?>