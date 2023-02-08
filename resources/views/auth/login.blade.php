@extends('z_template.master')
@section('title', 'Login')
@section('content')

<center>
    <h2>Back End Test</h2>
</center>
<div class="row mt-5">
    <div class="col-md-4"></div>
    <div class="col-md-4 border">
        <form action="/log-in" method="GET">
            <center class="mt-3">
                <h3>Login</h3>
            </center>
            <div class="form-group">
                <label class="control-label">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label class="control-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            @if (\Session::has('error'))
                <p class="text-danger">{{ \Session::get('error') }}</p>
            @endif
            <button class="btn btn-sm btn-primary mt-3 mb-3" style="float: right">Login</button>
        </form>
    </div>
    <div class="col-md-4"></div>
</div>

@endsection
