@extends('backend.layouts.index')
@section('container')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h3><i class="mdi mdi-library-plus"></i> Tambah Data Pegawai</h3>
                            <a href="/data-pegawai">
                                <button type="button" class="btn btn-inverse-info btn-rounded btn-sm"><i class="ti-arrow-left mr-1"></i> Back</button>
                            </a>
                        </div>
                        <hr>
                        <form class="forms-sample" action="/data-pegawai" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama Pegawai</label>
                                <input type="text" autofocus required class="form-control" name="nama_pegawai" placeholder="Masukan Nama Pegawai">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nip</label>
                                <input type="text" autofocus required class="form-control" name="nip" placeholder="Masukan Nip">
                            </div>
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menyimpan data ini?')" class="btn btn-primary mt-1 mr-2"><i class="mdi mdi-content-save-all"></i> Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection