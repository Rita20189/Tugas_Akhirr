@extends('backend.layouts.index')
@section('container')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <h3><i class="mdi mdi-library-plus"></i> Edit Data Menu</h3>
              <a href="/data-menu">
                <button type="button" class="btn btn-inverse-info btn-rounded btn-sm"><i class="ti-arrow-left mr-1"></i>Back</button>
              </a>
            </div>
            <hr>
            <form class="forms-sample" action="/data-menu/{{$menu->id}}" method="POST" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <div class="form-group">
                <label for="exampleInputUsername1">Nama Menu</label>
                <input type="text" autofocus required class="form-control" name="nama_menu" value="{{$menu->nama_menu}}" placeholder="Masukan Nama Menu">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Kategori</label>
                <select class="form-control" aria-label="Default select example" name="kategori">
                  <option>Pilih Kategori</option>
                  @foreach($kategoris as $kategori)
                  <option value="{{$kategori->id}}" {{(old('kategori', $menu->kategori_id) == $kategori->id) ? 'selected' : ''}}>{{$kategori->nama_kategori}}</option>
                  @endforeach
                </select>
              </div>
              @if(Auth::user()->role === 'admin')
              <div class="form-group">
                <label for="exampleInputUsername1">Outlet</label>
                <select class="form-control" aria-label="Default select example" name="outlet">
                  <option>Pilih Outlet</option>
                  @foreach($outlets as $outlet)
                  <option value="{{$outlet->id}}" {{(old('outlet', $menu->outlet_id) == $outlet->id) ? 'selected' : ''}}>{{$outlet->user->nama}}</option>
                  @endforeach
                </select>
              </div>
              @elseif(Auth::user()->role === 'outlet')
              <div class="form-group">
                <input type="hidden" name="outlet" value="{{Auth::user()->id}}">
              </div>
              @endif
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Harga</label>
                <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{old('harga', $menu->harga)}}">
                @error('harga')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Status</label>
                <select class="form-control" aria-label="Default select example" name="status">
                  <option>Pilih Status</option>
                  <option value="1" <?php if ($menu->status == 1) echo "selected"; ?>>Tersedia</option>
                  <option value="0" <?php if ($menu->status == 0) echo "selected"; ?>>Tidak Tersedia</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Gambar Menu</label>
                <input class="form-control" name="gambar_menu" type="file" id="formFileMultiple" placeholder="Masukan Gambar Menu ">
              </div>
              <button type="submit" class="btn btn-primary mt-1 mr-2"><i class="mdi mdi-content-save-all"></i> Update Data</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection