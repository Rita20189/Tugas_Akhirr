@extends('backend.layouts.index')
@section('container')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h3><i class="mdi mdi-library-plus"></i>Tambah Data Pesanan</h3>
                            <a href="/data-pesanan">
                                <button type="button" class="btn btn-inverse-info btn-rounded btn-sm"><i class="ti-arrow-left mr-1"></i>Back</button>
                            </a>
                        </div>
                        <hr>
                        <form class="forms-sample" action="/data-pesanan" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nomor Meja</label>
                                <select class="form-control" aria-label="Default select example" name="meja">
                                    <option>Pilih Nomor Meja</option>
                                    @foreach($mejas as $meja)
                                    <option value="{{$meja->id}}">{{$meja->nomor_meja}}</option>
                                    @endforeach
                                </select>
                                @error('nomor_meja')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama</label>
                                <input type="text" autofocus required class="form-control" name="nama" placeholder="Masukan Nama">
                            </div>
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menyimpan data ini?')" class="btn btn-primary mt-1 mr-2"><i class="mdi mdi-content-save-all"></i>Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection