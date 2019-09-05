@foreach (['danger', 'warning', 'success', 'info'] as $msg)
  @if(session()->has($msg))
              <div class="alert alert-{{ $msg }} alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-info"></i> Alert!</h4>
		{{ session()->get($msg) }}
              </div>
  @endif
@endforeach
