@isset($message)
    @if($message != "")
        @if($type == 'error')
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i>{{ __("Alert!") }}</h5>
            @if(is_array($message))
                 {{ implode('',$message) }}
            @else
                {{ $message }}
            @endif
        </div>
        @else
        @if($type == 'success')
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i>{{ __("Alert!") }}</h5>
            {{ $message }}
        </div>
        @endif
        @endif
    @endif
@endisset
@isset($message)
    @if($message != "")
        @if($type == 'alert' && $message->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i>{{ __("Alert!") }}</h5>
           
                {{ implode('', $message->all(':message')) }}
          
        </div>
        @endif
    @endif
@endisset