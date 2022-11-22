<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <style>
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
    </style> --}}
    <style>
        a{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Lista de usuarios</h1>
    <table class="table">
        <thead>
            <tr>
                <th>EDAD</th>
                <th>Id</th>
                <th>name</th>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td><input id="edadcita{{ $user->id }}" value=0 type="text"></td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a onclick="sumar({{ $user->id }})">MAS +</a>
                        <a onclick="restar({{ $user->id }})">MENOS -</a>
                        <a   onClick="mostrar({{ $user->id }})" class="btn btn-danger">ELIMINAR</a>
                        <div id="contenedor{{ $user->id }}" style="display: none">
                            <form action="{{ asset('dashboard/users/'.$user->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit">SI</button>
                            </form>
                            <a  onclick="ocultar({{ $user->id }})" >NO</a>
                        </div>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


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
    function sumar(idcito){
        var edad = document.getElementById('edadcita'+idcito);
        edad.value = parseInt(edad.value) + 1;
    }
    function restar(idcito){
        var edad = document.getElementById('edadcita'+idcito);
        if(parseInt(edad.value) == 0){
            alert('no seas webon no se puede poner edad negativa, ya naciste')
        }else{
            edad.value = parseInt(edad.value) - 1;
        }
     }




    function mostrar(id){
        var $contenedor = document.getElementById('contenedor'+id);
        $contenedor.style.display='block';
    }
    function ocultar(id){
        var $contenedor = document.getElementById('contenedor'+id);
        $contenedor.style.display='none';
    }



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