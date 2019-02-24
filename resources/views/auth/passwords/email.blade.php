@extends('layouts.master-simple')

@section('content')
<div class="register">
    <div class="register__flex-container--small">
        <div class="box">
            <h1 class="box__title">Letters? Numbers? Symbols?<br>Let's just start again.</h1>
            <div class="box__content">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    
                    <div class="form__group">
                        <label for="email" class="form__label">{{ __('E-Mail Address') }}</label>

                        <input id="email" type="email" class="form__input{{ $errors->has('email') ? ' form__input--has-errors' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="form__error">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form__group form__submit">
                        <button type="submit" class="button button--block button--solid-primary">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
