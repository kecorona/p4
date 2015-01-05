@extends('layouts.master')

@section('content')
<div class="uk-container-center uk-margin-top uk-margin-large-bottom">
<div class="uk-grid">
    <div class="uk-width-medium-2-3">
    @foreach($posts as $post)
        <article class="uk-article">
            <h1 class="uk-article-title ">
                {{ $post->title }}
            </h1>

            <p class="uk-article-meta">Written by Author on {{ $post->created_at }}</p>
            <div class="uk-article-content uk-text-justify">
            <p>
                <a href="#"><img width="100%" height="100%" src="packages/img/img1.jpeg"></a>
            </p>

            <p>{{ $post->content }}</p>

            <p>
                <a class="uk-button uk-button-primary" href="layouts_post.html">Continue Reading</a>
                <a class="uk-button" href="layouts_post.html">4 Comments</a>
            </p>
            </div>
        </article>
    @endforeach

    </div>

    <div class="uk-width-medium-1-3">
        <!--div class="uk-panel uk-text-center">
            <img class="uk-border-square" width="120" height="120" src="packages/img/user_large.jpg">
            <h3>Author Name</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut.
            </p>
        </div-->

        <div class="uk-panel uk-panel-first">
            <h3 class="uk-panel-title">Categories</h3>
            <ul class="uk-list">
                <li><a href="#">Projects</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Events</a></li>
            </ul>
        </div>

        <div class="uk-panel">
            <h3 class="uk-panel-title">Archives</h3>
            <ul class="uk-list">
                <li><a href="#">2014</a></li>
                <li><a href="#">2013</a></li>
                <li><a href="#">2012</a></li>
            </ul>
        </div>
        
    </div>

</div>
</div>

@stop