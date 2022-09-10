<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
        }
    </style>
</head>
<body>
<h2>HISTORICO DE PACIENTES DEL DOCTOR </h2>
<h3>{{$data->names}} </h3>
<h4>Clientes: {{$data->clients}}</h4>
       <table>
           <thead>
             <tr>
                 <th>NOMBRE</th>
                 <th>SERVICIOS</th>
             </tr>
           </thead>
           @foreach($data->analysis as $item)
           <tr>
               <td>{{$item->client->names}}</td>
               <td style="text-align: center">{{$item->client->servicesCount}}</td>
           </tr>
           @endforeach
       </table>

</body>
</html>