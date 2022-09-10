
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
  <h2>INFORME PACIENTES DEL DIA {{now()->format('d-m-Y')}}</h2>
       <table>
           <thead>
             <tr>
             <th>Codigo</th>
                 <th>Paciente</th>
                 <th>Edad</th>
                 <th>Doctor</th>
                 <th>Analisis</th>
             </tr>
           </thead>
           @foreach($data as $item)
           <tr>
           <td>{{$item->barcode}}</td>
               <td>{{$item->client->names}}</td>
               <td>{{Illuminate\Support\Carbon::parse($item->client->birthday)->age}}</td>
               <td>{{$item->doctor->names}}</td>
               <td>
                   @foreach($item->analysis as $key => $itm)
                       <p>{{++$key}}# {{$itm->description}}</p>
                   @endforeach
               </td>
           </tr>
           @endforeach
       </table>

</body>
</html>