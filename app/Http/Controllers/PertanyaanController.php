<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PertanyaanController extends Controller
{
    public function index()
    {
    	$pertanyaan = DB::table('table_pertanyaan')->get();
    	return view('pertanyaan', [
    		'pertanyaan' => $pertanyaan
    	]);
    }

    public function create()
    {
    	return view('buat_pertanyaan');
    }


    public function store(Request $request)
    {
    	$parameter = [
            'judul' => $request->judul,
            'isi' => $request->isi
        ];

        DB::table('table_pertanyaan')->insert($parameter);

        return redirect()->route('pertanyaan.index')->with('success', 'Berhasil menambahkan pertanyaan');
    }
}
