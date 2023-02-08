@if(!Session::has('userid'))
    <script>
        window.location.href = '/';
    </script>
@endif