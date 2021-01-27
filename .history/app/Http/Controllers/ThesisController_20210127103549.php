<?php

namespace App\Http\Controllers;

use App\Models\Thesis;
use App\Models\ThesisFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ThesisController extends Controller
{
    public function store(Request $request){

        $max_code = Thesis::select(
            DB::raw(' (IFNULL(MAX(RIGHT(thesis_code,7)),0)) AS number_max')
        )->first();
        $year = date('Y');
        $code = 'DOC'.$year.'-'.str_pad($max_code->number_max +1, 7, "0", STR_PAD_LEFT);
       /* $thesis = Thesis::create([
            'thesis_code' => $code,
            'title' => $request->input('title'),
            'state' => ($request->input('state')?$request->input('state'):0)
        ]);*/
        $file = $request->file('file');
        if($file){
            $filename = $file->getClientOriginalName();
            $foo = \File::extension($filename);
            if($foo == 'pdf'){
                $route_file = $code.DIRECTORY_SEPARATOR.date('Ymdhmi').'.'.$foo;
                Storage::disk('public')->put($route_file,\File::get($file));

                ThesisFile::create([
                    'thesis_id' => $thesis->id,
                    'url' => $route_file,
                    'name' => $filename,
                    'state' => 1
                ]);
            }else{

            }
        }

    }
}
