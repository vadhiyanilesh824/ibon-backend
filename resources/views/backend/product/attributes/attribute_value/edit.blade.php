@include('admin.uploader.uploader-script')

<x-admin-layout page-title="{{ __('Attribute Value') }}" page-description="">
    <div class="row">
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Edit') }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- form start -->
                    <form class="p-4" action="{{ route('attribute_value.update') }}" method="POST"
                        enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        <input type="hidden" name="id" value="{{ Crypt::encryptString($attribute_value->id) }}" />
                        <input type="hidden" name="attribute_id" value="{{ Crypt::encryptString($attribute_value->attribute_id) }}">
                        @csrf
                        <div class="form-group">
                            <label class=" col-from-label" for="Attribute Value">
                                {{ __('Attribute Value') }}
                            </label>
                            <input type="text" placeholder="{{ __('Attribute Value') }}" id="value" name="value"
                                class="form-control" required value="{{ $attribute_value->value }}">
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</x-admin-layout>
