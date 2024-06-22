const tabla = document.getElementById('tabla');

function tablaDimencionada(row,col) {

    let html = ""; // Variable para construir el HTML de la tabla

    for (let i = 0; i < col; i++) {
        html += "<tr>"; // Agregar inicio de fila
        for (let j = 0; j < row; j++) {
            html += "<td id="+i+"_"+j+" > x </td>"; // Agregar celdas
        }
        html += "</tr>"; // Agregar fin de fila
    }

    tabla.innerHTML = html; // Establecer todo el HTML de la tabla al finalizar el bucle
}


tablaDimencionada(9,12);