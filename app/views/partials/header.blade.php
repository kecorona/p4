<!-- Navigation -->

<div class="uk-grid nav-container"data-uk-grid-margin>
    <div class="uk-width-medium-1-3 uk-width-small-1-1 uk-container-center">
        <a><img class="nav-brand" src="packages/img/wla_logo_full.png" width="140px" height="auto"   /></a>
        <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" style="" data-uk-offcanvas=""></a>      
    </div>

    <div class="uk-width-medium-2-3 kc-margin">
        <nav class="uk-hidden-small">
            <ul class="uk-nav">
            @if(Auth::check())
                <li><a href="{{{ URL::to('index') }}}">Logout</a></li>
            @else
                <li><a href="{{ URL::to('index') }}">Home</a></li>
                <li><a href="{{ URL::to('pages.projects') }}">Projects</a></li>
                <li><a href="{{ URL::to('login') }}">Login</a></li>
                
            @endif
            </ul>
        </nav>
    </div>
    
    
    <div id="offcanvas" class="uk-offcanvas ">
        <div class="uk-offcanvas-bar uk-offcanvas-bar-flip">
            <ul class="uk-nav uk-nav-offcanvas" data-uk-nav>
                <div class="uk-container-center uk-text-center">
                    <h1 class="uk-article-title">WLA</h1>
                </div>
                @if(Auth::check())
                    <li {{ (Request::is('/') ? ' class="uk-active"' : '') }}><a href="{{{ URL::route('users.logout') }}}">Logout</a></li>
                    <li {{ (Request::is('users.profile') ? ' class="uk-active"' : '') }}><a href="{{{ URL::to('users.register') }}}">Profile</a></li>
                @else
                    <li {{ (Request::is('users.login') ? ' class="uk-active"' : '') }}><a href="{{ URL::to('users.login') }}">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>
    


    <!-- /.container -->

<!-- This is the off-canvas sidebar -->

