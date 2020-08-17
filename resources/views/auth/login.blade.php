@extends('layouts.app')
@section('css')
    <style>
        .form-elegant .font-small {
        font-size: 0.8rem; }

        .form-elegant .z-depth-1a {
        -webkit-box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25);
        box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25); }

        .form-elegant .z-depth-1-half,
        .form-elegant .btn:hover {
        -webkit-box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15);
        box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15); }
    </style>
@endsection
@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="container">
    <div class="row justify-content-center">

        <section class="form-elegant">
            <!--Form without header-->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="card">

                    <div class="card-body">

                        <!--Header-->
                        <div class="text-center">
                            <h3 class="dark-grey-text mb-5"><strong>Ingreso a {{ setting('site.title')  }}</strong></h3>
                        </div>
                        
                        <!--Body-->
                        <div class="md-form">
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="" autofocus>
                            <label for="Form-email1">Correo Electronico</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="md-form">
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" placeholder="">
                            <label for="Form-pass1">Password</label>
                            <p class="font-small blue-text d-flex justify-content-end"><a href="{{ route('password.request') }}" class="blue-text ml-1">Olvidaste tu Contraseña</a></p>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn blue-gradient btn-block btn-rounded z-depth-1a">Ingresar</button>

                             <a href="/" class="btn btn-block btn-white btn-rounded z-depth-1a">Volver al Home</a> 
                        </div>

                    </form>
                    <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"> o ingresar con:
                    </p>

                    <div class="row d-flex justify-content-center">
                        <!--Facebook-->
                       {{--<a href="{{ route('socialLogin', 'facebook') }}" type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i
                            class="fab fa-facebook-f blue-text text-center"></i>
                        </a> --}}
                        <a  href="{{ route('socialLogin', 'facebook') }}" type="button" class="btn  blue-gradient btn-rounded  btn-fb"><i class="fab fa-facebook-f pr-1"></i> Facebook</a>
                        <a href="{{ route('socialLogin', 'google') }}" type="button" class="btn btn-rounded btn-gplus"><i class="fab fa-google-plus-g pr-1"></i> Google   </a>
                        <!--Google +-->
                        {{-- <a href="{{ route('socialLogin', 'google') }}" type="button" class="btn btn-white btn-rounded z-depth-1a"><i
                            class="fab fa-google-plus-g blue-text">
                        </i></a> --}}
                    </div>

                    <!--Footer-->
                    <div class="modal-footer">
                    <p class="font-small grey-text d-flex justify-content-end">No tienes cuenta<a href="/register"
                        class="blue-text"> Registrarme</a></p>
                    </div>

                </div>
                <!--/Form without header-->
            </form>
        </section>
    </div>
</div>
@endsection
