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
                    @if(Auth::user()->role === 'admin')
                    <div class="col-6 d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="/data-pesanan/create">
                            <button type="button" class="btn btn-inverse-info btn-rounded btn-sm"> Tambah Data</button>
                        </a>
                    </div>
                    @endif
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
                <div class="table-container" style="overflow-x: auto;">
                    @if(Auth::user()->role === 'admin')
                    <table class="table table-striped text-center border">
                        <thead class="text-white bg-dark">
                            <tr>
                                <th>No</th>
                                <th>Nomor Meja</th>
                                <th>Nama</th>
                                <th>Total Pesanan</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pesanans as $pesanan )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>Meja {{ $pesanan->meja->nomor_meja }}</td>
                                <td>{{ $pesanan->nama_pelanggan }}</td>
                                <td>{{ $pesanan->total_pesanan }} item</td>
                                <td>{{ 'Rp ' . number_format($pesanan->total_harga, 0, ',', '.') }},-</td>
                                <td>
                                    <!-- edit -->
                                    <a href="data-pesanan/{{$pesanan->id}}/edit" class="btn btn-sm btn-primary rounded"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <!-- detail -->
                                    <a href="data-pesanan/{{$pesanan->id}}" class="btn btn-sm btn-primary rounded"><i class="fa-solid fa-eye"></i></a>
                                    <!-- delete -->
                                    <form action="data-pesanan/{{$pesanan->id}}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa-solid fa-trash-can"></i></button>
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
                    @endif
                    @if(Auth::user()->role === 'outlet')
                    <table class="table table-striped text-center bg-white border">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Meja</th>
                                <th>Nama</th>
                                <th>Nama Menu</th>
                                <th>Jumlah Pesanan</th>
                                <th>Jumlah Harga</th>
                                <th>status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($itemPesanans as $itemPesanan )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $itemPesanan->pesanan->meja->nomor_meja }}</td>
                                <td>{{ $itemPesanan->pesanan->nama_pelanggan }}</td>
                                <td>{{ $itemPesanan->menu->nama_menu }}</td>
                                <td>{{ $itemPesanan->total_pesanan}}</td>
                                <td>Rp {{ number_format($itemPesanan->total_harga, 0,',','.')}},-</td>
                                <td>
                                    @if($itemPesanan->status === 0)
                                    <div class="badge badge-danger rounded">Dipesan</div>
                                    @elseif($itemPesanan->status === 1)
                                    <div class="badge badge-warning rounded">Diproses</div>
                                    @elseif($itemPesanan->status === 2)
                                    <div class="badge badge-success rounded fw-bold">Selesai</div>
                                    @endif
                                </td>
                                <td>
                                    <a href="item-pesanan/{{$itemPesanan->id}}/edit" class="btn btn-sm btn-primary rounded"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="item-pesanan/{{$itemPesanan->id}}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">--Data tidak ada--</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endsection