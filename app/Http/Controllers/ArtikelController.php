<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan artikel
        $artikel = Artikel::all();
        $kategori = Kategori::all();
        return view('artikel',compact('artikel','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //tambah artikel
        $file = $request->file('foto')->store('public/artikel/foto');
        Artikel::create([
            'judul'=>$request->judul,
            'isi'=>$request->isi,
            'foto'=>$file,
            'tanggal_artikel'=>$request->tanggal_artikel,
            'kategori_id'=>$request->kategori_id,
            'user_id'=>$request->user_id,
        ]);
        return redirect('artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artikel $artikel)
    {
        //update artikel
        $data = $request->all();
        try {
            $data['foto']=$request->file('foto')->store('public/artikel/foto');
            $artikel->update($data);
        } catch (\Throwable $th) {
            $data['foto']=$artikel->foto;
            $artikel->update($data);

        }
        return redirect('artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        //delete artikel
        $artikel->delete();
        return redirect('artikel');

    }
}
