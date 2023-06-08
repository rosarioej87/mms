@extends('layouts.mobile')

@section('content')

<div data-role="page" id="login" data-theme="a">
	<div data-role="header">
		<h2>{{ __('Login') }}</h2>
	</div>
	<div data-role="content">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="email">{{ __('Email Address') }}</label>
                <div>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div>
                <label for="password">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" name="password" required autocomplete="current-password">

                    @error('password')
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div>
                <div>
                    <div>
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div>
                <div>
                    <button type="submit">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a data-role="button" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
	</div>

	<div data-role="footer" data-position="fixed">
		<div data-role="navbar">
			<ul>
				<li><a href="{{ url('/') }}" data-icon="home" data-transition="pop">Home</a></li>
				<li><a href="#register" data-icon="arrow-r" data-transition="slide">register</a></li>
			</ul>
		</div>
	</div>
</div>
@endsection
