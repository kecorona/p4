@section('nav')
<!-- Navigation -->

<div class = "uk-container uk-container-nav">
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-1-4 uk-width-small-1-1">
        <a><img class="nav-brand" src="packages/img/wla_logo.png" width="125px" height="auto"   /></a>
        <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" style="" data-uk-offcanvas=""></a>      
    </div>
    <div class="uk-width-medium-3-4 kc-margin">
        <nav class="uk-hidden-small">
            <ul class="uk-nav">
                @if(Auth::check())
                    <li {{ (Request::is('/') ? ' class="uk-active"' : '') }}><a href="{{{ URL::route('logout') }}}">Logout</a></li>
                @else
                <form class="uk-form">
                     
                    {{ Form::open(['url' => 'login', 'action' => 'AuthController@getLogin' ]) }}
                    <div class="uk-form-row">

                        {{ Form::email('email', Input::old('email'), ['placeholder' => 'Email Address']) }}
                        {{ Form::password('password', ['placeholder' => 'Password']) }}
                        {{ Form::submit('Login', ['class' => 'uk-button uk-button-primary']) }}

                        {{ HTML::link('register', 'Register', ['class' => 'uk-button uk-button-primary']) }}

                        <li {{ (Request::is('users.login') ? ' class="uk-active"' : '') }}><a href="{{ URL::to('login') }}">Login</a></li>
                        <li {{ (Request::is('users.register') ? ' class="uk-active"' : '') }}><a href="{{{ URL::to('register') }}}">Register</a></li>
                    {{ Form::close() }}

                    
                    </div>
                    

                    </form>                    
                    @endif
            </ul>
        </nav>
        
    </div>

</div>
</div>


@show