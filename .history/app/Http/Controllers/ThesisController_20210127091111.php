<?php

namespace App\Http\Controllers;

use App\Models\Thesis;
use Illuminate\Http\Request;

class ThesisController extends Controller
{
    public function store(Request $request){
        $thesis = Thesis::created([
            'title' => $request->input('title'),
            'state' => ($request->input('state')?$request->input('state'):0)
        ]);
    }
}
