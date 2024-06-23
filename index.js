const tabla = document.getElementById('tabla');
const cubo_inicial = { "white": [["W", "W", "W"], ["W", "W", "W"], ["W", "W", "W"]], 
                        "red": [["R", "R", "R"], ["R", "R", "R"], ["R", "R", "R"]], 
                        "yellow": [["Y", "Y", "Y"], ["Y", "Y", "Y"], ["Y", "Y", "Y"]], 
                        "orange": [["O", "O", "O"], ["O", "O", "O"], ["O", "O", "O"]], 
                        "blue": [["B", "B", "B"], ["B", "B", "B"], ["B", "B", "B"]], 
                        "green": [["G", "G", "G"], ["G", "G", "G"], ["G", "G", "G"]] }



if (!localStorage.getItem("cube")) {
    localStorage.setItem("cube", JSON.stringify(cubo_inicial))
} 


function tablaDimencionada(row, col) {

    let html = ""; // Variable para construir el HTML de la tabla

    for (let i = 0; i < col; i++) {
        html += "<tr>"; // Agregar inicio de fila
        for (let j = 0; j < row; j++) {
            if ((i>=3 && j>=3) && (i<=5 && j<=5)){
                html += "<td id='" + i + "_" + j + "' style='border-style: dashed;border-color: #f00 '> </td>";
 // Agregar celdas
            }else if (((i>=0 && i<=2) || (i>=6)) && ((j>=0 && j<=2) || (j>=6 && j<=8) )){
                html += "<td id='" + i + "_" + j + "' style='border-style: dotted;'> </td>";
 
            }else{
                html += "<td id=" + i + "_" + j + " >   </td>"; // Agregar celdas
            }

          
            
        }
        html += "</tr>"; // Agregar fin de fila
    }

    

    tabla.innerHTML = html; // Establecer todo el HTML de la tabla al finalizar el bucle
}

// function drawCube2(cube){
//     document.getElementById('0_3').textContent = cube.white[0][0]; 
//     document.getElementById('0_4').textContent = cube.white[0][1]; 
//     document.getElementById('0_5').textContent = cube.white[0][2]; 
//     document.getElementById('1_3').textContent = cube.white[1][0]; 
//     document.getElementById('1_4').textContent = cube.white[1][1]; 
//     document.getElementById('1_5').textContent = cube.white[1][2]; 
//     document.getElementById('2_3').textContent = cube.white[2][0]; 
//     document.getElementById('2_4').textContent = cube.white[2][1]; 
//     document.getElementById('2_5').textContent = cube.white[2][2]; 
//     document.getElementById('3_3').textContent = cube.red[0][0]; 
//     document.getElementById('3_4').textContent = cube.red[0][1]; 
//     document.getElementById('3_5').textContent = cube.red[0][2]; 
//     document.getElementById('4_3').textContent = cube.red[1][0]; 
//     document.getElementById('4_4').textContent = cube.red[1][1]; 
//     document.getElementById('4_5').textContent = cube.red[1][2]; 
//     document.getElementById('5_3').textContent = cube.red[2][0]; 
//     document.getElementById('5_4').textContent = cube.red[2][1]; 
//     document.getElementById('5_5').textContent = cube.red[2][2]; 
//     document.getElementById('6_3').textContent = cube.yellow[0][0]; 
//     document.getElementById('6_4').textContent = cube.yellow[0][1]; 
//     document.getElementById('6_5').textContent = cube.yellow[0][2]; 
//     document.getElementById('7_3').textContent = cube.yellow[1][0]; 
//     document.getElementById('7_4').textContent = cube.yellow[1][1]; 
//     document.getElementById('7_5').textContent = cube.yellow[1][2]; 
//     document.getElementById('8_3').textContent = cube.yellow[2][0]; 
//     document.getElementById('8_4').textContent = cube.yellow[2][1]; 
//     document.getElementById('8_5').textContent = cube.yellow[2][2]; 
//     document.getElementById('9_3').textContent = cube.orange[0][0]; 
//     document.getElementById('9_4').textContent = cube.orange[0][1]; 
//     document.getElementById('9_5').textContent = cube.orange[0][2]; 
//     document.getElementById('10_3').textContent =cube.orange[1][0]; 
//     document.getElementById('10_4').textContent =cube.orange[1][1]; 
//     document.getElementById('10_5').textContent =cube.orange[1][2]; 
//     document.getElementById('11_3').textContent =cube.orange[2][0]; 
//     document.getElementById('11_4').textContent =cube.orange[2][1]; 
//     document.getElementById('11_5').textContent =cube.orange[2][2]; 
//     document.getElementById('3_6').textContent = cube.blue[0][0]; 
//     document.getElementById('3_7').textContent = cube.blue[0][1]; 
//     document.getElementById('3_8').textContent = cube.blue[0][2]; 
//     document.getElementById('4_6').textContent = cube.blue[1][0]; 
//     document.getElementById('4_7').textContent = cube.blue[1][1]; 
//     document.getElementById('4_8').textContent = cube.blue[1][2]; 
//     document.getElementById('5_6').textContent = cube.blue[2][0]; 
//     document.getElementById('5_7').textContent = cube.blue[2][1]; 
//     document.getElementById('5_8').textContent = cube.blue[2][2]; 
//     document.getElementById('3_0').textContent = cube.green[0][0]; 
//     document.getElementById('3_1').textContent = cube.green[0][1]; 
//     document.getElementById('3_2').textContent = cube.green[0][2]; 
//     document.getElementById('4_0').textContent = cube.green[1][0]; 
//     document.getElementById('4_1').textContent = cube.green[1][1]; 
//     document.getElementById('4_2').textContent = cube.green[1][2]; 
//     document.getElementById('5_0').textContent = cube.green[2][0]; 
//     document.getElementById('5_1').textContent = cube.green[2][1]; 
//     document.getElementById('5_2').textContent = cube.green[2][2]; 
// }

function drawCube(cube) {
    const faces = ['white', 'red', 'yellow', 'orange', 'blue', 'green'];
    const startRows = [0, 3, 6, 9, 3, 3];
    const startCols = [3, 3, 3, 3, 6, 0];
    const colors = {
        'W': 'white',
        'R': 'red',
        'Y': 'yellow',
        'O': 'orange',
        'B': 'blue',
        'G': 'green'
    };

    faces.forEach((face, faceIndex) => {
        for (let row = 0; row < 3; row++) {
            for (let col = 0; col < 3; col++) {
                const elementId = `${startRows[faceIndex] + row}_${startCols[faceIndex] + col}`;
                const content = cube[face][row][col];
                const color = colors[content];
                const element = document.getElementById(elementId);
                element.textContent = content;
                element.style.color = color;
            }
        }
    });
}




function fetchRubikPHP(cube = cubo_inicial, direction, face = 'red') {
    const url = `http://localhost/rubik.php?direction=${direction}&cube=${JSON.stringify(cube)}&face=${face}`;
    
    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Convertir la respuesta a JSON
        })
        .then(data => {
            console.log(data);

            if (localStorage.getItem("cube")){
                localStorage.setItem("cube", JSON.stringify(data));
            }

            drawCube(data);

                     

            // Aquí puedes procesar los datos recibidos, por ejemplo, actualizar el DOM
            // o mostrarlos en algún elemento HTML
        })
        .catch(error => {
            console.error('Hubo un problema con la solicitud Fetch:', error);
        });
}


function getMove(){

    const Select = document.getElementById('move');

    const url = 'http://localhost/rubik.php?moves';

    fetch(url).then(response =>{
        if (!response.ok){
            throw new Error('Network response was not ok');
        }
        return response.json();
    }).then(data => {
        var html = "";
        console.log(data)

        Object.values(data).forEach(element => {
            html += `<option value="${element}">${element}</option>`            
        });
       
        Select.innerHTML = html;

    })
    .catch(error => {
        console.error('Hubo un problema con la solicitud Fetch:', error);
    });

}

tablaDimencionada(9, 12);

if (localStorage.getItem("cube")) {
    const gcube = JSON.parse(localStorage.getItem("cube"));
    
    drawCube(gcube);
     
} 



getMove()

function updateTable(){
    const Select = document.getElementById('move');
    const selectedValue = Select.value;

    fetchRubikPHP(JSON.parse(localStorage.getItem("cube")),selectedValue);

}