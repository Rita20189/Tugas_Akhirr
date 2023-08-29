@extends('backend.layouts.index')
@section('container')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Hallo, {{Auth::user()->nama}}</h3>
            <h6 class="font-weight-normal mb-0">Selamat Datang Di Dashboard admin !</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 mb-4 stretch-card transparent">
        <div class="card card-tale">
          <div class="card-body">
            <p class="mb-4">Today’s Bookings</p>
            <p class="fs-30 mb-2">4006</p>
            <p>10.00% (30 days)</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4 stretch-card transparent">
        <div class="card card-dark-blue">
          <div class="card-body">
            <p class="mb-4">Total Bookings</p>
            <p class="fs-30 mb-2">61344</p>
            <p>22.00% (30 days)</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4 stretch-card transparent">
        <div class="card card-dark-blue">
          <div class="card-body">
            <p class="mb-4">Total Bookings</p>
            <p class="fs-30 mb-2">61344</p>
            <p>22.00% (30 days)</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4 stretch-card transparent">
        <div class="card card-dark-blue">
          <div class="card-body">
            <p class="mb-4">Total Bookings</p>
            <p class="fs-30 mb-2">61344</p>
            <p>22.00% (30 days)</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection