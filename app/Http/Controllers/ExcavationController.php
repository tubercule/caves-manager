<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Excavation;

class ExcavationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index() {
		$excavation = Excavation::orderBy('name', 'asc')->get();

		return view('excavation.excavations');
	}

	public function show($id) {
    	$exca = Excavation::find($id);
    	return view('excavation.view', ['excavation' => $exca]);
	}

	public function destroy($id) {
		$exca = Excavation::find($id);
		$caveId = $exca->cave->id;
		//$exca->cave()->detach();
		$exca->delete();
		return redirect('/cave/' . $caveId);
	}
}
