@section('header')
<!-- Navigation -->
@if(Session::has('navError'))
    <div class="center-fix" id="info-bar">
        <div class="center-content">
        {{ Session::get('topError') }}
        </div>
    </div>
@endif


<div class="uk-grid nav-container" data-uk-grid-margin>
    <div class="uk-width-medium-1-3 uk-width-small-1-1 uk-container-center">
        <a><img class="nav-brand" src="packages/img/wla_logo_full.png" width="140px" height="auto"   /></a>
        <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" style="" data-uk-offcanvas=""></a>      
    </div>
    @if(!Sentry::check())
    <div class="uk-width-medium-2-3 kc-margin" id="login">
        <nav class="uk-hidden-small">
            <ul class="uk-nav">
            {{ Form::open(['route' => 'postLogin']) }}
            {{ Form::email('email', Input::old('email'), ['placeholder' => 'Email Address']) }}
            {{ Form::password('password', ['placeholder' => 'Password']) }}
            {{ Form::submit('Login') }}
            {{ Form::close() }}

            {{ HTML::link('signup_form', 'Register', [], ['class' => 'button']) }}
            </ul>
        </nav>
    </div>

    @else
    <div class="uk-width-medium-2-3 kc-margin" id="login">
        <nav class="uk-hidden-small">
            <ul class="uk-nav" id="user_block">
                <li>Welcome back</li>
                {{ HTML::link('#', Sentry::getUser()->last_name) }}
            </ul>
            <ul class="uk-nav" id="logout">
                {{ HTML::linkRoute('logout', 'Logout', ['class' => 'button'])}}
            </ul>
        </nav>
    </div>

   </div>
</div>

@show