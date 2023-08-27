@extends('backend.layouts.index')
@section('container')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row mt-5">
                    <div class="col-6  mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Detail Pesanan</h3>
                        <h6 class="font-weight-normal mb-0">Data Detail Pesanan</h6>
                    </div>
                    
                    <div class="col-6 d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="/data-pesanan">
                        <button type="button" class="btn btn-inverse-info btn-rounded btn-sm"><i class="ti-arrow-left mr-"></i>Back</button>
                    </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card rounded-0">
            <div class="card-body w-100">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <table class="table table-striped text-center border">
                    <thead class="text-white bg-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Menu</th>
                            <th>Jumlah</th>
                            <th>Jumlah Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($itemPesanans as $pesanan )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pesanan->menu->nama_menu}}</td>
                            <td>{{ $pesanan->total_pesanan}}</td>
                            <td>Rp{{ number_format($pesanan->total_harga, 0, ',', '.') }},00</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">--Data tidak ada--</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection