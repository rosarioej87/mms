@extends('layouts.mobile')

@section('content')

<div data-role="page" id="home" data-theme="a">
	<div data-role="header">
		<h2>{{ __('Dashboard') }}</h2>
	</div>
	<div data-role="content">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    {{ __('You are logged in!') }}
	</div>
	<div data-role="footer" data-position="fixed">
		<div data-role="navbar">
			<ul>
				<li><a href="{{ url('/') }}" data-icon="home" data-transition="flip">Home</a></li>
				<li>
                    <a href="{{ route('logout') }}" data-icon="arrow-l" data-transition="flip" 
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
			</ul>
		</div>
	</div>
</div>
@endsection
