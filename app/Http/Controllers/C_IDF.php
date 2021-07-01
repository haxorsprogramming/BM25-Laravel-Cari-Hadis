<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class C_IDF extends Controller
{
    public function idf_proses()
    {
        Log::info("Proses IDF dimulai ...");
        $term_data = DB::table('tbl_term_frekuensi') -> groupBy('kd_hadis') -> get();
        DB::table('tbl_term_frekuensi') -> truncate();
        
        foreach($term_data as $term){
            $data_hadis = DB::table('tbl_term_frekuensi') -> groupBy('kd_hadis') -> get();
            $data_hadis = collect($data_hadis) -> count();
            $data_hadis_with_term = DB::table('tbl_term_frekuensi')
            -> where('kd_hadis', $term -> kd_hadis)
            -> get();
            $data_hadis_term = collect($data_hadis_with_term) -> count();
            $idf_start = log10(($data_hadis + 1) / $data_hadis_with_term);
        }
    }
}
