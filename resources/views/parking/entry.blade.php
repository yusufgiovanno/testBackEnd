<h3 class="mt-3">{{ $nopol }}</h3>
<p>No Parkir : {{ $parkir }}</p>
<p>Waktu masuk : {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $waktu)->format('d-M-Y H:i:s') }}</p>
@if(isset($exit))
<p>Waktu keluar : {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $exit)->format('d-M-Y H:i:s') }}</p>
<br>
<p>Total : Rp. {{ number_format($total, 0, '', '.') }}</p>
@endif