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
<h2>HISTORICO DE PACIENTE </h2>
<h3>{{$data->names}} </h3>
       <table>
           <thead>
             <tr>
                 <th>FECHA</th>
                 <th>CODIGO</th>
                 <th>SERVICIOS</th>
                 <th>MONTO</th>
             </tr>
           </thead>
           @foreach($data->services as $item)
           <tr>
               <td>{{Illuminate\Support\Carbon::parse($item->moment)->format('d-m-Y')}}</td>
               <td>{{$item->barcode}}</td>
               <td>
                   @foreach($item->analysis as $key => $itm)
                       <p>{{++$key}}# {{$itm->description}}</p>
                   @endforeach
               </td>
               <td>{{$item->price}}</td>
           </tr>
           @endforeach
       </table>

</body>
</html>