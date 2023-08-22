@extends('backend.layouts.index')
@section('container')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h3><i class="mdi mdi-library-plus"></i> Edit Data Pesanan</h3>
                            <a href="/data-pesanan">
                                <button type="button" class="btn btn-inverse-info btn-rounded btn-sm"><i class="ti-arrow-left mr-1"></i>Back</button>
                            </a>
                        </div>
                        <hr>
                        <form class="forms-sample" action="/data-pesanan/{{$pesanan->id}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nomor Meja</label>
                                <select class="form-control" aria-label="Default select example" name="nomor_meja">
                                    <option>Pilih Nomor Meja</option>
                                    @foreach($mejas as $meja)
                                    <option value="{{$meja->id}}" {{(old('nomor_meja', $pesanan->meja_id) == $meja->id) ? 'selected' : ''}}>{{$meja->nomor_meja}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama</label>
                                <input type="text" autofocus required class="form-control" name="nama" value="{{$pesanan->nama}}" placeholder="Masukan Nama">
                            </div>
                            <button type="submit" class="btn btn-primary mt-1 mr-2"><i class="mdi mdi-content-save-all"></i> Update Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection