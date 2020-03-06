@extends('layouts.app')

@section('content')

    <div id="primary" class="content-area">
        <main id="content" class="site-main" role="main">
            <nav class="woocommerce-breadcrumb">
                <span><a href="{{ route('welcome') }}">Home</a></span> /
                <span>Blog</span></nav>
            <div class="blog-container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="blog-posts blog-list1">

                            @foreach($posts as $post)
                                <article class="post post-large">
                                    @if(optional($post->getImage())->largeUrl)
                                        <div class="post-image">
                                            <div class="img-thumbnail">
                                                <img class="img-responsive"
                                                     src="{{ optional($post->getImage())->largeUrl }}" alt="">
                                            </div>
                                        </div>
                                    @endif

                                    <div class="post-date">
                                        <span class="day">{{ Carbon\Carbon::parse($post->created_at)->format('d') }}</span>
                                        <span class="month">{{ Carbon\Carbon::parse($post->created_at)->format('M') }}</span>
                                    </div>

                                    <div class="post-content">

                                        <h2>
                                            <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                                        </h2>
                                        <p>{{ excerpt($post->content, 16) }}</p>

                                        <a href="{{ route('post.show', $post->slug) }}" class="btn btn-xs btn-link read_more">Read
                                            more <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>

                                        <div class="post-meta">
                                    <span>
                                        <i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($post->created_at)->format('M j, Y g:i a') }}
                                    </span>
                                            <span>
                                        <i class="fa fa-user"></i> By
                                        <a href="javascript:void(0);">{{ $post->user->full_name }}</a>
                                    </span>
                                            @if(isset($post->tags))
                                            <span>

                                        <i class="fa fa-tag"></i>
                                                {{$post->tags}}
                                    </span>
                                                @endif
                                        </div>

                                    </div>
                                </article>
                            @endforeach
                        </div>

                        <div class="toolbar">
                            <div class="sorter">

                                {{ $posts->links() }}

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>
    @include('partials.sidebar-latest')

@endsection