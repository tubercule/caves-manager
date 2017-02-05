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
		['index', 'create', 'store', 'show', 'update', 'edit', 'destroy']
	]);

Route::get('/addbibliotocave/{caveid}', 'CaveController@addBiblioForm');
Route::post('/addbibliotocave/', 'CaveController@addBiblio');
Route::get('/removebiblio/{caveid}/remove/{biblioid}', 'CaveController@removeBiblio');
Route::get('/cavebiblio/{caveid}/edit/{biblioid}', 'CaveController@editBiblio');
Route::post('/cave/{caveid}/edit/{biblioid}', 'CaveController@updateBiblio');

Route::get('/addexcavationtocave/{caveid}', 'CaveController@addExcavationForm');
Route::post('/addexcavationtocave/', 'CaveController@addExcavation');

Route::get('/addperiodtocave/{caveid}', 'CaveController@addPeriodForm');
Route::post('/addperiodtocave/', 'CaveController@addPeriod');
Route::get('/removeperiod/{caveid}/remove/{periodid}', 'CaveController@removePeriod');


/***********************************/
/************ PERIOD ***************/
/***********************************/
Route::resource('period', 'PeriodController',
	[ 'only' => 
		['index', 'create', 'store', 'show', 'update', 'edit', 'destroy']
	]);

/***********************************/
/************ EXCAVATION ***************/
/***********************************/
Route::resource('excavation', 'ExcavationController',
	[ 'only' => 
		['index', 'show', 'destroy', 'update', 'edit'],
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


Route::resource('auth','\App\Http\Controllers\Auth\AuthController');
Route::resource('password', '\App\Http\Controllers\Auth\PasswordController');
