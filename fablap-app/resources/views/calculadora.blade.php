<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table{
            margin-top: 50px;
            margin-left: auto;
            margin-right: auto;
            border: 1px solid black;
        }
        tr{
            text-align: center;
        }
        td{
            display: inline-block;
            border: 1px solid black;
            font-size: 3rem;
            width: 4rem;
            height: 4rem;
            margin: 5px;
            background-color: rgb(221, 214, 214);
        }
        input{
            text-align: right;
            margin-top: 10px;
            width: 90%;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>
                    <input type="text" id="text" readonly>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td onclick="borrar()">CE</td>
            </tr>
            <tr>
                <td onclick="boton(7)">7</td>
                <td onclick="boton(8)">8</td>
                <td onclick="boton(9)">9</td>
                <td onclick="operador('dividir')">/</td>
            </tr>
            <tr>
                <td onclick="boton(4)">4</td>
                <td onclick="boton(5)">5</td>
                <td onclick="boton(6)">6</td>
                <td onclick="operador('multiplicar')">X</td>
            </tr>
            <tr>
                <td onclick="boton(1)">1</td>
                <td onclick="boton(2)">2</td>
                <td onclick="boton(3)">3</td>
                <td onclick="operador('restar')">-</td>
            </tr>
            <tr>
                <td onclick="boton(0)">0</td>
                <td onclick="decimal()">.</td>
                <td onclick="operador('igual')">=</td>
                <td onclick="operador('sumar')">+</td>
            </tr>
        </tbody>
    </table>
</body>
<script>
    var numero = 0;
    var ope = 'no';
    function boton(num){
        var text = document.getElementById('text');
        var anterior = text.value;
        text.value = anterior + num;
    }
    function operador(op){
        var text = document.getElementById('text');
        if (op == "igual"){
            if(numero != 0){
                var text = document.getElementById('text');
                if (ope == "sumar"){
                    total = parseInt(text.value) + numero;
                }
                if (ope == "restar"){
                    total = numero - parseInt(text.value);
                }
                if (ope == "multiplicar"){
                    total = numero * parseInt(text.value);
                }
                if (ope == "dividir"){
                    total = numero / parseInt(text.value);
                }
                numero = 0;
                text.value = total;
            }
        }else{
            ope = op;
            numero = parseInt(text.value);
            text.value = '';
        }
    }
    function borrar(){
        numero = 0;
        var text = document.getElementById('text');
        text.value = "";
    }
</script>
</html>