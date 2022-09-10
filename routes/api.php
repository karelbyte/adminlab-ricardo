<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use \Illuminate\Support\Facades\Artisan;


Route::get('/backup', function () {
    Artisan::call('backup:run --only-db');
    return http_response_code(200);
});


Route::get('info', 'ServiceController@info');
Route::get('client/info/{id}', 'ClientController@report');
Route::get('locations/info/{id}', 'LocationController@report');
Route::get('doctors/info/{id}', 'DoctorsController@report');
Route::get('quotes/print/{id}', 'QuoteController@report');


Route::post('printrq', function (Request $request) {
    $nombre_impresora = "CODIGO-BARRA";
    $connector = new WindowsPrintConnector($nombre_impresora);
    $printer = new Printer($connector);
    for ($i=0;  $i < $request->cant; $i++ ) {
        $printer->text("^XA
        ^CI28
        ^FO16,180^A0N,18,15^FD^FS
        ^FO16,180^A0N,18,15^FD^FS
        ^FB600,2,2
        ^FO16,140^A0N,19,16^FD^FS
        ^FB300,2,2
        ^FO20,0^A0N,20,15^FD". $request->name . "^FS
        ^FO25,30^BY2^BCN,60,N,N
        ^FD" . $request->qr. "^FS
        ^FT85,120^A0N,23,26^FH\^FD" . $request->qr. "^FS
        ^PQ1,0,1,Y^XZ");
    }

    $printer->close();
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('inventories')->group(function () {
    Route::post('list', 'InventoryController@list');
});

Route::prefix('services')->group(function () {
    Route::post('list', 'ServiceController@list');
    Route::get('resources', 'ServiceController@resources');
    Route::post('post', 'ServiceController@store');
    Route::post('update', 'ServiceController@update');
    Route::post('eraser', 'ServiceController@destroy');
    Route::get('get-content/{id}', 'ServiceController@getcontent');
    Route::post('store-content', 'ServiceController@storeContent');
    Route::post('set-status', 'ServiceController@setStatus');
    //  Route::post('get-next', 'getNextNumberClientController@setStatus');
    Route::post('mail', 'ServiceController@sendMail');
});


Route::prefix('locations')->group(function () {
    Route::post('list', 'LocationController@list');
    Route::get('resources', 'LocationController@resources');
    Route::post('post', 'LocationController@store');
    Route::post('update', 'LocationController@update');
    Route::post('eraser', 'LocationController@destroy');
});

Route::prefix('clients')->group(function () {
    Route::post('list', 'ClientController@list');
    Route::get('resources', 'ClientController@resources');
    Route::post('post', 'ClientController@store');
    Route::post('update', 'ClientController@update');
    Route::post('eraser', 'ClientController@destroy');
});

Route::prefix('doctors')->group(function () {
    Route::post('list', 'DoctorsController@list');
    Route::get('resources', 'DoctorsController@resources');
    Route::post('post', 'DoctorsController@store');
    Route::post('update', 'DoctorsController@update');
    Route::post('eraser', 'DoctorsController@destroy');
});


Route::prefix('analysis')->group(function () {
    Route::post('list', 'AnalysisController@list');
    Route::get('resources', 'AnalysisController@resources');
    Route::post('post', 'AnalysisController@store');
    Route::post('update', 'AnalysisController@update');
    Route::post('eraser', 'AnalysisController@destroy');
    Route::get('pdf/{id}', 'AnalysisController@pdf');
    Route::get('clone/{id}', 'AnalysisController@clones');
});


Route::prefix('receptions')->group(function () {
    Route::post('list', 'ReceptionController@list');
    Route::get('resources', 'ReceptionController@resources');
    Route::post('post', 'ReceptionController@store');
    Route::post('update', 'ReceptionController@update');
    Route::post('eraser', 'ReceptionController@destroy');
    Route::post('apply', 'ReceptionController@apply');
});

Route::prefix('products')->group(function () {
    Route::post('list', 'ProductController@list');
    Route::get('resources', 'ProductController@resources');
    Route::post('post', 'ProductController@store');
    Route::post('update', 'ProductController@update');
    Route::post('eraser', 'ProductController@destroy');
});


Route::prefix('measures')->group(function () {
    Route::post('list', 'MeasureController@list');
    Route::post('post', 'MeasureController@store');
    Route::post('update', 'MeasureController@update');
    Route::post('eraser', 'MeasureController@destroy');
});


Route::prefix('categories')->group(function () {
    Route::post('list', 'CategoryController@list');
    Route::post('post', 'CategoryController@store');
    Route::post('update', 'CategoryController@update');
    Route::post('eraser', 'CategoryController@destroy');
});


Route::prefix('providers')->group(function () {
    Route::post('list', 'ProviderController@list');
    Route::post('post', 'ProviderController@store');
    Route::post('update', 'ProviderController@update');
    Route::post('eraser', 'ProviderController@destroy');
});

Route::prefix('quotes')->group(function () {
    Route::post('list', 'QuoteController@list');
    Route::post('post', 'QuoteController@store');
    Route::post('update', 'QuoteController@update');
    Route::post('eraser', 'QuoteController@destroy');
    Route::get('resources', 'QuoteController@resources');
});

