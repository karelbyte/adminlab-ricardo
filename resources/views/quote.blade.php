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
<body><br><br><br><br><br><br><br><br><br>
<h2>COTIZACION</h2>
<h4>FECHA: <b>{{\Illuminate\Support\Carbon::parse($data->moment)->format('d-m-Y')}}</b> </h4>
<div class="row" style="padding: 10px 0 10px 0;">
        <div class="row " style="margin-right: 10px; text-align: left">
            <span style="margin-right: 38px">CLIENTE: {{$data->client_name}}
        </div>
    </div>
    <br>
       <table width="100%">
           <thead>
             <tr>
                 <th style="text-align: left">SERVICIO</th>
                 <th>PRECIO</th>
             </tr>
           </thead>
           @foreach($data->details as $item)
           <tr>
               <td style="text-align: left">{{$item->analyses->description}}</td>
               <td style="text-align: center">${{number_format($item->price, 2)}}</td>
           </tr>
           @endforeach
           <tr>
               <td style="text-align: right"><b>Total</b></td>
               <td style="text-align: center"><b>${{number_format($data->amount, 2)}}</b></td>
           </tr>
       </table>
       <div class="row" style="padding: 20px 0 10px 0;">
    <div class="row " style="margin-right: 10px;">
        <span style="margin-right:8px"> <b>{{$data->note}}</b></span>
    </div>
</div>
</body>
</html>
