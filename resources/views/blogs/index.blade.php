@php
    $title = 'Жаңалықтар';
@endphp
@section('title', $title)
@section('keywords', 'Жаңалықтар')
@section('description', 'Жаңалықтар')
<x-app-layout>
    <!-- Start Page Banner -->
    <div class="page-banner-area">
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

    <!-- Start Blog Area -->
    <section class="blog-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog-item">
                            <div class="blog-image">
                                <a href="{{ route('blog.show', ['slug' => $blog->slug]) }}">
                                    <img src="{{ $blog->image_path }}" alt="image">
                                </a>
                            </div>

                            <div class="blog-content">
                                <ul class="post-meta">
                                    <li>
                                        {{ date_format($blog->created_at, 'd.m.Y') }}
                                    </li>
                                </ul>
                                <h3>
                                    <a href="{{ route('blog.show', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a>
                                </h3>
                                <div class="blog-btn">
                                    <a href="{{ route('blog.show', ['slug' => $blog->slug]) }}" class="default-btn">Толығырақ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Blog Area -->

</x-app-layout>
