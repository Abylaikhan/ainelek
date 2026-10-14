@php
    $title = 'Басты бет'
@endphp

@section('title', $title)
@section('keywords', $title)
@section('description', $title)
<x-app-layout>
    <!-- Start Main Banner Area -->
    <div class="main-banner">
        @if(count($sliders))
            <div class="home-slides owl-carousel owl-theme">
                @foreach($sliders as $slider)
                    <div class="main-banner-item banner-item-three"
                         @if($slider->image) style="background-image: url('{{ $slider->image_path }}');" @endif>
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="container">
                                    <div class="main-banner-content">
                                        <span></span>
                                        <h1>{{ $slider->title }}</h1>
                                        <p>{{ $slider->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="main-banner-shape">
            <div class="banner-bg-shape">
                <img src="{{ asset('assets/img/main-banner/banner-bg-shape-1.png') }}" class="white-image" alt="image">
            </div>

            <div class="banner-bg-shape-2">
                <img src="{{ asset('assets/img/main-banner/banner-bg-shape-2.png') }}" class="white-image" alt="image">
            </div>

            <div class="banner-child">
                <div class="child-1">
                    <img src="{{ asset('assets/img/main-banner/child-1.png') }}" alt="image">
                </div>

                <div class="child-2">
                    <img src="{{ asset('assets/img/main-banner/child-2.png') }}" alt="image">
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Banner Area -->

    <!-- Start Who We Are Area -->
    <section class="who-we-are ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="who-we-are-content">
                        <span>Біз туралы</span>
                        <h3>Қысқаша ақпарат</h3>
                        <div>
                            {!! $about->content !!}
                        </div>
                        @if(count($services))
                            <ul class="who-we-are-list">
                                @php
                                    $counter = 0;
                                @endphp
                                @foreach($services as $service)
                                    @php
                                        $counter++;
                                    @endphp
                                    <li>
                                        <span>{{ $counter }}</span>
                                        {{ $service->title }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="who-we-are-image-wrap">
                        <img src="{{ asset('assets/img/apartment.png') }}" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Who We Are Area -->

    <!-- Start Fun Facts Area -->
    @if(count($advantages))
    <section class="fun-facts-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                    @php
                        $bg = 0;
                    @endphp
                    @foreach($advantages as $advantage)
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-fun-fact bg-{{$bg}}">
                                <h3>
                                    <span class="odometer" data-count="{{ $advantage->description }}">00</span>
                                </h3>
                                <p>{{ $advantage->title }}</p>
                            </div>
                        </div>
                        @php
                            $bg++;
                        @endphp
                    @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- End Fun Facts Area -->

    <!-- Start Gallery Area -->
    @if(count($galleries))
        <div class="gallery-area pt-100 pb-70">
            <div class="container">
                <div class="section-title">
                    <span></span>
                    <h2>Галерея</h2>
                </div>
                <div class="row">
                    @foreach($galleries as $gallery)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-gallery-box">
                                <img src="{{ $gallery->image_path }}" alt="image">

                                <a href="{{ $gallery->image_path }}" class="gallery-btn" data-imagelightbox="popup-btn">
                                    <i class='bx bx-search-alt'></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!-- End Gallery Area -->

    <!-- Start Blog Area -->
    @if(count($blogs))
    <section class="blog-area pb-70">
        <div class="container">
            <div class="section-title">
                <span>Ақпарат</span>
                <h2>Жаңалықтар</h2>
            </div>

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
    @endif
    <!-- End Blog Area -->

    <!-- Start Testimonials Area -->
    @if(count($reviews))
    <section class="testimonials-area pt-100 pb-100">
        <div class="container">
            <div class="section-title">
                <span>Пікірлер</span>
                <h2>Ата-аналар біз туралы не дейді</h2>
            </div>

            <div class="testimonials-slides owl-carousel owl-theme">
                @foreach($reviews as $review)
                    <div class="testimonials-item">
                        <div class="testimonials-item-box">
                            <div class="icon">
                                <i class='bx bxs-quote-left'></i>
                            </div>
                            <p>{{ $review->text }}</p>
                            <div class="info-box">
                                <h3>{{ $review->full_name }}</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- End Testimonials Area -->
</x-app-layout>
