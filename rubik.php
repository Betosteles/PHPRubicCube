<?php

class rubik{

    public $caras;
    public $front_face;
    public $neighbors;
    public $neighbors_names;


    public function __construct(){
        $this->caras = array(
            'white' => $this->crear_cara("W"),
            'red' => $this->crear_cara("R"),
            'yellow' => $this->crear_cara("Y"),
            'orange' => $this->crear_cara("O"),
            'blue' => $this->crear_cara("B"),
            'green' => $this->crear_cara("G"),
        );

        $this->neighbors = array(
            'white' => [
                'up' => [[2, 0], [2, 1], [2, 2]],    // up
                'down' => [[0, 2], [0, 1],[0, 0] ],  // down
                'right' => [[0, 2], [0, 1], [0, 0]], // right
                'left' => [[0, 2], [0, 1],[0, 0] ],  // left
            ],
            'red' => [
                'up' => [[2, 0], [2, 1], [2, 2]],    // up
                'down' => [[0, 2], [0, 1],[0, 0] ],  // down
                'right' => [[0, 0], [1, 0], [2, 0]], // right
                'left' => [[2, 2], [1, 2],[0, 2] ],  // left
            ],
            'blue' => [
                'up' => [[2, 2], [1, 2], [0, 2]],    // up
                'down' => [[2, 2], [1, 2],[0, 2]],  // down
                'right' => [[2, 2], [1, 2], [0, 2]], // right
                'left' => [[2, 2], [1, 2],[0, 2]],  // left
            ],
            'green' => [
                'up' => [[0, 0], [1, 0], [2, 0]],    // up
                'down' => [[0, 0], [1, 0], [2, 0]],  // down
                'right' => [[0, 0], [1, 0], [2, 0]], // right
                'left' => [[0, 0], [1, 0], [2, 0]],  // left
            ],
            'orange' => [
                'up' => [[2, 0], [2, 1], [2, 2]],    // up
                'down' => [[0, 2], [0, 1], [0, 0]],  // down
                'right' => [[2, 2], [1, 2], [0, 2]], // right
                'left' => [[0, 0], [1, 0], [2, 0]],  // left
            ],
            'yellow' => [
                'up' => [[2, 0], [2, 1], [2, 2]],    // up
                'down' => [[0, 2], [0, 1], [0, 0]],  // down
                'right' => [[2, 0], [2, 1], [2, 2]], // right
                'left' => [[2, 0], [2, 1], [2, 2]],  // left
            ],
        );
        

        $this->neighbors_names = array(
            'white' => [
                'up' => 'orange', 
                'down' => 'red', 
                'right' => 'blue', 
                'left' => 'green', 
            ],
            'red' => [
                'up' => 'white',
                'down' => 'yellow',
                'right' => 'blue', 
                'left' => 'green', 
            ],
            'blue' => [
                'up' => 'white',    
                'down' => 'yellow',  
                'right' => 'orange', 
                'left' => 'red',  
            ],
            'green' => [
                'up' => 'white',    
                'down' => 'yellow',  
                'right' => 'red', 
                'left' => 'orange',  
            ],
            'orange' => [
                'up' => 'yellow',    
                'down' => 'white',  
                'right' => 'blue', 
                'left' => 'green', 
            ],
            'yellow' => [
                'up' => 'red',    
                'down' => 'orange',  
                'right' => 'blue', 
                'left' => 'green',   
            ],
        );


       $this->set_front();
    }

    public function set_front(){
        $this->front_face ='white';
    }

    public function crear_cara($color) : array {
        $array = array();
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $array[$i][$j] = $color;
            }
        }
        return $array;
    }

    public function leer_cara($array) {
        foreach ($array as $row) {
            echo "       ";
            foreach ($row as $value) {
                echo $value . " ";
            }
            echo "\n";
        }
        echo "\n";
    }

    public function leer_cara_sec() {

        for ($i = 0; $i<3;$i++){

            for($k=2;$k>-1;$k--){
                echo $this->caras["green"][$k][$i]." ";
           }

            echo " ";
            for($j=0;$j<3;$j++){
                    echo $this->caras["white"][$i][$j]." ";
            }
            
            echo " ";
            for($l=0;$l<3;$l++){
                echo $this->caras["blue"][$l][(($i == 0) ? 2:  (($i == 2) ? 0: $i))] ." ";
              
           }

            echo "\n";
            

        }
        echo "\n";

    }

    public function leer_todas_cara() { 
        foreach ($this->caras as $key => $cara){
            if ($key=='blue' || $key=='green') continue;

            if ($key=='white') $this->leer_cara_sec();

            if ($key!='white') $this->leer_cara($cara);
        }
    }

    public function rotate_face_normal($face){

        $temp = $this->caras[$face];
        
        $this->caras[$face][0][0] = $temp[2][0];
        $this->caras[$face][0][1] = $temp[1][0];
        $this->caras[$face][0][2] = $temp[0][0];

        $this->caras[$face][1][0] = $temp[2][1];
        $this->caras[$face][1][1] = $temp[1][1];
        $this->caras[$face][1][2] = $temp[0][1];

        $this->caras[$face][2][0] = $temp[2][2];
        $this->caras[$face][2][1] = $temp[1][2];
        $this->caras[$face][2][2] = $temp[0][2];

        unset($temp);

    }

    public function rotate_face_reverse($face){

        $temp = $this->caras[$face];
        
        $this->caras[$face][0][0] = $temp[0][2];
        $this->caras[$face][0][1] = $temp[1][2];
        $this->caras[$face][0][2] = $temp[2][2];

        $this->caras[$face][1][0] = $temp[0][1];
        $this->caras[$face][1][1] = $temp[1][1];
        $this->caras[$face][1][2] = $temp[2][1];

        $this->caras[$face][2][0] = $temp[0][0];
        $this->caras[$face][2][1] = $temp[1][0];
        $this->caras[$face][2][2] = $temp[2][0];

        unset($temp);
        
    }

    public function normal_rotacion($rotacion){

        if ($rotacion == "r") $result = 'right';
        else if ($rotacion == "l") $result = 'left';
        else if ($rotacion == "u") $result = 'up';
        else if ($rotacion == "b") $result = 'down';
        

        //obtener nombres
            // cara derecha
        $r_name = $this->neighbors_names[$this->front_face][$result];
            // cara vecinas derechas
        $r_up_name = $this->neighbors_names[$r_name]['up'];
        $r_down_name =$this->neighbors_names[$r_name]['down'];
        $r_right_name =$this->neighbors_names[$r_name]['right'];
        $r_left_name = $this->neighbors_names[$r_name]['left'];
            // arrays de los vecinos
        $r_n_up = $this->neighbors[$r_name]['up'];
        $r_n_down = $this->neighbors[$r_name]['down'];
        $r_n_right = $this->neighbors[$r_name]['right'];
        $r_n_left = $this->neighbors[$r_name]['left'];
    
        //obtener arreglos
        $right = $this->caras[$r_name];  // cara a la derecha de la frontal
        $r_up = $this->caras[$r_up_name];  // cara superior de la cara a la derecha de la frontal 
        $r_down = $this->caras[$r_down_name];   // cara inferior de la cara a la derecha de la frontal 
        $r_right = $this->caras[$r_right_name];  // cara a la derecha de la cara a la derecha de la frontal 
        $r_left = $this->caras[$r_left_name];   // cara a la izq de la cara a la derecha de la frontal 

        // obtener los array originales por referencia
        $r_r_up = &$this->caras[$r_up_name];
        $r_r_down = &$this->caras[$r_down_name];
        $r_r_right =  &$this->caras[$r_right_name];
        $r_r_left = &$this->caras[$r_left_name];
        // rotar la cara a la derecha de la frontal en sentido horario
        $this->rotate_face_normal($r_name); 

        //rotar vecinos
        for($i = 0 ; $i < 3 ; $i++){
            $r_r_up[$r_n_up[$i][0]][$r_n_up[$i][1]]         = $r_left[$r_n_left[$i][0]][$r_n_left[$i][1]];
            $r_r_right[$r_n_right[$i][0]][$r_n_right[$i][1]]= $r_up[$r_n_up[$i][0]][$r_n_up[$i][1]]; 
            $r_r_down[$r_n_down[$i][0]][$r_n_down[$i][1]]   = $r_right[$r_n_right[$i][0]][$r_n_right[$i][1]];
            $r_r_left[$r_n_left[$i][0]][$r_n_left[$i][1]]   = $r_down[$r_n_down[$i][0]][$r_n_down[$i][1]];
        }       
    }

    public function reverse_rotacion($rotacion){

        if ($rotacion == "r") $result = 'right';
        else if ($rotacion == "l") $result = 'left';
        else if ($rotacion == "u") $result = 'up';
        else if ($rotacion == "b") $result = 'down';

        //obtener nombres
            // cara derecha
        $r_name = $this->neighbors_names[$this->front_face][$result];
            // cara vecinas derechas
        $r_up_name = $this->neighbors_names[$r_name]['up'];
        $r_down_name =$this->neighbors_names[$r_name]['down'];
        $r_right_name =$this->neighbors_names[$r_name]['right'];
        $r_left_name = $this->neighbors_names[$r_name]['left'];
            // arrays de los vecinos
        $r_n_up = $this->neighbors[$r_name]['up'];
        $r_n_down = $this->neighbors[$r_name]['down'];
        $r_n_right = $this->neighbors[$r_name]['right'];
        $r_n_left = $this->neighbors[$r_name]['left'];
        //obtener arreglos
        $right = $this->caras[$r_name];  // cara a la derecha de la frontal
        $r_up = $this->caras[$r_up_name];  // cara superior de la cara a la derecha de la frontal 
        $r_down = $this->caras[$r_down_name];   // cara inferior de la cara a la derecha de la frontal 
        $r_right = $this->caras[$r_right_name];  // cara a la derecha de la cara a la derecha de la frontal 
        $r_left = $this->caras[$r_left_name];   // cara a la izq de la cara a la derecha de la frontal 
        // obtener los array originales por referencia
        $r_r_up = &$this->caras[$r_up_name];
        $r_r_down = &$this->caras[$r_down_name];
        $r_r_right =  &$this->caras[$r_right_name];
        $r_r_left = &$this->caras[$r_left_name];
        // rotar la cara a la derecha de la frontal en sentido Anti horario
        $this->rotate_face_reverse($r_name); 
        //rotar vecinos
        for($i = 0 ; $i < 3 ; $i++){
            $r_r_up[$r_n_up[$i][0]][$r_n_up[$i][1]]         = $r_right[$r_n_right[$i][0]][$r_n_right[$i][1]];
            $r_r_right[$r_n_right[$i][0]][$r_n_right[$i][1]]= $r_down[$r_n_down[$i][0]][$r_n_down[$i][1]];
            $r_r_down[$r_n_down[$i][0]][$r_n_down[$i][1]]   = $r_left[$r_n_left[$i][0]][$r_n_left[$i][1]];
            $r_r_left[$r_n_left[$i][0]][$r_n_left[$i][1]]   = $r_up[$r_n_up[$i][0]][$r_n_up[$i][1]];

        }     
        
    }
  
}

$cubo = new rubik();


if (!isset($_GET['cube']) and !isset($_GET['moves'])){

    $response = [];
    $response["Error"] = ["Parametro Cubo No existe"];

    header('Content-Type: application/json');
    echo json_encode($response);

}



if (isset($_GET['cube'])){

    if (isset($_GET['face'])){
        $cubo->front_face = $_GET['face'];
    }
    if (isset($_GET['direction'])){
        if ($_GET['direction'] == 'r') {
            $cubo->normal_rotacion("r");
        } else if ($_GET['direction'] == 'l') {
            $cubo->normal_rotacion("l");
        } else if ($_GET['direction'] == 'u') {
            $cubo->normal_rotacion("u");
        } else if ($_GET['direction'] == 'b') {
            $cubo->normal_rotacion("b");
        } else if ($_GET['direction'] == 'br') {
            $cubo->reverse_rotacion("r");
        } else if ($_GET['direction'] == 'bl') {
            $cubo->reverse_rotacion("l");
        } else if ($_GET['direction'] == 'bu') {
            $cubo->reverse_rotacion("u");
        } else if ($_GET['direction'] == 'bb') {
            $cubo->reverse_rotacion("b");
        }
    }


    $cubo->caras = json_decode($_GET['cubo'], true);
    
}

if (isset($_GET['moves'])){

    $response = [];

    $response = 
        ["r","l","b","u","br","bl","bu","bb"];
    
    header('Content-Type: application/json');
    echo json_encode($response);
    
}


// Convertir la estructura del cubo a JSON
// $response = [];
// foreach ($cubo->caras as $face => $grid) {
//     $response[$face] = $grid;
// }

// header('Content-Type: application/json');
// echo json_encode($response);

?>
