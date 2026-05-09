@section('css')
<link rel="stylesheet" href="{{ asset('theme/admin/plugins/uppy/uppy.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/ds-app.css') }}">
@endsection
@section('script')

<script src="{{ asset('theme/admin/plugins/uppy/uppy.min.js') }}" ></script>
<script src="{{ asset('js/ds-app.js') }}" ></script>
<script>
    var DSJ = DSJ || {};
	$(document).ready(function() {
			DSJ.plugins.dsUppy();
		});
</script>
@endsection
<x-admin-layout page-title="{{ __('Upload New File') }}" page-description="">
    <div class="row">
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">{{ __('Drag & drop your files') }}</h3>
				<a href="{{ route('uploaded-files.index') }}" class="btn btn-link btn-primary btn-xs float-right  text-white">
					<i class="las la-angle-left"></i>
					<span>{{ __('Back to uploaded files')}}</span>
				</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			

   
				<div id="dsj-upload-files" class="h-420px" style="min-height: 65vh">
    		
				</div>


</div>
</div>
<!-- /.card -->
</div>
</div>
</x-admin-layout>
