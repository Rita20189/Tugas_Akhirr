@extends('backend.layouts.index')
@section('container')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row mt-5">
                    <div class="col-6  mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Data Master</h3>
                        <h6 class="font-weight-normal mb-0">Data Item Pesanan</h6>
                    </div>
                    <div class="col-6 d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="/item-pesanan/create">
                            <button type="button" class="btn btn-inverse-info btn-rounded btn-sm">Tambah Data</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
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
                <table class="table table-striped text-center bg-white border">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nama Menu</th>
                            <th>Jumlah Item</th>
                            <th>Jumlah Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pesanans as $pesanan )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $itempesanan->pesanan->nama }}</td>
                            <td>{{ $itempesanan->nama_menu }}</td>
                            <td>{{ $itempesanan->jumlah_item}}</td>
                            <td>{{ $itempesanan->jumlah_harga}}</td>
                            <td>
                                <a href="item-pesanan/{{$itempesanan->id}}/edit" class="btn btn-sm btn-primary rounded">Edit</a>
                                <form action="item-pesanan/{{$itempesanan->id}}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
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