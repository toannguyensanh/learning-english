<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Phrases;

class FrontendController extends Controller
{
    
    public function index()
    {
        $phrases = Phrases::paginate(15);
        return view('frontend.home', compact('phrases'));
    }

    public function profile()
    {
        
    }
}
