<?php

namespace App\Http\Controllers;

use App\Models\Thesis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThesisController extends Controller
{
    public function store(Request $request){

        $max_code = Thesis::select(
            DB::raw(' (IFNULL(MAX(thesis_code),0)) AS max_code')
        )->first();

        $code = 'DOC-'.str_pad($max_code +1, 6, "0", STR_PAD_LEFT)

        $thesis = Thesis::created([
            'thesis_code' => $code,
            'title' => $request->input('title'),
            'state' => ($request->input('state')?$request->input('state'):0)
        ]);
    }
}
