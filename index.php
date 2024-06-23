<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rubik</title>


    <style>
        body {
            display: grid;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #000000; /* Fondo claro para contraste */
        }

        .container {
            display: grid;
            justify-items: center;
            gap: 20px; /* Espacio entre la tabla y el botón */
        }

        table {
            color: #ffffff;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ffffff;
            padding: 10px;
            text-align: center;
        }

        button {
            padding: 10px 20px;
            background-color: #888888;
            color: #ffffff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #444444;
        }
    </style>

</head>
<body>
    <div>
    <table id="tabla">      
        
    </table>
    </div>

    <select name="move" id="move">
        
    </select>

    <button type="button" onclick=''>Send</button>
    
    

    <script src ="index.js"></script> 
</body>
</html>