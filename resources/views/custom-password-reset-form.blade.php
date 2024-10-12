@extends('layouts.custom-login')

@section('content')
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header">
            <h3 class="text-center font-weight-light my-4">Reset Password</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('custom.password.reset') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-floating mb-3">
                    <input name="email" class="form-control" id="inputEmail" type="text"
                        value="{{ $email ?? old('email') }}" readonly />
                    <label for="inputEmail">Email address</label>
                </div>

                <div class="form-floating mb-3">
                    <input name="password"
                        class="form-control @error('password')
                        is-invalid
                    @enderror"
                        id="password" type="password" placeholder="Password" />
                    <label for="password">Password</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input name="password_confirmation"
                        class="form-control @error('password_confirmation')
                        is-invalid
                    @enderror"
                        id="password_confirmation" type="password" placeholder="Confirm password" />
                    <label for="password_confirmation">Confirm password</label>
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <div
                    class="d-flex align-items-center mt-4 mb-0
                @if (session('error')) justify-content-between
                @else
                justify-content-end @endif">
                    @if (session('error'))
                        <a class="small" href="{{ route('custom.login') }}">Return to login</a>
                    @endif
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
@endsection
