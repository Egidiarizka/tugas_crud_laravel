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

    public function show($id)
    {
        $pertanyaan = DB::table('table_pertanyaan')->where('id' ,$id)->first();
        $jawaban = DB::table('table_jawaban')->where('pertanyaan_id', $pertanyaan->id)->get();
        return view('pertanyaan_id_show', [
            'pertanyaan' => $pertanyaan,
            'jawaban' => $jawaban
        ]);   
    }
    public function edit($id)
    {
        $pertanyaan = DB::table('table_pertanyaan')->where('id' ,$id)->first();
        if (is_null($pertanyaan)) {
            return redirect()->route('pertanyaan.index')->with('error', 'Data pertanyaan tidak ditemukan, silahkan edit lagi');
        }
        return view('pertanyaan_id_edit', [
            'pertanyaan' => $pertanyaan
        ]);   
    }

    public function update(Request $request, $id)
    {
        $pertanyaan = DB::table('table_pertanyaan')->where('id' ,$id);
        if (is_null($pertanyaan->first())) {
            return redirect()->route('pertanyaan.edit', ['id' => $id])->with('error', 'Data pertanyaan tidak ditemukan, silahkan update lagi');
        }

        $params = [
            'judul' => $request->judul,
            'isi' => $request->isi
        ];
        $pertanyaan->update($params);

        return redirect()->route('pertanyaan.edit', ['id' => $id])->with('success', 'Pertanyaan berhasil diupdate');
    }

    public function delete($id)
    {
        $pertanyaan = DB::table('table_pertanyaan')->where('id' ,$id);
        if (is_null($pertanyaan->first())) {
            return redirect()->route('pertanyaan.index')->with('error', 'Data pertanyaan tidak ditemukan, silahkan update lagi');
        }

        $pertanyaan->delete();

        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan berhasil dihapus');
    }
}
