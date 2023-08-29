@extends('backend.layouts.index')
@section('container')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h3><i class="mdi mdi-library-plus"></i> Tambah Data Outlet</h3>
                            <a href="/data-menu">
                                <button type="button" class="btn btn-inverse-info btn-rounded btn-sm"><i class="ti-arrow-left mr-1"></i> Back</button>
                            </a>
                        </div>
                        <hr>
                        <form class="forms-sample" action="/data-outlet" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama Outlet</label>
                                <select class="form-control" aria-label="Default select example" name="user">
                                    <option>Pilih Outlet</option>
                                    @foreach($user as $user)
                                    <option value="{{$user->id}}">{{$user->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Pemilik Outlet</label>
                                <input type="text" required class="form-control" name="pemilik_outlet" placeholder="Masukan Pemilik Outlet">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Status</label>
                                <select class="form-control" aria-label="Default select example" name="status">
                                    <option>Pilih Status</option>
                                    <option value="1">Buka</option>
                                    <option value="0">Tutup</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="exampleInputUsername1">Jam Buka</label>
                                <input type="time" required class="form-control" name="jam_buka" placeholder="Masukan Jam Buka">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Jam Tutup</label>
                                <input type="time" required class="form-control" name="jam_tutup" placeholder="Masukan Jam Tutup">
                            </div>
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Logo</label>
                                <input class="form-control" name="logo" type="file" id="formFileMultiple" placeholder="Masukan Logo">
                            </div>
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menyimpan data ini?')" class="btn btn-primary mt-1 mr-2"><i class="mdi mdi-content-save-all"></i> Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection