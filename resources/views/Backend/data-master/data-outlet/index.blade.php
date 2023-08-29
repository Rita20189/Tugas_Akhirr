@extends('backend.layouts.index')
@section('container')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row mt-5">
                    <div class="col-6  mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Data Master</h3>
                        <h6 class="font-weight-normal mb-0">Data Outlet</h6>
                    </div>
                    <div class="col-6 d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="/data-outlet/create">
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
                            <th>Nama Outlet</th>
                            <th>Pemilik Outlet</th>
                            <th>Status</th>
                            <th>Jam Buka</th>
                            <th>Jam Tutup</th>
                            <th>Logo</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($outlets as $outlet)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$outlet->user->nama}}</td>
                            <td>{{$outlet->pemilik_outlet}}</td>
                            <td>
                                @if($outlet->status === 0)
                                <div class="badge badge-danger">TUTUP</div>
                                @elseif($outlet->status === 1)
                                <div class="badge badge-success">BUKA</div>
                                @else
                                <p>Data Tidak Ada</p>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($outlet->jam_buka)->format('H:i') }} WIB</td>
                            <td>{{ \Carbon\Carbon::parse($outlet->jam_tutup)->format('H:i') }} WIB</td>
                            <td>
                                <img src="{{ asset('images/'.$outlet->logo) }}" alt="">
                            </td>
                            <td>
                                <!-- edit -->
                                <a href="data-outlet/{{$outlet->id}}/edit" class="btn btn-sm btn-primary rounded"><i class="fa-solid fa-pen-to-square"></i></a>
                                <!-- delete -->
                                <form action="data-outlet/{{$outlet->id}}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <td colspan="8">-- Data tidak ada --</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection