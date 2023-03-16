@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form class="res-form" method="POST" action="{{ route('password.email') }}">
            @csrf

                <!--FORM HEADER-->
                <div class="form-header">
                    <h1>Reset Password</h1>
                </div>

                <!--FORM BODY-->
                <div class="form-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="form-group-res">
                            <label for="email" class="label-title-res"><i class="fa-solid fa-user-large"></i></label>

                            <div class="form-group-log">
                                <input id="email" type="email" class="form-input-res @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                placeholder="Username" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                </div>

                <!--FORM FOOTER-->
                <div class="form-footer">
                    <div class="res-btn">
                        <button type="submit" class="btn-2">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
