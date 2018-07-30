@extends('layouts.app')
<div id="cover"></div>
@include('layouts.navbar')
@include('form')

@section('home-content')

    @include('layouts.loaderfordelete')
    <div class="container container-style">

        <div class="datadata" id="datadata">
            <a href="javascript:void(0)" class="btn btn-info" id="tambah"  data-toggle="modal" data-target="#tambahModal"><i class="fas fa-pencil-alt mr-2"></i>Tambah</a>
            <a href="javascript:void(0)" class="btn btn-primary" id="graphs"><i class="fas fa-chart-area mr-2"></i>Graphs</a>
        </div>
        
        <hr>
        
        <div class="table-responsive-sm">
            <table id="minda-table" class="table">
                <thead class="thead-light">
                    <tr>
                        <th>No. Peserta</th>
                        <th>Nama Peserta</th>
                        <th>Nama Promotor</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

    </div> {{-- end of container --}}
@endsection {{-- end of section home content --}}