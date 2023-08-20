@extends('backend.layouts.index')
@section('container')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h3><i class="mdi mdi-library-plus"></i> Edit Data Meja</h3>
                            <a href="/data-meja">
                                <button type="button" class="btn btn-inverse-info btn-rounded btn-sm"><i class="ti-arrow-left mr-1"></i>Back</button>
                            </a>
                        </div>
                        <hr>
                        <form class="forms-sample" action="/data-meja/{{$meja->id}}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nomor Meja</label>
                                <input type="text" autofocus required class="form-control" name="nomor_meja" value="{{$meja->nomor_meja}}" placeholder="Masukan Nomor Meja ">
                            </div>
                            <button type="submit" class="btn btn-primary mt-1 mr-2"><i class="mdi mdi-content-save-all"></i> Update Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection