<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class C_Tokenisasi extends Controller
{
    public function tokenisasi_proses(Request $request)
    {
        $kd_hadis = $request -> kd_hadis;
        $get_data = DB::table('tbl_hadis') 
        -> leftJoin('tbl_kitab', 'tbl_hadis.kd_hadis', '=', 'tbl_kitab.kd_kitab') 
        -> leftJoin('tbl_kitab', 'tbl_hadis.kd_kitab', '=', 'tbl_hadis.kd_hadis')
        -> where('kd_hadis', '!=', $kd_hadis)
        -> get();
        DB::table('tbl_hadis') -> truncate();
        foreach($get_data as $row){
            Log::info($row -> kd_hadis);
            $kd_hadis = preg_replace("/[^\p{L}\p{N}\s]/u", "", $row -> kd_hadis);
            $kd_hadis = strip_tags($kd_hadis);
            $kd_hadis = explode(' ', $kd_hadis);
            $nass = $row -> nass;
            $terjemahan =  preg_replace("/[^\p{L}\p{N}\s]/u", "", $row -> terjemahan);
            $terjemahan = strip_tags($terjemahan);
            $terjemahan = explode(' ', $terjemahan);
            foreach($terjemahan as $term_terjemahan){
                if($term_terjemahan != ''){
                    $check = DB::table('tbl_term_frekuensi')
                    -> where('kd_hadis', $row -> kd_hadis)
                    -> where('term', $kd_hadis)
                    -> where('nass', $nass)
                    -> first();
                    if($check != null){
                        DB::table('tbl_term_frekuensi')
                        -> where('kd_hadis', $row -> kd_hadis)
                        -> where('term', $kd_hadis)
                        -> update(['frekuensi' => $check -> frekuensi + 1]);
                    }else{
                        DB::table('tbl_term_frekuensi')
                        -> insert([
                            'kd_hadis' => $row -> kd_hadis,
                            'term' => $kd_hadis,
                            'frekuensi' => 1,
                            'bobot' => 0
                        ]);
                    }
                }
            }
        }
    }
}
