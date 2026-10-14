@php
    $title = str_replace(' <br/>', '. ', $blog->title);
@endphp
@section('title', $title)
@section('keywords', $blog->keywords)
@section('description', $blog->description)
<x-app-layout>
    <!-- Start Page Banner -->
    <div class="page-banner-area item-bg3">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-banner-content">
                        <h2>{{ $title }}</h2>
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">Басты бет</a>
                            </li>
                            <li>{{ $title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Banner -->

    <!-- Start Blog Details Area -->
    <section class="blog-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-details-desc">
                        <div class="article-image">
                            <img src="{{ $blog->image_path }}" alt="image">
                        </div>

                        <div class="article-content">
                            <div class="entry-meta">
                                <ul>
                                    <li>
                                        <span>Жарияланған күні:</span>
                                        <i>{{ date_format($blog->created_at, 'd.m.Y') }}</i>
                                    </li>
                                </ul>
                            </div>
                            <br>
                            <div>
                                {!! $blog->content !!}
                            </div>
                        </div>

                    </div>
                </div>
                @if(count($latestBlog))
                    <div class="col-lg-4 col-md-12">
                        <aside class="widget-area">
                            <section class="widget widget_ketan_posts_thumb">
                                <h3 class="widget-title">Соңғы жаңалықтар</h3>
                                @foreach($latestBlog as $blog)
                                    <article class="item">
                                        <a href="{{ route('blog.show', ['slug' => $blog->slug]) }}" class="thumb">
                                            <span class="fullimage cover bg6" role="img"></span>
                                        </a>
                                        <div class="info">
                                            <span>{{ date_format($blog->created_at, 'd.m.Y') }}</span>
                                            <h4 class="title usmall">
                                                <a href="{{ route('blog.show', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a>
                                            </h4>
                                        </div>
                                    </article>
                                @endforeach

                            </section>
                        </aside>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- End Blog Details Area -->
</x-app-layout>

