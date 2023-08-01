<?php

use Illuminate\Support\Facades\Route;
use  \Illuminate\Support\Facades\Artisan;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('test', function () {
    $nombre_impresora = "CODIGO-BARRA";
    $connector = new WindowsPrintConnector($nombre_impresora);
    $printer = new Printer($connector);
    $printer->text("^XA
    ^CI28
    ^FO16,180^A0N,18,15^FD^FS
    ^FO16,180^A0N,18,15^FD^FS
    ^FB300,2,2
    ^FO16,140^A0N,19,16^FD^FS
    ^FB300,2,2
    ^FO30,10^A0N,15,15^FD". $nombre_impresora . "^FS
    ^FO30,55^BY2^BCN,60,N,N
    ^FDJFCQ26307^FS
    ^FT95,135^A0N,23,26^FH\^FD" . "JFCQ26307". "^FS
    ^PQ1,0,1,Y^XZ");
    $printer->close();
});

Route::get('/cache', function () {

    Artisan::call('view:clear');

    Artisan::call('route:clear');

    Artisan::call('cache:clear');

    Artisan::call('config:clear');

    Artisan::call('config:cache');

    return 'CACHE DEL SISTEMA LIMPIADA CON EXITO';

});

Route::get('quotes/print/note/{id}', 'QuoteController@quoteNote');

Route::prefix('analysis')->group(function () {
    Route::get('pdf/{id}', 'AnalysisController@pdf');
    Route::get('sales-note/{id}', 'ServiceController@salesNote');
});

Route::get('viewmail', 'ServiceController@viewmail');


Route::get('{any}', function () {
    return view('app');
})->where('any','.*');


