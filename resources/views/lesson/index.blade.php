@extends('layouts.mobile')

@section('content')
<div data-role="page" id="main" data-theme="a">
    <div data-role="header">
        <h2>Lessons</h2>
    </div>
    <div data-role="content">
        @foreach($lessons as $lesson)
            <ul>
                <li><p>{{$lesson->topic}}</p>
                <img src="/storage/{{ $lesson->image }}" alt="" width="100px">
                <a href="{{ route('lessons.show', $lesson->id) }}">Learn more</a>    
                </li>
            </ul>
        @endforeach
    </div>
    <div data-role="footer" data-position="fixed">
        <div data-role="navbar">
            <ul>
                <li><a href="{{ route('lessons.index') }}" data-icon="home" data-transition="pop">Home</a></li>
                <li><a href="#" data-icon="refresh" data-transition="slide" onClick="window.location.reload();">Refresh</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection