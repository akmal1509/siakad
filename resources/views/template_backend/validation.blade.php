@if ($msg = Session::get('error'))
    <div class="alert alert-danger alert-icon alert-dismissible">
        <em class="icon ni ni-cross-circle"></em>{{ $msg }} <button class="close" data-dismiss="alert"></button>
    </div>
@endif

@if ($msg = Session::get('success'))
    <div class="alert alert-success alert-icon">
        <em class="icon ni ni-check-circle"></em> {{ $msg }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger rounded alert-dismissible">
        <h4 class="text-lg"><i class="icon fas fa-exclamation-triangle"></i> Failed!</h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
