<div class="btn-group">
    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('Action')}}
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
        @foreach($actions as $key => $action)
            @if(isset($action["post"]))
            <form method="POST" action="{{ $action["link"] }}">
                @csrf
              <li>
                  <button type="submit" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> {{ $action["title"] }}</button>
              </li>
              <li class="divider"></li>
              {{-- @endcan --}}
              </form>
            @else
            <li>
            <a href="{{ $action["link"] }}" class="btn btn-link"><i class="dripicons-document-edit"></i> {{ $action["title"] }}</a>
            </li>
            @endif
        <li class="divider"></li>
        @endforeach
        {{-- @endcan
        @can("Delete") --}}
        
    </ul>
  </div>