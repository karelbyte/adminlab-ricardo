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
<h2>HISTORICO DE PACIENTES DEL ORIGEN </h2>
<h3>{{$data->names}} </h3>
       <table>
           <thead>
             <tr>
                 <th>FECHA</th>
                 <th>NOMBRE</th>
                 <th>SERVICIOS</th>
                 <th>MONTO</th>
             </tr>
           </thead>
           @foreach($data->services as $item)
           <tr>
               <td>{{Illuminate\Support\Carbon::parse($item->moment)->format('d-m-Y')}}</td>
               <td>{{$item->client->names}}</td>
               <td style="text-align: center">{{$item->client->servicesCount}}</td>
               <td style="text-align: center">{{$item->total()}}</td>
           </tr>
           @endforeach
       </table>

</body>
</html>