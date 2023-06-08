@extends('layouts.mobile')

@section('content')
<div data-role="page" id="main" data-theme="a">
    <div data-role="header">
        <h2>Digital Course Materials</h2>
    </div>
    <div data-role="content">
        <center><img src="/uploads/slc-logo.png" alt="" width="100px">
        <h2 style="color:blue; font-family: 'Old English Text MT';">Saint Louis College</h2>
        <p style="color:blue; font-family: Verdana;">Beacon of Wisdom in the North</p>
        <a href="#popupVideo" data-rel="popup" data-position-to="window" class="ui-btn ui-corner-all ui-shadow ui-btn-inline">Launch video player</a>
    </div>
    <div data-role="footer" data-position="fixed">
        <div data-role="navbar">
            <ul>
                <li><a href="{{ route('login') }}" data-icon="home" data-transition="pop">Login</a></li>
                <li><a href="#" data-icon="refresh" data-transition="slide" onClick="window.location.reload();">Refresh</a></li>
            </ul>
        </div>
    </div>
    <div data-role="popup" id="popupVideo" data-overlay-theme="b" data-theme="a" data-tolerance="15,15" class="ui-content">
        <iframe width="420" height="345" src="https://www.youtube.com/embed/aqz-KE-bpKQ">
</iframe>
            </center>
        </div>
</div>
@endsection