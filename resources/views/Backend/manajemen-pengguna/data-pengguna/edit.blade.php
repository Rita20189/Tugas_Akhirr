@extends('backend.layouts.index')
@section('container')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h3><i class="mdi mdi-library-plus"></i> Edit Data Pengguna</h3>
                            <a href="/data-pengguna">
                                <button type="button" class="btn btn-inverse-info btn-rounded btn-sm"><i class="ti-arrow-left mr-1"></i>Back</button>
                            </a>
                        </div>
                        <hr>
                        <form class="forms-sample" action="/data-pengguna/{{$pengguna->id}}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama</label>
                                <input type="text" autofocus required class="form-control" name="nama" value="{{$pengguna->nama}}" placeholder="Masukan Nama Pengguna">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Email</label>
                                <input type="text" required class="form-control" name="email" value="{{$pengguna->email}}" placeholder="Masukan Email Pengguna">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Role</label>
                                <select class="form-control" aria-label="Default select example" name="role">
                                    <option>Pilih Role</option>
                                    <option value="super_admin">Super Admin</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Password</label>
                                <input type="password" required class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" placeholder="Masukan Password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-1 mr-2"><i class="mdi mdi-content-save-all"></i> Update Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection