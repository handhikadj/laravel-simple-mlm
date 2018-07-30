<?php

namespace App\Http\Controllers;

use App\Peserta;
use App\Promotor;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules= [
            'nama_promotor' => ['required',
                                                'exists:pesertas,nama_peserta'
                                                ]
        ];

        $message = [
            'nama_promotor.required' => 'Mohon Isi Form',
            'nama_promotor.exists' => 'Harap Memilih Data yang Sesuai',
        ];

        $this->validate($request, $rules, $message);
        
        $peserta = Promotor::find($request->id);

        $peserta->peserta()->create([
            'no_peserta' => $this->randomString(),
            'nama_peserta' => (string) $request->nama_peserta
        ]);    
    }

    public function caripeserta($nama_peserta)
    {
        $nama_peserta = Peserta::select('nama_peserta')->where('nama_peserta', 'LIKE', "%$nama_peserta%")->get();
        
        return $nama_peserta;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peserta $peserta)
    {
        $promotor = Promotor::find($request->id);

        $promotor->peserta()->update([
            'nama_peserta' => (string) $request->nama_peserta
        ]);    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peserta $pesertum)
    {
        $pesertum->delete();        

        return 'Success';
    }

    /**
     * Generates random string
     *
     * @return $huruf & $angka
     *  
     **/
    private function randomString()
    {
        $huruf = generateRandomString(1);
        $angka = generateRandomInteger(7);
        return $huruf . $angka;
    }
}
