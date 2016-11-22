<?php
use Illuminate\Http\Request;
use App\Biblio;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*********************************/
/*********** BIBLIO **************/
/*********************************/

Route::get('/biblio/{id?}', 'BiblioController@showBiblio');
Route::post('/biblio', 'BiblioController@saveBiblio');
Route::get('/biblios', 'BiblioController@showBiblios');
Route::delete('/biblio/{id}', 'BiblioController@deleteBiblio');

/***********************************/
/************ CAVE *****************/
/***********************************/

Route::resource('cave', 'CaveController',
	['only' =>
		['index', 'create', 'store', 'show']
	]);

Route::get('/addbibliotocave/{caveid}', 'CaveController@addBiblioForm');
Route::post('/addbibliotocave/', 'CaveController@addBiblio');

Route::get('/addexcavationtocave/{caveid}', 'CaveController@addExcavationForm');
Route::post('/addexcavationtocave/', 'CaveController@addExcavation');

Route::get('/addperiodtocave/{caveid}', 'CaveController@addPeriodForm');
Route::post('/addperiodtocave/', 'CaveController@addPeriod');

/***********************************/
/************ PERIOD ***************/
/***********************************/
Route::resource('period', 'PeriodController',
	[ 'only' => 
		['index', 'create', 'store', 'show']
	]);

/***********************************/
/************ EXCAVATION ***************/
/***********************************/
Route::resource('excavation', 'ExcavationController',
	[ 'only' => 
		['index', 'show']
	]);


/***********************************/
/************ HOME *****************/
/***********************************/

Route::get('/', function () {
	return view('home');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');
