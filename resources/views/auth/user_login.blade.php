@extends('layouts.app')
@section('page', 'Login Siswa')
@section('content')
    <div class="card-body login-card-body">
        <p class="login-box-msg">Masukkan NISN/NIPS Siswa dan Password untuk Login</p>
        <form action="{{ route('login.post') }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input id="nisn" type="nisn" class="form-control @error('nisn') is-invalid @enderror"
                    placeholder="{{ __('NIP/NIS') }}" name="nisn" value="{{ old('nisn') }}" autocomplete="off"
                    autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('nisn')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input id="password" type="password" placeholder="{{ __('Password') }}"
                    class="form-control @error('password') is-invalid @enderror" name="password"
                    autocomplete="current-password" disabled>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row mb-1">
                <div class="col-7">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember" class="form-check-input" type="checkbox" name="remember"
                            {{ old('remember') ? 'checked' : '' }} disabled>
                        <label for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-5">
                    <button type="submit" id="btn-login"class="btn btn-primary btn-block" disabled>{{ __('Login') }}
                        &nbsp; <i class="nav-icon fas fa-sign-in-alt"></i></button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <p class="mb-1">
            @if (Route::has('password.request'))
                <a class="text-center" href="{{ route('password.request') }}">
                    {{ __('Lupa Password?') }}
                </a>
            @endif
        </p>
        <p class="mb-0">
            {{-- <a class="text-center" href="{{ route('register') }}">Buat Akun Baru</a> --}}
        </p>
    </div>
@endsection
@section('script')
    <script>
        $("#nisn").keyup(function() {
            var nisn = $("#nisn").val();

            if (nisn.length >= 5) {
                $.ajax({
                    type: "GET",
                    data: {
                        nisn: nisn
                    },
                    dataType: "JSON",
                    url: "{{ url('/login/cek_nisn/json') }}",
                    success: function(data) {
                        if (data.success) {
                            $("#nisn").removeClass("is-invalid");
                            $("#nisn").addClass("is-valid");
                            $("#password").val('');
                            $("#password").removeAttr("disabled", "disabled");
                        } else {
                            $("#nisn").removeClass("is-valid");
                            $("#nisn").addClass("is-invalid");
                            $("#password").val('');
                            $("#password").attr("disabled", "disabled");
                            $("#remember").attr("disabled", "disabled");
                            $("#btn-login").attr("disabled", "disabled");
                        }
                    },
                    error: function() {}
                });
            } else {
                $("#nisn").removeClass("is-valid");
                $("#nisn").removeClass("is-invalid");
                $("#password").val('');
                $("#password").attr("disabled", "disabled");
                $("#remember").attr("disabled", "disabled");
                $("#btn-login").attr("disabled", "disabled");
            }
        });

        $("#password").keyup(function() {
            var nisn = $("#nisn").val();
            var password = $("#password").val();

            if (password.length >= 8) {
                $.ajax({
                    type: "GET",
                    data: {
                        nisn: nisn,
                        password: password
                    },
                    dataType: "JSON",
                    url: "{{ url('/login/cek_password_nisn/json') }}",
                    success: function(data) {
                        if (data.success) {
                            $("#password").removeClass("is-invalid");
                            $("#password").addClass("is-valid");
                            $("#remember").removeAttr("disabled", "disabled");
                            $("#btn-login").removeAttr("disabled", "disabled");
                        } else {
                            $("#password").removeClass("is-valid");
                            $("#password").addClass("is-invalid");
                            $("#remember").attr("disabled", "disabled");
                            $("#btn-login").attr("disabled", "disabled");
                        }
                    },
                    error: function() {}
                });
            } else {
                $("#password").removeClass("is-valid");
                $("#password").removeClass("is-invalid");
                $("#remember").attr("disabled", "disabled");
                $("#btn-login").attr("disabled", "disabled");
            }
        });
    </script>
@endsection
