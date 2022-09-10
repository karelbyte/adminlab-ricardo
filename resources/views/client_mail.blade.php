<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css" media="all">
        body {background: none white;  content: "©"; padding: 50px; margin: 0 100px 0 100px}
        .row{ margin: 0;  padding: 0; width: 100%; }
        .clear { clear: both;}
        .title{ text-transform: uppercase; }
        .title_pie{ text-transform: uppercase; font-size: 10px; }
        h5 {
            margin: 0;
            padding:5px 5px 5px 5px;
        }
        .txt-center {
            text-align: center;
        }
        .border {
            border-top: 5px dotted black;
            border-bottom: 5px dotted black;
        }
        .separator{ width: 100%; height: 15px; }
        .ticket_list{padding: 10px 0 10px 0; }
        .totals div{width: 100%;}    
    </style>
</head>
<body>
<div class="ticket">
    <!-- EMPRESA -->
    <div class="txt-center">
        <div class="row">
            <img src="{{$message->embed(asset('back/logo_lab.jpg'))}}"  width="130px" alt="">
        </div>
    </div>
    <div class="txt-center" style="margin-top:10px;">
        <div class="row">
            <span><b>LABORATORIO CLINICO INTEGRAL</b></span><br>
            <span>Análisis Clínicos y Pruebas de Fertilidad</span>
        </div>
    </div>
    <div style="margin-top:10px;">    
        <div class="row" style="text-align: center;">
        <h5>DIRECCION</h5>
           <span style="font-size: 14px;">Calle Saturno, Esq. Paseo de la Boquita Col. Industrial Zihutanejo, Gro. CP.40880</span><br>
           <span style="font-size: 11px;">[Frente al Centro de Salud "El Embalse"]</span>
        </div>
        <div class="row" style="text-align: center;">
            <h5>S.S.A. 1205380035</h5>
        </div>
    </div>
   
       <div  style="width: 50%; float: left; text-align: left;  font-size: 13px; ">
            <h5>TELEFONO</h5>
            <span>(755) 5 54 01 43</span>
            </div>
        
            <div style="width: 50%; float: left; text-align: center; font-size: 13px;">
            <h5>URGENCIAS</h5>
            <span>(755) 108 48 00</span>
       </div>
          
   

    <div class="separator"></div>
    <div class="row txt-center" style="margin-top:40px;">
        <h2>ORDEN DE SERVICIO</h5>
    </div>
    <div class="separator"></div>
    <div class="clear"></div>
    <div class="ticket_list">
        <div>
            <div style="width: 35%; float: left; text-align: left; font-size: 11px;">
                <b>ANALISIS</b>
            </div>
            <div  style="width: 20%; float: left; text-align: center;  font-size: 11px; ">
                <b>CANT</b>
            </div>
            <div  style="width: 20%; float: left;  text-align: center; font-size: 11px;">
                <b>PRECIO</b>
            </div>

            <div  style="width: 25%;float:left; text-align:center; font-size: 11px;">
                <b>IMPORTE</b>
            </div>
        </div>
        <div style="border-bottom: 1px solid black; margin-top: -10px;"></div>
        <div class="clear"></div>
        @foreach($data->analysis as $item)
            <div class="row" style="margin-top: 10px;  border-bottom: 1px dashed black;">

                <div  style="padding-top: 5px; width:35%; float:left; text-align: left; font-size: 13px;">
                    {{$item->analysis->description}}
                </div>
                <div style="padding-top: 5px; width:20%; float: left; text-align: center; font-size: 13px;">
                    1
                </div>
                <div style="padding-top: 5px; width:20%; float: left; text-align: center; font-size: 13px;">
                    {{$item->price}}
                </div>
                <div style="padding-top: 5px; width: 25%; float:left; text-align: center; font-size: 13px;">
                    {{$item->price}}
                </div>
            </div>
            <br><br><br>
        @endforeach
    </div>
    <div class="clear"></div>
    <div class="separator"></div>
    <div style="margin:10px 10px 10px 20px;">
        {!! DNS1D::getBarcodeSVG('GD04RNQ', 'C128', 2,63, 'black', false)!!}
        <p>GD04RNQ</p>
    </div>
    <div class="txt-center" style="margin:30px 0 40px 0">
        <div class="row">
            <h4>LOS RESULTADOS SE ADJUNTAN EN UN DOCUMENTO PDF</h1>
        </div>
    </div>
</div>

</body>
</html>