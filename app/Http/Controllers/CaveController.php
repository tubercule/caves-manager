<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cave;
use App\Biblio;
use Validator;

class CaveController extends Controller
{
    
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
}
