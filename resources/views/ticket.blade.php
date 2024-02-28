<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css" media="all">
        body {background: none white;  content: "©"; padding: 0; margin: 0;}
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
        .txt-justify {
            text-align: justify;
        }
        .border {
            border-top: 5px dotted black;
            border-bottom: 5px dotted black;
        }
        .separator{ width: 100%; height: 15px; }
        .ticket_list{padding: 10px 0 10px 0; }
        .totals div{width: 100%;}

        .btn{
            background-color: rgba(255,255,255,1);
            background-color: -moz-radial-gradient(center, ellipse cover, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
            background-color: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(255,255,255,1)), color-stop(47%, rgba(246,246,246,1)), color-stop(100%, rgba(237,237,237,1)));
            background-color: -webkit-radial-gradient(center, ellipse cover, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
            background-color: -o-radial-gradient(center, ellipse cover, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
            background-color: -ms-radial-gradient(center, ellipse cover, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
            background-color: radial-gradient(ellipse at center, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed', GradientType=1 );
            padding: 5px 12px 5px 12px;
            border: 1px solid #777777;
            cursor: pointer;
            border-radius: 5px;
            box-shadow: 1px 1px 1px 0 rgba(0,0,0,0.16);
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .btn:hover{
            background-color: rgb(254, 255, 231);
            background-color: -moz-radial-gradient(center, ellipse cover, rgb(254, 255, 231) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
            background-color: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgb(254, 255, 231)), color-stop(47%, rgba(246,246,246,1)), color-stop(100%, rgba(237,237,237,1)));
            background-color: -webkit-radial-gradient(center, ellipse cover, rgb(254, 255, 231) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
            background-color: -o-radial-gradient(center, ellipse cover, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
            background-color: -ms-radial-gradient(center, ellipse cover, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
            background-color: radial-gradient(ellipse at center, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed', GradientType=1 );
            box-shadow: 1px 1px 1px 0 rgba(0,0,0,0.36);
        }
        .btn:after {
            content: '';
            display: block;
            position: absolute;
            left: 50%;
            top: 50%;
            width: 120px;
            height: 120px;
            margin-left: -60px;
            margin-top: -60px;
            background: #1a24b5;
            border-radius: 100%;
            opacity: .6;
            transform: scale(0);
        }
        @keyframes ripple {
            0% {
                transform: scale(0);
            }
            20% {
                transform: scale(1);
            }
            100% {
                opacity: 0;
                transform: scale(1);
            }
        }
        .btn:not(:active):after {
            animation: ripple 1s ease-out;
        }
        .btn:after {
            visibility: hidden;
        }
        .btn:focus:after {
            visibility: visible;
        }

        .marca {
            position: absolute;
            top: 550px;
            color: rgba(1, 2, 2, 0.3);
            transform: rotate(45deg);
            font-size: 30px;
         }
    </style>
    <style type="text/css" media="screen">
        body{width: 100% !important;}
        .ticket{display: none;}
    </style>
    <style type="text/css" media="print">
        .print-button{display: none;}
        .ticket{margin: 40px 0 40px 0;}
    </style>
</head>
<body style="width: 2.95276in !important">
<div class="print-button">
    <p>El ticket se ha creado correctamente, puede imprimirlo presionando el bot&oacute;n de imprimir</p>
    <button class="btn btn-primary"  onclick="javascript:print()"><i class="fa fa-print"></i>Imprimir</button>
</div>
<div class="ticket">
    <!-- EMPRESA -->
    <div class="txt-center">
        <div class="row">
            <img src="{{asset('back/logo_lab.jpg')}}"  width="130px" alt="">
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
    <div  style="width: 50%; float: left; text-align: left;  font-size: 13px; ">
            <h5>FECHA</h5>
            <span>{{Illuminate\Support\Carbon::now()->format('d-m-Y')}}</span>
            </div>
        
            <div style="width: 50%; float: left; text-align: center; font-size: 13px;">
            <h5>HORA</h5>
            <span>{{Illuminate\Support\Carbon::now()->toTimeString()}}</span>
       </div>
    <h4>{{$data->client->names}}</h1>
    <div class="row" style="border-top: 2px solid black; padding: 10px 0 10px 0;">
        <div class="row " style="margin-right: 10px">
            <span style="margin-right: 38px">TOTAL</span>: <b>{{$data->price}}</b>
        </div>
       <!--  <div class="row ">
            <span style="margin-right: 22px">BASE IMP IVA </span> :
        </div>
        <div class="row ">
            <span style="margin-right:53px">IVA 16%</span> :
        </div> -->
        <div class="row">
            <span style="margin-right: 12px">RECIBIDO</span>: <b>{{$data->advance}}</b> 
        </div>
        @if($data->price - $data->advance > 0)
            <div class="row">
                <span style="margin-right: 35px">SALDO</span>: <b>{{number_format( $data->price - $data->advance, 2, '.', '')}}</b>
            </div>
        @else
        <div class="marca">
          <h1>PAGADO</h1>
        </div>
        @endif
    </div>
    <div style="margin:30px 10px 40px 10px" class="txt-justify">
       Le sugerimos nuestro servicio de entrega de resultados via <b>Whatsapp</b>, registre nuestro número <b>+52 755 102 1726</b> y salude "Hola".
       <br>Utilice su codigo de servicio <b>{{$data->barcode}}</b><br>
       Nuestro bot le indicará que hacer para obtener sus resultados.
    </div>
    <div style="border-bottom: 1px solid black; margin-top: -10px;"></div>
    <div class="clear"></div>
    <div class="txt-center" >
    <div style="margin:10px 10px 10px 20px;">
        {!! DNS1D::getBarcodeSVG($data->barcode, 'C128', 2,63, 'black', false)!!}
        <p>{{$data->barcode}}</p>
    </div>
    <div style="margin:10px 10px 10px 20px;">
        {!! DNS2D::getBarcodeSVG('http://laboratorioclinicointegral.com/services-admin/'.$data->barcode, 'QRCODE', 5, 5)!!}
      
    </div>
   
    <div class="txt-center" style="margin:30px 0 40px 0">
        <div class="row">
            <h3>GRACIAS POR SU PREFERENCIA</h1>
        </div>
    </div>
    <div class="txt-center" style="margin:30px 0 40px 0">
        <div class="row">
            <h3 style="color:transparent">GRACIAS POR SU PREFERENCIA</h1>
        </div>
    </div>
</div>

<script type="text/javascript">
  window.print();
</script>
</body>
</html>