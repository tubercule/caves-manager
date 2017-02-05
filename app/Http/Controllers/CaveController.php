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
        $cave->longitude_hem = $request->longitude_hemi;
        $cave->longitude_deg = $request->longitude_deg;
        $cave->longitude_min = $request->longitude_min;
        $cave->longitude_sec = $request->longitude_sec;
        $cave->lattitude_hem = $request->lattitude_hemi;
        $cave->lattitude_deg = $request->lattitude_deg;
        $cave->lattitude_min = $request->lattitude_min;
        $cave->lattitude_sec = $request->lattitude_sec;
        $cave->altitude = $request->altitude;
        $cave->sequence = $request->sequence;
    	$cave->save();
    	return redirect('/cave');
    }

    public function show($id) {
    	$cave = Cave::find($id);
    	return view('cave.view', ['cave' => $cave]);
    }

    public function edit($id) {
        $cave = Cave::find($id);
        return view('cave.cave', ['cave' => $cave]);   
    }

    public function update(Request $request, $id) {
        $cave = Cave::find($id);
        $cave->name = $request->name;
        $cave->commune = $request->commune;
        $cave->cadastre = $request->cadastre;
        $cave->inv_patriache = $request->inv_patriache;
        $cave->x_lambert = $request->x_lambert;
        $cave->y_lambert = $request->y_lambert;
        $cave->longitude_hem = $request->longitude_hemi;
        $cave->longitude_deg = $request->longitude_deg;
        $cave->longitude_min = $request->longitude_min;
        $cave->longitude_sec = $request->longitude_sec;
        $cave->lattitude_hem = $request->lattitude_hemi;
        $cave->lattitude_deg = $request->lattitude_deg;
        $cave->lattitude_min = $request->lattitude_min;
        $cave->lattitude_sec = $request->lattitude_sec;
        $cave->altitude = $request->altitude;
        $cave->sequence = $request->sequence;
        $cave->save();
        return redirect('/cave');
    }

    public function destroy($id) {
        $cave = Cave::find($id);
        $cave->biblios()->detach();
        $cave->excavations()->delete();
        $cave->periods()->detach();
        $cave->delete();
        return redirect('/cave');
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

    public function removeBiblio($caveId, $biblioId)
    {
        $cave = Cave::find($caveId);
        $cave->biblios()->detach($biblioId);
        return redirect('/cave/'.$cave->id);
    }

    public function editBiblio($caveId, $biblioId) {
        $cave = Cave::find($caveId);
        $biblio = $cave->biblios->find($biblioId);
        return view('cave.editbiblio',
            [
            'cave' => $cave,
            'biblio' => $biblio
            ]);
    }

    public function updateBiblio($caveId, $biblioId, Request $request) {
        $cave = Cave::find($caveId);
        $pivot = $cave->biblios->find($biblioId)->pivot;
        $pivot->comment = $request->comment;
        $pivot->save();
        return redirect('/cave/'.$cave->id);
    }

    public function addExcavationForm($id) {
        $cave = Cave::find($id);

        return view('cave.addexcavation', array('cave' => $cave));
    }

    public function addExcavation(Request $request) {
        $cave = Cave::find($request->caveid);
        $excavation = new Excavation();
        $excavation->start_date = $request->startdate;
        $excavation->end_date = $request->enddate;
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

    public function removePeriod($caveId, $periodId) {
         $cave = Cave::find($caveId);
         $cave->periods()->detach($periodId);
        return redirect('/cave/'.$cave->id);
    }
}
