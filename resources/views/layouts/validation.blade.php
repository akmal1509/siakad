@if ($msg = Session::get('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">
            <strong class="font-bold">{{ $msg }}</strong>
        </span>
    </div>
@endif

@if ($msg = Session::get('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">
            <strong class="font-bold">{{ $msg }}</strong>
        </span>
    </div>
@endif

@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <h1 class="font-semibold text-sm">Errors!</h1>
        <ul class="mt-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
