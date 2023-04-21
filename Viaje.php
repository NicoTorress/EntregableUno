<?php

class Viaje {

    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $pasajeros;

    public function __construct($codigo, $destino, $cantMaxPasajeros, $pasajeros) {
        $this -> codigo = $codigo;
        $this -> destino = $destino;
        $this -> cantMaxPasajeros = $cantMaxPasajeros;
        $this -> pasajeros = $pasajeros;
    }

    /**
     * Retorna los valores correspondientes de cada atributo
     */
    public function getCodigo(){
        return $this -> codigo;
    }

    public function getDestino(){
        return $this -> destino;
    }

    public function getCantMaxPasajeros(){
        return $this -> cantMaxPasajeros;
    }

    public function getPasajeros(){
        return $this -> pasajeros;
    }

    /**
     * Setea el valor de cada atributo
     */
    public function setCodigo($codigo){
        $this -> codigo = $codigo;
    }

    public function setDestino($destino){
        $this -> destino = $destino;
    }    
    
    public function setCantMaxPasajeros($cantMaxPasajeros){
        $this -> cantMaxPasajeros = $cantMaxPasajeros;
    }
    
    public function setPasajeros($pasajeros){
        $this -> pasajeros = $pasajeros;
    } 

    public function mostrarDatosPasajeros(){
        $cadena="";
        $colPasajeros = $this->getPasajeros();
        for($i=1; $i< count($colPasajeros)+1 ;$i++){
            $nombre= $colPasajeros[$i]["nombre"];
            $apellido= $colPasajeros[$i]["apellido"];
            $dni= $colPasajeros[$i]["dni"];
            $cadena = $cadena." Pasajero ".$i.": ".$nombre." ".$apellido." ".$dni. "\n";
        }
        return $cadena;
    }

    public function modificacionViaje($codigoDos, $destinoDos){
        $this -> setCodigo($codigoDos);
        $this -> setDestino($destinoDos); 
    }

    public function modificacionPasajeros($indice, $llave, $modificacion){
        $this -> setPasajeros($indice, $llave, $modificacion);
    }

    public function __toString(){
        return 
        "Código de viaje: ". $this->getCodigo().
        "\nDestino del viaje: ". $this-> getDestino().
        "\nCantidad de pasajeros que viajan: ". $this-> getCantMaxPasajeros(). "\n \n".
        "\n". $this-> mostrarDatosPasajeros();
    }

}

?>