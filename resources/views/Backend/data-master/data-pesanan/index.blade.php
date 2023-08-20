@extends('backend.layouts.index')
@section('container')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row mt-5">
                    <div class="col-6  mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Data Master</h3>
                        <h6 class="font-weight-normal mb-0">Data Pesanan</h6>
                    </div>
                    <div class="col-6 d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="/data-pesanan/create">
                            <button type="button" class="btn btn-inverse-info btn-rounded btn-sm"> Tambah Data</button>
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
                            <th>Nama Meja</th>
                            <th>Nama</th>
                            <th>Total Pesanan</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($menus as $menu)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $m->nama_menu }}</td>
                            <td>{{ $menu->kategori->nama_kategori }}</td>
                            <td>Rp {{ number_format($menu->harga, 0, ',', '.')}}</td>
                            <td>
                                @if($menu->status === 1)
                                <div class="badge badge-success">Tersedia</div>
                                @elseif($menu->status === 0)
                                <div class="badge badge-danger">Tidak Tersedia</div>
                                @else
                                <p>Data Tidak Ada</p>
                                @endif
                            </td>
                            <td>
                                <img src="{{ asset('images/'.$menu->gambar_menu) }}" alt="">
                            </td>
                            <td>
                                <a href="data-menu/{{$menu->id}}/edit" class="btn btn-sm btn-primary rounded">Edit</a>
                                <form action="data-menu/{{$menu->id}}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">-- Data tidak ada --</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    @endsection