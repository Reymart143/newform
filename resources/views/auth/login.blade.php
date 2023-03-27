@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('login') }}" class="log-form">
            @csrf
                
                <!--FORM HEADER-->  
                <div class="form-header">
                    <h1><i class="fa-solid fa-circle-user"></i> Login</h1>    
                </div>

                <!--FORM BODY-->  
                <div class="form-body">
                    
                    <!--username-->
                    <div class="form-group-log">
                        <label for="username" class="label-title-log"><i class="fa-solid fa-user-large"></i></label>

                        <div class="col-md-6">
                            <input id="username" type="username" class="form-input-log @error('username') is-invalid @enderror" name="username" 
                            value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!--password-->
                    <div class="form-group-log">
                        <label for="password" class="label-title-log"><i class="fa-solid fa-lock"></i></label>

                        <div>
                            <input id="password" type="password" class="form-input-log @error('password') is-invalid @enderror" name="password" 
                            required autocomplete="current-password" placeholder="Password">
                            <i class="bi bi-eye-slash" id="togglePassword" style="margin-left: -30px; 
                            cursor: pointer;"></i>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>                   
                    <div class="for-pass" style="margin-left:27mm; font-size:12px; font-weight:bold;">
                        @if (Route::has('password.request'))
                        <a class="for-btn" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>
                </div>

                <!--FORM FOOTER-->
                <div class="form-footer">
                    <div class="log-btn mb-3"> 
                        <button type="submit" class="btn-1">
                            {{ __('Login') }}
              
                        </button>
                        
                    </div>
             
                    <div>
                        <p>Not yet Registered? <a href="{{ route('register') }}">Sign Up</a></p>
                      </div>
                </div>     
            </form>
        </div>
    </div>
</div>
{{-- <script>
    Swal.fire({
        title: '<strong>RATE US</u></strong>',
        icon: 'info',
        position: 'top-end',
        html:
          'https://www.obxsolution.com/# ' +
          '<a href="//sweetalert2.github.io">links</a> ' +
          'and other HTML tags',
        showCloseButton: true,
        showCancelButton: true,
        focusConfirm: false,
        confirmButtonText:
          '<i class="fa fa-thumbs-up"></i> Great!',
        confirmButtonAriaLabel: 'Thumbs up, great!',
        cancelButtonText:
          '<i class="fa fa-thumbs-down"></i>',
        cancelButtonAriaLabel: 'Thumbs down'
      })
      </script> --}}

<script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");
    
        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });
    
    </script>
@endsection
