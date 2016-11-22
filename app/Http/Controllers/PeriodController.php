<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Period;

class PeriodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
    	$periods = Period::orderBy('name', 'asc')->get();

    	return view('period.periods')->with('periods', $periods);
   }

   public function create() {
   		return view('period.period')->with('period', new Period());
   }

   public function store(Request $request) {
   		$period = new Period();
   		$period->name = $request->name;
   		$period->save();

   		return redirect('/period');
   }
}
