@extends('layouts.master-simple')

@section('content')
<div class="register">
    <div class="register__flex-container--small">
        <div class="box">
            <h1 class="box__title">Log In</h1>
            <div class="box__content">
                <form method="POST" class="form" action="{{ route('login') }}">
                    @csrf
                    <div class="form__group">
                        <label for="email" class="form__label">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form__input{{ $errors->has('email') ? ' form__input--has-errors' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="form__errors">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form__group">
                        <label for="password" class="form__label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form__input{{ $errors->has('password') ? ' form__input--has-errors' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="form__errors">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form__group form__group--checkbox">
                        <label for="remember" class="form__label">{{ __('Remember Me') }}</label>
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="form__checkbox"> 
                    </div>

                    <div class="form__group form__submit">
                        <button type="submit" class="button button--solid-primary">
                            {{ __('Login') }}
                        </button>

                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
