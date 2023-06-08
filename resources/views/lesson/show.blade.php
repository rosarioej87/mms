@extends('layouts.mobile')

@section('content')
<div data-role="page" id="page.{{$lesson->id}}" data-theme="a">
    <div data-role="header">
        <h2>{{ $lesson->topic }}</h2>
    </div>
    <div data-role="content">
        <div style="text-align:justify;">
            <img src="/storage/{{ $lesson->image }}" alt="" width="100px">
            {!! $lesson->content !!}
        </div>
        
        
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