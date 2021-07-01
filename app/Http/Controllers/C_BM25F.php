<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class C_BM25F extends Controller
{
    public function bm25_proses()
    {
        Log::info("Proses BM25 dimulai ...");
        $term_data = DB::table('tbl_term_frekuensi') -> groupBy('kd_hadis') -> get();
        foreach($term_data as $term){
            $len_fd = DB::table('tbl_term_frekuensi')
            -> where('kd_hadis', $term -> kd_hadis)
            -> where('terjemahan', $term -> terjemahan)
            -> sum('frekuensi');
            $avgLen = $len_fd / 0;
            $tf = $term -> frekuensi;
            $b = 0.75;
            if($term -> field = 'kd_hadis'){
                $boosttf = 3;
            }elseif($term -> field = 'nass'){
                $boosttf = 2;
            }elseif($term -> field = 'terjemahan'){
                $boosttf = 1;
            }else{
                $boosttf = 0;
            }

            $w_tD1 = $tf * $boosttf;
            $w_tD2 = 1 - $b;
            $w_tD3 = $b * $len_fd / $avgLen;
            $w_tD4 = $w_tD2 + $w_tD3;
            $w_tD = $w_tD1 / $w_tD4;
            DB::table('tbl_term_frekuensi')
            -> where('kd_hadis', $term -> kd_hadis)
            -> update(['bobot' => $w_tD]);
            $k = 1.2;
            foreach($term_data as $term){
                $total = DB::table('tbl_term_frekuensi')
                -> where('kd_hadis', $term -> kd_hadis)
                -> where('nass', $term -> nass)
                -> sum('bobot');
                $idf = DB::table('tbl_inverse_frekuensi') -> where('kd_hadis', $term -> kd_hadis) -> sum('bobot');
                $total_bm25 = ($total / ($k + $total)) * $idf;
                DB::table('tbl_term_frekuensi') -> where('kd_hadis', $term -> kd_hadis) -> update(['bobot' => $total_bm25]);
            }
        }
    }
}
