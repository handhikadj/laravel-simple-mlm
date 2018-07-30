<?php

namespace App\Http\Controllers;

use App\Promotor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PromotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules= [
            'nama_angktpromotor' => ['required',
                                                        'exists:pesertas,nama_peserta'
                                                        ]
        ];

        $message = [
            'nama_angktpromotor.required' => 'Mohon Isi Form',
            'nama_angktpromotor.exists' => 'Harap Memilih Data yang Sesuai',
        ];

        $validator = $this->validate($request, $rules, $message);

        $promotor = new Promotor([
            'nama_promotor' => $request->nama_angktpromotor
        ]);

        $promotor->save();

        return 'Success';
    }

    public function caripromotor($nama_promotor)
    {
        $nama_promotor = Promotor::select('id', 'nama_promotor')->where('nama_promotor', 'LIKE', "%$nama_promotor%")->get();
        
        return $nama_promotor;
    }

    public function datatableApi(Datatables $datatable)
    {
        $promotor = DB::table('promotors')
                            ->select('pesertas.id','pesertas.no_peserta', 'pesertas.nama_peserta', 'promotors.nama_promotor')
                            ->join('pesertas', 'promotors.id', 'pesertas.promotor_id');

        return $datatable->of($promotor)
            ->addColumn('action', function($promotor){
                return 
                       '<a href="javascript:void(0)" class="btn btn-danger btndelete deletedata" rel="'. $promotor->id .'"><i class="fas fa-times mr-2"></i>Hapus</a>';
            })
            ->make(true);
    }
}
