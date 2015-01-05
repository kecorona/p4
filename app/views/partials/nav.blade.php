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
                    <li>Welcome back</li>
                                
                    <li><a href="pages.logout">Log Out {{ Auth::user()->email }}</a></li>
                    <li><a href='admin.index'>Dashboard</a></li>
                    <ul>
                        <li><a href='admin.blog.index'>Blog</a></li>
                        <ul>
                            <li><a href='admin.blog.create'>Create Post</a></li>
                        </ul>
                        <li><a href='admin.projects.index'>Projects</a></li>
                    </ul>

                @else
                <form class="uk-form">
                     
                    {{ Form::open(['url' => 'login', 'method' => 'GET']) }}
                    <div class="uk-form-row">

                        {{ Form::email('email', Input::old('email'), ['placeholder' => 'Email Address']) }}
                        {{ Form::password('password', ['placeholder' => 'Password']) }}
                        {{ Form::submit('Login', ['class' => 'uk-button uk-button-primary']) }}
                        {{ HTML::link('users.register', 'Register', ['class' => 'uk-button uk-button-primary']) }}
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