@extends('z_template.master')
@section('title', 'Parkir')
@section('content')

<input type="hidden" id="_token" value="{{ csrf_token() }}">

<div class="row mb-5" id="frontPage">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <center>
            <h3>Parkir</h3>
        </center>
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-info text-white">
                    <div class="card-title">
                        <h3><i class="bi bi-car-front mt-5"></i> Masuk Parking Lot.</h3>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-light shadow rounded" style="float:right" onclick="entry()"><i class="bi bi-arrow-right"></i> Go</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-warning text-white">
                    <div class="card-title">
                        <h3><i class="bi bi-car-front mt-5"></i> Keluar Parking Lot.</h3>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-light shadow rounded" style="float:right" onclick="exit()"><i class="bi bi-arrow-right"></i> Go</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>

<div class="row" id="entry" hidden>
    <div class="col-md-4"></div>
    <div class="col-md-4 border bg-info text-white rounded">
        <center class="mt-3"><h3><i class="bi bi-car-front"></i> Masuk</h3></center>
        <div class="form-group mt-2">
            <label class="label-control">Nomor Registrasi Kendaraan</label>
            <input type="text" class="form-control shadow rounded" id="nopol" name="nopol">
        </div>
        <button class="btn btn-light shadow rounded m-2" onclick="frontPage()"><i class="bi bi-arrow-left"></i> Kembali</button>
        <button class="btn btn-light shadow rounded m-2 btn-entry" style="float: right"><i class="bi bi-arrow-right"></i> Masuk</button>
    </div>
    <div class="col-md-4"></div>
</div>

<div class="row" id="exit" hidden>
    <div class="col-md-4"></div>
    <div class="col-md-4 border bg-warning text-white rounded">
        <center class="mt-3"><h3><i class="bi bi-car-front"></i> Keluar</h3></center>
        <div class="form-group mt-2">
            <label class="label-control">Nomor Parkir</label>
            <input type="text" class="form-control shadow rounded" id="noparkir" name="noparkir">
        </div>
        <button class="btn btn-light shadow rounded m-2" onclick="frontPage()"><i class="bi bi-arrow-left"></i> Kembali</button>
        <button class="btn btn-light shadow rounded m-2 btn-exit" style="float: right"><i class="bi bi-arrow-right"></i> Keluar</button>
    </div>
    <div class="col-md-4"></div>
</div>

<div class="row mt-3" id="result" hidden>
    <div class="col-md-4"></div>
    <div class="col-md-4 border bg-primary text-white rounded result">
    </div>
    <div class="col-md-4"></div>
</div>

@include('z_js.js_parking')

@endsection

