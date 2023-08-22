@extends('backend.layouts.index')
@section('container')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h3><i class="mdi mdi-library-plus"></i>Tambah Data Item Pesanan</h3>
                            <a href="/item-pesanan">
                                <button type="button" class="btn btn-inverse-info btn-rounded btn-sm"><i class="ti-arrow-left mr-1"></i>Back</button>
                            </a>
                        </div>
                        <hr>
                        <form class="forms-sample" action="/item-pesanan" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama</label>
                                <input type="text" autofocus required class="form-control" name="nama" placeholder="Masukan Nama Item Pesanan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama Menu </label>
                                <input type="text" autofocus required class="form-control" name="nama_menu" placeholder="Masukan Nama Menu Pesanan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Jumlah Item</label>
                                <input type="number" autofocus required class="form-control" name="jumlah_item" placeholder="Masukan Jumlah Item Pesanan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Jumlah Harga</label>
                                <input type="number" autofocus required class="form-control" name="jumlah_harga" placeholder="Masukan Jumlah Harga Item Pesanan">
                            </div>
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menyimpan data ini?')" class="btn btn-primary mt-1 mr-2"><i class="mdi mdi-content-save-all"></i>Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection