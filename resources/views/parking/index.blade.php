@extends('z_template.master')
@section('title', 'Data Parkir')
@section('content')
@include('z_template.auth')

@if(\Session::has('error'))
    <script>
        console.log("Tidak");
    </script>
@endif

<form action="/data-search" method="get">
    <div class="row border m-5">
        <h3 class="mt-3">Filter Tanggal</h3>
        <div class="col mt-3 mb-3">
            <label class="control-label">Start Date</label>
            <input type="date" class="form-control rounded shadow" name="start" id="start" required="required">
        </div>
        <div class="col mt-3 mb-3">
            <label class="control-label">Start Date</label>
            <input type="date" class="form-control rounded shadow" name="end" id="end" required="required">
        </div>
        <div class="col mt-3 mb-3">
            <br>
            <button type="submit" class="btn btn-sm btn-info shadow rounded"><i class="bi bi-search"></i> Search</button>
        </div>
    </div>
</form>

@if(isset($data))
    <div class="row m-5">
        <center><h3>Data Parkir</h3></center>
        <div class="col">
            <table class="table table-striped shadow rounded" id="datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Parkir</th>
                        <th>Nomor Kendaraan</th>
                        <th>Waktu Masuk</th>
                        <th>Waktu Keluar</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $d->parkingno }}</td>
                        <td>{{ $d->vehicleregistration }}</td>
                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $d->entrance)->format('d-M-Y H:i:s') }}</td>
                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $d->exit)->format('d-M-Y H:i:s') }}</td>
                        <td>{{ 'Rp. ' . number_format($d->total, 0, '', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $('#datatable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf'
            ]
        } );

    </script>

@endif

@endsection
