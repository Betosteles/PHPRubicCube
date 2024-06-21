<?php
$array = [ 'a' => 1, 'b' => 2, 'c' => 3 ];

// Iniciar el puntero interno al inicio del array
reset($array);

// Iterar utilizando key(), current() y next()
while ($key = key($array)) {
    $value = current($array);
    
    // Hacer algo con $key y $value
    echo "Key: $key, Value: $value\n";
    
    // Avanzar al siguiente elemento
    next($array);
}

?>
