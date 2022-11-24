<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DasboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dasboard');
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
        //deklarasi parameter dan menerima data dari inputan
        $hitung = new konsul($request->berat, $request->tinggi,$request->tahun);
        $data= [
            'nama'=>$request->nama,
            'tinggi'=>$request->tinggi,
            'berat'=>$request->berat,
            'bmi'=>$hitung->bmi(),
            'status'=>$hitung->status(),
            'umur'=>$hitung->hitungUmur(),
            'hobi'=>$request->hobi,
            'konsultasi'=>$hitung->konsultasi(),
        ];
        return view('dasboard',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}


//mencari nilai BMI dan menghitung Umur
class hitung
{
    public function __construct($berat, $tinggi, $tahun) {
        $this->berat = $berat;
        $this->tinggi = $tinggi/100;
        $this->umur = $tahun;
    }
    public function bmi()
    {
        return $this->berat/($this->tinggi*$this->tinggi);
    }

    public function status()
    {
        if ($this->bmi() <= 18.5) {
            return "Kurus";
        } else if ($this->bmi() <= 22.9) {
            return "Normal";

        } else if ($this->bmi() <= 29.9) {
            return "Gemuk";
        } else {
            return "Obesitas";
        }
        
    }

    public function hitungUmur()
    {
        return 2022 - $this->umur;
    }
}

//mencari hasil konsultasi gratis
class konsul extends hitung
{
    public function keterangan()
    {
        if ($this->hitungUmur() >= 17) {
            return "Dewasa";
        } else {
            return "Bocil Kematian";
        }
        
    }

    public function konsultasi()
    {
        if ($this->status()=="Obesitas"&&$this->keterangan()=="Dewasa") {
            return "Anda Mendapatkan Konsultasi Gratis";
        } else {
            return "Bayar Sendiri";
        }
        
    }
}

