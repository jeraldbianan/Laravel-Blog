@extends('layouts.custom-login')

@section('content')
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header">
            <h3 class="text-center font-weight-light my-4">Password Reset</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('custom.password.reset') }}">
                @csrf
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputEmail" type="text" value="" readonly />
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
                    <input name="confirm-password"
                        class="form-control @error('confirm-password')
                        is-invalid
                    @enderror"
                        id="confirm-password" type="password" placeholder="Confirm password" />
                    <label for="confirm-password">Confirm password</label>
                    @error('confirm-password')
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

                <div class="d-flex align-items-center justify-content-end mt-4 mb-0">
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
@endsection
