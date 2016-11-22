<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Biblio;
use App\Cave;
use App\Excavation;
use App\Period;
use Validator;

class CaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
    	$caves = Cave::orderBy('name', 'asc')->get();

    	return view('cave.caves', [
    		'caves' => $caves]);
    }

    public function create() {
    	return view('cave.cave')->with('cave', new Cave());
    }

    public function store(Request $request) {
    	$validator = Validator::make($request->all(), [
			'name' => 'required|max:255',
		]);
		
		if ($validator->fails()) {
			return redirect('/cave/create')->withInput()->withErrors($validator);
		}

    	$cave = new Cave();
    	$cave->name = $request->name;
        $cave->commune = $request->commune;
        $cave->cadastre = $request->cadastre;
        $cave->inv_patriache = $request->inv_patriache;
        $cave->x_lambert = $request->x_lambert;
        $cave->y_lambert = $request->y_lambert;
        $cave->lattitude = $request->lattitude;
        $cave->longitude = $request->longitude;
        $cave->altitude = $request->altitude;
        $cave->sequence = $request->sequence;
    	$cave->save();
    	return redirect('/cave');
    }

    public function show($id) {
    	$cave = Cave::find($id);
    	return view('cave.view', ['cave' => $cave]);
    }

    public function edit() {

    }

    public function destroy() {

    }

    public function addBiblioForm($id) {
    	$cave = Cave::find($id);
    	$biblios = Biblio::orderBy('title', 'asc')->get();

    	return view('cave.addbiblio', 
    		[
    		'cave' => $cave,
    		'biblios' => $biblios
    		]);
    }

    public function addBiblio(Request $request) {
    	$cave = Cave::find($request->caveid);
    	//return $request->caveid.' POUET '.$request->biblioid.' POUET '.$request->comment;
    	$cave->biblios()->attach($request->biblioid, ['comment' => $request->comment]);
    	return redirect('/cave/'.$cave->id);	
    }

    public function addExcavationForm($id) {
        $cave = Cave::find($id);

        return view('cave.addexcavation', array('cave' => $cave));
    }

    public function addExcavation(Request $request) {
        $cave = Cave::find($request->caveid);
        $excavation = new Excavation();
        $excavation->start_date = new \DateTime($request->startdate);
        $excavation->end_date = new \DateTime($request->enddate);
        $excavation->leader = $request->leader;
        $excavation->comment = $request->comment;
        $cave->excavations()->save($excavation);

        return redirect('/cave/'.$cave->id);
    }

    public function addPeriodForm($id) {
        $cave = Cave::find($id);
        $periods = Period::orderBy('name', 'asc')->get();

        return view('cave.addperiod', [
            'cave' => $cave,
            'periods' => $periods
            ]);
    }
    


    public function addPeriod(Request $request) {
        $cave = Cave::find($request->caveid);
        $cave->periods()->attach($request->periodid, array('comment' => $request->comment));
        return redirect('/cave/'.$cave->id);
    }
}
