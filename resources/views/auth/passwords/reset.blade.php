@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form class="reg-form" method="POST" action="{{ route('password.update') }}">
            @csrf
                <!--FORM HEADER-->
                <div class="form-header">
                    <h1>Reset Password</h1>    
                </div>

                <!--FORM BODY-->
                <div class="form-body">
                    <input type="hidden" class="control-input" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label for="number" class="label-title">Phone Number</label>
                                <div class="col-md-6">
                                    <input id="number" type="number" class="form-input @error('number') is-invalid @enderror" name="number" value="{{ $number ?? old('number') }}" required autocomplete="number" autofocus>
                                        @error('number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="label-title">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="label-title">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-input" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                    </form>
                </div>

                <!--FORM FOOTER-->
                <div class="form-footer">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
