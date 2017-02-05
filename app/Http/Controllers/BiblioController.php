<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Http\Requests;

use App\Biblio;



class BiblioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
     public function showBiblio($id = null) {
    	if (null == $id) {
    		$biblio = new Biblio();
		} else {
			$biblio = Biblio::find($id);
		}

		return view('biblio.biblio', [
			'biblio' => $biblio
			]);
    }

    public function saveBiblio(Request $request) {
    	$validator = Validator::make($request->all(), [
			'title' => 'required|max:255',
		]);

		if ($validator->fails()) {
			return redirect('/')->withInput()->withErrors($validator);
		}

		$biblio = new Biblio();
		$biblio->title = $request->title;
		$biblio->author = $request->author;
		$biblio->revu = $request->revu;
		$biblio->date = $request->date;
		$biblio->save();

		return redirect('/biblios');
    }

    public function showBiblios() {
		$biblios = Biblio::orderBy('created_at', 'asc')->get();

	    return view('biblio.biblios', [
	        'biblios' => $biblios
	    ]);
	}

	public function deleteBiblio($id) {
		$biblio = Biblio::find($id);
		$biblio->delete();
		return redirect('/biblios');
	}
}
