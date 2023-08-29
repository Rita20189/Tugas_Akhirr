@extends('backend.layouts.index')
@section('container')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h3><i class="mdi mdi-library-plus"></i>Ubah Status</h3>
                            <a href="/item-pesanan">
                                <button type="button" class="btn btn-inverse-info btn-rounded btn-sm"><i class="ti-arrow-left mr-1"></i>Back</button>
                            </a>
                        </div>
                        <hr>
                        <form class="forms-sample" action="{{url('/item-pesanan')}}/{{$itemPesanan->id}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Status</label>
                                <select class="form-control" aria-label="Default select example" name="status">
                                    <option value="0">Dipesan</option>
                                    <option value="1">Diproses</option>
                                    <option value="2">Selesai</option>
                                </select>
                            </div>
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menyimpan data ini?')" class="btn btn-primary mt-1 mr-2"><i class="mdi mdi-content-save-all"></i>Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection