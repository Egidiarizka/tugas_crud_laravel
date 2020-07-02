<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class JawabanController extends Controller
{
    public function index($pertanyaan_id)
    {
    	$pertanyaan = DB::table('table_pertanyaan')->where('id', $pertanyaan_id)->first();
    	if (is_null($pertanyaan)) {
    		return redirect()->route('pertanyaan.index')->with('error', 'Pertanyaan tidak ditemukan');
    	}

    	$jawaban = DB::table('table_jawaban')->where('pertanyaan_id', $pertanyaan->id)->first();
    	return view('jawaban', [
    		'pertanyaan' => $pertanyaan,
    		'jawaban' => $jawaban
    	]);
    }


    public function store(Request $request, $pertanyaan_id)
    {
    	$pertanyaan = DB::table('table_pertanyaan')->where('id', $pertanyaan_id)->first();
    	if (is_null($pertanyaan)) {
    		return redirect()->route('pertanyaan.index')->with('error', 'Pertanyaan tidak ditemukan');
    	}

        DB::table('table_jawaban')->updateOrInsert(
        	['pertanyaan_id' => $pertanyaan->id],
        	['isi' => $request->jawaban]
        );

        return redirect()->route('pertanyaan.index')->with('success', 'Jawaban berhasil disimpan');
    }
}
