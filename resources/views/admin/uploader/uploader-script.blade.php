@section('css')
<link rel="stylesheet" href="{{ asset('theme/admin/plugins/uppy/uppy.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/ds-app.css') }}">
@endsection
@section('script')
<script>
    var DSJ = DSJ || {};
</script>
<script src="{{ asset('theme/admin/plugins/uppy/uppy.min.js') }}" ></script>
<script src="{{ asset('js/ds-app.js') }}" ></script>
@endsection