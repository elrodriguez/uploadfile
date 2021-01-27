<?php

namespace App\Http\Controllers;

use App\Models\Thesis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThesisController extends Controller
{
    public function store(Request $request){

        $max_code = Thesis::select(
            DB::raw(' (IFNULL(MAX(RIGHT(thesis_code,7)),0)) AS number_max')
        )->first();
        //dd($max_code);
        $year = date('Y');
        $code = 'DOC'.$year.'-'.str_pad($max_code->number_max +1, 7, "0", STR_PAD_LEFT);
        //dd($code);
        $thesis = Thesis::created([
            'thesis_code' => $code,
            'title' => $request->input('title'),
            'state' => ($request->input('state')?$request->input('state'):0)
        ]);
    }
}
