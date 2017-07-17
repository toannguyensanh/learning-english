<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Phrases;
use App\Models\Categories_Phrases;
use App\User;

class PhrasesController extends Controller
{
    public function __construct() 
    {
    	$this->middleware('auth');
    }

    public function index(Request $request) 
    {
    	$cat_phrases = Categories_phrases::all();
        if($request->input('filter') && $request->input('filter') != 'all') {
            $filter = $request->input('filter');
            $phrases = Categories_phrases::find($filter)->Phrases;
            return view('frontend.phrases.home', compact('phrases', 'filter', 'cat_phrases'));
        }
    	$phrases = Phrases::all();
        return view('frontend.phrases.home', compact('phrases', 'cat_phrases'));
    }

    public function add(Request $request) {
    	if($request->get('phrase_id')) {
    		$arr_phrase = $request->get('phrase_id');
    		$user = \Auth::user();
    		foreach ($arr_phrase as $value) {
	    		$phrase = Phrases::where('id', $value)->first();
	    		$user->phrases()->attach($phrase);
	    	}
	    	if($request->get('old_request')) {
	    		return redirect('/phrases?' . $request->get('old_request'));
	    	}
	    	else {
	    		return redirect('/phrases');
	    	}	    	
    	}
    	else {
    		if($request->get('old_request')) {
	    		return redirect('/phrases?' . $request->get('old_request'));
	    	}
	    	else {
	    		return redirect('/phrases');
	    	}	
    	}
    }
}
