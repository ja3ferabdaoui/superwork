@extends('layouts.app')

@section('content')
    <section id="wrapper">
        <div class="login-register" >
            <div class="login-box card">
                <div class="card-body">
<h1 class="text-center">Se connecter</h1>

                <div class="card-body">
                    <form method="POST" class="form-material" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group ">
                            <div class="col-xs-12">

                                <input id="login"  placeholder="{{ __('E-Mail ou username') }}" type="text"
                                       class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="login" value="{{ old('username') ?: old('email') }}" required autofocus>

                                @if ($errors->has('username') || $errors->has('email'))
                                    <span class="invalid-feedback">
                <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
            </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group ">


                            <div class="col-xs-12">
                                <input id="password" placeholder="{{ __('Password') }}" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox checkbox-primary pull-left p-t-0">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <a class="btn btn-link pull-right" href="{{ route('password.request') }}">
                                    <i class="fa fa-lock m-r-5"></i> {{ __('Forgot Your Password?') }}
                                </a>
                              </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btngrand waves-effect ">
                                    {{ __('Login') }}
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </section>
@endsection
