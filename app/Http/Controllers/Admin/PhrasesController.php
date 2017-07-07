<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Phrases;
use Illuminate\Support\Facades\Session;

class PhrasesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$phrases = Phrases::all();
        return view('admin.phrases.home', compact('phrases'));
    }

    public function create() {
    	return view('admin.phrases.edit');
    }

    public function edit($id) {
    	$phrase = Phrases::find($id);
    	return view('admin.phrases.edit', compact('phrase'));
    }

    public function update(Request $request) {
    	if(!$request->input('id')) {
    		$check = Phrases::where('alias', $request->input('alias'))->first();
    		if($check) {
    			Session::flash('error', 'Phrases failed to save successfully!');
    			return redirect('/admin/phrases/create');
    		}

    		$arr_req = $request->all();

            $phrase = new Phrases();
            $phrase->english = $arr_req['english'];
            $phrase->vietnamese = $arr_req['vietnamese'];
            $phrase->alias = $arr_req['alias'];
            $phrase->audio_slow = $arr_req['audio_slow'];
            $phrase->audio_normal = $arr_req['audio_normal'];
            $phrase->filter = $arr_req['filter'];

    		$phrase->save();

    		Session::flash('success', 'Phrases saved successfully!');
    		
    		return redirect('/admin/phrases/edit/'.$phrase->id);
    	}
    	else {
    		$phrase = Phrases::findOrFail($request->input('id'));
            
            $phrase->update($request->all());

    		Session::flash('success', 'Phrases saved successfully!');

    		return redirect('/admin/phrases/edit/'.$phrase->id);
    	}
    }

    public function delete($id) {
    	$phrase = Phrases::findOrFail($id);
    	$phrase->delete();

    	Session::flash('success', 'Delete successfully!');

    	return redirect('admin/phrases');
    }
}
